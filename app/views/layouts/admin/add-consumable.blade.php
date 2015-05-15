@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4>Add a New Consumable</h4>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="{{route('add-consumable')}}" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$id}}">
                <input id="features" name="features"/>

                <div class="form-group">
                    <label class="label" for="name">Name:</label>
                    <input class="form-control" id="name" name="name" type="text">
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
                <button id="addConsBtn" class="btn btn-primary" type="submit">Submit <span class="glyphicon glyphicon-send"></span>
                </button>
            </form>
        </div>
    </div>
@stop