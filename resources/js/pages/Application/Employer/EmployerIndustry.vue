<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">Employer Industry</label>
        <select
            v-model="model"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#fff] p-3 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
        >
            <option disabled value="">Select industry</option>
            <option
                v-for="option in options"
                :key="option"
                :value="option"
            >
                {{ option }}
            </option>
        </select>
        <div v-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: String,
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value),
})

const options = [
    'Health',
    'Accounting',
    'Marketing',
    'Professional',
    'Other',
]
</script>
