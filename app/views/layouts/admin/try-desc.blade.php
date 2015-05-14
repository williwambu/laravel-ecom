@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder">
        @if(!isset($message) && !empty($message))
            <button class="btn btn-success">{{$message}}</button>
        @endif
        <div class="col-md-8 col-md-offset-2">

            <div class="col-md-8 col-md-offset-3">
                <h4>create a new Product</h4>
                @if($errors ->any())
                    <div class="col-md-8 col-md-offset-2">
                        @foreach($errors->all() as $key => $message)
                            <li style="color: red">{{$message}}</li>
                        @endforeach
                    </div>
                @endif
                <form class="new-product" action="{{route('post_create_product')}}" method="POST" enctype='multipart/form-data' data-parsley-validate>
                    <div class="form-group">
                        <label class="label" for="product_name">Product Name</label>
                        <input id="product_name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label" for="cat">Category</label>
                        <select id="cat" class="form-control" name="category_id" required>
                            <option>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category ->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label" for="manufacturer">Manufacturer</label>
                        <select id="manufacturer" class="form-control" name="manufacturer_id" required>
                            <option value="0">Select Manufacturer</option>
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer->id}}">{{$manufacturer -> manufacturer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label" for="speed">Speed</label>
                        <input id="speed" name="speed" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label" for="color">Color</label>
                        <select id="color" class="form-control" name="color">
                            <option value="Black">Black</option>
                            <option value="Black and White">Black and White</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label" for="series">Series</label>
                        <input id="series" name="series" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label" for="price">Price(Kshs)</label>
                        <input id="price" name="price" class="form-control" required>
                    </div>
                    <!--<div id="features" class="form-group">
                        <button class="btn btn-primary" id="addNewInput">Add Features to Product</button>
                    </div>-->
                    <!-- rich editor -->
                    <div id="txtEditor"></div>

                    <div class="form-group">
                        <label class="label" for="picture">Picture</label>
                        <input id="picture" type="file" name="picture" required>
                    </div>
                    <div>
                        <img src="" class="preview">
                    </div>
                    <button id="submitBtn" type="submit" class="btn btn-success">Create Product</button>
                </form>
            </div>
        </div>
    </div>
    <!-- content row -->
@stop