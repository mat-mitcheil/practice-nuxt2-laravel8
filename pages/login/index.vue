<template>
    <div class="container">
        <br>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password"  v-model="form.password"  class="form-control" id="exampleInputPassword1" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
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
                    const response = await this.$auth.loginWith('local', {
                        data:this.form
                        })
                        console.log(response.data)
                }catch(error){
                    console.log(error.response)
                }
            }
        }
    }
</script>

<style scoped>

</style>