<template>
    <div class="mb-6 p-4">
        <label
            class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide"
        >
            ZIP Code
        </label>
        <input
            data-cy="zip-code"
            v-model="model"
            type="text"
            maxlength="10"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="Enter your ZIP code"
            @input="validateZipcode"
            @blur="validateZipcode"
        />
        <div v-if="localError" class="text-red-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'

// Props
const props = defineProps({
    modelValue: String,
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value),
})

const localError = ref('')

// U.S. ZIP code regex: 5 digits or 5+4 (e.g. 12345 or 12345-6789)
const zipRegex = /^\d{5}(?:-\d{4})?$/

const validateZipcode = () => {
    localError.value = ''
    const zip = (model.value || '').trim()
    if (zip && !zipRegex.test(zip)) {
        localError.value = 'Please enter a valid ZIP code (e.g. 12345 or 12345-6789).'
    }
}
</script>

<style scoped>
/* All styling via Tailwind utility classes */
</style>
