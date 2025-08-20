<template>
  <section>
    <h1 class="text-2xl font-semibold">Submit a Complaint</h1>
    <div class="max-w-2xl mt-6 card">
      <form class="space-y-4" @submit.prevent="submit">
        <div>
          <label class="block text-sm">Subject</label>
          <input v-model="subject" class="input" required />
        </div>
        <div>
          <label class="block text-sm">Message</label>
          <textarea v-model="body" class="input" rows="6" required></textarea>
        </div>
        <label class="inline-flex items-center gap-2">
          <input type="checkbox" v-model="isAnonymous" /> Submit anonymously
        </label>
        <div class="flex gap-3">
          <button class="btn-primary" :disabled="submitting">{{ submitting ? 'Submitting...' : 'Submit' }}</button>
          <span v-if="ok" class="text-green-600">Thank you! Your complaint has been submitted.</span>
        </div>
      </form>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const subject = ref('')
const body = ref('')
const isAnonymous = ref(true)
const submitting = ref(false)
const ok = ref(false)

const submit = async () => {
  submitting.value = true
  ok.value = false
  try {
    await axios.post('/api/complaints', { subject: subject.value, body: body.value, is_anonymous: isAnonymous.value })
    ok.value = true
    subject.value = ''
    body.value = ''
    isAnonymous.value = true
  } finally {
    submitting.value = false
  }
}
</script>

<style scoped>
@reference '../../../css/app.css';
.card{ @apply p-6 bg-white rounded-xl shadow border border-slate-100; }
.input{ @apply w-full mt-1 px-3 py-2 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500; }
.btn-primary{ @apply inline-flex items-center justify-center px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition; }
</style>

