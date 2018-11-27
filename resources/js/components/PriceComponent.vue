
<template>
    <div>
        
        <div class="row">
            <div class='form-group col-lg-6'>
                <label>Amount</label>
                <input type='text' class='form-control' id='amount'  v-model="first_price.amount" name='amount[]' placeholder='Amount'>
            </div>
            <div class='form-group col-lg-6'>
                <label >Price</label>
                <input type='text' class='form-control' id='price'  v-model="first_price.price" name='price[]' placeholder='Price'>
            </div>
            
        </div>
        <div class="row" v-for="(item, index) in all" :key="index" :id="index">
            <div class='form-group col-lg-6' >
                <label >Amount</label>
                <input type='text' class='form-control' id='amount' v-model="item.amount" name='amount[]' placeholder='Amount'>
            </div>
            <div class='form-group col-lg-6'>
                <label >Price</label>
                <input type='text' class='form-control' id='price' v-model="item.price" name='price[]' placeholder='Price'>
                <a @click="removeFields(index)" class="btn btn-danger">Remove</a>
            </div>
        </div>
        <div class="row">
            <div class='form-group col-lg-6'>
                <a @click="addFields" class="btn btn-success">Add</a>
            </div>
            <div class='form-group col-lg-6'>
                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['prices'],
        data(){
            return {
                all:[],
                fullprice:{},
                first_price: {
                    price: '',
                    amount: ''
                },
            }
        },
        mounted() {
            if(this.prices){
                this.all = JSON.parse(this.prices).filter((prod, index)=>{
                    if(index!=0){
                        return prod
                    }
                });
                this.first_price = JSON.parse(this.prices).filter((prod, index)=>{
                    if(index==0){
                        return prod
                    }
                })[0];
            }
        },
        methods:{
           addFields(){
               this.all.push({
                   price: '',
                   amount: ''
               });
           },
           removeFields(index){
               this.all = this.all.filter((val, ind)=>{
                   
                   if(ind != index){

                       return val;
                   }
               })
           }
        }
    }
</script>
