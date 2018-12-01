<template>
<!-- TODO MAKE INTO VUE COMPONENT -->
    <div class="row">
						<!-- <div class="col-sm-7 col-md-8 col-lg-8 col-sm-push-5 col-md-push-4 col-lg-push-4"> -->
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table shop_table cart cart-table" v-if='products.length > 0'>
                    <thead>
                        <tr>
                            <td class="product-info">Product</td>
                            <td class="product-price-td">Variation</td>
                            <td class="product-price-td">Price</td>
                            <td class="product-quantity">Quantity</td>
                            <td class="product-subtotal">Subtotal</td>
                            <td class="product-remove">&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart_item"   v-for="product in products" v-bind:key="product.id">
                            <td class="product-info">
                                <div class="media">
                                    <div class="media-left"> 
                                        <a href="shop-product-right.html">
                                            <img class="media-object cart-product-image" :src="product.image" alt="">
                                        </a> 
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"> 
                                            <a :href="'/product/'+product.slug">{{product.name}}</a> 
                                        </h4> 
                                        <span class="grey">Category:</span> {{product.category.name}}
                                    </div>
                                </div>
                            </td>
                            <td class="product-price"> 
                                {{product.amount}}{{product.unit}}
                            </td>
                            <td class="product-price"> 
                                <span class="currencies">$</span><span class="amount">{{product.price}}</span> 
                            </td>
                            <td class="product-quantity">
                                <div class="quantity"> 
                                    <input type="button"  @click="configurePrice(product, '-')" value="-" class="minus"> 
                                    <i class="fa fa-angle-down" aria-hidden="true"></i> 
                                    <input type="number" step="1" min="0" v-model="product.count" name="product_quantity" disabled title="Qty" class="form-control"> 
                                    <input type="button" @click="configurePrice(product, '+')" value="+" class="plus">
                                    <i class="fa fa-angle-up" aria-hidden="true"></i> 
                                </div>
                            </td>
                            <td class="product-subtotal"> <span class="currencies">$</span><span class="amount">{{product.price*product.count}}</span> </td>
                            <td class="product-remove"> <a @click="removeFromCart(product)" class="remove fontsize_20" title="Remove this item">
                        <i class="fa fa-trash-o"></i>
                    </a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart-buttons"> 
                <a class="theme_button color1" href="/product-list">Continue Shopping</a> 
                <!-- <input type="submit" class="theme_button color4" name="update_cart" value="Update Cart">  -->
                <a class="theme_button color1" v-if="changes" @click="updateCount()">Save</a> 
                <a class="theme_button color1" v-if='products.length > 0' @click="continueCheckout()">
                    {{changes?'Save &':''}}
                    Checkout
                </a> 

            </div>
            <div class="cart-collaterals" v-if='products.length > 0'>
                <div class="cart_totals">
                    <h4>Cart Totals</h4>
                    <table class="table">
                        <tbody>
                            <tr class="order-total">
                                <td class="grey">Order Total</td>
                                <td><strong class="grey"><span class="currencies">$</span><span class="amount">{{subtotal}}</span> </strong> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--eof .col-sm-8 (main content)-->
    </div>
    <!-- TODO MAKE INTO VUE COMPONENT -->
</template>

<script>
    export default {
        data(){
            return {
                products:[],
                test:[],
                changes: false,
                subtotal: 0,
            }
        },
        created() {
            this.getProducts();
            Event.$on('addedToCart', (payload) => {
                var found = this.products.find(function(element) {
                    return element.id == payload.id;
                });
                if(!found){
                    payload.count = 1;
                    this.products.push(payload)
                    
                }else{
                    this.products = this.products.map(function(element){
                        if(element.id == payload.id){
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
                    this.products = this.products.filter(function(item){
                        if(product.variation_id != item.variation_id){
                            return item
                        }
                    })
                    this.subtotal = this.subtotal - parseFloat(product.price)*parseFloat(product.count);
                    
                })
                
                console.log(this.products);
                // window.Event.$emit('addedToCart', [this.product])
            },
            getProducts(){
                
                axios.get('/cart').then((res)=>{
                    var prods = Object.values(res.data);
                    this.products = prods.map((prod)=>{
                        this.subtotal = this.subtotal + parseFloat(prod.price)*parseFloat(prod.count);
                        return prod;
                    });
                    
                })
            },
            updateCount(){

                axios.post('/update-cart', {
                    products: this.products
                }).then((res)=>{
                    this.changes = false;
                    console.log(res.data)
                })

            },
            continueCheckout(){
                if(this.changes){
                    axios.post('/update-cart', {
                    products: this.products
                    }).then((res)=>{
                        this.changes = false;
                        console.log(res.data)
                        window.location.href = "/checkout";
                    })
                }
                window.location.href = "/checkout";
            },
            configurePrice(payload, increment){
                this.changes = true;
                if(payload.count == 1 && increment=="-")
                {
                    return false;
                }
                var found = this.products.find(function(element) {
                    return element.variation_id == payload.variation_id;
                });
                this.products = this.products.map(function(element){
                    if(element.variation_id == payload.variation_id){
                        console.log(this);
                        if(increment=='+'){
                            
                            element.count++
                        }
                        else{
                            element.count--;
                        }
                    }
                    return element;
                });
                if(increment=='+'){
                    this.subtotal += parseFloat(payload.price);
                }
                else{
                    this.subtotal -= parseFloat(payload.price);
                }
            }
        }
    }
</script>
