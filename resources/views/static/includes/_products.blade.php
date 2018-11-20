<section id="products" class="ds parallax page_shop section_padding_top_150 section_padding_bottom_150">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-sm-4"> <span class="small-text big highlight4">
					Our Shop
				</span>
                <h2 class="section_header">Buy Cannabis Here</h2>
                <div class="widget widget_categories topmargin_50">
                    <ul class="greylinks color4">
                        <li class=""> <a href="blog-left.html">Cannabis</a> </li>
                        <li class=""> <a href="blog-left.html">Concentrates</a> </li>
                        <li class=""> <a href="blog-left.html">Flowers</a> </li>
                        <li class=""> <a href="blog-left.html">Pre-Rolls</a> </li>
                    </ul>
                </div>
                <p class="topmargin_40"> <a href="{{route('product.indexFront')}}" class="theme_button color4">
            Go to shop
        </a> </p>
            </div>
            <div class="col-lg-9 col-sm-8">
                <div class="owl-carousel" data-nav="true" data-responsive-lg="3">
                @foreach($products as $product)
                    <product productjson ="{{$product}}" isrelated="1"></product>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>