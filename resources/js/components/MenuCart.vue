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
                
                product_count: 0,
            }
        },
        created() {
            this.getProducts();
            Event.$on('addedToCart', (payload) => {
                this.product_count++;
            });
            Event.$on('removedFromCart', (payload) => {
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
