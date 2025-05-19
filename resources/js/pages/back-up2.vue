<script setup>
import {ref} from 'vue'
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
import EmploymentIndustry from "@/pages/Application/Employer/EmploymentIndustry.vue";
import EmployerYears from "@/pages/Application/Employer/EmployerYears.vue";
import AddressYears from "@/pages/Application/Residence/AddressYears.vue";
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
import MonthlyMortgageRent from '@/pages/Application/Expense/MonthlyMortgageRent.vue';
import MaritalStatus from '@/pages/Application/Applicant/MaritalStatus.vue';
import ResidentialStatus from '@/pages/Application/Residence/ResidentialStatus.vue';
import Utilities from '@/pages/Application/Expense/Utilities.vue';
import RecentLoanCount from '@/pages/Application/Loan/RecentLoanCount.vue';
import AdultsLivingWith from '@/pages/Application/Applicant/AdultsLivingWith.vue';
import { usePage } from '@inertiajs/vue3';
import NetMonthlyIncome from '@/pages/Application/Employer/NetMonthlyIncome.vue';
import IncomeFrequency from '@/pages/Application/Employer/IncomeFrequency.vue';
import AlertBox from '@/Components/AlertBox.vue'
import { useValidation } from '@/composables/useValidation'
import { useStepValidation } from '@/composables/useStepValidation.js';
import { useSubmission }    from '@/composables/useSubmission'

const currentStep = ref(1)
const page = usePage()
const trackingParams = page.props.trackingParams
const showLoanInfo = ref(false)
const form = useForm({
    AffID: trackingParams.AffID ?? 'Default',
    OfferID:  trackingParams.OfferID ?? 1,
    Campaign: trackingParams.Campaign ?? '',
    AffSub: trackingParams.AffSub ?? '',
    AffSub2:  trackingParams.AffSub2 ?? '',
    AffSub3:  trackingParams.AffSub3 ?? '',
    AffSub4:  trackingParams.AffSub4 ?? '',
    AffSub5:  trackingParams.AffSub5 ?? '',
    CreationUrl: window.location.href, // Current page URL
    ReferrerUrl: document.referrer || window.location.href, // URL of the page that referred to this one
    IpAddress: '127.0.0.1', // You would need to get this from the backend
    UserAgent: navigator.userAgent, // Browser information

    LoanAmount: '',
    LoanTerm: '',
    LoanPurpose: '',

    Title: '',
    FirstName: '',
    LastName: '',
    DateOfBirth: '',
    MobilePhone: '',
    HomePhone: '',
    Email: '',
    Dependants: '',
    MaritalStatus: '',
    RecentLoanCount: '',
    AdultsLivingWith: '',

    ResidentialStatus: '',
    HouseNameNumber: '',
    StreetAddress: '',
    County: '',
    City: '',
    Postcode: '',
    AddressYears: '',

    EmploymentStatus: '',
    IncomeFrequency: '',
    EmployerName: '',
    JobTitle: '',
    EmploymentIndustry: '',
    WorkPhone: '',
    NextPayDate: '',
    FollowingPayDate: '',
    EmployerYears: '',
    NetMonthlyIncome: '',

    ExpenseMonthlyMortgageRent: '',
    ExpenseCouncil: '',
    ExpenseFood: '',
    ExpenseTransport: '',
    ExpenseCredit: '',
    ExpenseUtilities: '',
    ExpenseOther: '',

    BankDirectDeposit: 1,
    BankCard: '',
    BankAccountNumber: '',
    BankSortCode: '',
    BankYears: '',

    ConsentFinancial: 1,
    MarketingSms: '',
    MarketingEmail: '',
    MarketingPhone: '',


    touched: {
        AffID: false,
        OfferID: false,
        Campaign: false,
        AffSub: false,
        AffSub2: false,
        AffSub3: false,
        AffSub4: false,
        AffSub5: false,
        CreationUrl: false,
        ReferrerUrl: false,
        IpAddress: false,
        UserAgent: false,

        LoanAmount: false,
        LoanTerm: false,
        LoanPurpose: false,

        Title: false,
        FirstName: false,
        LastName: false,
        DateOfBirth: false,
        MobilePhone: false,
        HomePhone: false,
        Email: false,
        Dependants: false,
        MaritalStatus: false,
        RecentLoanCount: false,
        AdultsLivingWith: false,

        ResidentialStatus: false,
        HouseNameNumber: false,
        StreetAddress: false,
        County: false,
        City: false,
        Postcode: false,
        AddressYears: false,

        EmploymentStatus: false,
        IncomeFrequency: false,
        EmployerName: false,
        JobTitle: false,
        EmploymentIndustry: false,
        WorkPhone: false,
        NextPayDate: false,
        FollowingPayDate: false,
        EmployerYears: false,
        NetMonthlyIncome: false,

        ExpenseMonthlyMortgageRent: false,
        ExpenseCouncil: false,
        ExpenseFood: false,
        ExpenseTransport: false,
        ExpenseCredit: false,
        ExpenseUtilities: false,
        ExpenseOther: false,

        BankDirectDeposit: false,
        BankCard: false,
        BankAccountNumber: false,
        BankSortCode: false,
        BankYears: false,

        ConsentFinancial: false,
        MarketingSms: false,
        MarketingEmail: false,
        MarketingPhone: ''
    },

    errors: {
        AffID: '',
        OfferID: '',
        Campaign: '',
        AffSub: '',
        AffSub2: '',
        AffSub3: '',
        AffSub4: '',
        AffSub5: '',
        CreationUrl: '',
        ReferrerUrl: '',
        IpAddress: '',
        UserAgent: '',

        LoanAmount: '',
        LoanTerm: '',
        LoanPurpose: '',

        Title: '',
        FirstName: '',
        LastName: '',
        DateOfBirth: '',
        MobilePhone: '',
        HomePhone: '',
        Email: '',
        Dependants: '',
        MaritalStatus: '',
        RecentLoanCount: '',
        AdultsLivingWith: '',

        ResidentialStatus: '',
        HouseNameNumber: '',
        StreetAddress: '',
        County: '',
        City: '',
        Postcode: '',
        AddressYears: '',

        EmploymentStatus: '',
        IncomeFrequency: '',
        EmployerName: '',
        JobTitle: '',
        EmploymentIndustry: '',
        WorkPhone: '',
        NextPayDate: '',
        FollowingPayDate: '',
        EmployerYears: '',
        NetMonthlyIncome: '',

        ExpenseMonthlyMortgageRent: '',
        ExpenseCouncil: '',
        ExpenseFood: '',
        ExpenseTransport: '',
        ExpenseCredit: '',
        ExpenseUtilities: '',
        ExpenseOther: '',

        BankDirectDeposit: '',
        BankCard: '',
        BankAccountNumber: '',
        BankSortCode: '',
        BankYears: '',

        ConsentFinancial: '',
        MarketingSms: '',
        MarketingEmail: '',
        MarketingPhone: '',
    }
});


const {
    isStepValid,
    isStep6Valid
} = useStepValidation(form, currentStep)

// pull in submission logic
const {
    isSubmitting,
    isFinished,
    isAccepted,
    isRejected,
    progressText,
    submitApplication
} = useSubmission(form, currentStep, isStep6Valid)

const {
    // Step 1
    validateLoanAmount,
    validateLoanTerm,
    validateLoanPurpose,
    validateRecentLoanCount,

    // Step 2
    validateTitle,
    validateFirstName,
    validateLastName,
    validateDateOfBirth,
    validateEmail,
    validateMobilePhone,
    validateHomePhone,
    validateDependants,
    validateMaritalStatus,
    validateAdultsLivingWith,

    // Step 3
    validateEmploymentStatus,
    validateIncomeFrequency,
    validateEmployerName,
    validateJobTitle,
    validateEmploymentIndustry,
    validateEmployerYears,
    validateNextPayDate,
    validateFollowingPayDate,
    validateNetMonthlyIncome,

    // Step 4
    validateResidentialStatus,
    validateHouseNameNumber,
    validateStreetAddress,
    validateCounty,
    validateCity,
    validatePostcode,
    validateAddressYears,

    // Step 5
    validateExpenseMonthlyMortgageRent,
    validateTransport,
    validateUtilities,
    validateFood,
    validateCredit,
    validateCouncil,
    validateOther,

    // Step 6
    validateBankCard,
    validateBankAccountNumber,
    validateBankSortCode,
} = useValidation(form)

// pull in all your per-step validation

const handleNextStep = () => {
    // mark touched for current step…
    // then only advance if isStepValid.value is true
    if (isStepValid.value) {
        // currentStep.value++
        nextStep()
        window.scrollTo({ top: 0, behavior: 'smooth' })
    }
}

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


</script>







<template>
    <div class="max-w-xl mx-auto py-10 p-6  bg-transparent ">

        <form @submit.prevent="submitApplication" v-if="!isSubmitting" id="iframe" class=" w-full ">
            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="relative pt-1">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm font-semibold text-neutral-800">Step {{ currentStep }} / 6</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div
                            v-for="step in 6"
                            :key="step"
                            class="relative flex-1 cursor-pointer group"
                        >
                            <!-- Circle -->
                            <div
                                class="w-6 h-6 mx-auto rounded-full text-sm flex items-center justify-center font-bold transition-all"
                                :class="{
              'bg-cyan-400 text-white': step <= currentStep,
              'bg-gray-300 text-gray-700': step > currentStep
            }"
                            >
                                {{ step }}
                            </div>
                            <!-- Line -->
                            <div
                                v-if="step < 6"
                                class="absolute top-3 left-1/2 w-full h-1"
                                :class="step < currentStep ? 'bg-cyan-400' : 'bg-gray-300'"
                                style="transform: translateX(50%); width: calc(100% - 1.5rem); z-index: -1;"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>


            <div
                v-if="showLoanInfo"
                class="fixed top-16 left-0 right-0 flex justify-center z-40"
            >
                <div class="bg-blue-100 text-blue-900 p-4 w-full max-w-2xl text-center relative rounded shadow">
                    <!-- Dismiss Button -->
                    <button
                        @click="showLoanInfo = false"
                        class="absolute top-2 right-2 text-blue-700 hover:text-blue-900 text-lg font-bold"
                        aria-label="Close"
                    >
                        &times;
                    </button>

                    <strong class="text-lg block mb-1">Heads up!</strong>
                    <p class="text-sm">
                        This is an informational message for the user. You can include any helpful content here.
                    </p>
                </div>
            </div>




            <!-- Step 1: Loan Information -->
            <div v-if="currentStep === 1">

                <LoanAmount
                    v-model="form.LoanAmount"
                    :error="form.errors.LoanAmount"
                    @change="validateLoanAmount"
                    :class="{'border-red-400  bg-red-100': form.errors.LoanAmount}"
                />

                <LoanTerm
                    v-model="form.LoanTerm"
                    :error="form.errors.LoanTerm"
                    @blur="form.touched.LoanTerm = true"
                    @change="validateLoanTerm"
                    :class="{'border-red-400  bg-red-100': form.errors.LoanTerm}"
                />
                <LoanPurpose
                    v-model="form.LoanPurpose"
                    :error="form.errors.LoanPurpose"
                    @blur="form.touched.LoanPurpose = true"
                    @change="validateLoanPurpose"
                    :class="{'border-red-400  bg-red-100': form.errors.LoanPurpose}"
                />

                <RecentLoanCount
                    v-model="form.RecentLoanCount"
                    :error="form.errors.RecentLoanCount"
                    @blur="form.touched.RecentLoanCount = true"
                    @change="validateRecentLoanCount"
                    :class="{'border-red-400  bg-red-100': form.errors.RecentLoanCount}"
                />
            </div>

            <!-- Step 2: Personal Details -->
            <div v-if="currentStep === 2">
                <h3 class="text-3xl font-bold text-black mb-6 text-center">Your details</h3>

                <Title
                    v-model="form.Title"
                    :error="form.errors.Title"
                    :class="{'border-red-500 bg-red-100': form.errors.Title}"
                    @blur="validateTitle"
                    @change="validateTitle"
                />

                <FirstName
                    v-model="form.FirstName"
                    :error="form.errors.FirstName"
                    :class="{'border-red-500 bg-red-100': form.errors.FirstName}"
                    @blur="validateFirstName"
                    @input="validateFirstName"
                />

                <LastName
                    v-model="form.LastName"
                    :error="form.errors.LastName"
                    :class="{'border-red-500 bg-red-100': form.errors.LastName}"
                    @blur="validateLastName"
                    @input="validateLastName"
                />

                <DateOfBirth
                    v-model="form.DateOfBirth"
                    :error="form.errors.DateOfBirth"
                    :class="{'border-red-500 bg-red-100': form.errors.DateOfBirth}"
                    @blur="validateDateOfBirth"
                    @input="validateDateOfBirth"
                />

                <Email
                    v-model="form.Email"
                    :error="form.errors.Email"
                    :class="{'border-red-500 bg-red-100': form.errors.Email}"
                    @blur="validateEmail"
                    @input="validateEmail"
                />

                <MobilePhone
                    v-model="form.MobilePhone"
                    :error="form.errors.MobilePhone"
                    :class="{'border-red-500 bg-red-100': form.errors.MobilePhone}"
                    @blur="validateMobilePhone"
                    @input="validateMobilePhone"
                />

                <HomePhone
                    v-model="form.HomePhone"
                    :error="form.errors.HomePhone"
                    :class="{'border-red-500 bg-red-100': form.errors.HomePhone}"
                    @blur="validateHomePhone"
                    @input="validateHomePhone"
                />

                <Dependants
                    v-model="form.Dependants"
                    :error="form.errors.Dependants"
                    :class="{'border-red-500 bg-red-100': form.errors.Dependants}"
                    @blur="validateDependants"
                    @change="validateDependants"
                />
                <MaritalStatus
                    v-model="form.MaritalStatus"
                    :error="form.errors.MaritalStatus"
                    :class="{'border-red-500 bg-red-100': form.errors.MaritalStatus}"
                    @blur="validateMaritalStatus"
                    @change="validateMaritalStatus"
                />

                <AdultsLivingWith
                    v-model="form.AdultsLivingWith"
                    :error="form.errors.AdultsLivingWith"
                    :class="{'border-red-500 bg-red-100': form.errors.AdultsLivingWith}"
                    @blur="validateAdultsLivingWith"
                    @change="validateAdultsLivingWith"
                />
            </div>

            <!-- Step 3: Employer Details -->
            <div v-if="currentStep === 3">
                <h3 class="text-3xl font-bold text-black mb-6 text-center">Your Employer</h3>

                <!-- Employment Status -->
                <EmploymentStatus
                    v-model="form.EmploymentStatus"
                    :error="form.errors.EmploymentStatus"
                    :class="{'border-red-500 bg-red-100': form.errors.EmploymentStatus}"
                    @change="validateEmploymentStatus"
                    @blur="validateEmploymentStatus"
                />

                <IncomeFrequency
                    v-model="form.IncomeFrequency"
                    :error="form.errors.IncomeFrequency"
                    :class="{'border-red-500 bg-red-100': form.errors.IncomeFrequency}"
                    @change="validateIncomeFrequency"
                    @blur="validateIncomeFrequency"
                />

                <!-- Employer Name & Job Title (conditionally shown) -->
                <template v-if="[1, 2, 3].includes(form.EmploymentStatus)">
                    <!-- Employer Name -->
                    <EmployerName
                        v-model="form.EmployerName"
                        :error="form.errors.EmployerName"
                        :class="{'border-red-500 bg-red-100': form.errors.EmployerName}"
                        @input="validateEmployerName"
                        @blur="validateEmployerName"
                    />

                    <!-- Job Title -->
                    <JobTitle
                        v-model="form.JobTitle"
                        :error="form.errors.JobTitle"
                        :class="{'border-red-500 bg-red-100': form.errors.JobTitle}"
                        @input="validateJobTitle"
                        @blur="validateJobTitle"
                    />
                </template>

                <!-- Employer Industry -->
                <EmploymentIndustry
                    v-model="form.EmploymentIndustry"
                    :error="form.errors.EmploymentIndustry"
                    :class="{'border-red-500 bg-red-100': form.errors.EmploymentIndustry}"
                    @change="validateEmploymentIndustry"
                    @blur="validateEmploymentIndustry"
                />

                <!-- Employer Years -->
                <EmployerYears
                    v-model="form.EmployerYears"
                    :error="form.errors.EmployerYears"
                    :class="{'border-red-500 bg-red-100': form.errors.EmployerYears}"
                    @change="validateEmployerYears"
                    @blur="validateEmployerYears"
                />

                <!-- Next Pay Date -->
                <NextPayDate
                    v-model="form.NextPayDate"
                    :error="form.errors.NextPayDate"
                    :class="{'border-red-500 bg-red-100': form.errors.NextPayDate}"
                    @input="validateNextPayDate"
                    @blur="validateNextPayDate"
                />

                <!-- Following Pay Date -->
                <FollowingPayDate
                    v-model="form.FollowingPayDate"
                    :error="form.errors.FollowingPayDate"
                    :class="{'border-red-500 bg-red-100': form.errors.FollowingPayDate}"
                    @input="validateFollowingPayDate"
                    @blur="validateFollowingPayDate"
                />

                <NetMonthlyIncome
                    v-model="form.NetMonthlyIncome"
                    :error="form.errors.NetMonthlyIncome"
                    :class="{'border-red-500 bg-red-100': form.errors.NetMonthlyIncome}"
                    @input="validateNetMonthlyIncome"
                    @blur="validateNetMonthlyIncome"
                />
            </div>

            <!-- Step 4: Address Details -->
            <div v-if="currentStep === 4">
                <h3 class="text-3xl font-bold text-black mb-6 text-center">Your Address</h3>

                <ResidentialStatus
                    v-model="form.ResidentialStatus"
                    :error="form.errors.ResidentialStatus"
                    :class="{ 'border-red-500 bg-red-100': form.errors.ResidentialStatus }"
                    @input="validateResidentialStatus"
                    @blur="validateResidentialStatus"
                />

                <HouseNameNumber
                    v-model="form.HouseNameNumber"
                    :error="form.errors.HouseNameNumber"
                    :class="{ 'border-red-500 bg-red-100': form.errors.HouseNameNumber }"
                    @input="validateHouseNameNumber"
                    @blur="validateHouseNameNumber"
                />

                <StreetAddress
                    v-model="form.StreetAddress"
                    :error="form.errors.StreetAddress"
                    :class="{ 'border-red-500 bg-red-100': form.errors.StreetAddress }"
                    @input="validateStreetAddress"
                    @blur="validateStreetAddress"
                />

                <County
                    v-model="form.County"
                    :error="form.errors.County"
                    :class="{ 'border-red-500 bg-red-100': form.errors.County }"
                    @change="validateCounty"
                    @blur="validateCounty"
                />

                <City
                    v-model="form.City"
                    :error="form.errors.City"
                    :class="{ 'border-red-500 bg-red-100': form.errors.City }"
                    @change="validateCity"
                    @blur="validateCity"
                />

                <Postcode
                    v-model="form.Postcode"
                    :error="form.errors.Postcode"
                    :class="{ 'border-red-500 bg-red-100': form.errors.Postcode }"
                    @input="validatePostcode"
                    @blur="validatePostcode"
                />

                <AddressYears
                    v-model="form.AddressYears"
                    :error="form.errors.AddressYears"
                    :class="{ 'border-red-500 bg-red-100': form.errors.AddressYears }"
                    @change="validateAddressYears"
                    @blur="validateAddressYears"
                />
            </div>

            <!-- Step 5: Monthly Expenses -->
            <div v-if="currentStep === 5">
                <h3 class="text-3xl font-bold text-black mb-6 text-center">Your Monthly Expenses</h3>

                <MonthlyMortgageRent
                    v-model="form.ExpenseMonthlyMortgageRent"
                    :error="form.errors.ExpenseMonthlyMortgageRent"
                    @change="validateExpenseMonthlyMortgageRent"
                    @blur="validateExpenseMonthlyMortgageRent"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseMonthlyMortgageRent}"
                />
                <Transport
                    v-model="form.ExpenseTransport"
                    :error="form.errors.ExpenseTransport"
                    @change="validateTransport"
                    @blur="validateTransport"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseTransport}"
                />
                <Utilities
                    v-model="form.ExpenseUtilities"
                    :error="form.errors.ExpenseUtilities"
                    @change="validateUtilities"
                    @blur="validateUtilities"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseUtilities}"
                />
                <!-- Food -->
                <Food
                    v-model="form.ExpenseFood"
                    :error="form.errors.ExpenseFood"
                    @change="validateFood"
                    @blur="validateFood"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseFood}"
                />

                <!-- Credit -->
                <Credit
                    v-model="form.ExpenseCredit"
                    :error="form.errors.ExpenseCredit"
                    @change="validateCredit"
                    @blur="validateCredit"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseCredit}"
                />

                <!-- Council -->
                <Council
                    v-model="form.ExpenseCouncil"
                    :error="form.errors.ExpenseCouncil"
                    @change="validateCouncil"
                    @blur="validateCouncil"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseCouncil}"
                />

                <!-- Other -->
                <Other
                    v-model="form.ExpenseOther"
                    :error="form.errors.ExpenseOther"
                    @change="validateOther"
                    @blur="validateOther"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseOther}"
                />
            </div>

            <!-- Step 6: Additional Information -->
            <div v-if="currentStep === 6">


                <h3 class="text-3xl font-bold text-neutral-800 mb-6 text-center">Last bit...</h3>
                <p class="text-lg font-bold text-neutral-800 border-2 border-cyan-500 rounded-xl px-5 py-3 mb-6 shadow-md transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent text-center mx-auto">
                    We need these details to deposit the funds and verify your application
                </p>


                <BankCard
                    v-model="form.BankCard"
                    :error="form.errors.BankCard"
                    @blur="validateBankCard"
                    @change="validateBankCard"
                    :class="{'border-red-500 bg-red-100': form.errors.BankCard}"
                />
                <BankAccountNumber
                    v-model="form.BankAccountNumber"
                    :error="form.errors.BankAccountNumber"
                    @input="validateBankAccountNumber"
                    @blur="validateBankAccountNumber"
                    :class="{'border-red-500 bg-red-100': form.errors.BankAccountNumber}"
                />
                <BankSortCode
                    v-model="form.BankSortCode"
                    :error="form.errors.BankSortCode"
                    @input="validateBankSortCode"
                    @blur="validateBankSortCode"
                    :class="{'border-red-500 bg-red-100': form.errors.BankSortCode}"
                />
                <ConsentMarketing
                    v-model="form.ConsentFinancial"
                    :error="form.errors.ConsentFinancial"
                />
            </div>


            <!-- Navigation Buttons -->
            <div class="flex justify-between">
                <!-- Previous Button -->
                <button
                    v-if="currentStep > 1 && currentStep < 6"
                    @click="prevStep"
                    data-cy="prev-button"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400"
                >
                    Previous
                </button>

                <!-- Next Button -->
                <button
                    v-if="currentStep < 6"
                    @click="handleNextStep"
                    data-cy="next-button"
                    class="px-6 py-3 bg-cyan-400 text-white rounded-md hover:bg-cyan-600 transition-all duration-300"
                    :class="{ 'ml-auto': currentStep === 1 }"
                    :disabled="!isStepValid"
                >
                    Next
                </button>

                <!-- Submit Button on Step 6 -->
                <div class="flex justify-center w-full" v-if="currentStep === 6">
                    <button
                        type="submit"
                        @click="submitApplication"
                        data-cy="submit-button"
                        :disabled="!isStep6Valid"
                        class="px-8 py-4 bg-gradient-to-r from-cyan-400 to-purple-500 text-white rounded-md hover:bg-cyan-600 text-xl"
                    >
                        Submit
                    </button>
                </div>
            </div>

            <!--    </div>-->

        </form>
        <!-- Progress Spinner and Dynamic Text -->
        <div v-if="isSubmitting" class="flex items-center justify-center">
            <!-- Spinner (while waiting for response) -->
            <template v-if="!isFinished">
                <div class="spinner-border animate-spin inline-block w-8 h-8 border-4 border-solid border-current rounded-full text-blue-600" role="status"></div>
                <div class="ml-4">
                    <span class="visually-hidden">Processing...</span>
                    <p>{{ progressText }}</p>
                </div>
            </template>

            <!-- Accepted State -->
            <template v-else-if="isAccepted">
                <div class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p>{{ progressText }}</p>
                </div>
            </template>

            <!-- Rejected State -->
            <template v-else-if="isRejected">
                <div class="text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p>{{ progressText }}</p>
                </div>
            </template>
        </div>



    </div>
</template>



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
/* You can customize your spinner style here */
.spinner-border {
    border-top-color: transparent; /* Hides the top part of the circle to create the spinning effect */
    border-radius: 50%; /* Make it circular */
    animation: spin 1s linear infinite; /* The spin animation */
}

.spinner-border::before {
    content: ''; /* Ensure the spinner is created */
    display: block;
    width: 2rem; /* Width of the spinner */
    height: 2rem; /* Height of the spinner */
    border: 0.25rem solid #f3f4f6; /* Light gray border */
    border-top-color: #1d4ed8; /* Blue color for the top part */
    border-radius: 50%; /* Circular spinner */
    animation: spin 1s linear infinite; /* The spin animation */
}

/* Define the keyframes for the spinner rotation */
@keyframes spin {
    0% {
        transform: rotate(0deg); /* Start the spinner at 0 degrees */
    }
    100% {
        transform: rotate(360deg); /* Rotate it 360 degrees */
    }
}

/* Additional styling for the surrounding container */
.spinner-container {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: row;
    gap: 1rem;
}

.spinner-text {
    font-size: 1rem;
    font-weight: 500;
    color: #1d4ed8; /* Blue color for the text */
    margin-left: 0.5rem;
}

</style>
