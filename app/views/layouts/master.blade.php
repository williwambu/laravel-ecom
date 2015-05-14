<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>BHM | Kenya</title>
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/jquery.smartmenus.bootstrap.css')}}
    {{HTML::style('css/styles.css')}}

    <!-- font - awesome -->
    {{HTML::style('css/font-awesome.min.css')}}

    <!-- editor css -->
    {{HTML::style('css/editor.css')}}

</head>
<body>
<div class="container">
    <!-- header row -->
    <div class="row">
        <div class="col-md-12 header">
            <div class="col-md-1">
                <a href="{{route('home')}}" class="logo"><img src="http://placehold.it/60x60"></a>
            </div>
            <div class="row">
                <div class="col-md-3 col-md-offset-6 col-sm-0">
                    <div class="search-area">
                        <form method="post" action="{{route('search')}}">
                            <input type="text" placeholder="Search..." name="search-term">
                            <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-2 cart clear-padding">
                    <div class="col-md-2 .hidden-sm clear-padding">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                    </div>
                    <div class="col-md-5">
                        <div class="row items">
                            {{$cart_count}} items
                        </div>
                        <div class="row price">
                            Ksh. {{$cart_total}}
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 clear-padding">
                        <a href="{{route('cart')}}">
                            <button class="btn btn-primary checkout">
                                CHECKOUT
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header row -->
    <!-- menu row -->
    <div class="row">
        <!-- menu column -->
        <div class="col-md-12 menu-column">
            <div class="col-md-12 clear-padding">
                <div class="navbar navbar-default custom-nav" role="navigation">
                    <div class="holder">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{route('home')}}">Home</a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#">About Us</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('about')}}">Who We Are</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{route('know-bhm')}}">Know BHM Kenya</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('products')}}">Products</a>
                                    <ul class="dropdown-menu">
                                        @foreach($menu_data as $k => $category)
                                            @if($k == count($menu_data) - 1)

                                                <li><a href="{{route('category',array('category_id'=>$category->id))}}">{{$category -> category_name}}</a>
                                                    @if(!$category->manufacturers->isEmpty())
                                                        <ul class="dropdown-menu">
                                                            @foreach($category ->manufacturers as $key => $sub_menu)
                                                                <!-- last -->
                                                                @if($key == count($category -> manufacturers) - 1)
                                                                    <li><a href="{{route('manufacturer',array('manufacturer_id'=>$sub_menu->id))}}">{{$sub_menu -> manufacturer_name}}</a></li>

                                                                @else
                                                                    <li><a href="{{route('manufacturer',array('manufacturer_id'=>$sub_menu->id))}}">{{$sub_menu -> manufacturer_name}}</a></li>
                                                                    <li class="divider"></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>

                                            @else

                                                <li><a href="{{route('category',array('category_id'=>$category->id))}}">{{$category -> category_name}}</a>
                                                    @if(!$category->manufacturers->isEmpty())
                                                        <ul class="dropdown-menu">
                                                            @foreach($category ->manufacturers as $key => $sub_menu)
                                                                <!-- last -->
                                                                @if($key == count($category -> manufacturers) - 1)
                                                                    <li><a href="{{route('manufacturer',array('manufacturer_id'=>$sub_menu->id))}}">{{$sub_menu -> manufacturer_name}}</a></li>

                                                                    @else
                                                                        <li><a href="{{route('manufacturer',array('manufacturer_id'=>$sub_menu->id))}}">{{$sub_menu -> manufacturer_name}}</a></li>
                                                                        <li class="divider"></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                                <li class="divider"></li>
                                            @endif

                                        @endforeach
                                    </ul>
                                </li>
                                <li class="divider"></li>
                                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                                <li><a href="{{route('enquire')}}">Enquire Consumables</a></li>
                                <li class="divider"></li>
                                <!--<li><a href="{{route('faqs')}}">FAQs</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end menu column -->
    </div>
    <!-- end of menu row -->

    @yield('content')


    <!-- footer -->
    <div id="footer" class="row">
        <footer class="col-md-12 footer clear-padding">
            <div class="row">
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 copyright-section">
                    <p class="business-name">Business & Home Machines Ltd</p>

                    <p class="copyright">Copyright &copy
                        <script>document.write(new Date().getFullYear())</script>
                        , ALL RIGHTS RESERVED.
                    </p>
                </div>
                <div class="col-md-3 pull-right social-media-section ">
                    <a href="#">
                        <div class="col-md-3 social-media facebook clear-padding"></div>
                    </a>
                    <a href="#">
                        <div class="col-md-3 social-media twitter clear-padding"></div>
                    </a>
                    <a href="#">
                        <div class="col-md-3 social-media google-plus clear-padding"></div>
                    </a>
                    <a href="#">
                        <div class="col-md-3 social-media skype clear-padding"></div>
                    </a>
                </div>
            </div>
        </footer>
    </div>
    <!-- footer -->
    <!-- jquery -->
    {{HTML::script('js/jquery-1.11.2.min.js')}}
    <!-- bootstrap -->
    {{HTML::script('js/bootstrap.min.js')}}
    <!-- smart menus -->
    {{HTML::script('js/jquery.smartmenus.js')}}
    {{HTML::script('js/jquery.smartmenus.bootstrap.js')}}
    {{HTML::script('js/custom.js')}}
    <!-- validation -->
    {{HTML::script('js/parsley.min.js')}}
    <!-- rich edit -->
    {{HTML::script('js/editor.js')}}
    <!--equal heights of columns -->
    {{HTML::script('js/jquery.matchHeight.js')}}
</div>
</body>
</html>