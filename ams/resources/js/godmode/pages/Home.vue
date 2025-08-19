<template>
  <section class="py-16">
    <div class="max-w-6xl mx-auto text-center">
      <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight">
        Asist Management System
      </h1>
      <p class="mt-4 text-lg text-slate-600">
        GOD MODE dashboard for STEM programs, schools, competitions, and more.
      </p>
      <div class="mt-8 flex items-center justify-center gap-4">
        <router-link class="btn-primary" to="/login">Sign In</router-link>
        <router-link class="btn-outline" to="/dashboard">View Dashboard</router-link>
      </div>
    </div>
  </section>
</template>

<style scoped>
.btn-primary{ @apply inline-flex items-center px-5 py-3 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition; }
.btn-outline{ @apply inline-flex items-center px-5 py-3 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-100 transition; }
</style>

