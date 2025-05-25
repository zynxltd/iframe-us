<template>
    <div class="mb-6 p-4">
        <label
            class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide"
        >
            Home Phone
        </label>
        <input
            data-cy="home-phone"
            v-model="formatted"
            type="tel"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 text-center focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="(123) 456-7890"
            @input="onInput"
        />
        <div v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'

const props = defineProps({
    modelValue: String,
    error: String
})
const emit = defineEmits(['update:modelValue'])

// raw digits only
const raw = ref(props.modelValue || '')

// keep raw in sync if parent updates externally
watch(() => props.modelValue, v => {
    raw.value = v || ''
})

// formatted view: (xxx) xxx-xxxx
const formatted = computed({
    get() {
        const digits = raw.value.replace(/\D/g, '').slice(0, 10)
        const part1 = digits.slice(0, 3)
        const part2 = digits.slice(3, 6)
        const part3 = digits.slice(6, 10)
        let out = ''
        if (part1) out += `(${part1}`
        if (part1.length === 3) out += `) `
        if (part2) out += part2
        if (part2.length === 3) out += `-`
        if (part3) out += part3
        return out
    },
    set(val) {
        // strip to 10 digits
        const digits = val.replace(/\D/g, '').slice(0, 10)
        raw.value = digits
        emit('update:modelValue', digits)
    }
})

function onInput(e) {
    // trigger setter
    formatted.value = e.target.value
}
</script>

<style scoped>
/* styling via Tailwind as before */
</style>
