
<template>
    <div>
        <div class="row" v-for="(item, index) in all" :key="index">
            <div class='form-group col-lg-6'>
                <label >Amount</label>
                <input type='text' class='form-control' id='amount' name='amount[]' placeholder='Amount'>
            </div>
            <div class='form-group col-lg-6'>
                <label >Price</label>
                <input type='text' class='form-control' id='price' name='price[]' placeholder='Price'>
                <a @click="removeFields(index)" class="btn btn-danger">Remove</a>
            </div>
        </div>
        <div class="row">
            <div class='form-group col-lg-6'>
                <label>Amount</label>
                <input type='text' class='form-control' id='amount' name='amount[]' placeholder='Amount'>
            </div>
            <div class='form-group col-lg-6'>
                <label >Price</label>
                <input type='text' class='form-control' id='price' name='price[]' placeholder='Price'>
            </div>
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
        data(){
            return {
                all:[],
                fullprice:{},
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
           addFields(){
               this.all.push(1);
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
