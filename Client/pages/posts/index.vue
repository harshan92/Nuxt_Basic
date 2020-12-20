<template>
<div>
    <div>
        <h2>Making API request - vue way</h2>
        
        <hr>
    </div>
    <div class="container row">
       
        <Card v-for="post in posts" :key="post.id" :post="post"  class="mr-auto ml-auto"/>
    </div>
    </div>
</template>

<script>
import axios from 'axios'
import Card from '@/components/Card'

export default {
    data() {
        return {
            posts:"",
        }
    },
    head:{
        title:"List of posts"
    },
    components:{
        Card
    },
    async asyncData({store}) {
       let {data}=await axios.get("https://jsonplaceholder.typicode.com/posts")
       
        //return {posts:data}
       store.dispatch('setPosts', data);
    },
}
</script>