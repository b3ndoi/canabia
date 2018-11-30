<template>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <h2>Billing Info</h2>
            <form class="form-horizontal checkout shop-checkout" @submit.prevent="submitCheckout"  @keydown="submited = false" role="form">
                
                <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="col-sm-3 control-label">
                    <span class="grey">First Name:</span>
                    <span class="required">*</span>
                </label>
                    <div class="col-sm-9"> 
                        <input type="text" class="form-control "  @keydown="delete errors.first_name" v-model="checkout.first_name" name="billing_first_name" id="billing_first_name" placeholder="" value="">
                        <span v-if="errors.first_name" class="text-danger">{{errors.first_name[0]}}</span>
                     </div>
                </div>
                <div class="form-group validate-required" id="billing_last_name_field"> <label for="billing_last_name" class="col-sm-3 control-label">
                        <span class="grey">Last Name:</span>
                        <span class="required">*</span>
                    </label>
                    <div class="col-sm-9"> 
                        <input type="text" class="form-control "  @keydown="delete errors.last_name" v-model="checkout.last_name" name="billing_last_name" id="billing_last_name" placeholder="" value="">
                        <span v-if="errors.last_name" class="text-danger">{{errors.last_name[0]}}</span>
                     </div>
                </div>
                <div class="form-group validate-required validate-email" id="billing_email_field"> <label for="billing_email" class="col-sm-3 control-label">
                    <span class="grey">Email Address:</span>
                    <span class="required">*</span>
                </label>
                    <div class="col-sm-9"> 
                        <input type="text" class="form-control "  @keydown="delete errors.email" v-model="checkout.email" name="billing_email" id="billing_email" placeholder="" value="">
                        <span v-if="errors.email" class="text-danger">{{errors.email[0]}}</span>
                     </div>
                </div>
                <div class="form-group validate-required validate-phone" id="billing_phone_field"> <label for="billing_phone" class="col-sm-3 control-label">
                        <span class="grey">Phone:</span>
                        <span class="required">*</span>
                    </label>
                    <div class="col-sm-9"> 
                        <input type="text" class="form-control "  @keydown="delete errors.phone" v-model="checkout.phone" name="billing_phone" id="billing_phone" placeholder="" value="">
                        <span v-if="errors.phone" class="text-danger">{{errors.phone[0]}}</span>
                     </div>
                </div>
                
                 <div >
                    <div class="place-order"> <input type="submit" class="theme_button color4" name="checkout_place_order" id="place_order" value="Place order"> </div>
                </div>
            </form>
        </div>
        <!--eof .col-sm-8 (main content)-->
        <!-- sidebar -->
        <aside class="col-sm-12 col-md-6 col-lg-6">
            <h3 class="widget-title" id="order_review_heading">Your order</h3>
            <div >
                <table class="table ">
                    <thead>
                        <tr>
                            <td class="product-name">Product</td>
                            <td class="product-total">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart_item" v-for="product in products" v-bind:key="product.id">
                            <td class="product-name"> {{product.name}}({{product.amount}}{{product.unit}}) <span class="product-quantity">× {{product.count}}</span> </td>
                            <td class="product-total"> <span class="amount grey">${{product.price*product.count}}</span> </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <td>Subtotal:</td>
                            <td> <span class="amount grey">${{subtotal}}</span> </td>
                        </tr>
                        <tr class="order-total">
                            <td>Total:</td>
                            <td> <span class="amount grey">
                        <strong>${{subtotal}}</strong>
                    </span> </td>
                        </tr>
                    </tfoot>
                </table>
               
            </div>
        </aside>
        <!-- eof aside sidebar -->
    </div>
    <!-- TODO MAKE INTO VUE COMPONENT -->
</template>

<script>
    export default {
        data(){
            return {
                products:[],
                checkout: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                },
                errors:[],
                submited: false,
                subtotal: 0,
            }
        },
        created() {
            this.getProducts();
        },
        methods:{
            getProducts(){
                
                axios.get('/cart').then((res)=>{
                    var prods = Object.values(res.data);
                    this.products = prods.map((prod)=>{
                        this.subtotal = this.subtotal + parseFloat(prod.price)*parseFloat(prod.count);
                        return prod;
                    });
                    
                });
            },
            submitCheckout(){
                this.submited = true;
                axios.post('/checkout',this.checkout)
                    .then((res)=>{
                        
                        // this.full_name = '';
                        // this.email = '';
                        // this.submited = false;
                        // this.errors = [];
                        // this.subscribedAlert();
                    })
                    .catch((errors)=>{
                        this.errors =  errors.response.data.errors;
                    });
            }
        }
    }
</script>
