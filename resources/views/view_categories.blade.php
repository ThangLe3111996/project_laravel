@extends('common')
<link rel="stylesheet" href="../../css/view.css">
@section('content')
<main id="view-categories">
    <section>
        <div class="container">
            @foreach ($typeproductView as $type)
                <div class="categories"><a href="{{route('categoriesPage',$type->id)}}">{{$type->name}}</a></div>
                <div class="d-flex justify-content-between row">
                    @foreach ($productView as $item)
                        <div class="wrap-img d-flex justify-content-center col-md-4">
                            <div class="wrap-view">
                                <a href="{{route('productPage',$item->id)}}">
                                    <div class="name-product">{{$item->name}}</div>
                                    <img src="../../images/{{$type->name}}/{{$item->thumbnail_path}}.jpg">
                                    <div class="my-2"><button class="view-cart">View To Product<i class="ml-3 fa fa-arrow-right"></i></button></div>
                                </a>
                                <a href="javascript:" onclick="AddCart({{$item->id}})">
                                    <div><button class="view-cart">Add To Cart<i class="ml-3 fa fa-arrow-right"></i></button></div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
