<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Mobile Phone</label>
        <input
            v-model="model"
            type="text"
            maxlength="11"
            pattern="\d{11}"
            class="w-full px-5 py-3 rounded-xl bg-[#fff] border-2 border-cyan-500 text-black placeholder-cyan-600 text-center focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
            placeholder="Enter 11 digit mobile number"
            @input="validateMobile"
        />
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

const validateMobile = () => {
    // Allow only numbers and prevent anything else
    model.value = model.value.replace(/[^\d]/g, '')
    if (model.value.length > 11) {
        model.value = model.value.slice(0, 11)
    }
}
</script>
