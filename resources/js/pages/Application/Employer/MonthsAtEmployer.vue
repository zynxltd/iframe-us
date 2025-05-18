<template>
    <div data-cy="months-at-employer" class="flex gap-2 p-4">
        <label
            v-for="option in options"
            :key="option"
            :data-cy="`months-at-employer-${option}`"
            class="flex-1 flex items-center justify-center px-4 py-2 border rounded-lg cursor-pointer transition-all duration-200"
            :class="modelValue === option
        ? 'bg-black text-white border-transparent shadow'
        : 'bg-white border-gray-300 text-gray-800 hover:bg-gray-100 hover:border-gray-400'"
        >
            <input
                type="radio"
                :value="option"
                v-model="model"
                class="hidden"
            />
            {{ option }}
        </label>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: String,
    options: {
        type: Array,
        required: true
    }
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})
</script>

<style scoped>
/* All styling via Tailwind utility classes */
</style>
