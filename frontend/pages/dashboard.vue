<template>
    <div class="container col-md-6 mt-5">
    <h2>Create a new topic</h2>
    <br />
    <form @submit.prevent="create">
      <div class="form-group">
        <label>Email address</label>
        <input
          v-model="form.title"
          autofocus
          type="text"
          class="form-control"
          placeholder="Enter topic title"
        />
        <small class="form-text text-danger" v-if="errors.title">{{errors.title[0]}}</small>
      </div>
      <div class="form-group">
        <label>Password</label>
        <textarea  v-model="form.body" class="form-control" cols="30" rows="5"></textarea>
        
        <small class="form-text text-danger" v-if="errors.body">{{errors.body[0]}}</small>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   
  </div>
</template>

<script>
export default {
    middleware:['auth'],
    data() {
        return {
            form:{
                title:'',
                body:''
            }
        }
    },
    methods: {
        async create(){
            await this.$axios.post('/topics', this.form)
            this.$router.push('/');
        }
    },
}
</script>