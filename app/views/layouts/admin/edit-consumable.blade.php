@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-5 col-md-offset-2">
        <h4>Add a New Consumable</h4>
    </div>
</div>
<div class="row">

    <div class="col-md-6  col-md-offset-2">
        <form method="post" action="{{route('update-consumable')}}" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$id}}">
            <textarea id="features" name="features" class="edit-features">{{$consumable -> features}}</textarea>

            <div class="form-group">
                <label class="label" for="name">Name:</label>
                <input class="form-control" id="name" name="name" type="text" value="{{$consumable -> name}}">
            </div>
            <div class="form-group">
                <label class="label">Consumable Description</label>

                <div id="txtEditor">

                </div>
            </div>
            <div class="form-group">
                <label class="label" for="picture">Picture: </label>
                <input id="picture" class="form-control" type="file" name="picture">
                <div>
                    <img src="" class="preview">
                </div>
            </div>
            <div class="form-group">
                <label class="label" for="price">Price : </label>
                <input class="form-control" id="price" name="price" type="text" value = {{$consumable -> price}}>
            </div>
            <button id="editConsBtn" class="btn btn-primary" type="submit">Submit <span class="glyphicon glyphicon-send"></span>
            </button>
        </form>
    </div>
</div>
@stop