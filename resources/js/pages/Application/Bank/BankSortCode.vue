<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Bank Sort Code
        </label>
        <div class="grid grid-cols-3 gap-2 w-full">
            <!-- First 2 digits -->
            <input
                data-cy="bank-sortcode-part1"
                v-model="firstPart"
                type="text"
                maxlength="2"
                class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 text-center focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
                placeholder="XX"
                @input="formatSortCode"
                :class="{ 'border-red-500': localError }"
            />

            <!-- Second 2 digits -->
            <input
                data-cy="bank-sortcode-part2"
                v-model="secondPart"
                type="text"
                maxlength="2"
                class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 text-center focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
                placeholder="XX"
                @input="formatSortCode"
                :class="{ 'border-red-500': localError }"
            />

            <!-- Last 2 digits -->
            <input
                data-cy="bank-sortcode-part3"
                v-model="thirdPart"
                type="text"
                maxlength="2"
                class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 text-center focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
                placeholder="XX"
                @input="formatSortCode"
                :class="{ 'border-red-500': localError }"
            />
        </div>
        <div v-if="localError" class="text-red-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'

// Props
const props = defineProps({
    modelValue: String,
    error: String,
})

const emit = defineEmits(['update:modelValue'])

// Split modelValue into three parts
const firstPart  = ref('')
const secondPart = ref('')
const thirdPart  = ref('')

const localError = ref('')

// Sync combined parts back to modelValue
watch([firstPart, secondPart, thirdPart], () => {
    emit('update:modelValue', `${firstPart.value}${secondPart.value}${thirdPart.value}`)
})

// Format & validate each input
const formatSortCode = () => {
    localError.value = ''

    firstPart.value  = firstPart.value.replace(/\D/g, '').slice(0, 2)
    secondPart.value = secondPart.value.replace(/\D/g, '').slice(0, 2)
    thirdPart.value  = thirdPart.value.replace(/\D/g, '').slice(0, 2)

    if (
        firstPart.value.length === 2 &&
        secondPart.value.length === 2 &&
        thirdPart.value.length === 2
    ) {
        const formatted = `${firstPart.value}-${secondPart.value}-${thirdPart.value}`
        if (!/^\d{2}-\d{2}-\d{2}$/.test(formatted)) {
            localError.value = 'Please enter a valid sort code in the format XX-XX-XX.'
        }
    }
}
</script>

<style scoped>
/* All styling via Tailwind utility classes */
</style>
