<template>
  <div class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin w-100 m-auto">
      <form @submit.prevent="submit">
        <img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72"
             height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
          <input v-model="email" type="email" class="form-control" placeholder="name@example.com">
          <label>Email address</label>
        </div>
        <div class="form-floating">
          <input v-model="password" type="password" class="form-control" placeholder="Password">
          <label>Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

      </form>
    </main>
  </div>
</template>

<script>

import axios from "axios";
import {pushScopeId} from "vue";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "login",
  data() {
    return {
      email: "",
      password: "",
    }
  },
  methods: {
    async submit() {
      axios.post('login', {
        "email": this.email,
        "password": this.password
      });
      await this.$router.push('/');
    }
  }

}
</script>

<style scoped>


</style>