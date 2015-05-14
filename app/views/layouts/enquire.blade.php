@extends('layouts.master')
@section('content')
    <!-- content row -->
    <div class="row content-holder">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left  clear-padding">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 order-form">
                        <h5 class="col-md-offset-1"><strong>Do you want to know if we have consumables for your machine? Fill this form and we will
                        contact you to tell you more.</strong></h5>
                        <p style="font-weight: bold">* Required.</p>
                        <form id="order-form" method="POST" action="{{route('submit-enquiry')}}" data-parsley-validate>
                            <div class="form-group">
                                <label class="label">Name of machine *</label>
                                <input placeholder="Name of the machine you are using." name="machine_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Machine Model *</label>
                                <input placeholder="Model of machine you are using." name="machine_model" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="label">Name of consumable *</label>
                                <input placeholder="The consumable you would like to enquire about." name="consumable_name" class="form-control" required>
                            </div>
                            <button class="btn btn-success">Send <span class="glyphicon glyphicon-send"></span></button>
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