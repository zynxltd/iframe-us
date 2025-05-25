<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            State
        </label>
        <select
            data-cy="state"
            v-model="model"
            @change="validateState"
            @blur="validateState"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
        >
            <option value="" disabled>Select a state</option>
            <option
                v-for="state in states"
                :key="state"
                :value="state"
                :data-cy="`state-${state.replace(/\s+/g, '-').toLowerCase()}`"
            >
                {{ state }}
            </option>
        </select>
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

// List of US states
const states = [
    "Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut",
    "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa",
    "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan",
    "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire",
    "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio",
    "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota",
    "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia",
    "Wisconsin", "Wyoming"
]

// Validate state selection
const validateState = () => {
    localError.value = ''
    if (!model.value) {
        localError.value = 'Please select a state.'
    }
}
</script>

<style scoped>
/* All styling handled via Tailwind utility classes */
</style>
