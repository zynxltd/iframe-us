<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Loan Purpose
        </label>
        <div data-cy="loan-purpose" class="grid grid-cols-3 gap-4">
            <label
                v-for="option in options"
                :key="option.value"
                :data-cy="`loan-purpose-${option.value}`"
                class="flex items-center justify-center text-center text-xs font-medium h-14 w-full px-4 py-4 rounded-lg cursor-pointer border-2 transition-all duration-200"
                :class="modelValue === option.value
          ? 'bg-black text-white border-transparent shadow'
          : 'bg-white border-gray-300 text-gray-800 hover:bg-gray-100 hover:border-gray-400'"
            >
                <input
                    type="radio"
                    :value="option.value"
                    v-model="model"
                    class="hidden"
                />
                <span class="text-sm break-words">{{ option.label }}</span>
            </label>
        </div>
        <div v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: [String, Number],
    error: String
})
const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value)
})

// Now values 1–9 with labels
const options = [
    { value: 1, label: 'Short term' },
    { value: 2, label: 'Pay Bills' },
    { value: 3, label: 'Other' },
    { value: 4, label: 'Debt Consolidation' },
    { value: 5, label: 'Emergency' },
    { value: 6, label: 'Home improvements' },
    { value: 7, label: 'Car loan' },
    { value: 8, label: 'Vacation' },
    { value: 9, label: 'Medical expenses' },
]
</script>

<style scoped>
/* All styling via Tailwind utility classes */
</style>
