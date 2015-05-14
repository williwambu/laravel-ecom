@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row ">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left col-md -offset-2 clear-padding">
                <table class="table table-striped" style="padding: 20px">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <!-- Table head -->
                            <!--<th>Category</th>-->
                            <th>Manufacturer</th>
                            <th>Speed</th>
                            <th>Model</th>
                            <th>Series</th>
                            <th>color</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($products->getItems() as $product)
                           <!-- Table contents -->
                           <tr>
                               <td>{{$product->name}}</td>
                              <!-- <td>//{$product->category->category_name}}</td>-->
                               <td>{{$product->manufacturer->manufacturer_name}}</td>
                               <td>{{$product->speed}}</td>
                               <td>{{$product->model}}</td>
                               <td>{{$product ->series}}</td>
                               <td>{{$product->color}}</td>
                               <td>{{$product->price}}</td>
                               <td><form action="{{route('edit-product')}}">
                                       <input name="id" type="hidden" value="{{$product->id}}">
                                       <button class="btn btn-primary">Edit Product <span class="glyphicon glyphicon-edit"></span></button>
                                   </form>
                               </td>
                               <td><form action="{{route('delete-product')}}">
                                       <input name="id" type="hidden" value="{{$product->id}}">
                                       <button class="btn btn-danger">Delete <span class="glyphicon glyphicon-remove"></span></button>
                                   </form>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>

                </table>
                <!-- table pagination -->
                <div class="row" style="margin:0 auto;">
                    {{$products -> links()}}
                </div>
            </div>
            <!-- end of left panel -->
        </div>
    </div>
    <!-- end of content row -->
@stop