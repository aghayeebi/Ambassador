<template>

  <div class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin w-100 m-auto">
      <form @submit.prevent="submit">

        <img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72"
             height="57">

        <h1 class="h3 mb-3 fw-normal">Please register</h1>

        <div class="form-floating">
          <input v-model="first_name" class="form-control" placeholder="First name">
          <label>first name</label>
        </div>

        <div class="form-floating">
          <input v-model="last_name" class="form-control" placeholder="Last  name">
          <label>Last name</label>
        </div>

        <div class="form-floating">
          <input v-model="email" type="email" class="form-control" placeholder="name@example.com">
          <label>Email address</label>
        </div>

        <div class="form-floating">
          <input v-model="password" type="password" class="form-control" placeholder="Password">
          <label>Password</label>
        </div>

        <div class="form-floating">
          <input v-model="password_confirm" type="password" class="form-control" placeholder="Password Confirm">
          <label>Password Confirm</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>

      </form>
    </main>
  </div>

</template>

<script>
import axios from "axios";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "register",
  data() {
    return {
      first_name: "",
      last_name: "",
      email: "",
      password: "",
      password_confirm: "",

    }
  },
  methods: {
    async submit() {
      await axios.post('http://localhost:80/admin/register', {
        first_name: this.first_name,
        last_name: this.last_name,
        email: this.email,
        password: this.password,
        password_confirm: this.password_confirm
      });

      await this.$router.push('/login');

    }
  }

}
</script>



<style lang="scss" scoped>

</style>