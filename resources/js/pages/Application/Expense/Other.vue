<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Expense (Other)</label>
        <input
            v-model="model"
            type="number"
            min="0"
            max="10000"
            step="1"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#fff] p-3 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
            placeholder="Enter other expenses"
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

    if (value < 0 || value > 10000 || isNaN(value)) {
        localError.value = 'Please enter a valid number between 0 and 10,000.'
    }
}
</script>

<style scoped>
/* Input styling handled via Tailwind classes */
</style>
