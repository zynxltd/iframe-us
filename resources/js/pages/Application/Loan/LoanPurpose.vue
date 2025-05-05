<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">
            Loan Purpose
        </label>
        <!-- 3x3 Grid Layout -->
        <div class="grid grid-cols-3 gap-4">
            <label
                v-for="purpose in purposes"
                :key="purpose"
                class="flex items-center justify-center text-center px-2 py-4 rounded-xl cursor-pointer border-2 transition-all duration-300 w-full h-16"
                :class="modelValue === purpose
          ? 'bg-gradient-to-r from-cyan-400 to-purple-500 text-white border-transparent shadow-lg'
          : 'bg-white border-cyan-500 text-black hover:bg-cyan-600 hover:text-white hover:border-purple-400'"
            >
                <input
                    type="radio"
                    :value="purpose"
                    v-model="model"
                    class="hidden"
                />
                <span class="text-sm break-words">{{ purpose }}</span>
            </label>
        </div>
        <div v-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>


<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: String,
    error: String
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

// Adjusted purposes array for 9 items to fill a 3x3 grid
const purposes = [
    'Short term',
    'Pay Bills',
    'Other',
    'Debt Consolidation',
    'Emergency',
    'Home improvements',
    'Car loan',
    'Vacation',
    'Medical expenses'
]
</script>
