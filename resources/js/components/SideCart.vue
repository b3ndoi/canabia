<template>
<!-- TODO MAKE INTO VUE COMPONENT -->
    <div class="widget widget_shopping_cart">
        <h3 class="widget-title">Your Cart</h3>
        <div class="widget_shopping_cart_content">
            <ul class="cart_list product_list_widget ">
                <li class="media loop-color" v-if='products.length > 0' v-for="product in products" v-bind:key="product.variation_id">
                    <div class="media-left media-middle"> 
                        <a :href="'/product/'+product.slug">
                            <img :src="product.image" class="muted_background" alt="">
                        </a> 
                    </div>
                    <div class="media-body media-middle"> 
                        <a @click="removeFromCart(product)" class="remove" title="Remove this item"></a>
                        <h4> 
                            <a :href="'/product/'+product.slug">{{product.name}} ({{product.amount}}{{product.unit}})</a>
                        </h4> 
                        <span >
                            <span style="width:100%">
                                <strong >{{product.category.name}}</strong>
                            </span> 
                        </span> 
                        <span class="product-quantity">
                            <span>{{product.count}} x</span> 
                            <!-- <span>{{product.amount+product.unit}} x</span>  -->
                            <span class="price">${{product.price}}</span> 
                        </span>
                    </div>
                </li>
            </ul>
            <p class="total"> 
                <strong class="grey">Subtotal:</strong> 
                <span class="price">${{subtotal}}</span> 
            </p>
            <p class="buttons" v-if="products.length > 0">
                <a href="/my-cart" class="theme_button color4 min_width_button">View cart</a> 
            </p>
            <p class="buttons" v-if="products.length > 0">
                <a href="/checkout" class="theme_button color4 min_width_button">Checkout</a> 
            </p>
        </div>
    </div>
    <!-- TODO MAKE INTO VUE COMPONENT -->
</template>

<script>
    export default {
        data(){
            return {
                products:[],
                test:[],
                subtotal: 0,
            }
        },
        created() {
            this.getProducts();
            Event.$on('addedToCart', (payload) => {
                var found = this.products.find((element)=> {
                    return element.variation_id == payload.variation_id;
                });
                if(!found){
                    payload.count = 1;
                    this.products.push(payload)
                    
                }else{
                    this.products = this.products.map((element)=>{
                        if(element.variation_id == payload.variation_id){
                            element.count++;
                        }
                        return element;
                    });
                }
                this.subtotal = this.subtotal + parseFloat(payload.price);
            });
        },
        methods:{
            removeFromCart(product){
                axios.post('/remove-from-cart/'+product.id+'/'+product.variation_id).then((res)=>{
                    window.Event.$emit('removedFromCart', product)
                    this.products = this.products.filter(item => {
                        if(product.variation_id != item.variation_id){
                            return item
                        }
                    })
                    this.subtotal = this.subtotal - parseFloat(product.price)*parseFloat(product.count);
                    this.$toasted.show('Removed: '+ product.name +' ('+ product.amount+ product.unit+')'+' from cart.').goAway(1500);
                })
                
            },
            getProducts(){
                
                axios.get('/cart').then((res)=>{
                    var prods = Object.values(res.data);
                    this.products = prods.map((prod)=>{
                        this.subtotal = this.subtotal + parseFloat(prod.price)*parseFloat(prod.count);
                        return prod;
                    });
                    
                })
            }
        }
    }
</script>
