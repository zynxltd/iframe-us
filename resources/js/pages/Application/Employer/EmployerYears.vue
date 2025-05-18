<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Years with Employer
        </label>
        <select
            data-cy="employer-years"
            v-model="model"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
        >
            <option disabled value="">Select years</option>
            <option
                v-for="year in years"
                :key="year"
                :value="year"
                :data-cy="`employer-years-${year}`"
            >
                {{ year }} year{{ year > 1 ? 's' : '' }}
            </option>
        </select>
        <div v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: [String, Number],
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value),
})

const years = Array.from({ length: 11 }, (_, i) => i + 1)
</script>

<style scoped>
/* All styling handled via Tailwind utility classes */
</style>
