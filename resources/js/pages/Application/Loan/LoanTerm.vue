<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Loan Term
        </label>
        <div data-cy="loan-term" class="grid grid-cols-3 gap-4">
            <label
                v-for="term in terms"
                :key="term.value"
                :data-cy="`loan-term-${term.value}`"
                class="flex items-center justify-center text-center text-xs font-medium h-14 w-full px-2 py-3 rounded-lg cursor-pointer border-2 transition-all duration-200"
                :class="modelValue === term.value
          ? 'bg-black text-white border-transparent shadow'
          : 'bg-white border-gray-300 text-gray-800 hover:bg-gray-100 hover:border-gray-400'"
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
        <div v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
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
    set: value => emit('update:modelValue', value)
})

// Loan term options
const terms = [
    { value: 1,  label: '1 month' },
    { value: 2,  label: '2 months' },
    { value: 3,  label: '3 months' },
    { value: 4,  label: '6 months' },
    { value: 5,  label: '9 months' },
    { value: 6,  label: '12 months' }
]
</script>

<style scoped>
/* all styling via Tailwind utility classes */
</style>
