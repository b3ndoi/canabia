<template>
    <div itemscope="" itemtype="http://schema.org/Product" class="product type-product row">
        <div class="col-sm-6">
            <div class="images text-center rounded"> <a :href="product.image" itemprop="image" class="woocommerce-main-image zoom prettyPhoto" data-gal="prettyPhoto[product-gallery]">
        <img :src="product.image" class="attachment-shop_single wp-post-image" alt="" title="">
        </a> 
        </div>
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
                        {{product.category.name}}
                    </b> 
                </div> 
                <span class="price main_bg_color3">
                    <span class="amount">${{current_price}}</span> 
                </span>
            </div>
            <h1 itemprop="name" class="product_title">{{product.name}}</h1>
            <div>
                <p>{{product.description}}</p>
                <!-- <div class="two-columns-text">
                    <ul class="list2 color2">
                        <li>Type: Sativa</li>
                        <li>Chemdawg x Lights x Skunk </li>
                        <li>Diesel x Pungent x Earthy</li>
                        <li>Happy x Euphoric x Uplifting</li>
                    </ul>
                </div> -->
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
                <div style="display:flex">
                    <select name="" id="" style="margin-right: 16px;" v-model="current_variation" @change="changePrice(current_variation)">
                        
                            <option v-for="price in product.prices" :key="price.id" :value="price.id">{{price.amount}} {{product.unit}}</option>
                       
                    </select>
                    <div class="inline-content"> 
                        <span class="quantity form-group">
                            <input type="button" value="+" class="plus">
                            <i class="fa fa-angle-up" aria-hidden="true"></i>
                            <input type="number" step="1" min="0" name="product_quantity" value="1" title="Qty" id="product_quantity" class="form-control ">
                            <input type="button" value="-" class="minus">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span> 
                        <a @click="addToCart()" rel="nofollow" class="theme_button color4 min_width_button add_to_cart_button">
                            Add to cart
                        </a> 
                    </div>
                </div>

            </form>
        </div>
        <!-- .summary.col- -->
    </div>
</template>

<script>
    export default {
        props: ['productjson'],
        data(){
            return {
                product:{},
                current_price:0,
                current_variation: 0
            }
        },
        created() {
            this.product = JSON.parse(this.productjson);
            this.current_price = this.product.price;
            this.current_variation = this.product.prices[0].id;
        },
        methods:{
            addToCart(){
                axios.post('/add-to-cart/'+this.product.id+'/'+this.current_variation).then((res)=>{
                    
                    window.Event.$emit('addedToCart', this.product)
                    this.$toasted.show('Added: '+ this.product.name +' ('+ this.product.amount+ this.product.unit+')'+' to cart.').goAway(1500);
                })
                
            },
            // setPrice(price){
            //     this.product.price = price.price;
            //     this.product.amount = price.amount;
            // }
            changePrice(id){
                this.product.prices.filter((price)=>{
                    if(price.id == id){
                        this.current_price = price.price
                    }
                })
            }
        }
    }
</script>
