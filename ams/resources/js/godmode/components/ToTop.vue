<template>
  <button
    class="fixed bottom-6 left-6 h-12 w-12 rounded-full bg-indigo-600 text-white shadow-lg grid place-items-center hover:bg-indigo-700"
    @click="window.scrollTo({top:0,behavior:'smooth'})"
    aria-label="Back to top"
  >
    ↑
  </button>
</template>

<script setup>
</script>

