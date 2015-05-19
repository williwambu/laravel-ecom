@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row ">
        <div class="col-md-11 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-10 left col-md -offset-2 clear-padding">
                <table class="table table-striped" style="padding: 20px">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <!-- Table head -->
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($consumables->getItems() as $consumable)
                        <!-- Table contents -->
                        <tr>
                            <td>{{$consumable->name}}</td>

                            <td>{{$consumable->price}}</td>
                            <td>
                                <form method="post" action="{{route('edit-consumable')}}">
                                    <input name="id" type="hidden" value="{{$consumable->id}}">
                                    <button class="btn btn-primary">Edit Consumable <span class="glyphicon glyphicon-edit"></span></button>
                                </form>
                            </td>
                            <td><form method="post" action="{{route('delete-consumable')}}">
                                    <input name="id" type="hidden" value="{{$consumable->id}}">
                                    <button class="btn btn-danger">Delete <span class="glyphicon glyphicon-remove"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <!-- table pagination -->
                <div class="row" style="margin:0 auto;">
                    {{$consumables -> links()}}
                </div>
            </div>
            <!-- end of left panel -->
        </div>
    </div>
    <!-- end of content row -->
@stop