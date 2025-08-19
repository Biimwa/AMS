import { createRouter, createWebHistory } from 'vue-router'
import Home from './pages/Home.vue'
import Login from './pages/Login.vue'
import Dashboard from './pages/Dashboard.vue'

const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/login', name: 'login', component: Login },
  { path: '/dashboard', name: 'dashboard', component: Dashboard },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router

