<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Date of Birth
        </label>
        <div data-cy="date-of-birth" class="grid grid-cols-3 gap-3">
            <!-- Day -->
            <input
                data-cy="dob-day"
                v-model="day"
                type="number"
                max="31"
                min="1"
                class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
                placeholder="DD"
            />
            <!-- Month -->
            <input
                data-cy="dob-month"
                v-model="month"
                type="number"
                max="12"
                min="1"
                class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
                placeholder="MM"
            />
            <!-- Year -->
            <input
                data-cy="dob-year"
                v-model="year"
                type="number"
                class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
                placeholder="YYYY"
            />
        </div>

        <div class="flex justify-between mt-2">
            <div v-if="error" class="text-red-500 text-sm">{{ error }}</div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: [String, Number],
    error: String
})
const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

const day = computed({
    get: () => model.value?.split('/')[0] || '',
    set: (value) => {
        const newValue = `${value || ''}/${month.value || ''}/${year.value || ''}`
        emit('update:modelValue', newValue)
    }
})

const month = computed({
    get: () => model.value?.split('/')[1] || '',
    set: (value) => {
        const newValue = `${day.value || ''}/${value || ''}/${year.value || ''}`
        emit('update:modelValue', newValue)
    }
})

const year = computed({
    get: () => model.value?.split('/')[2] || '',
    set: (value) => {
        const newValue = `${day.value || ''}/${month.value || ''}/${value || ''}`
        emit('update:modelValue', newValue)
    }
})
</script>

<style scoped>
/* All styling provided via Tailwind classes */
</style>
