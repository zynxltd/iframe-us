<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Next Pay Date
        </label>
        <input
            data-cy="next-pay-date"
            v-model="model"
            type="text"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="DD/MM/YYYY"
            @blur="validateDate"
        />
        <div v-if="localError" class="text-red-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
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
    set: value => emit('update:modelValue', value),
})

const localError = ref('')

// Today's date (no time) for min validation
const today = new Date()
today.setHours(0,0,0,0)

// Validate DD/MM/YYYY format, weekday, and not before today
const validateDate = () => {
    localError.value = ''
    if (!model.value) return

    // match DD/MM/YYYY
    const pattern = /^(\d{2})\/(\d{2})\/(\d{4})$/
    const match = pattern.exec(model.value.trim())
    if (!match) {
        localError.value = 'Date must be in DD/MM/YYYY format.'
        return
    }

    const day = parseInt(match[1], 10)
    const month = parseInt(match[2], 10) - 1
    const year = parseInt(match[3], 10)
    const dateObj = new Date(year, month, day)

    // check valid date
    if (
        dateObj.getFullYear() !== year ||
        dateObj.getMonth() !== month ||
        dateObj.getDate() !== day
    ) {
        localError.value = 'Please enter a valid date.'
        return
    }

    // check not weekend
    const weekday = dateObj.getDay()
    if (weekday === 0 || weekday === 6) {
        localError.value = 'Pay date cannot be on a weekend.'
        return
    }

    // check not before today
    if (dateObj < today) {
        localError.value = 'Pay date cannot be in the past.'
        return
    }

    // passed all checks
    emit('update:modelValue', model.value)
}
</script>

<style scoped>
/* All styling handled via Tailwind utility classes */
</style>
