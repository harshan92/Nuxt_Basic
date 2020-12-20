<template>
    
    <b-navbar toggleable="lg" type="dark" variant="dark">
        <!-- <b-navbar-brand href="#"></b-navbar-brand> -->
        <nuxt-link to="/" class="navbar-brand">Nuxt App</nuxt-link>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
            
            
            <nuxt-link to="/" class="nav-link">Home</nuxt-link>
            <nuxt-link to="/users" class="nav-link">Users</nuxt-link>
            <nuxt-link to="/posts" class="nav-link">Posts</nuxt-link>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
            <!-- <b-nav-form>
            <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
            <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
            </b-nav-form> -->

            <!-- <b-nav-item-dropdown text="Lang" right>
            <b-dropdown-item href="#">EN</b-dropdown-item>
            <b-dropdown-item href="#">ES</b-dropdown-item>
            <b-dropdown-item href="#">RU</b-dropdown-item>
            <b-dropdown-item href="#">FA</b-dropdown-item>
            </b-nav-item-dropdown> -->

          
        </b-navbar-nav>
        </b-collapse>
    </b-navbar>
    
</template>