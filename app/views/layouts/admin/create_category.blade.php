@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder login-area">
        <div class="col-md-6 col-md-offset-3">
            @if($errors ->any())
                <div class="col-md-8 col-md-offset-2">
                    @foreach($errors as $key => $message)
                        <li style="color:red">
                            {{$message}}
                        </li>
                    @endforeach
                </div>
            @endif
            <div class="col-md-8 col-md-offset-2">
                <h4 >Create a new Category</h4>
                <form action="{{route('post_create_category')}}" method="POST" data-parsley-validate>
                    <div class="form-group">
                        <label class="label" for="cat_name">Category Name</label>
                        <input id="cat_name" class="form-control" name="category_name" placeholder="Name of the category" required>
                    </div>
                    <div class="form-group">
                        <label class="label" for="description">Category Description</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Enter Category description,Appears as summary to the description." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="manufacturer" class="label">Select Category Manufacturers</label>
                        <div>Hold down Ctrl key to select multiple Manufacturers </div>

                        <select id="manufacturer" name="manufacturers[]" class="form-control" multiple>
                           @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer->id }}">{{$manufacturer->manufacturer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success">Create Category</button>
                </form>
            </div>
        </div>
    </div>
    <!-- content row -->
@stop