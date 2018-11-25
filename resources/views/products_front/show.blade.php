@extends('layouts.front')

@section('content')
<section class="ls section_padding_top_150 section_padding_bottom_130 columns_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div itemscope="" itemtype="http://schema.org/Product" class="product type-product row">
                    <div class="col-sm-6">
                        <div class="images text-center rounded"> <a href="{{$product->image}}" itemprop="image" class="woocommerce-main-image zoom prettyPhoto" data-gal="prettyPhoto[product-gallery]">
                    <img src="{{$product->image}}" class="attachment-shop_single wp-post-image" alt="" title="">
                </a> </div>
                        <!--eof .images -->
                        <!-- <div class="thumbnails-wrap">
                            <div id="product-thumbnails" class="owl-carousel thumbnails product-thumbnails" data-margin="10" data-nav="false" data-dots="true" data-responsive-lg="4" data-responsive-md="4" data-responsive-sm="3" data-responsive-xs="2"> <a href="images/shop/01.jpg" class="zoom first rounded" title="" data-gal="prettyPhoto[product-gallery]">
                        <img src="/images/shop/01.jpg" class="attachment-shop_thumbnail" alt="">
                    </a> <a href="/images/shop/02.jpg" class="zoom first rounded" title="" data-gal="prettyPhoto[product-gallery]">
                        <img src="/images/shop/02.jpg" class="attachment-shop_thumbnail" alt="">
                    </a> <a href="/images/shop/03.jpg" class="zoom first rounded" title="" data-gal="prettyPhoto[product-gallery]">
                        <img src="/images/shop/03.jpg" class="attachment-shop_thumbnail" alt="">
                    </a> <a href="/images/shop/04.jpg" class="zoom first rounded" title="" data-gal="prettyPhoto[product-gallery]">
                        <img src="/images/shop/04.jpg" class="attachment-shop_thumbnail" alt="">
                    </a> </div>
                        </div> -->
                        <!-- eof .images -->
                    </div>
                    <div class="summary entry-summary col-sm-6">
                        <div class="content-justify vertical-center content-margins">
                            <div > 
                                <b style="width:80%">
                                    {{$product->category->name}}
                                </b> 
                            </div> 
                            <span class="price main_bg_color3">
                                <span class="amount">${{$product->price}}</span> 
                            </span>
                        </div>
                        <h1 itemprop="name" class="product_title">{{$product->name}}</h1>
                        <div>
                            <p>{{$product->description}}</p>
                            <!-- <div class="two-columns-text">
                                <ul class="list2 color2">
                                    <li>Type: Sativa</li>
                                    <li>Chemdawg x Lights x Skunk </li>
                                    <li>Diesel x Pungent x Earthy</li>
                                    <li>Happy x Euphoric x Uplifting</li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="row product_meta small-text greylinks columns_padding_0">
                            <div class="col-sm-6"> <span class="posted_in">
                        <span>Categories:</span> <span class="categories-links">
                            <a rel="category" href="shop-right.html">cannabis</a>, <a rel="category" href="shop-right.html">flowers</a>
                        </span> </span>
                            </div>
                            <div class="col-sm-6"> <span class="posted_in">
                        <span>Tags:</span> <span class="categories-links">
                            <a rel="category" href="shop-right.html">flowers</a>
                        </span> </span>
                            </div>
                        </div>
                        <form class="cart topmargin_50" method="post" enctype="multipart/form-data">
                            <!-- <div class="row">
                                <div class="col-sm-6 greylinks"> <a href="#0" class="small-text bold">
                                    <i class="fa fa-list-alt highlight3 rightpadding_10" aria-hidden="true"></i>
                                    Add to wishlist
                                    </a> 
                                </div>
                                <div class="col-sm-6 small-icons"> 
                                    <span class="small-text rightpadding_10">Share:</span> 
                                    <a class="social-icon socicon-facebook" href="#" title="Facebook"></a> 
                                    <a class="social-icon socicon-twitter" href="#" title="Twitter"></a> 
                                    <a class="social-icon socicon-google" href="#" title="Google"></a> 
                                    <a class="social-icon socicon-youtube" href="#" title="Youtube"></a> 
                                </div>
                            </div> -->
                            <select name="" id="">
                                @foreach($product->prices as $price)
                                <option value="">{{$price->amount}}</option>
                                @endforeach
                            </select>
                            <div class="inline-content"> <span class="quantity form-group">
                        <input type="button" value="+" class="plus">
                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                        <input type="number" step="1" min="0" name="product_quantity" value="1" title="Qty" id="product_quantity" class="form-control ">
                        <input type="button" value="-" class="minus">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span> <a href="#" rel="nofollow" class="theme_button color4 min_width_button add_to_cart_button">
                        Add to cart
                    </a> </div>
                        </form>
                    </div>
                    <!-- .summary.col- -->
                </div>
                <!-- .product.row -->
                <!-- REMOVED -->
                <!-- .woocommerce-tabs -->
                @if($related_products->count() > 0)
                <div class="row topmargin_60">
                    <div class="col-sm-12">
                        <h3 class="text-center bottommargin_40">Related products</h3>
                        <div class="owl-carousel with_shadow_items" data-dots="false" data-loop="true" data-autoplay="true" data-responsive-lg="3">
                            @foreach($related_products as $product)
                                <!-- <article class="product vertical-item content-padding rounded overflow_hidden with_background loop-color">
                                    <div class="item-media"> 
                                        <img src="{{$product->image}}" alt="" /> 
                                        <span class="price main_bg_color">
                                            <ins>
                                                <span class="amount">${{$product->price}}</span> 
                                            </ins>
                                        </span>
                                        <div class="product-buttons"> 
                                            <a href="#" class="add_to_cart">
                                                <span class="sr-only">Add to cart</span>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div > 
                                            <b style="width:100%">
                                                {{$product->category->name}}
                                            </b> 
                                        </div>
                                        <h4 class="entry-title topmargin_5"> <a href="/product/{{$product->slug}}">{{$product->name}}</a> </h4>
                                        <p class="content-3lines-ellipsis">{{$product->excerpt}}</p>
                                    </div>
                                </article> -->
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