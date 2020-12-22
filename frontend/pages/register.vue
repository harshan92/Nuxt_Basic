<template >
    <div class="container col-md-6 mt-5">
        <h2>Register</h2>
        <br>
        <form>
             <div class="form-group">
    <label>Full Name</label>
    <input type="text" class="form-control" placeholder="Full Name">
    <small class="form-text text-danger">Show Error here</small>
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" placeholder="Enter email">
    <small class="form-text text-danger">Show Error</small>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Password">
    <small class="form-text text-danger">Show Error</small>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<p>I have an account. <nuxt-link to="/login">Login</nuxt-link></p>
    </div>
</template>