<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            Mobile Phone
        </label>
        <input
            data-cy="mobile-phone"
            v-model="model"
            type="text"
            maxlength="11"
            pattern="\d{11}"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 placeholder-gray-400 text-center focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
            placeholder="Enter 11 digit mobile number"
        />
<!--            @input="validateMobile"-->
        <div v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
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
    set: value => emit('update:modelValue', value)
})

const validateMobile = () => {
    model.value = model.value.replace(/\D/g, '')
    if (model.value.length > 11) {
        model.value = model.value.slice(0, 11)
    }
}
</script>

<style scoped>
/* All styling via Tailwind utility classes */
</style>
