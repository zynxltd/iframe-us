<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Bank Account Number
        </label>
        <input
            data-cy="bank-account-number"
            v-model="model"
            type="text"
            maxlength="8"
            minlength="8"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="Enter your 8-digit bank account number"
            @input="validateAccountNumber"
            @blur="validateAccountNumber"
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

// Validate the bank account number: exactly 8 digits
const validateAccountNumber = () => {
    localError.value = ''
    const value = (model.value || '').trim()
    if (value && !/^\d{8}$/.test(value)) {
        localError.value = 'Please enter exactly 8 digits.'
    }
}
</script>

<style scoped>
/* No tooltip styles needed */
</style>
