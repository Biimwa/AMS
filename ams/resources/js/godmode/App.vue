<template>
  <div class="min-h-screen bg-slate-50 text-slate-900">
    <Navbar />
    <main class="container mx-auto px-4 py-6">
      <router-view />
    </main>
  </div>
  <Notifications />
  <ToTop />
</template>

<script setup>
import Navbar from './components/Navbar.vue'
import Notifications from './components/Notifications.vue'
import ToTop from './components/ToTop.vue'
</script>

<style>
/* Tailwind via @vite */
</style>

