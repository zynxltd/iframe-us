<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">Street Address</label>
        <input
            v-model="model"
            type="text"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#fff] p-3 text-black placeholder-neutral-800 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
            placeholder="Enter your street address"
            @input="validateStreetAddress"
        />
        <div v-if="localError" class="text-pink-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'

// Props
const props = defineProps({
    modelValue: String,
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value),
})

const localError = ref('')

// Street address validation
const validateStreetAddress = () => {
    localError.value = ''
    const streetAddress = model.value

    // Regex for valid street address (letters, numbers, spaces, hyphens, commas, periods)
    const regex = /^[a-zA-Z0-9\s\-\,\.]+$/

    if (!streetAddress.match(regex)) {
        localError.value = 'Please enter a valid street address.'
    }
}
</script>

<style scoped>
/* Inline styling handled */
</style>
