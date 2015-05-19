@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left  clear-padding">
                <div class="row">
                    <!-- products section-->
                    <div class="col-md-12 product-section">
                        <h3 class="title">Search Results for {{$search_term}}</h3>

                        <div class="row row-centered">
                            @if(empty($products)||empty($products[0]) && empty($consumables))
                                <div class="col-md-8 col-md-offset-2">
                                    <h3>No products found.Try using other words.</h3>
                                </div>
                            @else
                                @foreach($products[0] as $product)
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

                                                    <a class="view-cons" href={{route('product-cons',array('id'=>$product -> id))}}>View Consumables</a>
                                            </div>
                                            <div class="col-md-4 col-md-offset-1">
                                                <a class="btn btn-success add-to-cart"
                                                   href="{{route('addToCart',array('id'=>$product->id))}}">
                                        <span
                                                class="glyphicon glyphicon-shopping-cart glyphicon-shopping-cart-sm"></span>Add
                                                    to cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                                @if(count($products)== 0 && empty($consumables))
                                    <div class="col-md-8 col-md-offset-2">
                                        <h3>No products found.Try using other words.</h3>
                                    </div>
                                @else
                                    @foreach($consumables as $consumable)
                                        <div class="col-md-3 col-md-height  product">
                                            <div class="row">
                                                <p class="product-name">{{$consumable -> name}}</p>

                                                <div class="col-md-10 col-md-offset-1">
                                                    {{HTML::image($consumable->path,'image',['class'=>"product-img"])}}
                                                </div>
                                                <div class="col-md-4 col-md-offset-1 item-price">
                                                    <button class="btn btn-details">Ksh. {{$consumable->price}}</button>
                                                </div>
                                                <div class="col-md-10 col-md-offset-1">
                                                    {{$consumable -> features}}
                                                </div>
                                                <div class="col-md-4 col-md-offset-1">
                                                    <a class="btn btn-success add-to-cart"
                                                       href="{{route('cons-add-to-cart',array('id'=>$consumable->id))}}">
                                        <span
                                                class="glyphicon glyphicon-shopping-cart glyphicon-shopping-cart-sm"></span>Add
                                                        to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                        </div>
                    </div>
                    <!-- end product section -->
                </div>

            </div>
            <!-- end left panel -->

            @include('layouts.right')
        </div>
    </div>
    <!-- content row -->
@stop