<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Bank Card</label>
        <div class="flex space-x-6">
            <div class="text-center">
                <input
                    type="radio"
                    id="visa"
                    name="bankCard"
                    value="Visa"
                    v-model="model"
                    class="hidden"
                />
                <label
                    for="visa"
                    class="cursor-pointer block rounded-xl p-3 bg-[#fff] transition-all duration-300 hover:ring-2 hover:ring-cyan-400"
                    :class="model === 'Visa' ? 'ring-2 ring-cyan-400' : ''"
                >
                    <img
                        src="/path/to/visa-logo.png"
                        alt="Visa"
                        class="w-16 h-16 mx-auto"
                    />
                    <p class="text-cyan-300 text-sm mt-2">Visa</p>
                </label>
            </div>

            <div class="text-center">
                <input
                    type="radio"
                    id="mastercard"
                    name="bankCard"
                    value="Mastercard"
                    v-model="model"
                    class="hidden"
                />
                <label
                    for="mastercard"
                    class="cursor-pointer block rounded-xl p-3 bg-[#fff] transition-all duration-300 hover:ring-2 hover:ring-cyan-400"
                    :class="model === 'Mastercard' ? 'ring-2 ring-cyan-400' : ''"
                >
                    <img
                        src="/images/mastercard-logo.png"
                        alt="Mastercard"
                        class="w-16 h-16 mx-auto"
                    />
                    <p class="text-cyan-300 text-sm mt-2">Mastercard</p>
                </label>
            </div>

            <div class="text-center">
                <input
                    type="radio"
                    id="other"
                    name="bankCard"
                    value="Other"
                    v-model="model"
                    class="hidden"
                />
                <label
                    for="other"
                    class="cursor-pointer block rounded-xl p-3 bg-[#fff] transition-all duration-300 hover:ring-2 hover:ring-cyan-400"
                    :class="model === 'Other' ? 'ring-2 ring-cyan-400' : ''"
                >
                    <img
                        src="/images/other-card-logo.png"
                        alt="Other"
                        class="w-16 h-16 mx-auto"
                    />
                    <p class="text-cyan-300 text-sm mt-2">Other</p>
                </label>
            </div>
        </div>
        <div v-if="error" class="text-pink-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue'

const props = defineProps({
    modelValue: String,
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = ref(props.modelValue || '')

watch(model, (newValue) => {
    emit('update:modelValue', newValue)
})
</script>

<style scoped>
/* No extra styles needed, all handled via Tailwind */
</style>
