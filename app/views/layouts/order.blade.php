@extends('layouts.master')
@section('content')
    <!-- content row -->
    <div class="row content-holder">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left  clear-padding">
                <div class="row">
                   <div class="col-md-6 col-md-offset-3 order-form">
                       <h3 class="col-md-offset-1">Fill the form to complete order.</h3>
                       <h5>* Required.</h5>
                       <form id="order-form" method="POST" action="{{route('submit-order')}}" data-parsley-validate>
                           <div class="form-group">
                               <label class="label" for="first_name">First Name *</label>
                               <input id="first_name" name="first_name" class="form-control" type="text" required>
                           </div>
                           <div class="form-group">
                               <label class="label" for="last_name">Last Name *</label>
                               <input id="last_name" name="last_name" class="form-control" required>
                           </div>
                           <div class="form-group">
                               <label class="label" for="phone">Phone Number *</label>
                               <input id="phone" name="phone" type="text" class="form-control" required>
                           </div>
                           <div class="form-group">
                               <label class="label" for="email">Email *</label>
                               <input id="email" type="email" name="email" data-parsley-trigger="change" class="form-control" required>
                           </div>
                           <div class="form-group">
                               <label class="label" for="address">Address *</label>
                               <input id="address" name="address" class="form-control" required>
                           </div>
                           <button type="submit" class="btn btn-details">Submit order</button>
                       </form>
                   </div>
                </div>
            </div>
            <!-- end left panel -->

            @include('layouts.right')
        </div>
    </div>
    <!-- content row -->
@stop