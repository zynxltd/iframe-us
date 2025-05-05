<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">Bank Account Number
            <!-- Tooltip Icon -->

        </label>
        <input
            v-model="model"
            type="text"
            class="w-full px-5 py-3 rounded-xl bg-[#fff] border-2 border-cyan-500 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
            placeholder="Enter your 8-digit bank account number"
            maxlength="8"
            @input="validateAccountNumber"
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

const localError = ref('')

// Validate the bank account number
const validateAccountNumber = () => {
    localError.value = ''
    const value = model.value.trim()

    // Check if the value contains exactly 8 digits and is numeric
    if (value && !/^\d{8}$/.test(value)) {
        localError.value = 'Please enter a valid 8-digit bank account number.'
    }
}

// Show tooltip on hover
const showTooltip = (event) => {
    const tooltip = event.target.querySelector('.tooltip');
    tooltip.classList.remove('opacity-0');
    tooltip.classList.add('opacity-100');
}

const hideTooltip = (event) => {
    const tooltip = event.target.querySelector('.tooltip');
    tooltip.classList.remove('opacity-100');
    tooltip.classList.add('opacity-0');
}
</script>

<style scoped>
input {
    outline: none;
}

/* Initially hide the tooltip */
.tooltip {
    visibility: hidden;
    opacity: 0;
}

/* Show tooltip when hovering */
span:hover .tooltip {
    visibility: visible;
    opacity: 1;
    transition: opacity 0.3s ease-in-out;
}
</style>
