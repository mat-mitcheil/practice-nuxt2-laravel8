<template>
    <nav v-if="_authenticated" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Post It</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <nuxt-link to="/" class="nav-link">Home</nuxt-link>
                <nuxt-link to="/profile" class="nav-link">Profile</nuxt-link>
                <a v-if="_authenticated" class="nav-link" @click.prevent="logout">Logout</a>
            </div>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    methods:{
        async logout(){
             await this.$auth.logout()
            this.$router.push('/login');
        }
    }
}
</script>