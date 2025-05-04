<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Expense (Transport)</label>
        <input
            v-model="model"
            type="number"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#fff] p-3 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
            min="0"
            max="10000"
            step="1"
            placeholder="Enter transport expenses"
            @input="validateExpense"
        />
        <div v-if="localError" class="text-pink-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'

// Props
const props = defineProps({
    modelValue: [Number, String],
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value),
})

const localError = ref('')

// Validate the transport expense value
const validateExpense = () => {
    localError.value = ''
    const value = parseFloat(model.value)

    // Check if the value is a valid number and between 0 and 10,000
    if (value < 0 || value > 10000 || isNaN(value)) {
        localError.value = 'Please enter a valid number between 0 and 10,000.'
    }
}
</script>

<style scoped>
input {
    outline: none;
    border: 2px solid #06b6d4; /* Cyan border */
    background-color: #1e1b29; /* Dark background */
    color: #a5f3fc; /* Cyan text */
    padding: 0.75rem; /* Padding */
    border-radius: 1rem; /* Rounded corners */
    width: 100%;
    transition: all 0.3s ease-in-out;
}

input:focus {
    border-color: #8b5cf6; /* Purple focus border */
    box-shadow: 0 0 0 2px rgba(139, 92, 246, 0.3); /* Purple focus glow */
}

label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #06b6d4; /* Teal label color */
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

div.text-pink-500 {
    color: #f472b6; /* Pink error text */
    font-size: 0.875rem;
    margin-top: 0.25rem;
}
</style>
