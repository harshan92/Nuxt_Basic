<template>
<div>
    <div>
        <h2>Making API request - vue way</h2>
        
        <hr>
    </div>
    <div class="container">
       
        <h4 v-for="post in posts" :key="post.id">{{post.title}}</h4>
    </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            posts:"",
        }
    },
    asyncData() {
       return axios.get("https://jsonplaceholder.typicode.com/todos")
       .then(response=>{
        //    console.log(response);
        return {posts:response.data}
       })
    },
}
</script>