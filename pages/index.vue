<template>
 <div class="container">
      <Posts v-for="post in _posts" :key="post.id" :post="post"/>
 </div>
</template>

<script>
import Posts from '@/components/Posts.vue';
import {mapGetters} from 'vuex'
export default {
   components:{Posts},
   async asyncData({$axios,store, params, redirect, route, error}) {
      try{
         const response = await $axios.get('/v1/posts');
         console.log(response)
         store.dispatch('posts/setPosts',response.data.data);
      }catch(error){
         console.log(error);
      }
    },
    computed:{
      ...mapGetters({
         _posts : 'posts/posts'
      })
    }
}
</script>
<style>
.container{
   display: flex;
  justify-content: center; /* Center horizontally */
  align-items: center;
  flex-wrap: wrap;
  flex-direction: column;
}
</style>
