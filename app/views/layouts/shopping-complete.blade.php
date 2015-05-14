@extends('layouts.master')
@section('content')
    <!-- content row -->
    <div class="row content-holder">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left  clear-padding">
                <div class="col-md-8 col-md-offset-2">
                    <strong>You order has been received.We will call you to complete transaction.</strong>
                    <strong><a href="{{route('home')}}">Continue Shopping.</a></strong>
                </div>
        </div>
            <!-- end left panel -->

            @include('layouts.right')
        </div>
    </div>
    <!-- content row -->
@stop