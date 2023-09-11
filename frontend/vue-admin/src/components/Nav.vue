<template>
  <div>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Company name</a>

      <nav class="my-2 my-md-0 mr-md-3">
        <router-link to="/profile" class="p-2 text-white text-decoration-none" href="#">{{ user?.first_name }}
          {{ user?.last_name }}
        </router-link>
        <a class="p-2 text-white text-decoration-none" href="#" @click="logout">Sign Out</a>
      </nav>

    </header>

  </div>
</template>

<script>
import axios from "axios";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Nav",
  props: ['user'],
  methods: {
    async logout() {
      await axios.post('logout');
      await this.$router.push('/login');

    }
  }
}
</script>

<style lang="scss" scoped>

</style>