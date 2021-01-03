<template>
  <div>
    <div class="bg">
      <div class="d-fle flex-column">
        <div class="bg flex flex-fill">
          <div class="flex-center position-ref full-height">
            <div class="content mb-5">
              <div class="title text-light">
                Laravel API Development
                <br>
                Vue/Nuxt JS Web App
              </div>
              <hr>
              <nuxt-link class="btn btn-outline-primary mr-2" to="/dashboard">Post a topic</nuxt-link>
              <nuxt-link class="btn btn-outline-warning mr-2" to="/topics">Browse topics</nuxt-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  // middleware:['auth']
}
</script>

<style  scoped>
html, body{
  background-color: #fff;
  color: #636b6f;
  font-family: 'Nunito', sans-serif;
  font-weight: 200;
  height: 100vh;
  margin: 0;
}
.full-height{
  height: 100vh;
}
.flex-center{
  align-items: center;
  display: flex;
  justify-content: center;
}
.content{
  text-align: center;
}

.title{
  font-size: 84px;
}
</style>