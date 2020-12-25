<template >
  <div class="container col-md-6 mt-5">
    <h2>Login</h2>
    <br />
    <form @submit.prevent="submit">
      <div class="form-group">
        <label>Email address</label>
        <input
          v-model.trim="form.email"
          autofocus
          type="email"
          class="form-control"
          placeholder="Enter email"
        />
        <small class="form-text text-danger">Show Error</small>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input
          v-model="form.password"
          type="password"
          class="form-control"
          placeholder="Password"
        />
        <small class="form-text text-danger">Show Error</small>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br />
    <p>
      Don't have any account? <nuxt-link to="/register">Register</nuxt-link>
    </p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    async submit() {
      await this.$auth.loginWith("local", {
        data: this.form,
      });

      this.$router.push("/");
    },
  },
};
</script>