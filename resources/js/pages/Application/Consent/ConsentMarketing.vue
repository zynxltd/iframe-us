<template>
    <div class="mb-6">
        <label class="block text-sm font-semibold text-teal-400 mb-2 uppercase tracking-wide">Consent for Marketing</label>
        <div class="grid grid-cols-3 gap-4">
            <!-- SMS Checkbox -->
            <label class="flex items-center space-x-2">
                <input
                    v-model="sms"
                    type="checkbox"
                    class="hidden"
                    @change="updateConsent('sms')"
                />
                <div
                    :class="{'bg-green-500': sms, 'bg-gray-300': !sms}"
                    class="w-6 h-6 rounded-full flex items-center justify-center"
                >
                    <span v-if="sms" class="text-white text-sm">✔</span>
                </div>
                <span class="text-sm text-cyan-300">SMS</span>
            </label>

            <!-- Email Checkbox -->
            <label class="flex items-center space-x-2">
                <input
                    v-model="email"
                    type="checkbox"
                    class="hidden"
                    @change="updateConsent('email')"
                />
                <div
                    :class="{'bg-green-500': email, 'bg-gray-300': !email}"
                    class="w-6 h-6 rounded-full flex items-center justify-center"
                >
                    <span v-if="email" class="text-white text-sm">✔</span>
                </div>
                <span class="text-sm text-cyan-300">Email</span>
            </label>

            <!-- Phone Checkbox -->
            <label class="flex items-center space-x-2">
                <input
                    v-model="phone"
                    type="checkbox"
                    class="hidden"
                    @change="updateConsent('phone')"
                />
                <div
                    :class="{'bg-green-500': phone, 'bg-gray-300': !phone}"
                    class="w-6 h-6 rounded-full flex items-center justify-center"
                >
                    <span v-if="phone" class="text-white text-sm">✔</span>
                </div>
                <span class="text-sm text-cyan-300">Phone</span>
            </label>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const sms = ref(false)
const email = ref(false)
const phone = ref(false)

const updateConsent = (type) => {
    // You can perform additional logic here for storing the consent
    console.log(`${type} consent updated:`, eval(type))
}
</script>

<style scoped>
input[type="checkbox"]:checked {
    background-color: green;
}
</style>
