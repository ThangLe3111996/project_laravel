@if (Session::has('Cart') != null)
    <table class="table-cart">
        <tr>
            <td class="text-title">Product Image</td>
            <td class="text-title">Product Name</td>
            <td class="text-title">Price</td>
            <td class="text-title">Quanlity</td>
            <td class="text-title">Total</td>
            <td colspan="2" class="text-title"></td>
        </tr>
        @foreach (Session::get('Cart')->products as $item)
        <tr>
            <td>
                <div class="wrap-img"><img src="../../../images/{{$item['productInfo']->type}}/{{$item['productInfo']->thumbnail_path}}.jpg" alt="1"></div>
            </td>
            <td>{{$item['productInfo']->type}}</td>
            <td class="text-price">{{$item['productInfo']->unit_price}}</td>
            <td>
                <div><input type="number" value="{{$item['quanlity']}}" name="quanlity" min="0"></div>
            </td>
            <td class="text-price price_total">{{$item['price']}}</td>
            <td>
                <button class="btn-remove" onclick="deleteItemCart({{$item['productInfo']->id}});">Remove<i class="fa fa-times ml-2"></i></button>
            </td>
            <td>
                <button class="btn-save">Save<i class="fa fa-check ml-2"></i></button>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex align-items-end flex-column mr-3 wrap-total">
        <div class="my-2"><b>Total Price:</b> ${{number_format(Session::get('Cart')->totalPrice)}}</div>
        <div class="my-2"><b>Total Quality:</b> {{Session::get('Cart')->totalQuality}}</div>
    </div>
    <div class="d-flex justify-content-end my-2 mr-3 btn-end">
        <a href="{{route('checkoutPage')}}"><button class="ml-2 btn-checkout">Check out<i class="fa fa-cart-plus ml-2"></i></button></a>
    </div>
@else
<div class="text-center mt-4"><h1>No products are available</h1></div>
@endif

