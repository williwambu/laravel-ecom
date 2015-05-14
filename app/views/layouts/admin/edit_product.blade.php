@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder">
        @if($message != '')
        <div class="alert alert-success message update-success">
            {{$message}}
            <a href="#" class="close" data-dismiss="alert">&times</a>
        </div>

        @endif
        <div class="col-md-8 col-md-offset-2">

            <div class="col-md-6 col-md-offset-3">
                <h4>Edit Product</h4>
                @if($errors ->any())
                    <div class="col-md-8 col-md-offset-2">
                        @foreach($errors->all() as $key => $message)
                            <li style="color: red">{{$message}}</li>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('update-product')}}" method="POST" enctype='multipart/form-data' >
                    <input type="hidden" name="id" value="{{$product -> id}}">
                    <div class="form-group">
                        <label class="label" for="product_name">Product Name</label>
                        <input id="product_name" name="name" class="form-control" value="{{$product -> name}}">
                    </div>
                    <div class="form-group">
                        <label class="label" for="cat">Category</label>
                        <select id="cat" class="form-control" name="category_id">
                            <option value="{{$product->category_id}}" selected>{{$product -> category -> category_name}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category ->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label" for="manufacturer">Manufacturer</label>
                        <select id="manufacturer" class="form-control" name="manufacturer_id">
                            <option value="{{$product -> manufacturer_id}}" selected>{{$product -> manufacturer -> manufacturer_name}}</option>
                            <option >Select Manufacturer</option>
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer->id}}">{{$manufacturer -> manufacturer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label" for="speed">Speed</label>
                        <input id="speed" name="speed" class="form-control" value="{{$product -> speed}}">
                    </div>
                    <div class="form-group">
                        <label class="label" for="color">Color</label>
                        <select id="color" class="form-control" name="color">
                            <option value="{{$product -> color}}" selected>{{$product -> color}}</option>
                            <option value="Black">Black</option>
                            <option value="Black and white">Black and White</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label" for="series">Series</label>
                        <input id="series" value="{{$product -> series}}" name="series" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label" for="price">Price(Kshs)</label>
                        <input id="price" value="{{$product -> price}}" name="price" class="form-control">
                    </div>
                    <div id="features" class="form-group">
                       <!-- <button class="btn btn-primary" id="addNewInput">Add Features to Product</button> -->
                        @foreach($product -> features as $feature)
                            <textarea type="hidden" class="form-control edit-features" name="features[]" >{{$feature->feature}}</textarea>
                        @endforeach
                    </div>
                    <div id="txtEditor"></div>
                    <div class="form-group">
                        <label class="label" for="picture">Picture</label>
                        <input id="picture" type="file" name="picture" value="{{$product -> picture}}" >
                    </div>
                    <div>
                        <img src="{{$product->picture}}" class="preview" style="display: block">
                    </div>
                    <button id="editSubmitBtn" type="submit" class="btn btn-success">Update Product</button>
                </form>
            </div>
        </div>
    </div>
    <!-- content row -->
@stop