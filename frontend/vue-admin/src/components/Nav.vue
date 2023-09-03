<template>
  <div>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Company name</a>

      <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-white text-decoration-none" href="#">{{user?.first_name}} {{user?.last_name}}</a>
          <a class="p-2 text-white text-decoration-none" href="#">Sign Out</a>
      </nav>

    </header>

  </div>
</template>

<script>
export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Nav",
  props: ['user']
}
</script>

<style lang="scss" scoped>

</style>