<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">Loan Term</label>
        <!-- 3x3 Grid Layout for Radio Buttons -->
        <div class="grid grid-cols-3 gap-4">
            <label
                v-for="term in terms"
                :key="term.value"
                class="flex items-center justify-center text-center px-5 py-3 rounded-xl cursor-pointer border-2 transition-all duration-300 h-16"
                :class="modelValue === term.value
                      ? 'bg-gradient-to-r from-cyan-400 to-purple-500 text-white border-transparent shadow-lg'
                    : 'bg-[#ffffff] border-cyan-500 text-black-300 hover:bg-cyan-600 hover:text-white hover:border-purple-400'"
            >
                <input
                    type="radio"
                    :value="term.value"
                    v-model="model"
                    class="hidden"
                />
                {{ term.label }}
            </label>
        </div>
        <div v-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

// Define props
const props = defineProps({
    modelValue: [String, Number],
    error: String
})

// Emit method to update model value in the parent
const emit = defineEmits(['update:modelValue'])

// Initialize LoanTerm from localStorage, or default to 2 months if not found

// Sync initial value with modelValue if it's not set
const model = computed({
    get: () => props.modelValue, // Default to initialLoanTerm if modelValue is not available
    set: (value) => {
        emit('update:modelValue', value)
        // Store the value in localStorage whenever it changes
    }
})

// Terms for the radio buttons
const terms = [
    { value: 1, label: '1 month' },
    { value: 2, label: '2 months' },
    { value: 3, label: '3 months' },
    { value: 6, label: '6 months' },
    { value: 9, label: '9 months' },
    { value: 12, label: '12 months' },
]
</script>

