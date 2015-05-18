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
                        <h3 class="title">Consumables</h3>

                        <div class="row row-centered">
                            @if(count($consumables)==0)
                                <div class="col-md-8 col-md-offset-2">
                                    <h3>No consumables found.Try again later.</h3>
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
                <!-- pagination section -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                        <nav>
                            <ul class="pagination">
                                {{$consumables->appends(Request::except('page'))->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- end pagination section -->
            </div>
            <!-- end left panel -->

            @include('layouts.right')
        </div>
    </div>
    <!-- content row -->
@stop