@extends('layouts.front')

@section('content')
<section class="ls columns_padding_25 section_padding_top_65 section_padding_bottom_130">
    <div class="container">
        <div class="row">
            <!-- TODO: VUE COMPONENT -->
                <contact></contact>
            <!-- TODO: VUE COMPONENT -->

            <!--.col-* -->
            <div class="col-sm-4 to_animate" data-animation="scaleAppear">
                <h3>Contact Info</h3>
                <div class="media small-media">
                    <div class="media-left"> <i class="fa fa-map-marker highlight2"></i> </div>
                    <div class="media-body">123 Abshire Circle, Colorado</div>
                </div>
                <div class="media small-media greylinks">
                    <div class="media-left"> <i class="fa fa-pencil highlight2"></i> </div>
                    <div class="media-body"> <a href="mailto:marijuana@example.com">marijuana@example.com</a> </div>
                </div>
                <div class="media small-media greylinks">
                    <div class="media-left"> <i class="fa fa-internet-explorer highlight2"></i> </div>
                    <div class="media-body"> <a href="#">www.example.com</a> </div>
                </div>
                <div class="media small-media">
                    <div class="media-left"> <i class="fa fa-phone highlight2"></i> </div>
                    <div class="media-body">0 (800) 846 4235 (operator) </div>
                </div>
                <div class="media small-media">
                    <div class="media-left"> <i class="fa fa-clock-o highlight2"></i> </div>
                    <div class="media-body">Working Hours: 24/7</div>
                </div>
            </div>
            <!--.col-* -->
        </div>
        <!--.row -->
    </div>
    <!--.container -->
</section>
@endsection