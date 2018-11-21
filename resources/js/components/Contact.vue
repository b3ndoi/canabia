<template>
    <div class="col-sm-8 to_animate" data-animation="scaleAppear">
        <h3>Contact Form</h3>
        <div class="row" v-if="sent">
            <div class="alert alert-success" role="alert">
                <strong>Success</strong> Thank you for contacting us!
            </div>
        </div>
        <form @submit.prevent="sendMessage" class="row columns_padding_10"  @keydown="submited = false" autocomplete="off">
            <div class="col-sm-6">
                <div class="form-group bottommargin_0"> 
                    <label for="name">Full Name <span class="required">*</span></label> 
                    <input type="text" @keydown="delete errors.name" v-model="message.name" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name*"> 
                    <span v-if="errors.name" class="text-danger">{{errors.name[0]}}</span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group bottommargin_0"> 
                    <label for="email">Email address<span class="required">*</span></label> 
                    <input type="email" @keydown="delete errors.email" v-model="message.email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address*">
                    <span v-if="errors.email" class="text-danger">{{errors.email[0]}}</span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group bottommargin_0"> 
                    <label for="phone">Phone Number</label> 
                    <input type="text" v-model="message.phone" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group bottommargin_0"> 
                    <label for="subject">Subject</label> 
                    <input type="text" v-model="message.subject" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Your Subject"> 
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group bottommargin_0"> 
                    <label for="message">Message</label> 
                    <textarea aria-required="true" @keydown="delete errors.message" v-model="message.message" rows="5" cols="45" name="message" id="message" class="form-control" placeholder="Your Message..."></textarea> 
                    <span v-if="errors.message" class="text-danger">{{errors.message[0]}}</span>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="contact-form-submit topmargin_10"> 
                    <button type="submit" :disabled="submited" class="theme_button color4 min_width_button margin_0">Send now</button> 
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return {
            message:{},
            errors: {},
            submited: false,
            sent: false
        }
    },
    created(){
        console.log('Component mounted...');
    },
    methods:{
        sendMessage(){
            this.submited = true;
            axios
                .post('/contact-us', this.message)
                    .then((res) => {
                        this.message = {};
                        this.submited = false;
                        this.errors = {};
                        this.sentAlert();
                    })
                    .catch((error)=>{
                        if(error.response){
                            this.errors = error.response.data.errors;
                        }
                    });
        },
        sentAlert(){
            this.sent = true;
            setTimeout(()=>{
                this.sent = false;
            }, 3500);
        }
    }
}
</script>

