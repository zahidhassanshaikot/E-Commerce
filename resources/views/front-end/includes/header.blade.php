<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-left">
                <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
                <ul>
                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                    <li><a href="{{ route('user/login') }}">Login</a></li>
                    <li><a href="{{ route('checkout') }}"> Create Account </a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="{{ route('/') }}">New Shop <span>Shop anywhere</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav">
                                @foreach($categories as $category)
                                <li class="active"><a href="{{route('category-product',['id'=>$category->id])}}" class="act">{{ $category->category_name }}</a></li>
                                @endforeach
                                <!-- Mega Menu -->
                                {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Women<b class="caret"></b></a>--}}
                                {{--<ul class="dropdown-menu multi-column columns-3">--}}
                                {{--<div class="row">--}}
                                {{--<div class="col-sm-3  multi-gd-img">--}}
                                {{--<ul class="multi-column-dropdown">--}}
                                {{--<h6>Submenu1</h6>--}}
                                {{--<li><a href="{{route('/female-product')}}">Clothing</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Wallets</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Shoes</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Watches</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}"> Underwear </a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Accessories</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3  multi-gd-img">--}}
                                {{--<ul class="multi-column-dropdown">--}}
                                {{--<h6>Submenu2</h6>--}}
                                {{--<li><a href="{{route('/female-product')}}">Sunglasses</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Wallets,Bags</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Footwear</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Watches</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Accessories</a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Jewellery</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3  multi-gd-img">--}}
                                {{--<a href="{{route('/female-product')}}"><img src="{{asset('/')}}/front-end/images/woo.jpg" alt=" "/></a>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3  multi-gd-img">--}}
                                {{--<a href="{{route('/female-product')}}"><img src="{{asset('/')}}/front-end/images/woo1.jpg" alt=" "/></a>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                                {{--</div>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <b class="caret"></b></a>--}}
                                {{--<ul class="dropdown-menu multi-column columns-3">--}}
                                {{--<div class="row">--}}
                                {{--<div class="col-sm-3  multi-gd-img">--}}
                                {{--<ul class="multi-column-dropdown">--}}
                                {{--<h6>Submenu1</h6>--}}
                                {{--<li><a href="{{route('/male-product')}}">Clothing</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}">Wallets</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}">Shoes</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}">Watches</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}"> Underwear </a></li>--}}
                                {{--<li><a href="{{route('/female-product')}}">Accessories</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3  multi-gd-img">--}}
                                {{--<ul class="multi-column-dropdown">--}}
                                {{--<h6>Submenu2</h6>--}}
                                {{--<li><a href="{{route('/male-product')}}">Sunglasses</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}">Wallets,Bags</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}">Footwear</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}">Watches</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}">Accessories</a></li>--}}
                                {{--<li><a href="{{route('/male-product')}}">Jewellery</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3  multi-gd-img">--}}
                                {{--<a href="{{route('/male-product')}}"><img src="{{asset('/')}}/front-end/images/woo3.jpg" alt=" "/></a>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3  multi-gd-img">--}}
                                {{--<a href="{{route('/male-product')}}"><img src="{{asset('/')}}/front-end/images/woo4.jpg" alt=" "/></a>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                                {{--</div>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a href="{{ route('code') }}">Short Codes</a></li>--}}
                                {{--<li><a href="{{ route('mail-us') }}">Mail Us</a></li>--}}
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="logo-nav-right">
                    <ul class="cd-header-buttons">
                        <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                    </ul> <!-- cd-header-buttons -->
                    <div id="cd-search" class="cd-search">
                        <form action="#" method="post">
                            <input name="Search" type="search" placeholder="Search...">
                        </form>
                    </div>
                </div>
                <div class="header-right2">
                    <div class="cart box_1">
                        <a href="{{ route('checkout') }}">
                            <h3> <div class="total">
                                    <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
                                <img src="{{asset('/')}}/front-end/images/bag.png" alt="" />
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--header-->