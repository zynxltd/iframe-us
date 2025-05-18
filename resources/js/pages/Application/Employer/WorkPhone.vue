<template>
    <div class="mb-6 p-4">

    <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">Home Phone</label>
        <input
            v-model="model"
            type="text"
            class="w-full px-5 py-3 rounded-xl bg-[#ffff] border-2 border-cyan-500 text-black placeholder-cyan-600 text-center focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
            maxlength="11"
            placeholder="Enter 11 digit home phone number"
            @input="validateHomePhone"
        />
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
    set: (value) => emit('update:modelValue', value)
})

const validateHomePhone = () => {
    // Allow only digits
    model.value = model.value.replace(/[^\d]/g, '')

    // Optional: strictly validate the number
    const ukHomePhoneRegex = /^0\d{10}$/
    if (model.value.length === 11 && !ukHomePhoneRegex.test(model.value)) {
        console.warn('Invalid UK home phone format')
    }
}
</script>
