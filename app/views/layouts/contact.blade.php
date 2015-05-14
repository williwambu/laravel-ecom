@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 left  clear-padding">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 contact-form">
                        <form method="post" action="{{route('post-contact-us')}}">
                            <div class="form-group">
                                <label class="label" for="name">Your Name </label>
                                <input id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="label" for="email">Your Email</label>
                                <input id="email" class="form-control" name="email" required>
                            </div>
                            <label class="label" for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" placeholder="Message..." required></textarea>
                            <button type="submit" class="btn btn-success btn-submit">Submit</button>
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

