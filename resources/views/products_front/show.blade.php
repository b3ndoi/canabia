@extends('layouts.front')

@section('content')
<section class="page_breadcrumbs ds parallax section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>{{$product->name}}</h2>
                <ol class="breadcrumb greylinks color4">
                    <li> 
                        <a href="/">
                            Home
                        </a> 
                    </li>
                    <li> <a href="/product-list">Products</a> </li>
                    <li> <a href="/product-list?category_id={{$product->category->id}}">{{$product->category->name}}</a> </li>
                    <li class="active">{{$product->name}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_top_150 section_padding_bottom_130 columns_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <single-product productjson="{{$product}}"></single-product>
                <!-- .product.row -->
                <!-- REMOVED -->
                <!-- .woocommerce-tabs -->
                @if($related_products->count() > 0)
                <div class="row topmargin_60">
                    <div class="col-sm-12">
                        <h3 class="text-center bottommargin_40">Related products</h3>
                        <div class="owl-carousel with_shadow_items" data-dots="false" data-loop="false" data-autoplay="false" data-responsive-lg="3">
                            @foreach($related_products as $product)
                                <product productjson ="{{$product}}" isrelated="1"></product>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!--eof .col-sm-8 (main content)-->
        </div>
    </div>
</section>
@endsection