@extends('common')
<link rel="stylesheet" href="../../css/product_detail.css">
@section('content')
<main id="product_detail">
    <section>
        <div class="container">
            <div class="wrap-product d-flex">
                <div class="img-product">
                    <div class="wrap-img mb-3"><img src="../../images/{{$productDetail->type}}/{{$productDetail->thumbnail_path}}.jpg" alt="1"></div>
                    <a href="javascript:" onclick="AddCart({{$productDetail->id}})"><div class="d-flex justify-content-center"><button class="add-cart">Add To Cart<i class="fa fa-shopping-cart ml-3"></i></button></div></a>
                </div>
                <div class="content-product d-flex justify-content-around flex-column">
                    <div class="infor"><b>Name: </b>{{$productDetail->name}}</div>
                    <div class="infor"><b>Type: </b><span>{{$productDetail->type}}</span></div>
                    <div class="infor"><b>Description: </b>{{$productDetail->description}}</div>
                <div class="infor"><b>Price: </b>{{$productDetail->unit_price}}$</div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
