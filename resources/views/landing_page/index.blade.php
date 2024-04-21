@extends('layout.landing_page.app')
@section('content')
    <!--=================================
                                                            =            Page Slider            =
                                                            ==================================-->
    <div class="hero-slider">
        <!-- Slider Item -->
        <div class="slider-item slide1" style="background-image:url({{ asset('img/slider/1.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Slide Content Start -->
                        <div class="content style text-center">
                            <h2 class="text-white text-bold mb-2" data-animation-in="slideInLeft">Our Best
                                Surgeons</h2>
                            <p class="tag-text mb-4" data-animation-in="slideInRight">Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Vel sunt animi sequi ratione quod at earum. <br> Quis
                                quos officiis numquam!</p>
                            <a href="about.html" class="btn btn-main btn-white" data-animation-in="slideInLeft"
                                data-duration-in="1.2">explore</a>
                        </div>
                        <!-- Slide Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Item -->
        <div class="slider-item" style="background-image:url({{ asset('img/slider/2.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Slide Content Start-->
                        <div class="content style text-center">
                            <h2 class="text-white" data-animation-in="slideInRight">We Care About Your Health</h2>
                            <p class="tag-text mb-4" data-animation-in="slideInRight" data-duration-in="0.6">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            <a href="about.html" class="btn btn-main btn-white" data-animation-in="slideInRight"
                                data-duration-in="1.2">about us</a>
                        </div>
                        <!-- Slide Content End-->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--====  End of Page Slider  ====-->



    <!--Start about us area-->
    <section class="service-tab-section section container">
        <div class="service-box tab-pane fade show active" id="dormitory">
            <div class="row">
                <div class="col-lg-6">
                    <img loading="lazy" class="img-fluid" src="{{ asset('img/kadis.jpg') }}" alt="service-image">
                </div>
                <div class="col-lg-6">
                    <div class="contents">
                        <div class="section-title">
                            <h3>Sambutan Kepala Dinas Sosial Kabupaten Merauke</h3>
                        </div>
                        <div class="text">
                            <p>The implant fixture is first placed, so that it ilikely to
                                osseointegrate,
                                then a dental prosthetic is added. then a
                                dental prosthetic is added.then a dental pros- thetic is added.
                            </p>
                            <p>The implant fixture is first placed, so that it ilikely to
                                osseointegrate,
                                then a dental prosthetic is added. then a dental
                                prosthetic is added.then a dental pros- thetic is added.</p>
                        </div>

                        {{-- <a href="services.html" class="btn btn-style-one">Read more</a> --}}
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--End about us area-->

    {{-- <!--Service Section-->
    <section class="service-section bg-gray section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Provided
                    <span>Services</span>
                </h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. qui
                    suscipit atque <br>
                    fugiat officia corporis rerum eaque neque totam animi, sapiente culpa. Architecto!</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="items-container">
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/gallery/1.jpg"
                                            alt="images" class="img-fluid">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <span>Better Service At Low Cost</span>
                                    <a href="service.html">
                                        <h6>Dormitory</h6>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/gallery/2.jpg"
                                            alt="images" class="img-fluid">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <span>Better Service At Low Cost</span>
                                    <a href="service.html">
                                        <h6>Germs Protection</h6>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/gallery/3.jpg"
                                            alt="images" class="img-fluid">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <span>Better Service At Low Cost</span>
                                    <a href="service.html">
                                        <h6>Psycology</h6>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/gallery/1.jpg"
                                            alt="images" class="img-fluid">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <span>Better Service At Low Cost</span>
                                    <a href="service.html">
                                        <h6>Dormitory</h6>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/gallery/2.jpg"
                                            alt="images" class="img-fluid">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <span>Better Service At Low Cost</span>
                                    <a href="service.html">
                                        <h6>Germs Protection</h6>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/gallery/3.jpg"
                                            alt="images" class="img-fluid">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <span>Better Service At Low Cost</span>
                                    <a href="service.html">
                                        <h6>Psycology</h6>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Service Section-->

    <!--team section-->
    <section class="team-section section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Our Expert
                    <span>Doctors</span>
                </h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem illo, rerum
                    <br>natus nobis deleniti doloremque minima odit voluptatibus ipsam animi?
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="team-member">
                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/team/doctor-2.jpg" alt="doctor"
                            class="img-fluid">
                        <div class="contents text-center">
                            <h4>Dr. Robert Barrethion</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, aspernatur.
                            </p>
                            <a href="appointment.html" class="btn btn-main">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-member">
                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/team/doctor-lab-3.jpg"
                            alt="doctor" class="img-fluid">
                        <div class="contents text-center">
                            <h4>Dr. Marry Lou</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, aspernatur.
                            </p>
                            <a href="appointment.html" class="btn btn-main">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-member">
                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/team/event-2.jpg" alt="doctor"
                            class="img-fluid">
                        <div class="contents text-center">
                            <h4>Dr. Sansa Stark</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, aspernatur.
                            </p>
                            <a href="appointment.html" class="btn btn-main">Book Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End team section-->

    <!--testimonial-section-->
    <section class="testimonial-section" style="background: url(images/testimonials/1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h3>What Our
                            <span>Patients Says</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-carousel">
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/1.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>Adam Rose</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/2.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>David Warner</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/3.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>Amy Adams</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/1.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>Adam Rose</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/2.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>David Warner</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/3.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>Amy Adams</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/1.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>Adam Rose</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/2.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>David Warner</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="inner-box text-center">
                                <div class="image-box">
                                    <figure>
                                        <img loading="lazy" src="{{ asset('landing_page/') }}/images/testimonials/3.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h6>Amy Adams</h6>
                                <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                    dolor sit amet, consectetur, numquam Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End testimonial-section-->

    <!-- Contact Section -->
    <section class="appoinment-section section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion-section">
                        <div class="section-title">
                            <h3>FAQ</h3>
                        </div>
                        <div class="accordion-holder">
                            <div class="accordion" id="accordionGroup" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h4 class="card-title">
                                            <a role="button" data-toggle="collapse" href="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Why Should I choose Medical Health
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse show" role="tabpanel"
                                        aria-labelledby="headingOne" data-parent="#accordionGroup">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                            terry richardson ad squid. 3 wolf moon
                                            officia aute,
                                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                            laborum eiusmod. Brunch 3 wolf moon
                                            tempor,
                                            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et. Nihil anim keffiyeh
                                            helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                            proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                            aesthetic synth nesciunt you probably
                                            haven't
                                            heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h4 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                What are the Centre’s visiting hours?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                        data-parent="#accordionGroup">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                            terry richardson ad squid. 3 wolf moon
                                            officia aute,
                                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                            laborum eiusmod. Brunch 3 wolf moon
                                            tempor,
                                            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et. Nihil anim keffiyeh
                                            helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                            proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                            aesthetic synth nesciunt you probably
                                            haven't
                                            heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h4 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                href="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                How many visitors are allowed?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel"
                                        aria-labelledby="headingThree" data-parent="#accordionGroup">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                            terry richardson ad squid. 3 wolf moon
                                            officia aute,
                                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                            laborum eiusmod. Brunch 3 wolf moon
                                            tempor,
                                            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et. Nihil anim keffiyeh
                                            helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                            proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                            aesthetic synth nesciunt you probably
                                            haven't
                                            heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-area pl-0 pl-lg-5">
                        <div class="section-title">
                            <h3>Request
                                <span>Appointment</span>
                            </h3>
                        </div>
                        <form name="contact_form" class="default-form contact-form" action="!#" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="Name" placeholder="Name"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="Email" placeholder="Email"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="subject">
                                            <option>Departments</option>
                                            <option>Diagnostic</option>
                                            <option>Psychological</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="Phone" placeholder="Phone"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="Date" placeholder="Date"
                                            required="" id="datepicker" autocomplete="off">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="subject">
                                            <option>Doctor</option>
                                            <option>Diagnostic</option>
                                            <option>Psychological</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="form_message" placeholder="Your Message" required=""></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn-style-one">submit now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Contact Section -->
@endsection
