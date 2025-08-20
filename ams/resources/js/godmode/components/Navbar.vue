<template>
  <header class="sticky top-0 z-40 bg-white/70 backdrop-blur border-b">
    <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
      <router-link to="/" class="font-bold text-xl">AMS God Mode</router-link>
      <nav class="flex items-center gap-4 text-sm">
        <router-link to="/dashboard" class="hover:text-indigo-600">Dashboard</router-link>
        <router-link to="/schools" class="hover:text-indigo-600">Schools</router-link>
        <router-link to="/students" class="hover:text-indigo-600">Students</router-link>
        <router-link to="/messages" class="hover:text-indigo-600">Messages</router-link>
        <router-link to="/complaint" class="hover:text-indigo-600">Complaint</router-link>
        <router-link to="/login" class="hover:text-indigo-600">Sign In</router-link>
      </nav>
    </div>
  </header>
</template>

<script setup>
</script>

