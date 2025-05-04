<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Bank Sort Code</label>
        <div class="grid grid-cols-3 gap-2">
            <!-- First input field (First 2 digits) -->
            <input
                v-model="firstPart"
                type="text"
                maxlength="2"
                class="w-full px-5 py-3 rounded-xl bg-[#fff] border-2 border-cyan-500 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
                placeholder="XX"
                @input="formatSortCode"
                :class="{'border-red-500': localError}"
            />

            <!-- Second input field (Second 2 digits) -->
            <input
                v-model="secondPart"
                type="text"
                maxlength="2"
                class="w-full px-5 py-3 rounded-xl bg-[#fff] border-2 border-cyan-500 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
                placeholder="XX"
                @input="formatSortCode"
                :class="{'border-red-500': localError}"
            />

            <!-- Third input field (Last 2 digits) -->
            <input
                v-model="thirdPart"
                type="text"
                maxlength="2"
                class="w-full px-5 py-3 rounded-xl bg-[#fff] border-2 border-cyan-500 text-black placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
                placeholder="XX"
                @input="formatSortCode"
                :class="{'border-red-500': localError}"
            />
        </div>
        <div v-if="localError" class="text-pink-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
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

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value),
})

const localError = ref('')

// Split model value into parts (3 segments for the sort code)
const firstPart = ref('')
const secondPart = ref('')
const thirdPart = ref('')

// Watch the parts and update the model value
watch([firstPart, secondPart, thirdPart], () => {
    model.value = `${firstPart.value}-${secondPart.value}-${thirdPart.value}`
})

// Format the sort code input
const formatSortCode = () => {
    localError.value = ''
    let first = firstPart.value.replace(/\D/g, '').slice(0, 2)
    let second = secondPart.value.replace(/\D/g, '').slice(0, 2)
    let third = thirdPart.value.replace(/\D/g, '').slice(0, 2)

    firstPart.value = first
    secondPart.value = second
    thirdPart.value = third

    // Validate if all parts are 2 digits long
    if (first.length === 2 && second.length === 2 && third.length === 2) {
        const sortCode = `${first}-${second}-${third}`
        if (!/^\d{2}-\d{2}-\d{2}$/.test(sortCode)) {
            localError.value = 'Please enter a valid sort code in the format XX-XX-XX.'
        }
    }
}
</script>

<style scoped>
input {
    outline: none;
}
</style>
