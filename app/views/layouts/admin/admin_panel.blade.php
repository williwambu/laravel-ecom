@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder login-area">
        <div class="col-md-6">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{route('create_category')}}"> <h4>Create a new Category</h4></a>
                <a href="{{route('create_product')}}"><h4>Create a new Product</h4></a>
                <a href="{{route('all_products')}}"><h4>View All Products</h4></a>
                <a href="{{route('orders')}}"><h4>View All Orders</h4></a>
                <a href="{{route('edit-carousel')}}"><h4>Change Slider Images</h4></a>
                <a href="#" ><h4 class="btn btn-danger">Delete A Product</h4></a>
            </div>
        </div>
        <div class="col-md-6">
            <a href="{{route('logout')}}"><button class="btn btn-primary">Logout</button></a>
        </div>
    </div>
    <!-- content row -->
@stop