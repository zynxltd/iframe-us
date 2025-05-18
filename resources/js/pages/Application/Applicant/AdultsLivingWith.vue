<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            How many adults live with you?
        </label>
        <div data-cy="adults-living-with" class="flex gap-3 w-full">
            <label
                v-for="option in options"
                :key="option.value"
                :data-cy="`adults-living-with-${option.value}`"
                class="flex-1 flex items-center justify-center text-center text-xs font-medium h-14 px-2 py-3 rounded-lg cursor-pointer border-2 transition-all duration-200"
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
                <span class="text-sm">{{ option.label }}</span>
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
    set: (value) => emit('update:modelValue', value),
})

const options = [
    { label: 'None', value: 1 },
    { label: '1',    value: 2    },
    { label: '2',    value: 3    },
    { label: '3+',   value: 4    },
]
</script>

<style scoped>
/* All styling via Tailwind utility classes */
</style>
