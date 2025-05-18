<template>
    <div class="flex flex-col items-center justify-center h-screen text-center">
        <div class="loader mb-6"></div>
        <h2 class="text-xl font-semibold mb-2">{{ currentMessage }}</h2>
        <p v-if="status === 'rejected'" class="text-red-500">Request was rejected.</p>
        <p v-if="status === 'error'" class="text-red-700">An error occurred. Please try again later.</p>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { router } from '@inertiajs/vue3'

const messages = [
    'Checking your information...',
    'Processing request...',
    'Almost done...',
    'Finalizing...',
]

const currentMessage = ref(messages[0])
const status = ref('processing') // 'processing', 'accepted', 'rejected', 'error'

let messageIndex = 0

const updateMessages = () => {
    setInterval(() => {
        messageIndex = (messageIndex + 1) % messages.length
        currentMessage.value = messages[messageIndex]
    }, 5000)
}

const startProcessing = async () => {
    try {
        const response = await axios.post('/api/process') // Replace with your route

        if (response.data.status === 'accepted') {
            status.value = 'accepted'
            setTimeout(() => router.visit('/accepted'), 5000)
        } else if (response.data.status === 'rejected') {
            status.value = 'rejected'
        } else {
            status.value = 'error'
        }
    } catch (e) {
        status.value = 'error'
    }
}

onMounted(() => {
    updateMessages()
    startProcessing()
})
</script>

<style scoped>
.loader {
    border: 6px solid #f3f3f3;
    border-top: 6px solid #000000;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    animation: spin 1s linear infinite;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
