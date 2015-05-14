@extends('layouts.master')

@section('content')
    <!-- content row -->
    <div class="row content-holder" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-10 col-md-offset-1 clear-padding">
            <!-- left panel -->
            <div class="col-md-9 clear-padding">
                <h3 class="about-head colored">Know Who We Are</h3>
                <legend class="colored"></legend>
                <div class="much-text">
                    <p class="text-center " style="font-size: 22px">
                        Welcome to Business & Home Machines (BHM) Kenya, your number one source for:
                    </p>

                    <p>1. Refurbished <strong class="colored">PHOTOCOPIERS</strong> & their <strong class="colored">CONSUMABLES</strong>
                        (toners/cartridges/spare parts).
                    </p>

                    <p>
                        2. Refurbished <strong class="colored">DOMESTIC</strong> & <strong class="colored">COMMERCIAL
                            EQUIPMENT</strong> including fridges, freezers, display chillers, cookers, and microwaves,
                        washing machines, dining sets, classy sofa sets and general household items used by expatriates.
                    </p>

                    <p>
                        3. Professional repair and maintenance services for <strong class="colored">PHOTOCOPIERS and
                            PRINTERS & REFRIGERATION</strong> services (fridges, freezers, chillers, bottle coolers,
                        cold rooms etc.)
                    </p>
                    <br>

                    <p>
                        We’re dedicated to giving you the very best of affordable photocopiers, printers and a wide
                        range of super deals on classy expatriate household/commercial appliances with a focus on
                        affordability, reliability &customer service.
                    </p>

                    <p>
                        Our team of photocopier machines engineers and refrigeration experts is dedicated to providing
                        you with reliable, professional and timely services at all times.
                    </p>
                    <br>
                    <h5 class="colored text-center" style="font-size: 20px">More About Us....</h5><legend></legend>
                    <p>

                    The idea behind BHM has existed as from early 90s with importation of refurbished photocopiers &
                    fridges. Actually BHM is borne of close association with the very pioneer of refurbished
                    photocopiers and fridges in Kenya. From its pioneering humble beginnings, the business has
                    evolved to more professional and advanced way of doing business which is now the BHM.We
                    continue to invest our unmatched experience and competence in availing affordable quality
                    products to our wide network of customers.BHM now not only engages in sales of imported
                    photocopiers and printers but also sale of locally used high end household stuff from
                    expatriates. These are stuff that will sell in big stores for quite a fortune, yet we can get
                    you the same for almost half price or even below half price; some with barely a year of use!
                    Additional to our line of products is professional photocopier repair/maintenance services &
                    refrigeration services. We boast a team of highly experienced engineers who understand the art
                    inside out!
                    </p>

                    <br>
                    <h5 class="colored text-center" style="font-size: 20px">Our Offices...</h5><legend></legend>
                    <p>
                        We currently have offices and shop in the basement of Imenti House, along Tom Mboya Street. This
                        is in addition to the wide network of partners and businesses associates we have all over
                        Nairobi and other towns. This gives us the advantage to serve all our customers wherever they
                        are countrywide.
                    </p>
                </div>
            </div>
            <!-- end left panel -->

            <!-- yield right section-->
            @include('layouts.right')
        </div>
    </div>
    <!-- content row -->
@stop