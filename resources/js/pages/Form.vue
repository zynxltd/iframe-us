<script setup>
import { ref, computed } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import Title from '@/pages/Application/Applicant/Title.vue'
import FirstName from '@/pages/Application/Applicant/FirstName.vue'
import LastName from '@/pages/Application/Applicant/LastName.vue'
import DateOfBirth from '@/pages/Application/Applicant/DateOfBirth.vue'
import MobilePhone from '@/pages/Application/Applicant/MobilePhone.vue'
import HomePhone from '@/pages/Application/Applicant/HomePhone.vue'
import Dependants from '@/pages/Application/Applicant/Dependants.vue'
import Email from '@/pages/Application/Applicant/Email.vue'
import MaritalStatus from '@/pages/Application/Applicant/MaritalStatus.vue'
import AdultsLivingWith from '@/pages/Application/Applicant/AdultsLivingWith.vue'
import LoanAmount from '@/pages/Application/Loan/LoanAmount.vue'
import LoanTerm from '@/pages/Application/Loan/LoanTerm.vue'
import LoanPurpose from '@/pages/Application/Loan/LoanPurpose.vue'
import RecentLoanCount from '@/pages/Application/Loan/RecentLoanCount.vue'
import EmploymentStatus from '@/pages/Application/Employer/EmploymentStatus.vue'
import IncomeFrequency from '@/pages/Application/Employer/IncomeFrequency.vue'
import EmployerName from '@/pages/Application/Employer/EmployerName.vue'
import JobTitle from '@/pages/Application/Employer/JobTitle.vue'
import EmploymentIndustry from '@/pages/Application/Employer/EmploymentIndustry.vue'
import EmployerYears from '@/pages/Application/Employer/EmployerYears.vue'
import NextPayDate from '@/pages/Application/Employer/NextPayDate.vue'
import FollowingPayDate from '@/pages/Application/Employer/FollowingPayDate.vue'
import NetMonthlyIncome from '@/pages/Application/Employer/NetMonthlyIncome.vue'
import ResidentialStatus from '@/pages/Application/Residence/ResidentialStatus.vue'
import HouseNameNumber from '@/pages/Application/Residence/HouseNameNumber.vue'
import StreetAddress from '@/pages/Application/Residence/StreetAddress.vue'
import County from '@/pages/Application/Residence/County.vue'
import City from '@/pages/Application/Residence/City.vue'
import Postcode from '@/pages/Application/Residence/Postcode.vue'
import AddressYears from '@/pages/Application/Residence/AddressYears.vue'
import MonthlyMortgageRent from '@/pages/Application/Expense/MonthlyMortgageRent.vue'
import Transport from '@/pages/Application/Expense/Transport.vue'
import Utilities from '@/pages/Application/Expense/Utilities.vue'
import Food from '@/pages/Application/Expense/Food.vue'
import Credit from '@/pages/Application/Expense/Credit.vue'
import Council from '@/pages/Application/Expense/Council.vue'
import Other from '@/pages/Application/Expense/Other.vue'
import BankCard from '@/pages/Application/Bank/BankCard.vue'
import BankAccountNumber from '@/pages/Application/Bank/BankAccountNumber.vue'
import BankSortCode from '@/pages/Application/Bank/BankSortCode.vue'
import ConsentMarketing from '@/pages/Application/Consent/ConsentMarketing.vue'
import { usePage } from '@inertiajs/vue3'
import { useValidation } from '@/composables/useValidation'
import { useStepValidation } from '@/composables/useStepValidation'
import { useSubmission } from '@/composables/useSubmission'
import AlertBox from '@/components/AlertBox.vue';

const currentStep = ref(1)
const page = usePage()
const trackingParams = page.props.trackingParams
const showErrorAlert = ref(false)
const triedNext = ref(false)
// initialize form
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

const validate = {
    LoanAmount:      validateLoanAmount,
    LoanTerm:        validateLoanTerm,
    LoanPurpose:     validateLoanPurpose,
    RecentLoanCount: validateRecentLoanCount,

    Title:           validateTitle,
    FirstName:       validateFirstName,
    LastName:        validateLastName,
    DateOfBirth:     validateDateOfBirth,
    Email:           validateEmail,
    MobilePhone:     validateMobilePhone,
    HomePhone:       validateHomePhone,
    Dependants:      validateDependants,
    MaritalStatus:   validateMaritalStatus,
    AdultsLivingWith:validateAdultsLivingWith,

    EmploymentStatus:        validateEmploymentStatus,
    IncomeFrequency:         validateIncomeFrequency,
    EmployerName:            validateEmployerName,
    JobTitle:                validateJobTitle,
    EmploymentIndustry:      validateEmploymentIndustry,
    EmployerYears:           validateEmployerYears,
    NextPayDate:             validateNextPayDate,
    FollowingPayDate:        validateFollowingPayDate,
    NetMonthlyIncome:        validateNetMonthlyIncome,

    ResidentialStatus:    validateResidentialStatus,
    HouseNameNumber:      validateHouseNameNumber,
    StreetAddress:        validateStreetAddress,
    County:               validateCounty,
    City:                 validateCity,
    Postcode:             validatePostcode,
    AddressYears:         validateAddressYears,

    ExpenseMonthlyMortgageRent: validateExpenseMonthlyMortgageRent,
    ExpenseTransport:           validateTransport,
    ExpenseUtilities:           validateUtilities,
    ExpenseFood:                validateFood,
    ExpenseCredit:              validateCredit,
    ExpenseCouncil:             validateCouncil,
    ExpenseOther:               validateOther,

    BankCard:          validateBankCard,
    BankAccountNumber: validateBankAccountNumber,
    BankSortCode:      validateBankSortCode,
}

const { isStepValid, validatorsByStep, isStep6Valid } = useStepValidation(form, currentStep)


// const { isStepValid, isStep6Valid } = useStepValidation(form, currentStep)
const { isSubmitting, isFinished, isAccepted, isRejected, progressText, submitApplication } =
    useSubmission(form, currentStep, isStep6Valid)

// easy class for error highlighting
const errorClass = computed(() => field => form.errors[field] ? 'border-red-500 bg-red-100' : '')

// define each step's component(s)
const steps = [
    { title: null,   components: [
            { cmp: LoanAmount,     props: { 'data-cy': 'loan-amount', model: 'LoanAmount' } },
            { cmp: LoanTerm,       props: { model: 'LoanTerm' } },
            { cmp: LoanPurpose,    props: { model: 'LoanPurpose' } },
            { cmp: RecentLoanCount,props: { model: 'RecentLoanCount' } }
        ]
    },
    { title: 'Your details',   components: [
            { cmp: Title,    props: { model: 'Title' } },
            { cmp: FirstName,props: { model: 'FirstName', placeholder: 'Enter your first name' } },
            { cmp: LastName, props: { model: 'LastName',  placeholder: 'Enter your last name' } },
            { cmp: DateOfBirth, props: { model: 'DateOfBirth' } },
            { cmp: Email,        props: { model: 'Email' } },
            { cmp: MobilePhone,  props: { model: 'MobilePhone' } },
            { cmp: HomePhone,    props: { model: 'HomePhone' } },
            { cmp: Dependants,   props: { model: 'Dependants' } },
            { cmp: MaritalStatus,props: { model: 'MaritalStatus' } },
            { cmp: AdultsLivingWith, props: { model: 'AdultsLivingWith' } }
        ]
    },
    { title: 'Your Employer', components: [
            { cmp: EmploymentStatus,     props: { model: 'EmploymentStatus' } },
            { cmp: IncomeFrequency,      props: { model: 'IncomeFrequency' } },

            { cmp: EmployerName,         props:{ model: 'EmployerName' },      visible: isEmployed },
            { cmp: JobTitle,             props:{ model: 'JobTitle' },         visible: isEmployed },
            { cmp: EmploymentIndustry,   props:{ model: 'EmploymentIndustry' },visible: isEmployed },
            { cmp: EmployerYears,        props:{ model: 'EmployerYears' },     visible: isEmployed },

            { cmp: NextPayDate,          props: { model: 'NextPayDate' } },
            { cmp: FollowingPayDate,     props: { model: 'FollowingPayDate' } },
            { cmp: NetMonthlyIncome,     props: { model: 'NetMonthlyIncome' } }
        ]
    },
    { title: 'Your Address', components: [
            { cmp: ResidentialStatus, props: { model: 'ResidentialStatus' } },
            { cmp: HouseNameNumber,   props: { model: 'HouseNameNumber' } },
            { cmp: StreetAddress,     props: { model: 'StreetAddress' } },
            { cmp: County,            props: { model: 'County' } },
            { cmp: City,              props: { model: 'City' } },
            { cmp: Postcode,          props: { model: 'Postcode' } },
            { cmp: AddressYears,      props: { model: 'AddressYears' } }
        ]
    },
    { title: 'Your Monthly Expenses', components: [
            { cmp: MonthlyMortgageRent, props: { model: 'ExpenseMonthlyMortgageRent' } },
            { cmp: Transport,           props: { model: 'ExpenseTransport' } },
            { cmp: Utilities,           props: { model: 'ExpenseUtilities' } },
            { cmp: Food,                props: { model: 'ExpenseFood' } },
            { cmp: Credit,              props: { model: 'ExpenseCredit' } },
            { cmp: Council,             props: { model: 'ExpenseCouncil' } },
            { cmp: Other,               props: { model: 'ExpenseOther' } }
        ]
    },
    { title: 'Last bit…', components: [
            { cmp: BankCard,            props: { model: 'BankCard' } },
            { cmp: BankAccountNumber,   props: { model: 'BankAccountNumber' } },
            { cmp: BankSortCode,        props: { model: 'BankSortCode' } },
            { cmp: ConsentMarketing,    props: { model: 'ConsentFinancial' } }
        ]
    },
]

function handleNextStep() {
    // 1) figure out which fields this step has
    const thisStepFields = steps[currentStep.value - 1]
        .components
        .map(c => c.props.model)

    // 2) mark touched & run each field's validator
    thisStepFields.forEach(field => {
        form.touched[field] = true
        validate[field]?.()
    })

    // 3) if valid, advance; otherwise show alert
    if (isStepValid.value) {
        showErrorAlert.value = false
        currentStep.value++
        window.scrollTo({ top: 0, behavior: 'smooth' })
    } else {
        showErrorAlert.value = true
    }
}

const selectFields = [
    'LoanAmount',
    'County',
    'City',
    'AddressYears',
    'EmploymentIndustry',
    'EmployerYears',
    'AddressYears'
]
function goToStep(target) {
    // 1) Touch & validate current step's fields
    const fields = steps[currentStep.value - 1]
        .components
        .map(c => c.props.model)

    fields.forEach(f => {
        form.touched[f] = true
        validate[f]?.()
    })

    // 2) Always allow backward jumps
    if (target < currentStep.value) {
        showErrorAlert.value = false
        currentStep.value = target
        return
    }

    // 3) Forward: only if valid
    if (isStepValid.value) {
        showErrorAlert.value = false
        currentStep.value = target
        window.scrollTo({ top: 0, behavior: 'smooth' })
    } else {
        showErrorAlert.value = true
    }
}

const isEmployed = () => [1,2,3].includes(form.EmploymentStatus)
</script>

<template>
    <div class="max-w-xl mx-auto py-2">

        <AlertBox
            v-if="showErrorAlert"
            type="error"
            @close="showErrorAlert = false"
            class="mb-4"
        >
            Please correct the highlighted errors before proceeding.
        </AlertBox>

        <!-- Progress Bar -->
        <div class="flex mb-6">
            <div
                v-for="(step, idx) in steps"
                :key="idx"
                class="flex-1 cursor-pointer"
                @click="goToStep(idx+1)"
            >
                <div
                    class="w-6 h-6 mx-auto rounded-full flex items-center justify-center"
                    :class="{
        'bg-green-500 text-white': idx < currentStep-1 && validatorsByStep[idx].value,
        'bg-red-500   text-white': idx < currentStep-1 && !validatorsByStep[idx].value,
        'bg-cyan-400  text-white': idx+1 === currentStep,
        'bg-gray-300  text-gray-700': idx+1 > currentStep
      }"
                >
                    <template v-if="idx < currentStep-1">
                        <svg
                            v-if="validatorsByStep[idx].value"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </template>
                    <template v-else>
                        {{ idx + 1 }}
                    </template>
                </div>
                <div
                    v-if="idx < steps.length - 1"
                    :class="{
        'h-1 bg-green-500': idx < currentStep-1 && validatorsByStep[idx].value,
        'h-1 bg-red-500'  : idx < currentStep-1 && !validatorsByStep[idx].value,
        'h-1 bg-gray-300': idx+1 >= currentStep
      }"
                ></div>
            </div>
        </div>



        <form @submit.prevent="submitApplication">
            <h3 v-if="steps[currentStep-1].title" class="text-2xl mb-2 text-center">
                {{ steps[currentStep-1].title }}
            </h3>

            <div v-for="({ cmp, props }, idx) in steps[currentStep-1].components"
                 :key="idx"
                 class="mb-4">
                <!-- Non-select inputs -->
                <component
                    v-if="!selectFields.includes(props.model)"
                    :is="cmp"
                    v-model="form[ props.model ]"
                    :error="form.errors[ props.model ]"
                    :class="errorClass(props.model)"
                    v-bind="props"
                    @change="validate[ props.model ]?.()"
                    @input="validate[ props.model ]?.()"
                    @blur="form.touched[ props.model ] = true; validate[ props.model ]?.()"
                />

                <!-- Select inputs -->
                <component
                    v-else
                    :is="cmp"
                    v-model="form[ props.model ]"
                    :error="form.errors[ props.model ]"
                    :class="errorClass(props.model)"
                    v-bind="props"
                    @change="
        form.touched[ props.model ] = true;
        validate[ props.model ]?.()
      "
                    @blur="
        form.touched[ props.model ] = true;
        validate[ props.model ]?.()
      "
                />
            </div>

            <!-- navigation -->
            <div :class="['flex mt-6', currentStep === 1 ? 'justify-center' : 'justify-between']">
                <button
                    v-if="currentStep > 1"
                    type="button"
                    @click="currentStep--"
                    class="px-4 py-2 bg-gray-300 rounded"
                >
                    Previous
                </button>

                <button
                    v-if="currentStep < steps.length"
                    type="button"
                    @click="handleNextStep"
                    :disabled="!isStepValid"
                    class="px-6 py-2 bg-cyan-400 text-white rounded disabled:opacity-50"
                >
                    Next
                </button>

                <button
                    v-else
                    type="submit"
                    :disabled="!isStep6Valid"
                    class="px-8 py-2 bg-gradient-to-r from-cyan-400 to-purple-500 text-white rounded disabled:opacity-50"
                >
                    Submit
                </button>
            </div>

            <!-- show error alert when Next is disabled and user tried to click -->
            <div v-if="triedNext && !isStepValid" class="mt-4">
                <AlertBox
                    status="{ isFinished: false, isAccepted: false, isRejected: false }"
                    text="Please fix the errors in this step before proceeding."
                    @close="triedNext = false"
                />
            </div>

        </form>

        <!-- spinner / final states -->
        <div v-if="isSubmitting" class="mt-6 text-center">
            <AlertBox :status="{ isFinished, isAccepted, isRejected }" :text="progressText"/>
        </div>
    </div>
</template>
