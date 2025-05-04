<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Following Pay Date</label>
        <input
            type="date"
            :min="minDate"
            v-model="model"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#ffff] p-3 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
            @change="validateDate"
        />
        <div v-if="localError" class="text-pink-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'

// Props
const props = defineProps({
    modelValue: String,
    error: String,
    nextPayDate: String, // Pass in the NextPayDate for comparison
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value),
})

const localError = ref('')

// Minimum selectable date
const minDate = computed(() => {
    if (props.nextPayDate) {
        // Add 1 day to nextPayDate
        const next = new Date(props.nextPayDate)
        next.setDate(next.getDate() + 1)
        return next.toISOString().split('T')[0]
    }
    return new Date().toISOString().split('T')[0]
})

// Validate selected date
const validateDate = () => {
    localError.value = ''
    if (!model.value) return

    const selected = new Date(model.value)
    const selectedDay = selected.getDay()

    if (selectedDay === 0 || selectedDay === 6) {
        localError.value = 'Pay date cannot be on a weekend.'
        model.value = '' // Clear if invalid
    }

    if (props.nextPayDate) {
        const nextPay = new Date(props.nextPayDate)
        if (selected <= nextPay) {
            localError.value = 'Following pay date must be after next pay date.'
            model.value = '' // Clear if invalid
        }
    }
}

// Watch if nextPayDate changes to revalidate
watch(() => props.nextPayDate, () => {
    validateDate()
})
</script>

<style scoped>
input {
    outline: none;
}
</style>
