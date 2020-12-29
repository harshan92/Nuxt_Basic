<template>
    <div class="container">
        <h2>Single topic page</h2>
        <pre>
            {{topic}}
        </pre>
    </div>
</template>

<script>
export default {
    data() {
        return {
            topic:''
        }
    },
    async asyncData({$axios,params}) {
        let {data}=await $axios.$get(`/topics/${params.id}`)
        return {
            topic:data
        }
    },
}
</script>