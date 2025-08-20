<template>
  <section>
    <h1 class="text-2xl font-semibold">Messages</h1>

    <div class="mt-6 grid md:grid-cols-2 gap-8">
      <div>
        <div class="flex items-center gap-3 mb-3">
          <button :class="['tab', box==='inbox' && 'tab-active']" @click="setBox('inbox')">Inbox</button>
          <button :class="['tab', box==='sent' && 'tab-active']" @click="setBox('sent')">Sent</button>
        </div>
        <div class="space-y-3">
          <div v-for="m in messages.data" :key="m.id" class="card">
            <div class="flex items-start justify-between">
              <div>
                <div class="text-sm text-slate-500">{{ box==='inbox' ? 'From' : 'To' }}: {{ box==='inbox' ? m.sender_user_id : m.recipient_user_id }}</div>
                <div class="font-medium">{{ m.subject || '(no subject)' }}</div>
                <div class="text-slate-700 whitespace-pre-line">{{ m.body }}</div>
              </div>
              <button v-if="box==='inbox' && !m.read_at" class="btn-outline" @click="markRead(m)">Mark read</button>
            </div>
            <div class="text-xs text-slate-400 mt-2">{{ new Date(m.created_at).toLocaleString() }}</div>
          </div>
        </div>
      </div>

      <div>
        <div class="card">
          <h2 class="text-lg font-semibold mb-4">Send a message</h2>
          <form class="space-y-3" @submit.prevent="send">
            <div>
              <label class="block text-sm">Recipient</label>
              <select v-model="recipient" class="input">
                <option value="" disabled>Select user</option>
                <option v-for="u in users" :key="u.id" :value="u.id">{{ u.name }} ({{ u.email }})</option>
              </select>
            </div>
            <div>
              <label class="block text-sm">Subject</label>
              <input v-model="subject" class="input" placeholder="Subject" />
            </div>
            <div>
              <label class="block text-sm">Message</label>
              <textarea v-model="body" class="input" rows="5" placeholder="Write your message..."></textarea>
            </div>
            <button class="btn-primary" :disabled="sending">{{ sending ? 'Sending...' : 'Send' }}</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
import axios from 'axios'

const box = ref('inbox')
const messages = ref({ data: [] })
const users = ref([])
const recipient = ref('')
const subject = ref('')
const body = ref('')
const sending = ref(false)

const loadMessages = async () => {
  const { data } = await axios.get('/api/messages', { params: { box: box.value } })
  messages.value = data
}

const loadUsers = async () => {
  try {
    const { data } = await axios.get('/api/users')
    users.value = data.data ?? data
  } catch {}
}

const setBox = (b) => {
  box.value = b
}

watch(box, loadMessages)

onMounted(async () => {
  await Promise.all([loadMessages(), loadUsers()])
})

const send = async () => {
  sending.value = true
  try {
    await axios.post('/api/messages', { recipient_user_id: recipient.value, subject: subject.value, body: body.value })
    subject.value = ''
    body.value = ''
    await loadMessages()
  } finally {
    sending.value = false
  }
}

const markRead = async (m) => {
  await axios.patch(`/api/messages/${m.id}/read`)
  await loadMessages()
}
</script>

<style scoped>
@reference '../../../css/app.css';
.card{ @apply p-4 bg-white rounded-xl shadow border border-slate-100; }
.input{ @apply w-full mt-1 px-3 py-2 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500; }
.btn-primary{ @apply inline-flex items-center justify-center px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition; }
.btn-outline{ @apply inline-flex items-center justify-center px-3 py-1.5 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-100 transition; }
.tab{ @apply px-3 py-1.5 rounded-md border border-transparent hover:bg-slate-100; }
.tab-active{ @apply bg-indigo-50 text-indigo-700 border-indigo-200; }
</style>

