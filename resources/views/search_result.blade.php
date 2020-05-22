@extends('common')
<link rel="stylesheet" href="../../css/search.css">
@section('content')
<main id="searchResult">
    <section>
        <div class="container">
        <div class="categories"><span class="search-text"><b>Kết quả tìm kiếm:</b> {{count($itemSearch)}}</span></div>
            <div class="d-flex justify-content-between row">
                @foreach ($itemSearch as $item)
                <div class="wrap-img d-flex justify-content-center col-md-4">
                        <div class="wrap-view">
                            <a href="{{route('productPage',$item->id)}}">
                                <div class="name-product">{{$item->name}}</div>
                                <img src="../../images/{{$item->type}}/{{$item->thumbnail_path}}.jpg">
                                <div class="my-2"><button class="view-cart">View To Cart<i class="ml-3 fa fa-arrow-right"></i></button></div>
                            </a>
                            <a href="javascript:" onclick="AddCart({{$item->id}})">
                                <div><button class="view-cart">Add To Cart<i class="ml-3 fa fa-arrow-right"></i></button></div>
                            </a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
