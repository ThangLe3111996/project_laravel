@if (Session::has('Cart') != null)
@foreach (Session::get('Cart')->products as $item)
<div class="wrap-product px-4 pt-2 pb-4">
    <div class="border-item d-flex">
        <div class="wrap-img"><img src="../../images/{{$item['productInfo']->type}}/{{$item['productInfo']->thumbnail_path}}.jpg" alt=""></div>
        <div class="wrap-text d-flex flex-column justify-content-center">
            <p>Price: ${{$item['productInfo']->unit_price}} * {{$item['quanlity']}}</p>
            <p>Type: {{$item['productInfo']->type}}</p>
            <p>Name: {{$item['productInfo']->name}}</p>
        </div>
        <div class="wrap-icon" ><i class="fa fa-times" data-id="{{$item['productInfo']->id}}"></i></div>
    </div>
</div>
@endforeach
<div class="wrap-total px-4 py-2 d-flex flex-column">
    <div class="total-price d-flex justify-content-between pt-3">
        <div>Total Price:</div>
        <div>${{number_format(Session::get('Cart')->totalPrice)}}</div>
    </div>
    <div class="total-quality d-flex justify-content-between">
        <div>Total Quality:</div>
        <div id="quality-cart">{{Session::get('Cart')->totalQuality}}</div>
    </div>
</div>
<div class="wrap-btn px-4 py-2 d-flex flex-column">
    <a href="{{route('listcartPage')}}"><button class="btn view-cart">view bag</button></a>
    <a href="{{route('checkoutPage')}}"><button class="btn checkout">check out</button></a>
</div>
@else
<div>No products</div>
@endif



