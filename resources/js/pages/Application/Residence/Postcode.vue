<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Postcode</label>
        <input
            v-model="model"
            type="text"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#ffff] p-3 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
            placeholder="Enter your postcode"
            @input="validatePostcode"
        />
        <div v-if="localError" class="text-pink-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
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
    set: (value) => emit('update:modelValue', value),
})

const localError = ref('')

// UK Postcode validation regex
const postcodeRegex = /^([A-Z]{1,2}[0-9]{1,2}[A-Z]?)\s?[0-9][A-Z]{2}$/i

// Validate postcode
const validatePostcode = () => {
    localError.value = ''
    const postcode = model.value.trim()

    if (postcode && !postcode.match(postcodeRegex)) {
        localError.value = 'Please enter a valid UK postcode.'
    }
}
</script>

<style scoped>
/* Styling handled inline in template */
</style>
