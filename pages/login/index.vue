<template>
    <div class="container">
        <br>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                <small v-if="_errors.email" id="emailHelp" style="color:red;">{{ _errors.email[0] }}</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password"  v-model="form.password"  class="form-control" id="exampleInputPassword1">
                <small v-if="_errors.password" id="emailHelp" style="color:red;">{{ _errors.password[0] }}</small>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
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
        methods:{
            async submit(){
                try{
                   await this.$auth.loginWith('local', {data:this.form }) ;
                    this.$router.push('/')
                }catch(error){
                    if(error.response.status==401){
                        alert('Invalid credentials')
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>