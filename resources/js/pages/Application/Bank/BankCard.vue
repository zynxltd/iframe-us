<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-4 uppercase tracking-wide text-center">
            Bank Card
        </label>
        <div class="grid grid-cols-3 gap-4 max-w-xl mx-auto">

        <!-- Visa -->
            <div class="text-center w-full">
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
                    class="w-full cursor-pointer block rounded-xl p-4 bg-[#fff] transition-all duration-300 hover:ring-2 hover:ring-cyan-400"
                    :class="model === 'Visa' ? 'ring-2 ring-cyan-400' : ''"
                >
                    <img src="/images/visa-2.png" alt="Visa" class="w-16 h-16 mx-auto" />
                    <p class="text-neutral-800 text-sm mt-2 font-bold">Visa Debit</p>
                </label>
            </div>

            <!-- Mastercard -->
            <div class="text-center w-full">
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
                    class="w-full cursor-pointer block rounded-xl p-4 bg-[#fff] transition-all duration-300 hover:ring-2 hover:ring-cyan-400"
                    :class="model === 'Mastercard' ? 'ring-2 ring-cyan-400' : ''"
                >
                    <img src="/images/mastercard-2.png" alt="Mastercard" class="w-16 h-16 mx-auto" />
                    <p class="text-neutral-800 text-sm mt-2 font-bold">mastercard</p>
                </label>
            </div>

            <!-- Other -->
            <div class="text-center w-full">
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
                    class="w-full cursor-pointer block rounded-xl p-4 bg-[#fff] transition-all duration-300 hover:ring-2 hover:ring-cyan-400"
                    :class="model === 'Other' ? 'ring-2 ring-cyan-400' : ''"
                >
                    <img src="/images/other-card-form.png" alt="Other" class="w-16 h-16 mx-auto" />
<!--                    <p class="text-neutral-800 text-sm mt-2">Other</p>-->
                </label>
            </div>
        </div>
        <div v-if="error" class="text-pink-500 text-sm mt-4 text-center">{{ error }}</div>
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
