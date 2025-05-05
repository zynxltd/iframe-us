<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">
            Residnetial Status
        </label>
        <div class="grid grid-cols-3 gap-3 w-full">
            <label
                v-for="option in options"
                :key="option.value"
                class="flex items-center justify-center text-center text-xs font-medium  h-14 w-full px-2 py-3 rounded-xl cursor-pointer border-2 transition-all duration-300"
                :class="model === option.value
                    ? 'bg-gradient-to-r from-cyan-400 to-purple-500 text-white border-transparent shadow-lg'
                    : 'bg-white border-cyan-500 text-black hover:bg-cyan-600 hover:text-white hover:border-purple-400'"
            >
                <input
                    type="radio"
                    :value="option.value"
                    v-model="model"
                    class="hidden"
                />
                <span class="w-full">{{ option.label }}</span>
            </label>
        </div>
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

const options = [
    { value: 1, label: 'Homeowner' },
    { value: 2, label: 'Private tenant' },
    { value: 3, label: 'Living with family' },
    { value: 4, label: 'Living with partner' },
    { value: 5, label: 'Council tenant' },
    { value: 6, label: 'Other' },
]

</script>

<style scoped>
/* Optional styling for the labels to ensure full width */
label {
    flex: 1;
}
</style>
