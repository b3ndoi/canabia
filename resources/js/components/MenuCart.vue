<template>
<!-- TODO MAKE INTO VUE COMPONENT -->
    <span class="label label-success" v-if="product_count>0">
        {{product_count}}
    </span>
    <!-- TODO MAKE INTO VUE COMPONENT -->
</template>

<script>
    export default {
        data(){
            return {
                products:[],
                product_count: 0,
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
                    this.product_count++;
                }else{
                    this.products = this.products.map((element)=>{
                        if(element.variation_id == payload.variation_id){
                            element.count++;
                        }
                        return element;
                    });
                }
                
            });
            Event.$on('removedFromCart', (payload) => {
                this.products = this.products.filter(item => {
                    if(product.variation_id != payload.variation_id){
                        return item
                    }
                })
                this.product_count--;
            });
        },
        methods:{
            
            getProducts(){
                
                axios.get('/cart').then((res)=>{
                    var prods = Object.values(res.data);
                    this.product_count = prods.length;
                    
                })
            }
        }
    }
</script>
