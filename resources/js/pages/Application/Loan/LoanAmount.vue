<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">
            Loan Amount
            <!-- Tooltip Icon -->
<!--            <span class="relative inline-block cursor-pointer" @mouseenter="showTooltip" @mouseleave="hideTooltip">-->
<!--        <span class="absolute -top-2 left-full ml-2 bg-gray-300 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">-->
<!--          ?-->
<!--        </span>-->
                <!-- Tooltip Content -->
<!--        <div class="tooltip absolute bg-black text-white text-xs rounded py-1 px-2 left-full ml-2 w-max opacity-0 transition-opacity duration-300 ease-in-out">-->
<!--          Select a loan amount from the available options.-->
<!--        </div>-->
<!--      </span>-->
        </label>

        <select
            v-model="model"
            class="w-full px-5 py-3 rounded-xl bg-[#ffffff] border-2 border-cyan-500 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300 cursor-pointer"
        >
            <option value="">Select an amount</option>
            <option
                v-for="amount in amounts"
                :key="amount"
                :value="amount"
                class="bg-[#fffff] text-black px-5 py-3"
            >
                £{{ amount }}
            </option>
        </select>

        <div v-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
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

// Tooltip show/hide functions
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
/* Tooltip styling */
.tooltip {
    visibility: hidden;
    opacity: 0;
}

span:hover .tooltip {
    visibility: visible;
    opacity: 1;
    transition: opacity 0.3s ease-in-out;
}

/* Tooltip placement to the right */
span .tooltip {
    left: 100%;
    margin-left: 10px; /* Adds space between the label and tooltip */
}

/* Input styling */
input {
    outline: none;
}
</style>
