<template>
    <div class="flex gap-2">
        <label
            v-for="option in options"
            :key="option"
            class="flex items-center px-4 py-2 border rounded cursor-pointer hover:bg-blue-100 transition-colors"
            :class="modelValue === option ? 'bg-blue-600 text-white' : 'bg-white text-gray-700'"
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
