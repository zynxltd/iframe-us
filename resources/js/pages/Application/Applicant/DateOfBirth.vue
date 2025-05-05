<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-neutral-800 mb-2 uppercase tracking-wide">Date of Birth</label>
        <div class="grid grid-cols-3 gap-3">
            <!-- Day -->
            <input
                v-model="day"
                type="number"
                max="31"
                min="1"
                class="w-full px-5 py-3 rounded-xl bg-[#ffff] border-2 border-cyan-500 text-black text-center placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
                placeholder="DD"
            />
            <!-- Month -->
            <input
                v-model="month"
                type="number"
                max="12"
                min="1"
                class="w-full px-5 py-3 rounded-xl bg-[#ffff] border-2 border-cyan-500 text-black text-center placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
                placeholder="MM"
            />
            <!-- Year -->
            <input
                v-model="year"
                type="number"
                class="w-full px-5 py-3 rounded-xl bg-[#ffff] border-2 border-cyan-500 text-black text-center placeholder-cyan-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
                placeholder="YYYY"
            />
        </div>

        <div class="flex justify-between mt-2">
            <div v-if="error" class="text-pink-500 text-sm">{{ error }}</div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    modelValue: [String, Number],
    error: String
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

const day = computed({
    get: () => model.value?.split('/')[0] || '',
    set: (value) => {
        const newValue = `${value || ''}/${month.value || ''}/${year.value || ''}`
        emit('update:modelValue', newValue)
    }
})

const month = computed({
    get: () => model.value?.split('/')[1] || '',
    set: (value) => {
        const newValue = `${day.value || ''}/${value || ''}/${year.value || ''}`
        emit('update:modelValue', newValue)
    }
})

const year = computed({
    get: () => model.value?.split('/')[2] || '',
    set: (value) => {
        const newValue = `${day.value || ''}/${month.value || ''}/${value || ''}`
        emit('update:modelValue', newValue)
    }
})
</script>
