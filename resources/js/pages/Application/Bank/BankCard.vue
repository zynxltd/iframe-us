<template>
    <div data-cy="bank-card" class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-4 uppercase tracking-wide text-center">
            Bank Card
        </label>
        <div class="grid grid-cols-3 gap-4 max-w-xl mx-auto">
            <!-- Visa -->
            <div class="text-center w-full">
                <input
                    type="radio"
                    id="visa"
                    name="bankCard"
                    value=1
                    v-model="model"
                    class="hidden"
                />
                <label
                    for="visa"
                    data-cy="bank-card-1"
                    class="w-full block rounded-lg p-4 bg-white cursor-pointer transition-all duration-200 hover:bg-gray-100"
                    :class="model === '1' ? 'ring-2 ring-black shadow' : 'ring-transparent'"
                >
                    <img src="/images/visa-2.png" alt="Visa" class="w-16 h-16 mx-auto" />
                    <p class="text-gray-800 text-sm mt-2 font-bold">Visa Debit</p>
                </label>
            </div>

            <!-- Mastercard -->
            <div class="text-center w-full">
                <input
                    type="radio"
                    id="mastercard"
                    name="bankCard"
                    value=2
                    v-model="model"
                    class="hidden"
                />
                <label
                    for="mastercard"
                    data-cy="bank-card-2"
                    class="w-full block rounded-lg p-4 bg-white cursor-pointer transition-all duration-200 hover:bg-gray-100"
                    :class="model === '2' ? 'ring-2 ring-black shadow' : 'ring-transparent'"
                >
                    <img src="/images/mastercard-2.png" alt="Mastercard" class="w-16 h-16 mx-auto" />
                    <p class="text-gray-800 text-sm mt-2 font-bold">Mastercard</p>
                </label>
            </div>

            <!-- Other -->
            <div class="text-center w-full">
                <input
                    type="radio"
                    id="other"
                    name="bankCard"
                    value=3
                    v-model="model"
                    class="hidden"
                />
                <label
                    for="other"
                    data-cy="bank-card-3"
                    class="w-full block rounded-lg p-4 bg-white cursor-pointer transition-all duration-200 hover:bg-gray-100"
                    :class="model === '3' ? 'ring-2 ring-black shadow' : 'ring-transparent'"
                >
                    <img src="/images/other-card-form.png" alt="Other" class="w-16 h-16 mx-auto" />
                </label>
            </div>
        </div>
        <div v-if="error" class="text-red-500 text-sm mt-4 text-center">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue'

const props = defineProps({
    modelValue: [String, Number],
    error: String,
})

const emit = defineEmits(['update:modelValue'])

const model = ref(props.modelValue || '')

watch(model, newValue => {
    emit('update:modelValue', newValue)
})
</script>

<style scoped>
/* All styling handled via Tailwind utility classes */
</style>
