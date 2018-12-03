<template>
<table class="table">
    
    <button
    @click="changeStatus(order)"
    :class="order.delivered != 0?'btn btn-warning':'btn btn-success'"
    @disabled="disabled"
    >
        {{order.delivered != "0"?'Still Not Delivered':'Delivered'}}
    </button>
            
</table>
    
</template>

<script>
    export default {
        props: ['orderjson'],
        data(){
            return {
                order:[],
                disabled: false
            }
        },
        created() {
            this.order = JSON.parse(this.orderjson);
            
        },
        methods:{
            
            changeStatus(){
                this.disabled = true;
                axios.post('/admin/orders/'+this.order.id).then((res)=>{
                    this.disabled = false;
                    this.order.delivered = res.data;
                    this.order = this.order;
                })
                
            }
        }
    }
</script>