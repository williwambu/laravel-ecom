@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left  clear-padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 cart-container">
                            <h4 class="">Shopping Cart</h4>
                            @if(count($cart_content)==0)
                                <div class="col-md-8 col-md-offset-2">
                                    <strong>Your shopping cart is empty.</strong>
                                </div>
                                @else
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart_content as $key => $item)
                                        <tr>
                                            <td>{{$item ->name}}</td>
                                            <td><form action="{{route('update-row')}}" method="POST" class="form-inline">
                                                    <input name="row_id" type="hidden" value="{{$key}}">
                                                    <input name="qty" class="form-control qty-input" value="{{$item -> qty}}">
                                                    <button type="submit" class="btn btn-details"><span class="glyphicon glyphicon-refresh"></span>Update</button>
                                                </form>
                                            </td>
                                            <td>Ksh {{$item -> price}}</td>
                                            <td>Ksh {{$item -> subtotal}}</td>
                                            <td><a href="{{route('remove-item',array('row_id'=>$key))}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Remove Product</a></td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                <p class="total"><span class="light">Total :</span>  ksh {{$cart_total}}</p>
                                <a href="{{route('order')}}" class="btn btn-order pull-right">ORDER</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- end left panel -->

            @include('layouts.right')
        </div>
    </div>
    <!-- content row -->
@stop