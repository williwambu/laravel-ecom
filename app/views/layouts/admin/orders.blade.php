@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row ">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left  clear-padding">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Products</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($orders as $order)
                               <tr>
                                   <td>{{$order->first_name . ' '.$order->last_name}}</td>
                                   <td>{{$order -> phone}}</td>
                                   <td>{{$order -> email}}</td>
                                   <td>{{$order -> address}}</td>
                                   <td>
                                       @foreach($order->products as $product)
                                          <ul>{{$product -> name}}</ul>
                                       @endforeach
                                   </td>
                                   <td>{{$order -> total}}</td>
                                   <td><a href="{{route('delete-order',array('order_id'=>$order->id))}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete Order</a></td>
                               </tr>
                           @endforeach
                        </tbody>
                    </table>
                <!-- pagination section -->
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <nav>
                            <ul class="pagination">
                                {{$orders->appends(Request::except('page'))->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- end pagination section -->
            </div>
            <!-- end left panel -->
            <!-- yield right section-->
            @include('layouts.right')
        </div>
    </div>
    <!-- content row -->
@stop