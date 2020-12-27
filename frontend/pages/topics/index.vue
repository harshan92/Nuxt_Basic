<template>
    <div class="container">
        <h2>Latest topics</h2>
        <div v-for="(topic, index) in topics" :key="index" class="bg-light mt-5 mb-5" style="padding:20px;">
            <h2>{{topic.title}}</h2>
            <p class="text-muted">{{topic.created_at}} by {{topic.user.name}}</p>

            <div v-for="(content, index) in topic.posts" :key="index" class="ml-5 content">
                {{content.body}}
                <p class="text-muted">{{content.created_at}} by {{content.user.name}}</p>
            </div>
        </div>
        <!-- <pre>
            {{topics}}
        </pre> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            topics:[]
        }
    },
    async asyncData({$axios}) {
        let {data}=await $axios.$get("/topics")
        return {
            topics:data
        }
    },
}
</script>

<style scoped>
    .content{
        border-left:10px solid white;
        padding: 0 10px 0 10px;
    }
</style>