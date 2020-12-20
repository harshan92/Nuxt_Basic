<template>
    
        <div class="card mb-3 " style="max-width:18rem">
  <h5 class="card-header">Post: {{post.id}}</h5>
  <div class="card-body">
    <h5 class="card-title"><nuxt-link :to="{name:'posts-id', params:{id:post.id}}">{{post.title}}</nuxt-link></h5>
    
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