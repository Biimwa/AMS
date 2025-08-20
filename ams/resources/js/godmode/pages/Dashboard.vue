<template>

  
  <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
    <div v-for="card in cards" :key="card.key" class="card">
      <div class="text-slate-500 text-sm">{{ card.label }}</div>
      <div class="mt-2 text-3xl font-bold">{{ card.value }}</div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

const cards = ref([
  { key: 'users', label: 'Users', value: 0 },
  { key: 'schools', label: 'Schools', value: 0 },
  { key: 'programs', label: 'Programs', value: 0 },
  { key: 'competitions', label: 'Competitions', value: 0 },
  { key: 'events', label: 'Events', value: 0 },
])

onMounted(async () => {
  try {
    const { data } = await axios.get('/api/dashboard/summary')
    for (const c of cards.value) {
      c.value = data[c.key] ?? 0
    }
  } catch (e) {
    // ignore
  }
})
</script>

<style scoped>
@reference '../../../css/app.css';
.card{ @apply p-6 bg-white rounded-xl shadow border border-slate-100; }
</style>

