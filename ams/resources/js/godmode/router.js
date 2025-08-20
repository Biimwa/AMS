import { createRouter, createWebHistory } from 'vue-router'
import Home from './pages/Home.vue'
import Login from './pages/Login.vue'
import Dashboard from './pages/Dashboard.vue'
import Schools from './pages/Schools.vue'
import Students from './pages/Students.vue'
import Messages from './pages/Messages.vue'
import Complaint from './pages/Complaint.vue'

const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/login', name: 'login', component: Login },
  { path: '/dashboard', name: 'dashboard', component: Dashboard },
  { path: '/schools', name: 'schools', component: Schools },
  { path: '/students', name: 'students', component: Students },
  { path: '/messages', name: 'messages', component: Messages },
  { path: '/complaint', name: 'complaint', component: Complaint },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router

