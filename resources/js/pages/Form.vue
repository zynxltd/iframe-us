<template>
    <div class="max-w-xl mx-auto py-10 bg-transparent">
        <form @submit.prevent="submit" class="space-y-6">

            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="relative pt-1">
                    <div class="flex mb-2 items-center justify-between">
                        <span class="text-sm font-semibold text-teal-400">Step {{ currentStep }} / 6</span>
                    </div>
                    <div class="flex mb-2">
                        <div
                            class="w-full bg-gray-300 rounded-full"
                            style="height: 12px; border-radius: 20px"
                        >
                        <div
                            class="bg-cyan-400 h-full rounded-full"
                            :style="{ width: (currentStep / 6) * 100 + '%' }"
                        ></div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Step 1: Loan Information -->
            <div v-if="currentStep === 1">
                <LoanAmount
                    v-model="form.LoanAmount"
                    :error="form.errors.LoanAmount"
                    @blur="form.touched.LoanAmount = true"
                />
                <LoanTerm
                    v-model="form.LoanTerm"
                    :error="form.errors.LoanTerm"
                    @blur="form.touched.LoanTerm = true"
                />
                <LoanPurpose
                    v-model="form.LoanPurpose"
                    :error="form.errors.LoanPurpose"
                    @blur="form.touched.LoanPurpose = true"
                />
            </div>

            <!-- Step 2: Personal Details -->
            <div v-if="currentStep === 2">
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Your details</h2>
                <Title v-model="form.Title" :error="form.errors.Title" />
                <FirstName v-model="form.FirstName" :error="form.errors.FirstName" />
                <LastName v-model="form.LastName" :error="form.errors.LastName" />
                <DateOfBirth v-model="form.DateOfBirth" :error="form.errors.DateOfBirth" />
                <Email v-model="form.Email" :error="form.errors.Email" />
                <MobilePhone v-model="form.MobilePhone" :error="form.errors.MobilePhone" />
                <HomePhone v-model="form.HomePhone" :error="form.errors.HomePhone" />
                <Dependants v-model="form.Dependants" :error="form.errors.Dependants" />
            </div>

            <!-- Step 3: Employer Details -->
            <div v-if="currentStep === 3">
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Your Employer</h2>
                <EmploymentStatus v-model="form.EmploymentStatus" :error="form.errors.EmploymentStatus" />
                <EmployerName v-model="form.EmployerName" :error="form.errors.EmployerName" />
                <JobTitle v-model="form.JobTitle" :error="form.errors.JobTitle" />
                <EmployerIndustry v-model="form.EmployerIndustry" :error="form.errors.EmployerIndustry" />
                <EmployerYears v-model="form.EmployerYears" :error="form.errors.EmployerYears" />
                <NextPayDate v-model="form.NextPayDate" :error="form.errors.NextPayDate" />
                <FollowingPayDate v-model="form.FollowingPayDate" :error="form.errors.FollowingPayDate" />
            </div>

            <!-- Step 4: Address Details -->
            <div v-if="currentStep === 4">
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Your Address</h2>
                <HouseNameNumber v-model="form.HouseNameNumber" :error="form.errors.HouseNameNumber" />
                <StreetAddress v-model="form.StreetAddress" :error="form.errors.StreetAddress" />
                <County v-model="form.County" :error="form.errors.County" />
                <City v-model="form.City" :error="form.errors.City" />
                <Postcode v-model="form.Postcode" :error="form.errors.Postcode" />
                <AddressYears v-model="form.AddressYears" :error="form.errors.AddressYears" />
            </div>

            <!-- Step 5: Monthly Expenses -->
            <div v-if="currentStep === 5">
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Your Monthly Expenses</h2>
<!--                <Transport v-model="form.ExpenseTransport" :error="form.errors.ExpenseTransport" />-->
                <Food v-model="form.ExpenseFood" :error="form.errors.ExpenseFood" />
                <Credit v-model="form.ExpenseCredit" :error="form.errors.ExpenseCredit" />
                <Council v-model="form.ExpenseCouncil" :error="form.errors.ExpenseCouncil" />
                <Other v-model="form.ExpenseOther" :error="form.errors.ExpenseOther" />
            </div>

            <!-- Step 6: Additional Information -->
            <div v-if="currentStep === 6">
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Last bit...?</h2>
                <p class="text-xl font-bold text-cyan-300 border-2 border-cyan-500 rounded-xl px-5 py-3 mb-6 shadow-md transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                    We need these details to deposit the funds and verify.
                </p>

                <BankCard v-model="form.BankCard" :error="form.errors.BankCard" />
                <BankAccountNumber v-model="form.BankAccountNumber" :error="form.errors.BankAccountNumber" />
                <BankSortCode v-model="form.BankSortCode" :error="form.errors.BankSortCode" />
                <ConsentMarketing v-model="form.ConsentMarketing" :error="form.errors.ConsentMarketing" />
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between">
                <!-- Previous Button -->
                <button v-if="currentStep > 1" @click="prevStep" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">
                    Previous
                </button>

                <!-- Next Button -->
                <button
                    v-if="currentStep < 6"
                    @click="nextStep"
                    class="px-6 py-3 bg-cyan-400 text-white rounded-md hover:bg-cyan-600 transition-all duration-300"
                    :class="{'ml-auto': currentStep === 1}"
                    :disabled="!isStepValid"
                >
                    Next
                </button>

                <!-- Submit Button -->
                <button
                    v-if="currentStep === 6"
                    type="submit"
                    @click="submitApplication"
                    :disabled="!isStepValid"
                    class="px-4 py-2 bg-gradient-to-r from-cyan-400 to-purple-500 text-white rounded-md hover:bg-cyan-600"
                >
                    Submit
                </button>
            </div>

        </form>
    </div>
</template>


<script setup>
import {computed, reactive, ref, watch} from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import Title from "@/pages/Application/Applicant/Title.vue";
import FirstName from "@/pages/Application/Applicant/FirstName.vue";
import LastName from "@/pages/Application/Applicant/LastName.vue";
import LoanTerm from "@/pages/Application/Loan/LoanTerm.vue";
import LoanPurpose from "@/pages/Application/Loan/LoanPurpose.vue";
import DateOfBirth from "@/pages/Application/Applicant/DateOfBirth.vue";
import LoanAmount from "@/pages/Application/Loan/LoanAmount.vue";
import MobilePhone from "@/pages/Application/Applicant/MobilePhone.vue";
import HomePhone from "@/pages/Application/Applicant/HomePhone.vue";
import Dependants from "@/pages/Application/Applicant/Dependants.vue";
import Email from "@/pages/Application/Applicant/Email.vue";
import EmploymentStatus from "@/pages/Application/Employer/EmploymentStatus.vue";
import EmployerName from "@/pages/Application/Employer/EmployerName.vue";
import JobTitle from "@/pages/Application/Employer/JobTitle.vue";
import EmployerIndustry from "@/pages/Application/Employer/EmployerIndustry.vue";
import EmployerYears from "@/pages/Application/Employer/EmployerYears.vue";
import AddressYears from "@/pages/Application/Employer/AddressYears.vue";
import NextPayDate from "@/pages/Application/Employer/NextPayDate.vue";
import FollowingPayDate from "@/pages/Application/Employer/FollowingPayDate.vue";
import StreetAddress from "@/pages/Application/Residence/StreetAddress.vue";
import HouseNameNumber from "@/pages/Application/Residence/HouseNameNumber.vue";
import County from "@/pages/Application/Residence/County.vue";
import City from "@/pages/Application/Residence/City.vue";
import Postcode from "@/pages/Application/Residence/Postcode.vue";
import Transport from "@/pages/Application/Expense/Transport.vue";
import Credit from "@/pages/Application/Expense/Credit.vue";
import Food from "@/pages/Application/Expense/Food.vue";
import Council from "@/pages/Application/Expense/Council.vue";
import Other from "@/pages/Application/Expense/Other.vue";
import BankCard from "@/pages/Application/Bank/BankCard.vue";
import BankAccountNumber from "@/pages/Application/Bank/BankAccountNumber.vue";
import BankSortCode from "@/pages/Application/Bank/BankSortCode.vue";
import ConsentMarketing from "@/pages/Application/Consent/ConsentMarketing.vue";

const currentStep = ref(1)
const nextStep = () => {
    // Ensure that isStepValid is accessed correctly
    if (isStepValid.value) {
        // Scroll to the top of the form
        const formElement = document.getElementById('form'); // Assuming the form has an ID 'form'
        if (formElement) {
            formElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // Move to the next step if not the last step
        if (currentStep.value < 6) {
            currentStep.value++;
        }
    }
}
const prevStep = () => {
    if (currentStep.value > 1) {
        currentStep.value--
    }
}
const form = useForm({
    LoanAmount: localStorage.getItem('LoanAmount') || '',
    LoanTerm: localStorage.getItem('LoanTerm') || '',
    LoanPurpose: localStorage.getItem('LoanPurpose') || '',

    Title: localStorage.getItem('Title') || '',
    FirstName: localStorage.getItem('FirstName') || '',
    LastName: localStorage.getItem('LastName') || '',
    DateOfBirth: localStorage.getItem('DateOfBirth') || '',
    MobilePhone: localStorage.getItem('MobilePhone') || '',
    HomePhone: localStorage.getItem('HomePhone') || '',
    Email: localStorage.getItem('Email') || '',
    Dependants: localStorage.getItem('Dependants') || '',

    EmploymentStatus: localStorage.getItem('EmploymentStatus') || '',
    EmployerName: localStorage.getItem('EmployerName') || '',
    JobTitle: localStorage.getItem('JobTitle') || '',
    EmployerIndustry: localStorage.getItem('EmployerIndustry') || '',
    EmployerYears: localStorage.getItem('EmployerYears') || '',
    NextPayDate: localStorage.getItem('NextPayDate') || '',
    FollowingPayDate: localStorage.getItem('FollowingPayDate') || '',

    HouseNameNumber: localStorage.getItem('HouseNameNumber') || '',
    StreetAddress: localStorage.getItem('StreetAddress') || '',
    County: localStorage.getItem('County') || '',
    City: localStorage.getItem('City') || '',
    Postcode: localStorage.getItem('Postcode') || '',
    AddressYears: localStorage.getItem('AddressYears') || '',

    ExpenseTransport: localStorage.getItem('ExpenseTransport') || '',
    ExpenseFood: localStorage.getItem('ExpenseFood') || '',
    ExpenseCredit: localStorage.getItem('ExpenseCredit') || '',
    ExpenseCouncil: localStorage.getItem('ExpenseCouncil') || '',
    ExpenseOther: localStorage.getItem('ExpenseOther') || '',

    BankCard: localStorage.getItem('BankCard') || '',
    BankAccountNumber: localStorage.getItem('BankAccountNumber') || '',
    BankSortCode: localStorage.getItem('BankSortCode') || '',
    ConsentMarketing: localStorage.getItem('ConsentMarketing') || '',

    touched: {
        LoanAmount: false,
        LoanTerm: false,
        LoanPurpose: false
    },
    // errors: {
    //     LoanAmount: '',
    //     LoanTerm: '',
    //     LoanPurpose: ''
    // },

})
// Function to save form data to local storage whenever it changes
const saveFormToLocalStorage = () => {
    Object.keys(form).forEach(key => {
        localStorage.setItem(key, form[key])
    })
}
// Watch for changes in form and save to local storage
watch(form, saveFormToLocalStorage, { deep: true })




// Validation
// Form Validation for Step 1
const isStep1Valid = computed(() => {
    // Reset errors only if the user tries to progress
    let valid = true

    // Validate LoanAmount
    if (!form.LoanAmount && form.touched.LoanAmount) {
        form.errors.LoanAmount = 'Loan amount is required.'
        valid = false
    }

    // Validate LoanTerm
    if (!form.LoanTerm && form.touched.LoanTerm) {
        form.errors.LoanTerm = 'Loan term is required.'
        valid = false
    }

    // Validate LoanPurpose
    if (!form.LoanPurpose && form.touched.LoanPurpose) {
        form.errors.LoanPurpose = 'Loan purpose is required.'
        valid = false
    }

    return valid
})
// Validation for Step 2: (Applicant)
const isStep2Valid = computed(() => {
    form.errors.Title = ''
    form.errors.FirstName = ''
    form.errors.LastName = ''
    form.errors.DateOfBirth = ''
    form.errors.Email = ''
    form.errors.MobilePhone = ''
    form.errors.HomePhone = ''
    form.errors.Dependants = ''

    let valid = true

    // Validate Title
    if (!form.Title) {
        form.errors.Title = 'Title is required.'
        valid = false
    }

    const firstNamePattern = /^[A-Za-z\s]+$/; // Only letters and spaces allowed
    if (!form.FirstName) {
        form.errors.FirstName = 'First name is required.'
        valid = false
    } else if (!firstNamePattern.test(form.FirstName)) {
        form.errors.FirstName = 'First name should not contain numbers or special characters.'
        valid = false
    }

    // Validate LastName - check for numbers, special characters, and not being the same as FirstName
    const lastNamePattern = /^[A-Za-z\s]+$/; // Only letters and spaces allowed
    if (!form.LastName) {
        form.errors.LastName = 'Last name is required.'
        valid = false
    } else if (!lastNamePattern.test(form.LastName)) {
        form.errors.LastName = 'Last name should not contain numbers or special characters.'
        valid = false
    } else if (form.FirstName && form.FirstName.toLowerCase() === form.LastName.toLowerCase()) {
        form.errors.LastName = 'Last name cannot be the same as first name.'
        valid = false
    }

    // Validate DateOfBirth - Ensure it's a valid date
    const dob = form.DateOfBirth ? form.DateOfBirth.split('/') : [];
    if (dob.length !== 3 || dob.some(part => part === '')) {
        form.errors.DateOfBirth = 'Date of birth is required and must be a valid date.'
        valid = false
    } else {
        const [day, month, year] = dob;
        const validDay = parseInt(day);
        const validMonth = parseInt(month);
        const validYear = parseInt(year);

        // Check if the date is a valid day/month/year combination
        const date = new Date(validYear, validMonth - 1, validDay);
        if (date.getFullYear() !== validYear || date.getMonth() !== validMonth - 1 || date.getDate() !== validDay) {
            form.errors.DateOfBirth = 'Please enter a valid date of birth.'
            valid = false
        }

        // Check age validity (e.g., can't be older than 120 years)
        const today = new Date();
        const age = today.getFullYear() - validYear;
        if (age > 120) {
            form.errors.DateOfBirth = 'Age cannot be greater than 120 years.'
            valid = false
        } else if (age < 18) {
            form.errors.DateOfBirth = 'You must be at least 18 years old.'
            valid = false
        }
    }

    // Validate Email
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
    if (!form.Email || !emailPattern.test(form.Email)) {
        form.errors.Email = 'Please enter a valid email address.'
        valid = false
    }

    // Validate MobilePhone (Starts with 07 and has 11 digits)
    const mobilePhonePattern = /^07\d{9}$/;
    if (!form.MobilePhone || !mobilePhonePattern.test(form.MobilePhone)) {
        form.errors.MobilePhone = 'Please enter a valid mobile phone number (starts with 07 and has 11 digits).'
        valid = false
    }

    // Validate HomePhone (Starts with 0 and has exactly 11 digits)
    const homePhonePattern = /^0\d{10}$/;
    if (form.HomePhone && !homePhonePattern.test(form.HomePhone)) {
        form.errors.HomePhone = 'Please enter a valid home phone number (starts with 0 and has exactly 11 digits).'
        valid = false
    }


    // Validate Dependants
    if (!form.Dependants) {
        form.errors.Dependants = 'Dependants information is required.'
        valid = false
    }

    return valid
})
// Validation for Step 3 (Employer Details)
const isStep3Valid = computed(() => {
    form.errors.EmploymentStatus = ''
    form.errors.EmployerName = ''
    form.errors.JobTitle = ''
    form.errors.EmployerIndustry = ''
    form.errors.EmployerYears = ''
    form.errors.NextPayDate = ''
    form.errors.FollowingPayDate = ''

    let valid = true

    if (!form.EmploymentStatus) {
        form.errors.EmploymentStatus = 'Employment status is required.'
        valid = false
    }

    if (!form.EmployerName) {
        form.errors.EmployerName = 'Employer name is required.'
        valid = false
    }

    if (!form.JobTitle) {
        form.errors.JobTitle = 'Job title is required.'
        valid = false
    }

    if (!form.EmployerIndustry) {
        form.errors.EmployerIndustry = 'Employer industry is required.'
        valid = false
    }

    if (!form.EmployerYears) {
        form.errors.EmployerYears = 'Employer years is required.'
        valid = false
    }

    if (!form.NextPayDate) {
        form.errors.NextPayDate = 'Next pay date is required.'
        valid = false
    }

    if (!form.FollowingPayDate) {
        form.errors.FollowingPayDate = 'Following pay date is required.'
        valid = false
    }

    return valid
})
// Validation for Step 4 (Address Details)
const isStep4Valid = computed(() => {
    form.errors.HouseNameNumber = ''
    form.errors.StreetAddress = ''
    form.errors.County = ''
    form.errors.City = ''
    form.errors.Postcode = ''
    form.errors.AddressYears = ''

    let valid = true

    if (!form.HouseNameNumber) {
        form.errors.HouseNameNumber = 'House name/number is required.'
        valid = false
    }

    if (!form.StreetAddress) {
        form.errors.StreetAddress = 'Street address is required.'
        valid = false
    }

    if (!form.County) {
        form.errors.County = 'County is required.'
        valid = false
    }

    if (!form.City) {
        form.errors.City = 'City is required.'
        valid = false
    }

    if (!form.Postcode) {
        form.errors.Postcode = 'Postcode is required.'
        valid = false
    }

    if (!form.AddressYears) {
        form.errors.AddressYears = 'Address years is required.'
        valid = false
    }

    return valid
})
// Validation for Step 5 (Monthly Expenses)
const isStep5Valid = computed(() => {
    form.errors.ExpenseTransport = ''
    form.errors.ExpenseFood = ''
    form.errors.ExpenseCredit = ''
    form.errors.ExpenseCouncil = ''
    form.errors.ExpenseOther = ''

    let valid = true

    if (!form.ExpenseTransport) {
        form.errors.ExpenseTransport = 'Transport expense is required.'
        valid = false
    }

    if (!form.ExpenseFood) {
        form.errors.ExpenseFood = 'Food expense is required.'
        valid = false
    }

    if (!form.ExpenseCredit) {
        form.errors.ExpenseCredit = 'Credit expense is required.'
        valid = false
    }

    if (!form.ExpenseCouncil) {
        form.errors.ExpenseCouncil = 'Council expense is required.'
        valid = false
    }

    if (!form.ExpenseOther) {
        form.errors.ExpenseOther = 'Other expense is required.'
        valid = false
    }

    return valid
})
// Validation for Step 6 (Additional Info)
const isStep6Valid = computed(() => {
    form.errors.BankCard = ''
    form.errors.BankAccountNumber = ''
    form.errors.BankSortCode = ''
    form.errors.ConsentMarketing = ''

    let valid = true

    if (!form.BankCard) {
        form.errors.BankCard = 'Bank card information is required.'
        valid = false
    }

    if (!form.BankAccountNumber) {
        form.errors.BankAccountNumber = 'Bank account number is required.'
        valid = false
    }

    if (!form.BankSortCode) {
        form.errors.BankSortCode = 'Bank sort code is required.'
        valid = false
    }

    if (!form.ConsentMarketing) {
        form.errors.ConsentMarketing = 'Consent marketing is required.'
        valid = false
    }

    return valid
})

const isStepValid = computed(() => {
    // Dynamically map the current step to the corresponding validation function
    const stepValidationMap = {
        1: isStep1Valid,
        2: isStep2Valid,
        3: isStep3Valid,
        4: isStep4Valid,
        5: isStep5Valid,
        6: isStep6Valid
    };

    // Return the validation result for the current step
    return stepValidationMap[currentStep.value]?.value || true;  // Defaults to `true` if no match
});



// submit logic
const submitApplication = async () => {
    try {
        const response = await axios.post('/api/loan-application', form)

        if (response.status === 200) {
            applicationId.value = response.data.applicationId
            applicationStatus.value = 'pending'
            startStatusCheck()
        }
    } catch (error) {
        console.error('Error submitting application:', error)
    }
}
const startStatusCheck = () => {
    checkingStatus.value = true
    const interval = setInterval(async () => {
        if (!applicationId.value) {
            clearInterval(interval)
            return
        }

        try {
            const response = await axios.get(`/api/loan-application/status/${applicationId.value}`)

            if (response.status === 200 && response.data.applicationStatus) {
                applicationStatus.value = response.data.applicationStatus
                clearInterval(interval)
            }
        } catch (error) {
            console.error('Error checking application status:', error)
        }
    }, 3000)
}


</script>

<style scoped>
input {
    outline: none;
}
h2 {
     color: #00bfae; /* Teal color */
     font-size: 2rem;
     font-weight: 700; /* Bold */
     margin-bottom: 1.5rem; /* Spacing at the bottom */
     text-transform: uppercase;
     letter-spacing: 1.5px;
}
#app > div {
    background-color: transparent;
}
</style>
