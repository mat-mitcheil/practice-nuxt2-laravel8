<template>
    <div class="container">
        <br>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="exampleInputEmail1" :class="!$v.form.email.email || !$v.form.email.required  ? 'label-errors':'label-check'">Email</label>
                <input type="email" id="exampleInputEmail1"
                v-model="form.email" :class="!$v.form.email.email || !$v.form.email.required  ? 'form-control input-errors':'form-control input-check'">
                <small v-if="!$v.form.email.required"  style="color:red;">Email is required</small>
                <small v-if="!$v.form.email.email"  style="color:red;">Invalid email </small>
                <!-- this approach is getting the errors from the response -->
                <!-- <small v-if="_errors.email" id="emailHelp" style="color:red;">{{ _errors.email[0] }}</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" :class="!$v.form.password.required ? 'label-errors':'label-check'">Password</label>
                <input type="password"  id="exampleInputPassword1"
                v-model="form.password"  :class="!$v.form.password.required  ? 'form-control input-errors':'form-control input-check'">
                <small v-if="!$v.form.password.required"  style="color:red;">Password is required</small>
                <!-- <small v-if="!$v.form.password.minLength"  style="color:red;">Must be at</small> -->
                <!-- this approach is getting the errors from the response -->
                <!-- <small v-if="_errors.password" id="emailHelp" style="color:red;">{{ _errors.password[0] }}</small> -->
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
import { required,email,minLength} from 'vuelidate/lib/validators'
    export default {
        middleware:['guest'],
        data(){
            return{
                form:{
                    email:'',
                    password:''
                }
            }
        },
        validations: {
            form: {
                email: { required, email
                },
                password: {required, 
                    // minLength: minLength(6)
                }
            }
        },
        methods:{
            async submit(){
                this.$v.$touch()
                try{
                   await this.$auth.loginWith('local', {data:this.form });
                }catch(error){
                    if(error.response.status==401){
                        alert('Invalid credentials')
                        this.$v.$reset()
                    }
                    console.log(error)
                }
            }
        }
    }
</script>

<style scoped>
.input-errors{
    border:1px solid red;
}
.input-check{
    border:1px solid green;
}
.label-errors{
    color:red;
}
.label-check{
    color:green;
}
</style>