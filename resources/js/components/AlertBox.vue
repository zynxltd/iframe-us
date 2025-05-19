<template>
    <transition name="fade">
        <div
            v-if="show"
            class="fixed inset-x-0 top-0 mx-auto mt-4 max-w-lg bg-red-100 border border-red-400 text-red-800 p-4 rounded shadow-lg z-50"
        >
            <button
                @click="$emit('dismiss')"
                class="absolute top-1 right-1 text-red-600 hover:text-red-800"
                aria-label="Close"
            >&times;</button>
            <strong class="block font-semibold mb-2">Please fix the following errors:</strong>
            <ul class="list-disc list-inside space-y-1 text-sm">
                <li v-for="(err, i) in errors" :key="i">{{ err }}</li>
            </ul>
        </div>
    </transition>
</template>

<script setup>
defineProps({
    show: Boolean,
    errors: { type: Array, default: () => [] }
})
defineEmits(['dismiss'])
</script>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity .2s }
.fade-enter-from, .fade-leave-to { opacity: 0 }
</style>
