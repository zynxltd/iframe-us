<template>
    <div class="mb-6 p-4">

        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Transport Expenses
        </label>
        <div data-cy="expense-transport" class="flex gap-3 w-full">
            <label
                v-for="option in options"
                :key="option.value"
                :data-cy="`expense-transport-${option.value}`"
                class="flex-1 flex items-center justify-center px-2 py-3 rounded-lg cursor-pointer border-2 transition-all duration-200"
                :class="model === option.value
          ? 'bg-black text-white border-transparent shadow'
          : 'bg-white border-gray-300 text-gray-800 hover:bg-gray-100 hover:border-gray-400'"
            >
                <input
                    type="radio"
                    :value="option.value"
                    v-model="model"
                    class="hidden"
                />
                <span>{{ option.label }}</span>
            </label>
        </div>
        <div v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: [String, Number],
    error: String,
})
const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value),
})

const options = [
    { label: '£50',  value: 1 },
    { label: '£100', value: 2 },
    { label: '£200', value: 3 },
    { label: '£300+', value: 4 },
]
</script>

<style scoped>
/* All styling handled via Tailwind utility classes */
</style>
