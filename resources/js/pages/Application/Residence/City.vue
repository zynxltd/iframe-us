<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">City</label>
        <select
            v-model="model"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#fff] p-3 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
        >
            <option value="" disabled>Select a city</option>
            <option v-for="city in cities" :key="city" :value="city">
                {{ city }}
            </option>
        </select>
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

// List of UK cities
const cities = [
    "Aberdeen", "Belfast", "Birmingham", "Bradford", "Brighton", "Bristol", "Cambridge", "Cardiff", "Carlisle",
    "Coventry", "Derby", "Dundee", "Edinburgh", "Glasgow", "Hull", "Inverness", "Leeds", "Leicester", "Liverpool",
    "London", "Manchester", "Newcastle upon Tyne", "Norwich", "Nottingham", "Oxford", "Plymouth", "Portsmouth",
    "Reading", "Sheffield", "Southampton", "Stoke-on-Trent", "Sunderland", "Wolverhampton", "York"
]
</script>

<style scoped>
/* select styling already handled inline */
</style>
