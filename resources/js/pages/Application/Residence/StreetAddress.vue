<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Street Address
        </label>
        <input
            data-cy="street-address"
            v-model="model"
            type="text"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="Enter your street address"
            @input="validateStreetAddress"
            @blur="validateStreetAddress"
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

// Street address validation (letters, numbers, spaces, hyphens, commas, periods)
const validateStreetAddress = () => {
    localError.value = ''
    const streetAddress = model.value || ''
    const regex = /^[a-zA-Z0-9\s\-,\.]+$/
    if (streetAddress && !regex.test(streetAddress)) {
        localError.value = 'Please enter a valid street address.'
    }
}
</script>

<style scoped>
/* All styling via Tailwind utility classes */
</style>
