<template>
<div>
    <div>
        <h2>Making API request - vue way</h2>
        
        <hr>
    </div>
    <div class="container row">
       
        <Card v-for="post in posts" :key="post.id" :post="post"  class="mr-auto ml-auto"/>
        <button class="btn btn-danger" v-scroll-to="'body'">Back To Top</button>
    </div>
    </div>
</template>

<script>
import axios from 'axios'
import Card from '@/components/Card'
import {mapGetters} from 'vuex'

export default {
    data() {
        return {
            allPosts:"",
        }
    },
    head:{
        title:"List of posts"
    },
    components:{
        Card
    },
    computed: {
        ...mapGetters(["posts"])
        // allPosts(){
        //     return this.$store.getters.posts
        // }
    },
    async asyncData({store}) {
       let {data}=await axios.get("https://jsonplaceholder.typicode.com/posts")
       
        //return {allPosts:data}
       store.dispatch('setPosts', data);
    },
}
</script>

