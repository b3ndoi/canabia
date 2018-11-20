@extends('layouts.front')

@section('content')
<section class="ls section_padding_top_150 section_padding_bottom_100 columns_padding_30">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-8 col-lg-8 col-sm-push-5 col-md-push-4 col-lg-push-4">
                <div class="shop-sorting">
                    <form class="form-inline content-justify vertical-center content-margins">
                        <div>Showing {{$products->firstItem()}}-{{$products->lastItem()}} of {{$products->total()}} results </div>
                        <div class="form-group select-group"> 
                            <select aria-required="true" id="date" name="date" class="choice empty form-control">
                                <option value="" disabled selected data-default>Default Sorting</option>
                                <option value="value">by Value</option>
                                <option value="date">by Date</option>
                                <option value="popular">by Popularity</option>
                            </select> 
                            <i class="fa fa-angle-down theme_button color1 no_bg_button" aria-hidden="true"></i> 
                        </div>
                    </form>
                </div>
                <div class="columns-2">
                    <ul id="products" class="products list-unstyled">
                        @foreach($products as $product)
                            <li class="product type-product loop-color">
                                
                               <product productjson ="{{$product}}"></product>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- eof .columns-* -->
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
            <aside class="col-sm-5 col-md-4 col-lg-4 col-sm-pull-7 col-md-pull-8 col-lg-pull-8">
            <form method="get" action="">    
            <div class="widget widget_search">
                    <h3 class="widget-title">Search Now</h3>
                    
                        <div class="form-group margin_0"> 
                            <label class="sr-only" for="widget-search">Search for:</label> 
                            <input id="widget-search" type="text" value="" name="search" class="form-control" placeholder="Type keyword here..."> 
                        </div> 
                        <!-- <button type="submit" class="theme_button color4 no_bg_button">Search</button>									 -->
                    
                </div>
                <div class="widget widget_categories">
                    <h3 class="widget-title">All Categories</h3> 
                    <select name="category_id" class="wrap-select-group">
                        <option value="">All</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select> </div>
                <!-- <div class="widget widget_categories">
                    <h3 class="widget-title">Flavor / Smell</h3> <select name="cat" class="wrap-select-group">
            <option value="1">All</option>
            <option value="2">Type 1</option>
            <option value="3">Type 2</option>
            <option value="4">Type 3</option>
            <option value="5">Type 4</option>
        </select> </div>
                <div class="widget widget_categories">
                    <h3 class="widget-title">Effect</h3> <select name="cat" class="wrap-select-group">
            <option value="1">All</option>
            <option value="2">Effect 1</option>
            <option value="3">Effect 2</option>
            <option value="4">Effect 3</option>
            <option value="5">Effect 4</option>
        </select> </div> -->
                <div class="widget widget_price_filter">
                    <h3 class="widget-title">Filter by Price</h3>
                    <!-- price slider -->
                        <div class="slider-range-price"></div>
                        <input type="hidden" name="price_from" id="price_from">
                        <input type="hidden" name="price_to" id="price_from">
                        <div class="price_label" style=""> Price: <span class="price_from">2</span> - <span class="price_to">35</span> </div>
                        <div class="topmargin_20"> <button type="submit" class="theme_button color4 min_width_button">Filter</button> </div>
                    </div>
                </form>
                <side-cart></side-cart>
            </aside>
            <!-- eof aside sidebar -->
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>

if (jQuery().slider) {
    var $rangeSlider = jQuery(".slider-range-price");
    if ($rangeSlider.length) {
        var $priceMin = jQuery(".price_from");
        var $priceMax = jQuery(".price_to");
        $rangeSlider.slider({
            range: true,
            min: 0,
            max: 200,
            values: [ {{request('price_from')?request('price_from'):30}}, {{request('price_to')?request('price_to'):100}} ],
            slide: function( event, ui ) {
                $priceMin.html( '$' + ui.values[ 0 ] );
                $('[name=price_from]').val(ui.values[ 0 ]);
                $('[name=price_to]').val(ui.values[ 1 ]);
                $priceMax.html( '$' + ui.values[ 1 ] );
            }
        });
        $('[name=price_from]').val({{request('price_from')?request('price_from'):30}});
        $('[name=price_to]').val({{request('price_to')?request('price_to'):100}});
        $priceMin.html('$' + $rangeSlider.slider("values", 0));
        $priceMax.html('$' + $rangeSlider.slider("values", 1));
    }
}

</script>
@endsection