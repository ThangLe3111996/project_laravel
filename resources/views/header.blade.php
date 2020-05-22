<header>
    {{-- header --}}
    <div class="py-3" id="header">
        <div class="container">
            <div class="header d-flex justify-content-end">
               @if (Auth::check())
                <div class="hd-user mr-3">
                    <div class="color-text text-header"><a href="{{route('updatePage')}}"><i class="fa fa-user mr-1"></i>{{Auth::user()->name}}</a></div>
                </div>
                <div class="hd-signout mr-3">
                    <div class="color-text text-header"><a href="{{route('signoutPage')}}"><i class="fa fa-sign-out mr-1"></i>Sign Out</a></div>
                </div>
               @else
                <div class="hd-register mr-3">
                    <div class="color-text text-header"><a href="{{route('registerPage')}}"><i class="fa fa-registered mr-1"></i>Register</a></div>
                </div>
                <div class="hd-signin mr-3">
                    <div class="color-text text-header"><a href="{{route('signinPage')}}"><i class="fa fa-sign-in mr-1"></i>Sign In</a></div>
                </div>
               @endif
                <div class="hd-cart">
                    <div class="d-flex align-items-center text-header">
                        <i class="fa fa-shopping-cart mr-2"></i>
                        @if (Session::has('Cart') != null)
                        <div class="color-text" id="quality-item">{{Session::get('Cart')->totalQuality}}</div>
                        @else
                        <div class="color-text" id="quality-item"></div>
                        @endif
                    </div>
                    <div class="popup">
                        <div id="change-item">
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
                                    <div class="wrap-icon"><i class="fa fa-times" data-id="{{$item['productInfo']->id}}"></i></div>
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
                                    <div>{{Session::get('Cart')->totalQuality}}</div>
                                </div>
                            </div>
                            <div class="wrap-btn px-4 py-2 d-flex flex-column">
                                <a href="{{route('listcartPage')}}"><button class="btn view-cart">view bag</button></a>
                                <a href="{{route('checkoutPage')}}"><button class="btn checkout">check out</button></a>
                            </div>
                            @else
                            <div>No products</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- navigation --}}
    <div id="nav">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="nav-logo">
                <div class="nav-text"><a href="{{route('homePage')}}"><b>lnt</b> fashion</a></div>
            </div>
            <div class="nav">
                <div class="nav-item">
                    <ul class="d-flex m-0">
                        @foreach ($categoryView as $item)
                        <li class="mx-3"><a href="{{route('categoriesPage',$item->id)}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div id="search">
                    <form class="m-0" action="{{route('searchPage')}}" method="GET">
                        <input class="border-0" type="text" name="key" placeholder="Search...">
                        <button class="fa fa-search"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- banner --}}
    <div class="banner d-flex justify-content-center align-items-center" id="banner">
        <p class="text-title">Home</p>
    </div>
</header>
<script src="../../js/all.js"></script>
