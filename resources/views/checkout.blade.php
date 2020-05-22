@extends('common')
<link rel="stylesheet" href="../../css/checkout.css">
@section('content')
<main id="checkout">
    <section class="d-flex justify-content-center container">
        <div class="d-grid">
            <form action="{{route('checkoutPage')}}" method="POST" class="mb-0 d-flex flex-column justify-content-center">
                <div>
                    <p class="title">Check Out</p>
                </div>
                <div class="register w-100 mb-4">
                    @if (Session::has('Success'))
                    <div class="alert alert-success">{{(Session::get('Success'))}}</div>
                    @endif
                    <input class="my-2" type="hidden" name="_token" value="{{csrf_token()}}">
                    @foreach ($arr as $item)
                        <div>
                            <input class="my-2" type="{{$item}}" name="{{$item}}" placeholder="Your {{$item}}...">
                        </div>
                        @error($item)
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    @endforeach
                </div>

                <div class="w-100" id="list-cart">
                    @if (Session::has('Cart') != null)
                        <table class="table-cart">
                            <tr>
                                <td class="text-title">Product Image</td>
                                <td class="text-title">Product Name</td>
                                <td class="text-title">Price</td>
                                <td class="text-title">Quanlity</td>
                                <td class="text-title">Total</td>
                            </tr>
                            @foreach (Session::get('Cart')->products as $item)
                            <tr>
                                <td>
                                    <div class="wrap-img"><img src="../../../images/{{$item['productInfo']->type}}/{{$item['productInfo']->thumbnail_path}}.jpg" alt="1"></div>
                                </td>
                                <td>{{$item['productInfo']->name}}</td>
                                <td class="text-price">{{$item['productInfo']->unit_price}}</td>
                                <td>{{$item['quanlity']}}</td>
                                <td class="text-price price_total">{{$item['price']}}</td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="d-flex align-items-end flex-column wrap-total">
                            <div class="my-2"><b>Total Price:</b> ${{number_format(Session::get('Cart')->totalPrice)}}</div>
                            <div class="my-2"><b>Total Quality:</b> {{Session::get('Cart')->totalQuality}}</div>
                        </div>
                    @else
                    <div class="text-center mt-4"><h1>No products are available</h1></div>
                    @endif
                </div>
                <div class="text-right btn-end">
                    <button type="submit" class="btn-checkout"><a href="">Buy</a><i class="fa fa-cart-plus ml-2"></i></button>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
