@extends('layouts.front')
@section('content')
    <section class="intro_section page_mainslider ds light_md_bg_color all-scr-cover">
        <div class="flexslider" data-dots="true" data-nav="true">
            <ul class="slides">
                <li>
                    <div class="slide-image-wrap">
                        <div class="rounded-container"> <img src="images/slide01.jpg" alt=""> </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="slide_description_wrapper">
                                    <div class="slide_description">
                                        <div class="intro-layer" data-animation="fadeInUp">
                                            <!-- <p class="semibold text-uppercase grey"> Our factory in Colorado is producing </p> -->
                                        </div>
                                        <div class="intro-layer" data-animation="fadeInUp">
                                            <h2>SWITZERLAND’S FINEST CANNABIS AND CBD PRODUCTS</h2>
                                        </div>
                                        <div class="intro-layer" data-animation="fadeInUp">
                                            <div class="slide_buttons"> <a href="contact.html" class="theme_button color4 min_width_button">Buy now</a> </div>
                                        </div>
                                    </div>
                                    <!-- eof .slide_description -->
                                </div>
                                <!-- eof .slide_description_wrapper -->
                            </div>
                            <!-- eof .col-* -->
                        </div>
                        <!-- eof .row -->
                    </div>
                    <!-- eof .container -->
                </li>
            </ul>
        </div>
        <!-- eof flexslider -->
    </section>
    <!-- <section class="ls section_offset_teasers section_padding_top_10 section_padding_bottom_10">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 to_animate no_appear_delay" data-animation="fadeInDown" data-delay="600">
                    <div class="teaser top_offset_icon main_bg_color rounded text-center">
                        <div class="teaser_icon size_small round main_bg_color"> <i class="fa fa-globe" aria-hidden="true"></i> </div>
                        <h4 class="topmargin_0"> <a href="#">Green House</a> </h4>
                        <p class="content-3lines-ellipsis">«Our cannabis is greenhouse grown with love.»</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 to_animate no_appear_delay" data-animation="fadeInDown" data-delay="300">
                    <div class="teaser top_offset_icon main_bg_color2 rounded text-center">
                        <div class="teaser_icon size_small round main_bg_color2"> <i class="fa fa-plug" aria-hidden="true"></i> </div>
                        <h4 class="topmargin_0"> <a href="#">Solar Energy</a> </h4>
                        <p class="content-3lines-ellipsis">«What better source of energy than the sun itself.»</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 to_animate no_appear_delay" data-animation="fadeInDown" data-delay="300">
                    <div class="teaser top_offset_icon main_bg_color3 rounded text-center">
                        <div class="teaser_icon size_small round main_bg_color3"> <i class="fa fa-leaf" aria-hidden="true"></i> </div>
                        <h4 class="topmargin_0"> <a href="#">Sustainable</a> </h4>
                        <p class="content-3lines-ellipsis">«Low carbon footprint,-Thats why we buy local, reuse.»</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 to_animate no_appear_delay" data-animation="fadeInDown" data-delay="600">
                    <div class="teaser top_offset_icon main_bg_color4 rounded text-center">
                        <div class="teaser_icon size_small round main_bg_color4"> <i class="fa fa-users" aria-hidden="true"></i> </div>
                        <h4 class="topmargin_0"> <a href="#">Connoisseurs</a> </h4>
                        <p class="content-3lines-ellipsis">«We are a big family of perfect cannabis connoisseurs.»</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section id="about" class="ls section_padding_top_100 section_padding_bottom_130 columns_margin_bottom_20">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12"> 
                    <span class="small-text big highlight4">
                        Who is Charies Cannabis?
                    </span>
                    <h2 class="section_header">About Charies Cannabis</h2>
                </div>
                <div class="col-md-6 col-sm-8">
                    <p class="bold grey">All our products are organic, no pesticides and or chemicals are used in growing our plants. Furthermore, we strictly respect the laws of each country and do not exceed the amount of THC allowed by law.</p>
                </div>
            </div>
        </div>
    </section>
    @include('static.includes._products')
    
@endsection