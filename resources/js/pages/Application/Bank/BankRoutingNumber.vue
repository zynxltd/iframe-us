<template>
    <div class="mb-6 p-4">
        <label
            class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide"
        >
            Routing Number
        </label>
        <input
            data-cy="routing-number"
            v-model="model"
            type="text"
            maxlength="9"
            minlength="9"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="Enter your 9-digit routing number"
            @input="validateRoutingNumber"
            @blur="validateRoutingNumber"
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

// Plain model binding
const model = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value),
})

const localError = ref('')

// Simple 9-digit check
const validateRoutingNumber = () => {
    // strip any non-digits and enforce max length
    const digits = (model.value || '').replace(/\D/g, '').slice(0, 9)
    model.value = digits

    localError.value = ''
    if (digits && digits.length !== 9) {
        localError.value = 'Please enter a valid 9-digit routing number.'
    }
}
</script>

<style scoped>
/* Styling via Tailwind utility classes */
</style>
