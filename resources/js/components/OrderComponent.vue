<template>
    <tr>
        <td>
        <a :href="'/admin/orders/'+order.id">{{order.last_name}} {{order.first_name}}</a>
        </td>
        <td>
            {{order.email}}
        </td>
        <td>{{order.products.length}}</td>
        <td><span :class="order.delivered=='1'?'badge badge-success':'badge badge-danger'">{{order.delivered=='1'?'Deliverd':'Still not delivered'}}</span></td>
        <td>
            <a href="#" @click="changeStatus()" class="btn btn-success">Delivered</a>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['orderjson'],
        data(){
            return {
                order:{},
            }
        },
        created() {
            this.order = JSON.parse(this.orderjson);
        },
        methods:{
            changeStatus(){
                // axios.post('/add-to-cart/'+this.product.id+'/'+this.current_variation+'?count='+this.product.count).then((res)=>{
                    
                //     window.Event.$emit('addedToCart', this.product)
                //     this.$toasted.show('Added: '+ this.product.name +' ('+ this.product.amount+ this.product.unit+')'+' to cart.').goAway(1500);
                // })
                
            }
        }
    }
</script>