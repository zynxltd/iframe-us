<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Employment Status</label>
        <div class="grid grid-cols-3 gap-3">
            <label
                v-for="option in options"
                :key="option.value"
                class="flex items-center justify-center px-5 py-3 rounded-xl cursor-pointer border-2 transition-all duration-300"
                :class="model === option.value
                    ? 'bg-gradient-to-r from-cyan-400 to-purple-500 text-white border-transparent shadow-lg'
                    : 'bg-[#ffff] border-cyan-500 text-black-300 hover:bg-cyan-600 hover:text-white hover:border-purple-400'"
            >
                <input
                    type="radio"
                    :value="option.value"
                    v-model="model"
                    class="hidden"
                />
                {{ option.label }}
            </label>
        </div>
        <div v-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: String,
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value),
})

const options = [
    { label: 'Full time', value: 'Full time' },
    { label: 'Part time', value: 'Part time' },
    { label: 'Self employed', value: 'Self employed' },
    { label: 'Benefits', value: 'Benefits' },
    { label: 'Disability', value: 'Disability' },
    { label: 'Unemployed', value: 'Unemployed' },
]
</script>

<style scoped>
/* Optional styling for labels */
label {
    word-wrap: break-word;
}
</style>
