<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Next Pay Date</label>
        <input
            type="date"
            :min="today"
            v-model="model"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#fff] p-3 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
            @change="validateDate"
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

// Local validation error (for weekend check)
const localError = ref('')

// Get today's date in YYYY-MM-DD format
const today = new Date().toISOString().split('T')[0]

// Validate if date is a weekday
const validateDate = () => {
    localError.value = ''
    if (!model.value) return

    const selectedDate = new Date(model.value)
    const day = selectedDate.getDay()

    if (day === 0 || day === 6) {
        localError.value = 'Pay date cannot be on a weekend.'
        model.value = '' // reset the invalid date
    }
}
</script>

<style scoped>
input {
    outline: none;
}
</style>
