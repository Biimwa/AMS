<template>
  <div class="max-w-md mx-auto bg-white rounded-xl shadow p-6">
    <h2 class="text-2xl font-semibold">Sign in</h2>
    <form class="mt-6 space-y-4" @submit.prevent="submit">
      <div>
        <label class="block text-sm font-medium">Email</label>
        <input v-model="email" type="email" class="input" required />
      </div>
      <div>
        <label class="block text-sm font-medium">Password</label>
        <input v-model="password" type="password" class="input" required />
      </div>
      <button :disabled="loading" class="btn-primary w-full">
        {{ loading ? 'Signing in...' : 'Sign in' }}
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const router = useRouter()
const email = ref('')
const password = ref('')
const loading = ref(false)

const submit = async () => {
  loading.value = true
  try {
    await axios.get('/sanctum/csrf-cookie')
    await axios.post('/login', { email: email.value, password: password.value })
    router.push('/dashboard')
  } catch (e) {
    alert('Login failed')
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
.input{ @apply w-full mt-1 px-3 py-2 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500; }
.btn-primary{ @apply inline-flex items-center justify-center px-5 py-3 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition; }
</style>

