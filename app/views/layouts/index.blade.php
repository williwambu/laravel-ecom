@extends('layouts.master')
@section('content')
    <!-- content row -->
    <div class="row content-holder">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left  clear-padding">
                <div class="row">
                    <!-- carousel section -->
                    <div class="col-md-12 slider">
                        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                            <!-- Image slider Indicators-->
                            <ul class="carousel-indicators" style="list-style: none">
                                @foreach($slides as $key => $slide)
                                    @if($key != 0)
                                        <li data-target="#carousel" data-slide-to="{{$key}}"></li>
                                    @else
                                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                    @endif
                                @endforeach
                            </ul>

                            <div id="inner-carousel" class="carousel-inner">
                                <!-- Image slider Items -->
                                <!-- Image slider Items -->
                                @foreach($slides as $key => $slide)
                                    @if($key != 0)
                                        <div class="item">
                                            {{HTML::image($slide -> path)}}
                                            <div class="carousel-caption">
                                                <!-- <div class="larger-caption text">Repairs at</div> -->
                                                <div class="text">{{$slide -> caption}}</div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="item active">
                                            {{HTML::image($slide -> path)}}
                                            <div class="carousel-caption">
                                                <!-- <div class="larger-caption text">Repairs at</div> -->
                                                <div class="text">{{$slide -> caption}}</div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- Image slider Controls -->
                            <!---previous button -->
                            <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                                 <span class="glyphicon glyphicon-chevron-left"></span>
                             </a>
                            <!-- Next button -->
                            <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                    <!-- end carousel section -->

                    <!-- products section-->
                    <div class="col-md-12 product-section">
                        <div class="much-text">
                        </div>
                        <h3 class="title">Our Latest Products</h3>

                        <div class="col-md-12">

                        </div>
                        <div class="row row-centered">
                            @foreach($products as $product)
                                <div class="col-md-3 col-md-height  product">
                                    <div class="row">
                                        <p class="product-name">{{$product -> name}}</p>

                                        <div class="col-md-10 col-md-offset-1">
                                            {{HTML::image($product->picture,'image',['class'=>"product-img"])}}
                                        </div>
                                        <div class="col-md-4 col-md-offset-1 item-price">
                                            <button class="btn btn-details">Ksh. {{$product->price}}</button>
                                        </div>
                                        <div class="col-md-10 col-md-offset-1">

                                            @foreach($product->features as $feature)
                                                {{$feature ->feature}}
                                            @endforeach

                                        </div>
                                        <div class="col-md-4 col-md-offset-1">
                                            <a class="btn btn-success add-to-cart"
                                               href="{{route('addToCart',array('id'=>$product->id))}}">
                                                <span class="glyphicon glyphicon-shopping-cart glyphicon-shopping-cart-sm"></span>Add
                                                to cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- end product section -->
                </div>
                <!-- pagination section -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <nav>
                            <ul class="pagination">
                                {{$products->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- end pagination section -->
            </div>
            <!-- end left panel -->
            <!-- yield right section-->
            @include('layouts.right')

        </div>
    </div>
    <!-- content row -->
@stop