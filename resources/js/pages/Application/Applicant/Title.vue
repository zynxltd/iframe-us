<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Select your title
        </label>
        <div data-cy="title" class="flex gap-3 w-full">
            <label
                v-for="option in options"
                :key="option.value"
                :data-cy="`title-${option.value}`"
                class="flex-1 flex items-center justify-center px-5 py-3 rounded-lg cursor-pointer border-2 transition-all duration-200"
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
                {{ option.label }}
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

// now using numeric values 1–4, with labels
const options = [
    { value: 1, label: 'Mr'   },
    { value: 2, label: 'Mrs'  },
    { value: 3, label: 'Miss' },
    { value: 4, label: 'Ms'   },
]
</script>

<style scoped>
/* All styling via Tailwind utility classes */
</style>
