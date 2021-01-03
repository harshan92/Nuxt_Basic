<template>
    <div class="container">
        <h2>Latest topics</h2>
        <div v-for="(topic, index) in topics" :key="index" class="bg-light mt-5 mb-5" style="padding:20px;">
            <h2><nuxt-link :to="{name:'topics-id', params:{id:topic.id}}">{{topic.title}}</nuxt-link></h2>
            <div v-if="authenticated">
                <div v-if="user.id===topic.user.id">
                    <nuxt-link :to="{name:'topics-edit', params:{id:topic.id}}">
                        <button class="btn btn-outline-success fa fa-edit fa-2x pull-right"></button>
                    </nuxt-link>
                    <button @click="deleteTopic(topic.id)" class="btn btn-outline-danger fa fa-trash fa-2x pull-right"></button>
                </div>
            </div>
            <p class="text-muted">{{topic.created_at}} by {{topic.user.name}}</p>

            <div v-for="(content, index) in topic.posts" :key="index" class="ml-5 content">
                {{content.body}}
                <p class="text-muted">{{content.created_at}} by {{content.user.name}}</p>
                <!-- add like button-->
                <div class="btn btn-outline-primary fa fa-thumbs-up ml-5 mb-2" @click="likePost(topic.id, content)"></div>
                <span class="badge">{{content.likes_count}}</span>
            </div>
        </div>
        <nav>
            <ul class="pagination justify-content-center">
                <li v-for="(key, value) in links"  class="page-item">
                    <a @click="loadMore(key)" class="page-link">{{value}}</a>
                </li>
            </ul>
        </nav>
        <!-- <pre>
            {{topics}}
        </pre> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            topics:[],
            links:[],
        }
    },
    async asyncData({$axios}) {
        let {data, links}=await $axios.$get("/topics")
        return {
            topics:data,
            links
        }
    },
    methods: {
         async loadMore(key){
            if (key===null) return;
            let {data}=await this.$axios.$get(key)
            return this.topics={...this.topics, ...data}
        },
        async deleteTopic(id){
            await this.$axios.$delete(`/topics/${id}`)
            this.$router.push('/')
        },
        async likePost(topicId, content){
            console.log("Liked "+topicId);
            const userFromVuex=this.$store.getters["auth/user"]
            if(userFromVuex){
                //can't like your own post
                if(userFromVuex.id===content.user.id){
                    alert("You can't like your own post.")
                }

                //if user already liked
                if(content.users){
                    if(content.users.some(user=>user.id===userFromVuex.id)){
                        alert("You have already liked this post.")
                    
                }else{
                    //
                    console.log("Liked!");
                    await this.$axios.$post(`/topics/${topicId}/posts/${content.id}/likes`)
                    let {data, links}=await this.$axios.$get("/topics")
                    this.topics=data
                    this.links=links
                }
                }

            }else{
                alert("Please log in.")
                this.$router.push('/login');
            }
        }
    },
}
</script>

<style scoped>
    .content{
        border-left:10px solid white;
        padding: 0 10px 0 10px;
    }

    .btn-outline-danger,  .btn-outline-success{
        border: none;
    }
</style>