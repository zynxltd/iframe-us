<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">Years with Employer</label>
        <select
            v-model="model"
            class="w-full rounded-xl border-2 border-cyan-500 bg-[#fff] p-3 text-black focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-purple-500 transition-all duration-300"
        >
            <option disabled value="">Select years</option>
            <option
                v-for="year in years"
                :key="year"
                :value="year"
                class="bg-[#fff] text-cyan-300"
            >
                {{ year }} year{{ year > 1 ? 's' : '' }}
            </option>
        </select>
        <div v-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: [String, Number],
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value),
})

const years = Array.from({ length: 11 }, (_, i) => i + 1)
</script>

<style scoped>
/* All styling handled by Tailwind */
</style>
