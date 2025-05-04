<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Select your title</label>
        <div class="flex gap-3 w-full">
            <label
                v-for="option in options"
                :key="option"
                class="flex items-center justify-center px-5 py-3 rounded-xl cursor-pointer border-2 transition-all duration-300 w-full"
                :class="modelValue === option
                    ? 'bg-gradient-to-r from-cyan-400 to-purple-500 text-white border-transparent shadow-lg'
                    : 'bg-[#fffff] border-cyan-500 text-black-300 hover:bg-cyan-600 hover:text-white hover:border-purple-400'"
            >
                <input
                    type="radio"
                    :value="option"
                    v-model="model"
                    class="hidden"
                />
                {{ option }}
            </label>
        </div>
        <div v-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: String,
    error: String
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

const options = ['Mr', 'Mrs', 'Miss', 'Ms']
</script>

<style scoped>
/* Optional styling for the labels to ensure full width */
label {
    flex: 1;
}
</style>
