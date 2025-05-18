<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Loan Amount
        </label>

        <select
            data-cy="loan-amount"
            v-model="model"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200 cursor-pointer"
        >
            <option value="">Select an amount</option>
            <option
                v-for="amount in amounts"
                :key="amount"
                :value="amount"
                class="bg-white text-gray-800"
            >
                £{{ amount }}
            </option>
        </select>

        <div v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

// Props
const props = defineProps({
    modelValue: [String, Number],
    error: String
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

// Loan amounts
const amounts = Array.from({ length: 50 }, (_, i) => (i + 1) * 100)
</script>

<style scoped>
/* Tooltip code removed since it's not in use here */
</style>
