@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 clear-padding">
                <h3 class="about-head colored">Who We Are</h3>
                <legend class="colored"></legend>
                <div class="much-text">
                    <p class="mini-head colored">Our stronghold</p><span class="underline"></span>

                    <p class="italic">Our business is rooted in one major strength:</p>

                    <p class="mini-head colored right-pull" style="margin-left: 300px" >PROFESSIONALISM</p>

                    <p>We believe in handling all our clients in the most professional manner.
                        This we work towards by ensuring highest ethical standards are observed in dealing with our
                        customers.
                    </p>
                    <p class="colored" style="font-size: 19px"> Among our key ethics are:</p>

                    <p><strong >Integrity</strong> - We provide all relevant information to our clients to aid sound
                        decision making in purchases and service requisition. We sell only genuine spare parts and
                        consumables.
                    </p>
                    <p>
                        <strong>Reliability</strong> - At BHM we believe that a business today is worth a thousand more if the
                        RIGHT solution is offered at the RIGHT time and in the RIGHT manner to the client.
                    </p>
                    <p class="mini-head text-center colored ">Our Mission</p>
                    <p class="right-pull">Consistently serve clients in our markets of expertise most affordably and reliably.</p>
                    <p class="mini-head text-center colored ">Our vision</p>
                    <p class="right-pull">We aim to becoming the most sought after solution providers in the field of photocopiers/printers and refrigeration.</p>
                    <p class="mini-head text-center colored ">Our promise</p>
                    <p class="right-pull">We promise to honor our promise.</p>
                </div>
            </div>
            <!-- end left panel -->

            <!-- yield right section-->
            @include('layouts.right')
        </div>
    </div>
    <!-- content row -->
@stop