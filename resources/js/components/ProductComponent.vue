<template>
    <article :class="'vertical-item content-padding rounded overflow_hidden with_background'+ (isrelated==1?'loop-color product':'')">
        <div class="item-media"> 
            <img :src="product.image" alt="" /> 
            <span class="price main_bg_color">
                <ins>
                    <span class="amount">${{product.price}}</span> 
                </ins>
            </span>
            <div class="product-buttons"> 
                <!-- <a href="#" class="favorite_button">
                    <span class="sr-only">Add to favorite</span>
                </a>  -->
                <a @click="addToCart" class="add_to_cart">
                    <span class="sr-only">Add to cart</span>
                </a>
            </div>
        </div>
        <div class="item-content">
            <div > 
                <b style="width:100%">
                    {{product.category.name}}
                </b> 
            </div>
            <h4 class="entry-title topmargin_5"><a :href="'/product/'+product.slug">{{product.name}}</a> </h4>
            <p class="content-3lines-ellipsis">
                {{product.excerpt}}
            </p>
        </div>
    </article>
</template>

<script>
    export default {
        props: ['productjson', 'isrelated'],
        data(){
            return {
                product:{}
            }
        },
        created() {
            this.product = JSON.parse(this.productjson);
        },
        methods:{
            addToCart(){
                axios.post('/add-to-cart/'+this.product.id).then((res)=>{
                    
                    window.Event.$emit('addedToCart', this.product)
                    
                })
                
            }
        }
    }
</script>
