<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            City
        </label>
        <select
            data-cy="city"
            v-model="model"
            @change="validateCity"
            @blur="validateCity"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
        >
            <option value="" disabled>Select a city</option>
            <option
                v-for="city in cities"
                :key="city"
                :value="city"
                :data-cy="`city-${city.replace(/\s+/g, '-').toLowerCase()}`"
            >
                {{ city }}
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

// List of major US cities
const cities = [
    "New York", "Los Angeles", "Chicago", "Houston", "Phoenix", "Philadelphia", "San Antonio", "San Diego", "Dallas",
    "San Jose", "Austin", "Jacksonville", "Fort Worth", "Columbus", "Charlotte", "San Francisco", "Indianapolis",
    "Seattle", "Denver", "Washington", "Boston", "El Paso", "Nashville", "Detroit", "Oklahoma City", "Portland",
    "Las Vegas", "Memphis", "Louisville", "Baltimore", "Milwaukee"
]

// Validate city selection
const validateCity = () => {
    localError.value = ''
    if (!model.value) {
        localError.value = 'Please select a city.'
    }
}
</script>

<style scoped>
/* All styling handled via Tailwind utility classes */
</style>
