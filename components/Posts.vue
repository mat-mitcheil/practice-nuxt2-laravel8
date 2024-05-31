<template>
    <div>
        <div class="card" style="width:30rem;">
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">{{ post.body }}</p>
                <a href="#" class="card-link">Comments</a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        post:Object
    }
}
</script>
<style scoped>
.card{
    margin:15px;
}
</style>