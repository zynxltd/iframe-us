<template>
    <div class="mb-6 p-4">
        <label
            class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide"
        >
            Bank Account Number
        </label>
        <input
            data-cy="bank-account-number"
            v-model="model"
            type="text"
            maxlength="17"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="Enter your bank account number"
            @input="validateAccountNumber"
            @blur="validateAccountNumber"
        />
        <div v-if="localError" class="text-red-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'

// Props from parent
const props = defineProps({
    modelValue: String,
    error: String,
})
const emit = defineEmits(['update:modelValue'])

// Plain-model binding
const model = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value),
})

const localError = ref('')

function validateAccountNumber() {
    // strip non-digits and cap at 17
    const digits = (model.value || '').replace(/\D/g, '').slice(0, 17)
    model.value = digits

    localError.value = ''
    if (digits) {
        if (digits.length < 4) {
            localError.value = 'Account number must be at least 4 digits.'
        } else if (digits.length > 17) {
            localError.value = 'Account number cannot exceed 17 digits.'
        }
    }
}
</script>

<style scoped>
/* Styling via Tailwind utility classes */
</style>
