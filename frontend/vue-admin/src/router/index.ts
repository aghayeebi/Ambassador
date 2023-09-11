import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Vue from 'vue'
import HomeView from '../views/HomeView.vue'
import Layout from "@/views/layout.vue";
import login from "@/views/login.vue";
import register from "@/views/register.vue";
import Users from "@/views/users.vue";


const routes: Array<RouteRecordRaw> = [
  {
    path: '' ,
    component: Layout,
    children: [
      {path:'', redirect:'users'},
      {path: '/users', component: Users}
    ]
  },
  {path: '/login' , component: login},
  {path: '/register' , component: register}

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
