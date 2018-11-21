<template>
    <section id="subscribe" class="cs main_color2 background_cover overlay_color page_subscribe section_padding_top_75 section_padding_bottom_75 table_section table_section_lg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-3 text-center text-md-left"> 
                    <span class="small-text big black">
                        Subscribe now to
                    </span>
                    <h2 class="section_header">Our Newsletter</h2>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0 col-lg-9">
                    <div class="widget widget_mailchimp">
                            <div class="row" v-if="subscribed">
                                <div class="alert alert-success" role="alert">
                                    <strong>Success</strong> Thank you for subscribing!
                                </div>
                            </div>
                            <div class="row" @keydown="submited = false">
                                <div class="col-xs-12 col-md-4">
                                    <div class="form-group margin_0"> 
                                        <input class="form-control mailchimp_fullname" @keydown="delete errors.full_name" v-model="full_name" required="" type="text" placeholder="Your Full Name*"> 
                                        <span v-if="errors.full_name" class="text-white">{{errors.full_name[0]}}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="form-group margin_0"> 
                                        <input class="mailchimp_email form-control" @keydown="delete errors.email" v-model="email" required="" type="email" placeholder="Your Email Address*"> 
                                        <span v-if="errors.email" class="text-white">{{errors.email[0]}}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4"> 
                                    <button @click="subscribe()" :disabled="submited" class="theme_button color2 block_button margin_0">
                                        Subscribe to newsletter
                                    </button> 
                                </div>
                                <div class="col-sm-12 margin_0">
                                    <div class="response"></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return {
                full_name:'',
                email:'',
                errors:[],
                submited: false,
                subscribed: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            subscribe(){
                this.submited = true;
                axios.post('/newsletter',{
                    full_name: this.full_name,
                    email: this.email,
                })
                    .then((res)=>{
                        
                        this.full_name = '';
                        this.email = '';
                        this.submited = false;
                        this.errors = [];
                        this.subscribedAlert();
                    })
                    .catch((errors)=>{
                        this.errors =  errors.response.data.errors;
                    });
            },
            subscribedAlert(){
                this.subscribed = true;
                setTimeout(()=>{
                    this.subscribed = false;
                }, 3500);
            }
        }
    }
</script>
