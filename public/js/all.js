function AddCart(id) {
    $.ajax({
        url: '/addcart/'+id,
        type: 'GET',
    }).done(function(res) {
        RenderCart(res)
        alertify.success('Add cart success');
    })
}

$("#change-item").on("click", ".wrap-icon i", function() {
    $.ajax({
        url: '/deleteitemcart/'+$(this).data("id"),
        type: 'GET',
    }).done(function(res) {
        RenderCart(res)
        alertify.error('Delete cart success');
    })
})

function deleteItemCart(id) {
    $.ajax({
        url: '/deletelistcart/'+id,
        type: 'GET',
    }).done(function(res) {
        RenderListCart(res)
        alertify.error('Delete cart success');
    })
}

function RenderCart(res) {
    $("#change-item").empty();
    $("#change-item").html(res);
    $("#quality-item").text($("#quality-cart").text());
}

function RenderListCart(res) {
    $("#change-list-cart").empty();
    $("#change-list-cart").html(res);
}
