<template>
 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
   <div class="position-sticky pt-3">
     <ul class="nav flex-column">
       <li class="nav-item">
         <router-link to="/users" class="nav-link" active-class="active"
                      aria-current="page" href="#">
           Users
         </router-link>
       </li>
     </ul>
   </div>
 </nav>
</template>

<script>
import Nav from "@/components/Nav.vue";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Menu",


}
</script>

