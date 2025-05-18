<template>
    <div class="mb-6 p-4">
        <label class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
            County
        </label>
        <select
            data-cy="county"
            v-model="model"
            @change="validateCounty"
            @blur="validateCounty"
            class="w-full px-4 py-2 rounded-lg bg-white border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all duration-200"
        >
            <option value="" disabled>Select a county</option>
            <option
                v-for="county in counties"
                :key="county"
                :value="county"
                :data-cy="`county-${county.replace(/\s+/g, '-').toLowerCase()}`"
            >
                {{ county }}
            </option>
        </select>
        <div v-if="localError" class="text-red-500 text-sm mt-2">{{ localError }}</div>
        <div v-else-if="error" class="text-red-500 text-sm mt-2">{{ error }}</div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'

// Props
const props = defineProps({
    modelValue: String,
    error: String,
})
const emit = defineEmits(['update:modelValue'])

const model = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value),
})

const localError = ref('')

// List of UK counties
const counties = [
    "Aberdeen", "Aberdeenshire", "Angus", "Argyll and Bute", "Armagh", "Bedfordshire", "Belfast", "Berkshire",
    "Berwickshire", "Blaenau Gwent", "Bridgend", "Bristol", "Buckinghamshire", "Caernarfonshire", "Cambridgeshire",
    "Cardiganshire", "Carmarthenshire", "Ceredigion", "Cheshire", "Clwyd", "Conwy", "Cornwall", "Cumbria", "Denbighshire",
    "Derbyshire", "Derry", "Derry City and Strabane", "Devon", "Dorset", "Down", "Dumfries and Galloway", "Durham",
    "Dyfed", "East Lothian", "East Riding of Yorkshire", "East Sussex", "Essex", "Fermanagh", "Flintshire", "Gloucestershire",
    "Greater Manchester", "Gwynedd", "Hampshire", "Hertfordshire", "Highland", "Humberside", "Isle of Anglesey", "Isle of Wight",
    "Kent", "Kildare", "Kilkenny", "Lancashire", "Leicestershire", "Lincolnshire", "London", "Lothian", "Merseyside", "Middlesex",
    "Monmouthshire", "Moray", "Northern Ireland", "North Ayrshire", "North Yorkshire", "Nottinghamshire", "Pembrokeshire",
    "Perthshire", "Peterborough", "Powys", "Renfrewshire", "Rutland", "Shropshire", "Somerset", "South Ayrshire", "South Lanarkshire",
    "South Yorkshire", "Stirling", "Suffolk", "Surrey", "Tyne and Wear", "Warwickshire", "West Lothian", "West Midlands", "West Sussex",
    "West Yorkshire", "Westmeath", "Wexford", "Wiltshire", "Worcestershire", "Wrexham", "York"
]

// Validate county selection
const validateCounty = () => {
    localError.value = ''
    if (!model.value) {
        localError.value = 'Please select a county.'
    }
}
</script>

<style scoped>
/* All styling handled via Tailwind utility classes */
</style>
