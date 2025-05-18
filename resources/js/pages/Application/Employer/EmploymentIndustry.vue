<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Employer Industry
        </label>
        <select
            data-cy="employment-industry"
            v-model="model"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
        >
            <option disabled value="">Select industry</option>
            <option
                v-for="option in options"
                :key="option.value"
                :value="option.value"
                :data-cy="`employment-industry-${option.value}`"
            >
                {{ option.label }}
            </option>
        </select>
        <div v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: String,
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value),
})

const options = [
    { value: 1, label: 'Accounting' },
    { value: 2, label: 'Health' },
    { value: 3, label: 'Hospitality' },
    { value: 4, label: 'Marketing' },
    { value: 5, label: 'Professional' },
    { value: 6, label: 'Other' },
]
</script>

<style scoped>
/* All styling handled by Tailwind utility classes */
</style>
