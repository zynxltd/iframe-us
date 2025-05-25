<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Postcode
        </label>
        <input
            data-cy="postcode"
            v-model="model"
            type="text"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="Enter your postcode"
            @input="validatePostcode"
            @blur="validatePostcode"
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

// UK Postcode validation regex
const postcodeRegex = /^([A-Z]{1,2}[0-9]{1,2}[A-Z]?)\s?[0-9][A-Z]{2}$/i

// Validate postcode
const validatePostcode = () => {
    localError.value = ''
    const postcode = (model.value || '').trim()
    if (postcode && !postcodeRegex.test(postcode)) {
        localError.value = 'Please enter a valid UK postcode.'
    }
}
</script>

<style scoped>
/* All styling handled by Tailwind utility classes */
</style>
