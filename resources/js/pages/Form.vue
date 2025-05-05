<script setup>
import axios from 'axios'; // Make sure you import axios
import {computed, ref} from 'vue'
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
import MonthlyMortgageRent from '@/pages/Application/Expense/MonthlyMortgageRent.vue';
import MaritalStatus from '@/pages/Application/Applicant/MaritalStatus.vue';
import ResidentialStatus from '@/pages/Application/Residence/ResidentialStatus.vue';
import Utilities from '@/pages/Application/Expense/Utilities.vue';
import RecentLoanCount from '@/pages/Application/Applicant/RecentLoanCount.vue';
import AdultsLivingWith from '@/pages/Application/Applicant/AdultsLivingWith.vue';
import { usePage } from '@inertiajs/vue3';

const currentStep = ref(1)

function goToStep(step) {
    currentStep.value = step
}

const page = usePage()
const trackingParams = page.props.trackingParams


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
const getCookie = (name) => {
    const cookies = document.cookie.split('; ');
    let result = '';

    cookies.forEach((cookie) => {
        const [key, value] = cookie.split('=');
        if (key === name) {
            result = decodeURIComponent(value);
        }
    });

    return result;
}

// Add event listener to listen for message from parent
window.addEventListener('message', function(event) {
    if (event.origin !== 'http://localhost:10008') return; // Ensure it's from the correct domain

    const parentParams = event.data;

    // Now, use these parameters in your form
    const form = useForm({
        AffID: parentParams.AffID || '',
        OfferID: parentParams.OfferID || '',
        Campaign: '',
        AffSub: parentParams.AffSub || '',
        AffSub2: parentParams.AffSub2 || '',
        CreationUrl: window.location.href, // Current page URL
        ReferrerUrl: document.referrer || '', // URL of the page that referred to this one
        IpAddress: '127.0.0.1', // You would need to get this from the backend
        UserAgent: navigator.userAgent, // Browser information
    });

    console.log(form); // Log the form data to verify
});




console.log(getCookie())

const form = useForm({
    AffID: trackingParams.AffID,
    OfferID:  trackingParams.OfferID,
    Campaign: trackingParams.Campaign,
    AffSub: trackingParams.AffSub,
    AffSub2:  trackingParams.AffSub2,
    AffSub3:  trackingParams.AffSub3,
    AffSub4:  trackingParams.AffSub4,
    AffSub5:  trackingParams.AffSub5,
    CreationUrl: window.location.href, // Current page URL
    ReferrerUrl: document.referrer || '', // URL of the page that referred to this one
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
    EmployerName: '',
    JobTitle: '',
    EmployerIndustry: '',
    EmployerYears: '',
    NextPayDate: '',
    FollowingPayDate: '',

    ExpenseMonthlyMortgageRent: '',
    ExpenseUtilities: '',
    ExpenseTransport: '',
    ExpenseFood: '',
    ExpenseCredit: '',
    ExpenseCouncil: '',
    ExpenseOther: '',

    BankCard: '',
    BankAccountNumber: '',
    BankSortCode: '',

    ConsentMarketing: '',
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
            EmployerName: false,
            JobTitle: false,
            EmployerIndustry: false,
            EmployerYears: false,
            NextPayDate: false,
            FollowingPayDate: false,

            ExpenseTransport: false,
            ExpenseUtilities: false,
            ExpenseMonthlyMortgageRent: false,
            ExpenseFood: false,
            ExpenseCredit: false,
            ExpenseCouncil: false,
            ExpenseOther: false,

            BankCard: false,
            BankAccountNumber: false,
            BankSortCode: false,
            ConsentMarketing: false,
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
        EmployerName: '',
        JobTitle: '',
        EmployerIndustry: '',
        EmployerYears: '',
        NextPayDate: '',
        FollowingPayDate: '',

        ExpenseTransport: '',
        ExpenseUtilities: '',
        ExpenseMonthlyMortgageRent: '',
        ExpenseFood: '',
        ExpenseCredit: '',
        ExpenseCouncil: '',
        ExpenseOther: '',

        BankCard: '',
        BankAccountNumber: '',
        BankSortCode: '',

        ConsentMarketing: '',
        MarketingSms: '',
        MarketingEmail: '',
        MarketingPhone: ''
    }
});
// const testApplicationData = {
//     VendorID: "TESTER1",
//     OfferID: 2,
//     Campaign: "SpringPromo",
//     AffSub: "sub1",
//     AffSub2: "sub2",
//     AffSub3: "sub3",
//     AffSub4: "sub4",
//     AffSub5: "sub5",
//     CreationUrl: "https://example.com/loan-app",
//     ReferrerUrl: "https://affiliate.example.com",
//     IpAddress: "192.168.1.100",
//     UserAgent: "Mozilla/5.0 (Windows NT 10.0; Win64; x64)",
//     LoanAmount: "2000",
//     LoanTerm: 3,
//     LoanPurpose: 2,
//     Title: 1,
//     FirstName: "John",
//     LastName: "Doe",
//     Email: "john.doe@example.com",
//     MobilePhone: "07123456789",
//     HomePhone: "02081234567",
//     DateOfBirth: "15/06/1990",
//     MaritalStatus: 2,
//     Dependants: 2,
//     RecentLoanCount: 1,
//     AdultsLivingWith: 2,
//
//     ResidentialStatus: 1,
//     HouseNameNumber: "22B",
//     StreetAddress: "Baker Street",
//     County: "Greater London",
//     City: "London",
//     Postcode: "W1U7EU",
//     AddressYears: 5,
//
//     EmploymentStatus: 1,
//     EmployerIndustry: 1,
//     EmployerYears: 1,
//     IncomeFrequency: 1,
//     JobTitle: "Software Engineer",
//     EmployerName: "TechCorp Ltd",
//     WorkPhone: "02081234567",
//     NextPayDate: "2025-05-28",
//     FollowingPayDate: "2025-06-28",
//     NetMonthlyIncome: 2800.50,
//     YearsAtEmployer: 3,
//
//     MortgageRentExpense: 900.00,
//     TaxExpense: 300.00,
//     ExpenseFood: 250.00,
//     ExpenseTransport: 150.00,
//     ExpenseCredit: 100.00,
//     ExpenseCouncil: 100.00,
//     UtilitiesExpense: 50.00,
//     ExpenseOther: 75.00,
//
//     BankDirectDeposit: 1,
//     BankCard: 2,
//     BankSortCode: "123456", // Use digits only if backend requires
//     BankAccountNumber: "12345678",
//     BankYears: 8,
//     ConsentMarketing: true,
// };

const handleNextStep = () => {

    // debugger
    const hasErrors = ref(false)
    const errorMessages = ref([])

    if (currentStep.value === 1) {
        form.touched.LoanAmount = true;
        form.touched.LoanTerm = true;
        form.touched.LoanPurpose = true;
        form.touched.RecentLoanCount = true;

        const hasErrors = ref(false)
        const errorMessages = ref([])

        // Check for errors for Step 1
        if (!form.LoanAmount) {
            form.errors.LoanAmount = 'Loan amount is required.';
            hasErrors.value = true;
            errorMessages.value.push('Loan amount is required.');
        } else {
            form.errors.LoanAmount = ''; // Remove error if valid
        }

        if (!form.LoanTerm) {
            form.errors.LoanTerm = 'Loan term is required.';
            hasErrors.value = true;
            errorMessages.value.push('Loan term is required.');
        } else {
            form.errors.LoanTerm = ''; // Remove error if valid
        }

        if (!form.LoanPurpose) {
            form.errors.LoanPurpose = 'Loan purpose is required.';
            hasErrors.value = true;
            errorMessages.value.push('Loan purpose is required.');
        } else {
            form.errors.LoanPurpose = ''; // Remove error if valid
        }

        if (!form.RecentLoanCount) {
            form.errors.RecentLoanCount = 'Recent Loan Count is required.';
            hasErrors.value = true;
            errorMessages.value.push('Recent Loan Count is required.');
        } else {
            form.errors.RecentLoanCount = ''; // Remove error if valid
        }
    }
    if (currentStep.value === 2) {
        form.touched.Title = true;
        form.touched.FirstName = true;
        form.touched.LastName = true;
        form.touched.DateOfBirth = true;
        form.touched.Email = true;
        form.touched.MobilePhone = true;
        form.touched.HomePhone = true;
        form.touched.Dependants = true;
        form.touched.MaritalStatus = true;
        form.touched.AdultsLivingWith = true;

        const hasErrors = ref(false)
        const errorMessages = ref([])

        // Validate Title
        if (!form.Title) {
            form.errors.Title = 'Title is required.';
            hasErrors.value = true;
            errorMessages.value.push('Title is required.');
        } else {
            form.errors.Title = ''; // Remove error if valid
        }

        // Validate FirstName
        const firstNamePattern = /^[A-Za-z\s]+$/;
        if (!form.FirstName) {
            form.errors.FirstName = 'First name is required.';
            hasErrors.value = true;
            errorMessages.value.push('First name is required.');
        } else if (!firstNamePattern.test(form.FirstName)) {
            form.errors.FirstName = 'First name should not contain numbers or special characters.';
            hasErrors.value = true;
            errorMessages.value.push('First name should not contain numbers or special characters.');
        } else {
            form.errors.FirstName = ''; // Remove error if valid
        }

        // Validate LastName
        const lastNamePattern = /^[A-Za-z\s]+$/;
        if (!form.LastName) {
            form.errors.LastName = 'Last name is required.';
            hasErrors.value = true;
            errorMessages.value.push('Last name is required.');
        } else if (!lastNamePattern.test(form.LastName)) {
            form.errors.LastName = 'Last name should not contain numbers or special characters.';
            hasErrors.value = true;
            errorMessages.value.push('Last name should not contain numbers or special characters.');
        } else if (form.FirstName && form.FirstName.toLowerCase() === form.LastName.toLowerCase()) {
            form.errors.LastName = 'Last name cannot be the same as first name.';
            hasErrors.value = true;
            errorMessages.value.push('Last name cannot be the same as first name.');
        } else {
            form.errors.LastName = ''; // Remove error if valid
        }

        // Validate DateOfBirth
        const dob = form.DateOfBirth ? form.DateOfBirth.split('/') : [];
        if (dob.length !== 3 || dob.some(part => part === '')) {
            form.errors.DateOfBirth = 'Date of birth is required and must be a valid date.';
            hasErrors.value = true;
            errorMessages.value.push('Date of birth is required and must be a valid date.');
        } else {
            const [day, month, year] = dob;
            const validDay = parseInt(day);
            const validMonth = parseInt(month);
            const validYear = parseInt(year);

            const date = new Date(validYear, validMonth - 1, validDay);
            if (date.getFullYear() !== validYear || date.getMonth() !== validMonth - 1 || date.getDate() !== validDay) {
                form.errors.DateOfBirth = 'Please enter a valid date of birth.';
                hasErrors.value = true;
                errorMessages.value.push('Please enter a valid date of birth.');
            }

            // Check for age validity
            const today = new Date();
            const age = today.getFullYear() - validYear;
            if (age > 120) {
                form.errors.DateOfBirth = 'Age cannot be greater than 120 years.';
                hasErrors.value = true;
                errorMessages.value.push('Age cannot be greater than 120 years.');
            } else if (age < 18) {
                form.errors.DateOfBirth = 'You must be at least 18 years old.';
                hasErrors.value = true;
                errorMessages.value.push('You must be at least 18 years old.');
            } else {
                form.errors.DateOfBirth = ''; // Remove error if valid
            }
        }

        // Validate Email
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!form.Email || !emailPattern.test(form.Email)) {
            form.errors.Email = 'Please enter a valid email address.';
            hasErrors.value = true;
            errorMessages.value.push('Please enter a valid email address.');
        } else {
            form.errors.Email = ''; // Remove error if valid
        }

        // Validate MobilePhone
        const mobilePhonePattern = /^07\d{9}$/;
        if (!form.MobilePhone || !mobilePhonePattern.test(form.MobilePhone)) {
            form.errors.MobilePhone = 'Please enter a valid mobile phone number (starts with 07 and has 11 digits).';
            hasErrors.value = true;
            errorMessages.value.push('Please enter a valid mobile phone number (starts with 07 and has 11 digits).');
        } else {
            form.errors.MobilePhone = ''; // Remove error if valid
        }

        // Validate HomePhone

        const homePhonePattern = /^0\d{10}$/;
        const phone = form.HomePhone?.trim() || '';

        if (phone && phone.length === 11 && !homePhonePattern.test(phone)) {
            form.errors.HomePhone = 'Please enter a valid home phone number (starts with 0 and has exactly 11 digits).';
            hasErrors.value = true;
            errorMessages.value.push(form.errors.HomePhone);
        } else if (phone.length > 0 && phone.length < 11) {
            form.errors.HomePhone = 'Home number must be exactly 11 digits.';
            hasErrors.value = true;
            errorMessages.value.push(form.errors.HomePhone);
        } else {
            form.errors.HomePhone = ''; // Valid or empty
        }


        // Validate Dependants
        if (!form.Dependants) {
            form.errors.Dependants = 'Dependants information is required.';
            hasErrors.value = true;
            errorMessages.value.push('Dependants information is required.');
        } else {
            form.errors.Dependants = ''; // Remove error if valid
        }

        // Validate MaritalStatus
        if (!form.MaritalStatus) {
            form.errors.MaritalStatus = 'Marital Status information is required.';
            hasErrors.value = true;
            errorMessages.value.push('Marital Status information is required.');
        } else {
            form.errors.MaritalStatus = ''; // Remove error if valid
        }

        // Validate MaritalStatus
        if (!form.AdultsLivingWith) {
            form.errors.AdultsLivingWith = 'Adults Living with information is required.';
            hasErrors.value = true;
            errorMessages.value.push('Adults Living with information is required.');
        } else {
            form.errors.AdultsLivingWith = ''; // Remove error if valid
        }
    }
    if (currentStep.value === 3) {

        const hasErrors = ref(false)
        const errorMessages = ref([])

        const today = new Date().setHours(0, 0, 0, 0);
        const nextPayDate = form.NextPayDate ? new Date(form.NextPayDate).setHours(0, 0, 0, 0) : null;
        const followingPayDate = form.FollowingPayDate ? new Date(form.FollowingPayDate).setHours(0, 0, 0, 0) : null;

        const requiresEmployerDetails = ['Full time', 'Part time', 'Self employed'].includes(form.EmploymentStatus);

        form.touched.EmploymentStatus = true;
        form.touched.EmployerName = true;
        form.touched.JobTitle = true;
        form.touched.EmployerIndustry = true;
        form.touched.EmployerYears = true;
        form.touched.NextPayDate = true;
        form.touched.FollowingPayDate = true;

        // Employment Status
        if (!form.EmploymentStatus) {
            form.errors.EmploymentStatus = 'Employment status is required.';
            hasErrors.value = true;
            errorMessages.value.push('Employment status is required.');
        } else {
            form.errors.EmploymentStatus = '';
        }

        // Employer Name
        if (requiresEmployerDetails && !form.EmployerName) {
            form.errors.EmployerName = 'Employer name is required.';
            hasErrors.value = true;
            errorMessages.value.push('Employer name is required.');
        } else {
            form.errors.EmployerName = '';
        }

        // Job Title
        if (requiresEmployerDetails && !form.JobTitle) {
            form.errors.JobTitle = 'Job title is required.';
            hasErrors.value = true;
            errorMessages.value.push('Job title is required.');
        } else {
            form.errors.JobTitle = '';
        }

        // Employer Industry
        if (!form.EmployerIndustry) {
            form.errors.EmployerIndustry = 'Employer industry is required.';
            hasErrors.value = true;
            errorMessages.value.push('Employer industry is required.');
        } else {
            form.errors.EmployerIndustry = '';
        }

        // Employer Years
        if (!form.EmployerYears) {
            form.errors.EmployerYears = 'Employer years is required.';
            hasErrors.value = true;
            errorMessages.value.push('Employer years is required.');
        } else {
            form.errors.EmployerYears = '';
        }

        // Next Pay Date
        if (!form.NextPayDate) {
            form.errors.NextPayDate = 'Next pay date is required.';
            hasErrors.value = true;
            errorMessages.value.push('Next pay date is required.');
        } else if (nextPayDate < today) {
            form.errors.NextPayDate = 'Next pay date must be today or a future date.';
            hasErrors.value = true;
            errorMessages.value.push('Next pay date must be today or a future date.');
        } else if (nextPayDate === followingPayDate) {
            form.errors.NextPayDate = 'Next pay date cannot be the same as following pay date.';
            hasErrors.value = true;
            errorMessages.value.push('Next pay date cannot be the same as following pay date.');
        } else {
            form.errors.NextPayDate = '';
        }

        // Following Pay Date
        if (!form.FollowingPayDate) {
            form.errors.FollowingPayDate = 'Following pay date is required.';
            hasErrors.value = true;
            errorMessages.value.push('Following pay date is required.');
        } else if (followingPayDate < today) {
            form.errors.FollowingPayDate = 'Following pay date must be today or a future date.';
            hasErrors.value = true;
            errorMessages.value.push('Following pay date must be today or a future date.');
        } else if (nextPayDate === followingPayDate) {
            form.errors.FollowingPayDate = 'Following pay date cannot be the same as next pay date.';
            hasErrors.value = true;
            errorMessages.value.push('Following pay date cannot be the same as next pay date.');
        } else {
            form.errors.FollowingPayDate = '';
        }
    }
    if (currentStep.value === 4) {
        form.touched.HouseNameNumber = true;
        form.touched.StreetAddress = true;
        form.touched.County = true;
        form.touched.City = true;
        form.touched.Postcode = true;
        form.touched.AddressYears = true;

        const hasErrors = ref(false)
        const errorMessages = ref([])


        // House Name/Number
        if (!form.HouseNameNumber) {
            form.errors.HouseNameNumber = 'House name/number is required.';
            hasErrors.value = true;
            errorMessages.value.push('House name/number is required.');
        } else {
            form.errors.HouseNameNumber = '';
        }

        // Street Address
        if (!form.StreetAddress) {
            form.errors.StreetAddress = 'Street address is required.';
            hasErrors.value = true;
            errorMessages.value.push('Street address is required.');
        } else {
            form.errors.StreetAddress = '';
        }

        // County
        if (!form.County) {
            form.errors.County = 'County is required.';
            hasErrors.value = true;
            errorMessages.value.push('County is required.');
        } else {
            form.errors.County = '';
        }

        // City
        if (!form.City) {
            form.errors.City = 'City is required.';
            hasErrors.value = true;
            errorMessages.value.push('City is required.');
        } else {
            form.errors.City = '';
        }

        // Postcode (validating UK postcode)
        const ukPostcodeRegex = /^([A-Z]{1,2}\d{1,2}[A-Z]?\s?\d[A-Z]{2})$/i;
        if (!form.Postcode) {
            form.errors.Postcode = 'Postcode is required.';
            hasErrors.value = true;
            errorMessages.value.push('Postcode is required.');
        } else if (!ukPostcodeRegex.test(form.Postcode.trim())) {
            form.errors.Postcode = 'Enter a valid UK postcode.';
            hasErrors.value = true;
            errorMessages.value.push('Enter a valid UK postcode.');
        } else {
            form.errors.Postcode = '';
        }

        // Address Years
        if (!form.AddressYears) {
            form.errors.AddressYears = 'Address years is required.';
            hasErrors.value = true;
            errorMessages.value.push('Address years is required.');
        } else {
            form.errors.AddressYears = '';
        }

        // If errors exist, return false, otherwise return true
        // return !hasErrors;
    }
    if (currentStep.value === 5) {
        form.touched.ExpenseMonthlyMortgageRent = true;
        form.touched.ExpenseTransport = true;
        form.touched.ExpenseFood = true;
        form.touched.ExpenseFood = true;
        form.touched.ExpenseCredit = true;
        form.touched.ExpenseCouncil = true;
        form.touched.ExpenseOther = true;


        const hasErrors = ref(false)
        const errorMessages = ref([])

        // Expense Food
        if (!form.ExpenseFood) {
            form.errors.ExpenseFood = 'Food expense is required.';
            hasErrors.value = true;
            errorMessages.value.push('Food expense is required.');
        } else if (isNaN(form.ExpenseFood) || form.ExpenseFood < 0) {
            form.errors.ExpenseFood = 'Food expense must be a positive number.';
            hasErrors.value = true;
            errorMessages.value.push('Food expense must be a positive number.');
        } else {
            form.errors.ExpenseFood = '';
        }

        // Expense Credit
        if (!form.ExpenseCredit) {
            form.errors.ExpenseCredit = 'Credit expense is required.';
            hasErrors.value = true;
            errorMessages.value.push('Credit expense is required.');
        } else if (isNaN(form.ExpenseCredit) || form.ExpenseCredit < 0) {
            form.errors.ExpenseCredit = 'Credit expense must be a positive number.';
            hasErrors.value = true;
            errorMessages.value.push('Credit expense must be a positive number.');
        } else {
            form.errors.ExpenseCredit = '';
        }

        // Expense Council
        if (!form.ExpenseCouncil) {
            form.errors.ExpenseCouncil = 'Council tax expense is required.';
            hasErrors.value = true;
            errorMessages.value.push('Council tax expense is required.');
        } else if (isNaN(form.ExpenseCouncil) || form.ExpenseCouncil < 0) {
            form.errors.ExpenseCouncil = 'Council tax expense must be a positive number.';
            hasErrors.value = true;
            errorMessages.value.push('Council tax expense must be a positive number.');
        } else {
            form.errors.ExpenseCouncil = '';
        }

        // Expense Other
        if (!form.ExpenseOther) {
            form.errors.ExpenseOther = 'Other expense is required.';
            hasErrors.value = true;
            errorMessages.value.push('Other expense is required.');
        } else if (isNaN(form.ExpenseOther) || form.ExpenseOther < 0) {
            form.errors.ExpenseOther = 'Other expense must be a positive number.';
            hasErrors.value = true;
            errorMessages.value.push('Other expense must be a positive number.');
        } else {
            form.errors.ExpenseOther = '';
        }

        // If errors exist, return false, otherwise return true
        // return !hasErrors;
    }
    if (currentStep.value === 6) {
        form.touched.BankCard = true;
        form.touched.BankAccountNumber = true;
        form.touched.BankSortCode = true;
        form.touched.ConsentMarketing = true;

        const hasErrors = ref(false)
        const errorMessages = ref([])

        // Bank Card
        if (!form.BankCard) {
            form.errors.BankCard = 'Bank card is required.';
            hasErrors.value = true;
            errorMessages.value.push('Bank card is required.');
        } else {
            form.errors.BankCard = '';
        }

        // Bank Account Number
        if (!form.BankAccountNumber) {
            form.errors.BankAccountNumber = 'Bank account number is required.';
            hasErrors.value = true;
            errorMessages.value.push('Bank account number is required.');
        } else if (isNaN(form.BankAccountNumber) || form.BankAccountNumber.length < 8) {
            form.errors.BankAccountNumber = 'Account number must be a valid 8-digit number.';
            hasErrors.value = true;
            errorMessages.value.push('Account number must be a valid 8-digit number.');
        } else {
            form.errors.BankAccountNumber = '';
        }

        // Bank Sort Code
        const sortCodeRegex = /^[0-9]{6}$/; // UK sort code format (6 digits)
        if (!form.BankSortCode) {
            form.errors.BankSortCode = 'Bank sort code is required.';
            hasErrors.value = true;
            errorMessages.value.push('Bank sort code is required.');
        } else if (!sortCodeRegex.test(form.BankSortCode)) {
            form.errors.BankSortCode = 'Sort code must be a valid 6-digit number.';
            hasErrors.value = true;
            errorMessages.value.push('Sort code must be a valid 6-digit number.');
        } else {
            form.errors.BankSortCode = '';
        }

        // Consent to Marketing
        if (form.ConsentMarketing === null) {
            form.errors.ConsentMarketing = 'Consent to marketing is required.';
            hasErrors.value = true;
            errorMessages.value.push('Consent to marketing is required.');
        } else {
            form.errors.ConsentMarketing = '';
        }

        // Return the result based on errors
        // return !hasErrors;
    }

    // If there are any errors, show an alert
    if (hasErrors) {
        // hasErrors.value = errorMessages.value;
        // alert('Please fix the following errors:\n\n' + errorMessages.value.join('\n'));
    } else {
        // If the step is valid, proceed to the next step
        nextStep();
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Smooth scrolling
        });
    }
};


const isStepValid = computed(() => {
    // debugger
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
    return stepValidationMap[currentStep.value]?.value;  // Defaults to `true` if no match
});

// Step Validation
const isStep1Valid = computed(() => {
    let valid = true;

    // Validate LoanAmount
    if (!form.LoanAmount && form.touched.LoanAmount) {
        form.errors.LoanAmount = 'Loan amount is required.';
        valid = false;
    }

    // Validate LoanTerm
    if (!form.LoanTerm && form.touched.LoanTerm) {
        form.errors.LoanTerm = 'Loan term is required.';
        valid = false;
    }

    // Validate LoanPurpose
    if (!form.LoanPurpose && form.touched.LoanPurpose) {
        form.errors.LoanPurpose = 'Loan purpose is required.';
        valid = false;
    }

    // Validate RecentLoanCount
    if (!form.RecentLoanCount && form.touched.RecentLoanCount) {
        form.errors.RecentLoanCount = 'Recent Loan Count is required.';
        valid = false;
    }

    return valid;
});
const isStep2Valid = computed(() => {
    let valid = true;

    // Validate Title
    if (form.touched.Title && !form.Title) {
        form.errors.Title = 'Title is required.';
        valid = false;
    } else {
        form.errors.Title = ''; // Clear error if valid
    }

    const firstNamePattern = /^[A-Za-z\s]+$/; // Only letters and spaces allowed
    if (form.touched.FirstName && !form.FirstName) {
        form.errors.FirstName = 'First name is required.';
        valid = false;
    } else if (form.touched.FirstName && !firstNamePattern.test(form.FirstName)) {
        form.errors.FirstName = 'First name should not contain numbers or special characters.';
        valid = false;
    } else {
        form.errors.FirstName = ''; // Clear error if valid
    }

    // Validate LastName
    const lastNamePattern = /^[A-Za-z\s]+$/; // Only letters and spaces allowed
    if (form.touched.LastName && !form.LastName) {
        form.errors.LastName = 'Last name is required.';
        valid = false;
    } else if (form.touched.LastName && !lastNamePattern.test(form.LastName)) {
        form.errors.LastName = 'Last name should not contain numbers or special characters.';
        valid = false;
    } else if (form.touched.LastName && form.FirstName && form.FirstName.toLowerCase() === form.LastName.toLowerCase()) {
        form.errors.LastName = 'Last name cannot be the same as first name.';
        valid = false;
    } else {
        form.errors.LastName = ''; // Clear error if valid
    }

    // Validate DateOfBirth
    const dob = form.DateOfBirth ? form.DateOfBirth.split('/') : [];
    if (form.touched.DateOfBirth && (dob.length !== 3 || dob.some(part => part === ''))) {
        form.errors.DateOfBirth = 'Date of birth is required and must be a valid date.';
        valid = false;
    } else {
        form.errors.DateOfBirth = ''; // Clear error if valid
    }

    // Validate Email
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (form.touched.Email && (!form.Email || !emailPattern.test(form.Email))) {
        form.errors.Email = 'Please enter a valid email address.';
        valid = false;
    } else {
        form.errors.Email = ''; // Clear error if valid
    }

    // Validate MobilePhone
    const mobilePhonePattern = /^07\d{9}$/;
    if (form.touched.MobilePhone && (!form.MobilePhone || !mobilePhonePattern.test(form.MobilePhone))) {
        form.errors.MobilePhone = 'Please enter a valid mobile phone number (starts with 07 and has 11 digits).';
        valid = false;
    } else {
        form.errors.MobilePhone = ''; // Clear error if valid
    }

    // Validate HomePhone
    const homePhonePattern = /^0\d{10}$/;
    if (form.touched.HomePhone && form.HomePhone && !homePhonePattern.test(form.HomePhone)) {
        form.errors.HomePhone = 'Please enter a valid home phone number (starts with 0 and has exactly 11 digits).';
        valid = false;
    } else {
        form.errors.HomePhone = ''; // Clear error if valid
    }

    // Validate Dependants
    if (form.touched.Dependants && !form.Dependants) {
        form.errors.Dependants = 'Dependants information is required.';
        valid = false;
    } else {
        form.errors.Dependants = ''; // Clear error if valid
    }

    // Validate MaritalStatus
    if (form.touched.MaritalStatus && !form.MaritalStatus) {
        form.errors.MaritalStatus = 'Marital Status information is required.';
        valid = false;
    } else {
        form.errors.MaritalStatus = ''; // Clear error if valid
    }

    // Validate AdultsLivingWith
    if (form.touched.AdultsLivingWith && !form.AdultsLivingWith) {
        form.errors.AdultsLivingWith = 'Adults Living with information is required.';
        valid = false;
    } else {
        form.errors.AdultsLivingWith = ''; // Clear error if valid
    }

    return valid;
});
const isStep3Valid = computed(() => {
    let valid = true;
    const today = new Date().setHours(0, 0, 0, 0);
    const nextPayDate = form.NextPayDate ? new Date(form.NextPayDate).setHours(0, 0, 0, 0) : null;
    const followingPayDate = form.FollowingPayDate ? new Date(form.FollowingPayDate).setHours(0, 0, 0, 0) : null;

    const requiresEmployerDetails = ['Full time', 'Part time', 'Self employed'].includes(form.EmploymentStatus);

    // Employment Status
    if (form.touched.EmploymentStatus && !form.EmploymentStatus) {
        form.errors.EmploymentStatus = 'Employment status is required.';
        valid = false;
    } else {
        form.errors.EmploymentStatus = '';
    }

    // Employer Name (conditionally validated)
    if (requiresEmployerDetails && form.touched.EmployerName && !form.EmployerName) {
        form.errors.EmployerName = 'Employer name is required.';
        valid = false;
    } else {
        form.errors.EmployerName = '';
    }

    // Job Title (conditionally validated)
    if (requiresEmployerDetails && form.touched.JobTitle && !form.JobTitle) {
        form.errors.JobTitle = 'Job title is required.';
        valid = false;
    } else {
        form.errors.JobTitle = '';
    }

    // Employer Industry
    if (form.touched.EmployerIndustry && !form.EmployerIndustry) {
        form.errors.EmployerIndustry = 'Employer industry is required.';
        valid = false;
    } else {
        form.errors.EmployerIndustry = '';
    }

    // Employer Years
    if (form.touched.EmployerYears && !form.EmployerYears) {
        form.errors.EmployerYears = 'Employer years is required.';
        valid = false;
    } else {
        form.errors.EmployerYears = '';
    }

    // Next Pay Date
    if (form.touched.NextPayDate && !form.NextPayDate) {
        form.errors.NextPayDate = 'Next pay date is required.';
        valid = false;
    } else if (nextPayDate !== null && nextPayDate < today) {
        form.errors.NextPayDate = 'Next pay date must be today or a future date.';
        valid = false;
    } else if (nextPayDate !== null && followingPayDate !== null && nextPayDate === followingPayDate) {
        form.errors.NextPayDate = 'Next pay date cannot be the same as following pay date.';
        valid = false;
    } else {
        form.errors.NextPayDate = '';
    }

    // Following Pay Date
    if (form.touched.FollowingPayDate && !form.FollowingPayDate) {
        form.errors.FollowingPayDate = 'Following pay date is required.';
        valid = false;
    } else if (followingPayDate !== null && followingPayDate < today) {
        form.errors.FollowingPayDate = 'Following pay date must be today or a future date.';
        valid = false;
    } else if (nextPayDate !== null && followingPayDate !== null && nextPayDate === followingPayDate) {
        form.errors.FollowingPayDate = 'Following pay date cannot be the same as next pay date.';
        valid = false;
    } else {
        form.errors.FollowingPayDate = '';
    }

    return valid;
});
const isStep4Valid = computed(() => {
    let valid = true;

    // debugger
    // House Name/Number
    if (form.touched.HouseNameNumber && !form.HouseNameNumber) {
        form.errors.HouseNameNumber = 'House name/number is required.';
        valid = false;
    } else {
        form.errors.HouseNameNumber = '';
    }

    // Street Address
    if (form.touched.StreetAddress && !form.StreetAddress) {
        form.errors.StreetAddress = 'Street address is required.';
        valid = false;
    } else {
        form.errors.StreetAddress = '';
    }

    // County
    if (form.touched.County && !form.County) {
        form.errors.County = 'County is required.';
        valid = false;
    } else {
        form.errors.County = '';
    }

    // City
    if (form.touched.City && !form.City) {
        form.errors.City = 'City is required.';
        valid = false;
    } else {
        form.errors.City = '';
    }

    // Postcode
    const ukPostcodeRegex = /^([A-Z]{1,2}\d{1,2}[A-Z]?\s?\d[A-Z]{2})$/i;
    if (form.touched.Postcode && !form.Postcode) {
        form.errors.Postcode = 'Residence.Postcode is required.';
        valid = false;
    } else if (form.Postcode && !ukPostcodeRegex.test(form.Postcode.trim())) {
        form.errors.Postcode = 'Enter a valid UK postcode.';
        valid = false;
    } else {
        form.errors.Postcode = '';
    }

    // Address Years
    if (form.touched.AddressYears && !form.AddressYears) {
        form.errors.AddressYears = 'Address years is required.';
        valid = false;
    } else {
        form.errors.AddressYears = '';
    }

    return valid;
});
const isStep5Valid = computed(() => {
    let valid = true;

    // Monthly Mortgage Rent
    if (form.touched.ExpenseMonthlyMortgageRent && !form.ExpenseMonthlyMortgageRent) {
        form.errors.ExpenseMonthlyMortgageRent = 'Monthly Mortgage Rent expense is required.';
        valid = false;
    } else if (form.ExpenseMonthlyMortgageRent && (isNaN(form.ExpenseMonthlyMortgageRent) || form.ExpenseMonthlyMortgageRent < 0)) {
        form.errors.ExpenseMonthlyMortgageRent = 'Monthly Mortgage Rent expense must be a positive number.';
        valid = false;
    } else {
        form.errors.ExpenseMonthlyMortgageRent = '';
    }

    // Transport
    if (form.touched.ExpenseTransport && !form.ExpenseTransport) {
        form.errors.ExpenseTransport = 'Transport expense is required.';
        valid = false;
    } else if (form.ExpenseTransport && (isNaN(form.ExpenseTransport) || form.ExpenseTransport < 0)) {
        form.errors.ExpenseTransport = 'Transport expense must be a positive number.';
        valid = false;
    } else {
        form.errors.ExpenseTransport = '';
    }

    // Expense Food
    if (form.touched.ExpenseFood && !form.ExpenseFood) {
        form.errors.ExpenseFood = 'Food expense is required.';
        valid = false;
    } else if (form.ExpenseFood && (isNaN(form.ExpenseFood) || form.ExpenseFood < 0)) {
        form.errors.ExpenseFood = 'Food expense must be a positive number.';
        valid = false;
    } else {
        form.errors.ExpenseFood = '';
    }

    // Expense Credit
    if (form.touched.ExpenseCredit && !form.ExpenseCredit) {
        form.errors.ExpenseCredit = 'Credit expense is required.';
        valid = false;
    } else if (form.ExpenseCredit && (isNaN(form.ExpenseCredit) || form.ExpenseCredit < 0)) {
        form.errors.ExpenseCredit = 'Credit expense must be a positive number.';
        valid = false;
    } else {
        form.errors.ExpenseCredit = '';
    }

    // Expense Council
    if (form.touched.ExpenseCouncil && !form.ExpenseCouncil) {
        form.errors.ExpenseCouncil = 'Council tax expense is required.';
        valid = false;
    } else if (form.ExpenseCouncil && (isNaN(form.ExpenseCouncil) || form.ExpenseCouncil < 0)) {
        form.errors.ExpenseCouncil = 'Council tax expense must be a positive number.';
        valid = false;
    } else {
        form.errors.ExpenseCouncil = '';
    }

    // Monthly Utilities
    if (form.touched.ExpenseUtilities && !form.ExpenseUtilities) {
        form.errors.ExpenseUtilities = 'Monthly Mortgage Rent expense is required.';
        valid = false;
    } else if (form.ExpenseUtilities && (isNaN(form.ExpenseUtilities) || form.ExpenseUtilities < 0)) {
        form.errors.ExpenseUtilities = 'Monthly Mortgage Rent expense must be a positive number.';
        valid = false;
    } else {
        form.errors.ExpenseUtilities = '';
    }

    // Expense Other
    if (form.touched.ExpenseOther && !form.ExpenseOther) {
        form.errors.ExpenseOther = 'Other expense is required.';
        valid = false;
    } else if (form.ExpenseOther && (isNaN(form.ExpenseOther) || form.ExpenseOther < 0)) {
        form.errors.ExpenseOther = 'Other expense must be a positive number.';
        valid = false;
    } else {
        form.errors.ExpenseOther = '';
    }

    return valid;
});
const isStep6Valid = computed(() => {
    let valid = true;

    // Bank Card
    if (form.touched.BankCard && !form.BankCard) {
        form.errors.BankCard = 'Bank card is required.';
        valid = false;
    } else {
        form.errors.BankCard = '';
    }

    // Bank Account Number
    if (form.touched.BankAccountNumber && !form.BankAccountNumber) {
        form.errors.BankAccountNumber = 'Bank account number is required.';
        valid = false;
    } else if (form.BankAccountNumber && (isNaN(form.BankAccountNumber) || form.BankAccountNumber.length < 8)) {
        form.errors.BankAccountNumber = 'Account number must be a valid 8-digit number.';
        valid = false;
    } else {
        form.errors.BankAccountNumber = '';
    }

    // Bank Sort Code
    const sortCodeRegex = /^[0-9]{6}$/; // UK sort code format (6 digits)
    if (form.touched.BankSortCode && !form.BankSortCode) {
        form.errors.BankSortCode = 'Bank sort code is required.';
        valid = false;
    } else if (form.BankSortCode && !sortCodeRegex.test(form.BankSortCode)) {
        form.errors.BankSortCode = 'Sort code must be a valid 6-digit number.';
        valid = false;
    } else {
        form.errors.BankSortCode = '';
    }

    // Consent to Marketing
    if (form.touched.ConsentMarketing && form.ConsentMarketing === null) {
        form.errors.ConsentMarketing = 'Consent to marketing is required.';
        valid = false;
    } else {
        form.errors.ConsentMarketing = '';
    }

    return valid;
});



// Validate
const validateLoanAmount = () => {
    if (!form.LoanAmount) {
        form.errors.LoanAmount = 'Loan amount is required.'; // Set error message if invalid
    } else {
        form.errors.LoanAmount = ''; // Clear error if valid
    }
};
const validateLoanTerm = () => {
    if (!form.LoanTerm) {
        form.errors.LoanTerm = 'Loan term is required.'; // Set error message if invalid
    } else {
        form.errors.LoanTerm = ''; // Clear error if valid
    }
};
const validateLoanPurpose = () => {
    if (!form.LoanPurpose) {
        form.errors.LoanPurpose = 'Loan purpose is required.'; // Set error message if invalid
    } else {
        form.errors.LoanPurpose = ''; // Clear error if valid
    }
};
const validateRecentLoanCount = () => {
    if (!form.RecentLoanCount) {
        form.errors.RecentLoanCount = 'Recent Loan count is required.'; // Set error message if invalid
    } else {
        form.errors.RecentLoanCount = ''; // Clear error if valid
    }
};
const validateTitle = () => {
    if (!form.Title) {
        form.errors.Title = 'Title is required.';
    } else {
        form.errors.Title = ''; // Clear error if valid
    }
};
const validateFirstName = () => {
    if (!form.FirstName) {
        form.errors.FirstName = 'First name is required.';
    } else {
        form.errors.FirstName = ''; // Clear error if valid
    }
};
const validateLastName = () => {
    if (!form.LastName) {
        form.errors.LastName = 'Last name is required.';
    } else {
        form.errors.LastName = ''; // Clear error if valid
    }
};
const validateDateOfBirth = () => {
    if (!form.DateOfBirth) {
        form.errors.DateOfBirth = 'Date of birth is required.';
    } else {
        form.errors.DateOfBirth = ''; // Clear error if valid
    }
};
const validateEmail = () => {
    if (!form.Email) {
        form.errors.Email = 'Email is required.';
    } else {
        form.errors.Email = ''; // Clear error if valid
    }
};
const validateMobilePhone = () => {
    if (!form.MobilePhone) {
        form.errors.MobilePhone = 'Mobile phone is required.';
    } else {
        form.errors.MobilePhone = ''; // Clear error if valid
    }
};
const validateHomePhone = () => {
    if (!form.HomePhone) {
        form.errors.HomePhone = 'Home phone is required.';
    } else {
        form.errors.HomePhone = ''; // Clear error if valid
    }
};
const validateDependants = () => {
    if (!form.Dependants) {
        form.errors.Dependants = 'Dependants are required.';
    } else {
        form.errors.Dependants = ''; // Clear error if valid
    }
};
const validateMaritalStatus = () => {
    if (!form.MaritalStatus) {
        form.errors.MaritalStatus = 'Marital Status are required.';
    } else {
        form.errors.MaritalStatus = ''; // Clear error if valid
    }
};
const validateAdultsLivingWith = () => {
    if (!form.AdultsLivingWith) {
        form.errors.AdultsLivingWith = 'Adults Living With are required.';
    } else {
        form.errors.AdultsLivingWith = ''; // Clear error if valid
    }
};
const validateEmploymentStatus = () => {
    if (!form.EmploymentStatus) {
        form.errors.EmploymentStatus = 'Employment status is required.';
    } else {
        form.errors.EmploymentStatus = ''; // Clear error if valid
    }
};
const validateEmployerName = () => {
    if (!form.EmployerName) {
        form.errors.EmployerName = 'Employer name is required.';
    } else {
        form.errors.EmployerName = ''; // Clear error if valid
    }
};
const validateJobTitle = () => {
    if (!form.JobTitle) {
        form.errors.JobTitle = 'Job title is required.';
    } else {
        form.errors.JobTitle = ''; // Clear error if valid
    }
};
const validateEmployerIndustry = () => {
    if (!form.EmployerIndustry) {
        form.errors.EmployerIndustry = 'Employer industry is required.';
    } else {
        form.errors.EmployerIndustry = ''; // Clear error if valid
    }
};
const validateEmployerYears = () => {
    if (!form.EmployerYears) {
        form.errors.EmployerYears = 'Employer years is required.';
    } else {
        form.errors.EmployerYears = ''; // Clear error if valid
    }
};
const validateNextPayDate = () => {
    const today = new Date().setHours(0, 0, 0, 0);
    const nextPayDate = new Date(form.NextPayDate).setHours(0, 0, 0, 0);
    const followingPayDate = form.FollowingPayDate ? new Date(form.FollowingPayDate).setHours(0, 0, 0, 0) : null;

    if (!form.NextPayDate) {
        form.errors.NextPayDate = 'Next pay date is required.';
    } else if (nextPayDate < today) {
        form.errors.NextPayDate = 'Next pay date must be today or a future date.';
    } else if (followingPayDate && nextPayDate === followingPayDate) {
        form.errors.NextPayDate = 'Next pay date cannot be the same as following pay date.';
    } else {
        form.errors.NextPayDate = '';
    }
};
const validateFollowingPayDate = () => {
    const today = new Date().setHours(0, 0, 0, 0);
    const followingPayDate = new Date(form.FollowingPayDate).setHours(0, 0, 0, 0);
    const nextPayDate = form.NextPayDate ? new Date(form.NextPayDate).setHours(0, 0, 0, 0) : null;

    if (!form.FollowingPayDate) {
        form.errors.FollowingPayDate = 'Following pay date is required.';
    } else if (followingPayDate < today) {
        form.errors.FollowingPayDate = 'Following pay date must be today or a future date.';
    } else if (nextPayDate && followingPayDate === nextPayDate) {
        form.errors.FollowingPayDate = 'Following pay date cannot be the same as next pay date.';
    } else {
        form.errors.FollowingPayDate = '';
    }
};
const validateResidentialStatus = () => {
    if (!form.ResidentialStatus) {
        form.errors.ResidentialStatus = 'Residential Status are required.';
    } else {
        form.errors.ResidentialStatus = ''; // Clear error if valid
    }
};
const validateHouseNameNumber = () => {
    if (!form.HouseNameNumber) {
        form.errors.HouseNameNumber = 'House name or number is required.';
    } else {
        form.errors.HouseNameNumber = '';
    }
};
const validateStreetAddress = () => {
    if (!form.StreetAddress) {
        form.errors.StreetAddress = 'Street address is required.';
    } else {
        form.errors.StreetAddress = '';
    }
};
const validateCounty = () => {
    if (!form.County) {
        form.errors.County = 'County is required.';
    } else {
        form.errors.County = '';
    }
};
const validateCity = () => {
    if (!form.City) {
        form.errors.City = 'City is required.';
    } else {
        form.errors.City = '';
    }
};
const validatePostcode = () => {
    const ukPostcodeRegex = /^([A-Z]{1,2}\d{1,2}[A-Z]?\s?\d[A-Z]{2})$/i;

    if (!form.Postcode) {
        form.errors.Postcode = 'Postcode is required.';
    } else if (!ukPostcodeRegex.test(form.Postcode.trim())) {
        form.errors.Postcode = 'Enter a valid UK postcode.';
    } else {
        form.errors.Postcode = '';
    }
};
const validateAddressYears = () => {
    if (!form.AddressYears) {
        form.errors.AddressYears = 'Address years is required.';
    } else {
        form.errors.AddressYears = '';
    }
};
const validateExpenseMonthlyMortgageRent = () => {
    if (!form.ExpenseMonthlyMortgageRent) {
        form.errors.ExpenseMonthlyMortgageRent = 'Monthly Mortgage / Rent expense is required.';
    } else if (isNaN(form.ExpenseMonthlyMortgageRent) || form.ExpenseMonthlyMortgageRent < 0) {
        form.errors.ExpenseMonthlyMortgageRent = 'Monthly Mortgage / Rent expense must be a positive number.';
    } else {
        form.errors.ExpenseMonthlyMortgageRent = '';
    }
};
const validateExpenseUtilities = () => {
    if (!form.ExpenseUtilities) {
        form.errors.ExpenseUtilities = 'Utilities is required.';
    } else if (isNaN(form.ExpenseUtilities) || form.ExpenseUtilities < 0) {
        form.errors.ExpenseUtilities = 'Utilities must be a positive number.';
    } else {
        form.errors.ExpenseUtilities = '';
    }
};
const validateExpenseTransport = () => {
    if (!form.ExpenseTransport) {
        form.errors.ExpenseTransport = 'Transport expense is required.';
    } else if (isNaN(form.ExpenseTransport) || form.ExpenseTransport < 0) {
        form.errors.ExpenseTransport = 'Transport expense must be a positive number.';
    } else {
        form.errors.ExpenseTransport = '';
    }
};
const validateExpenseFood = () => {
    if (!form.ExpenseFood) {
        form.errors.ExpenseFood = 'Food expense is required.';
    } else if (isNaN(form.ExpenseFood) || form.ExpenseFood < 0) {
        form.errors.ExpenseFood = 'Food expense must be a positive number.';
    } else {
        form.errors.ExpenseFood = '';
    }
};
const validateExpenseCredit = () => {
    if (!form.ExpenseCredit) {
        form.errors.ExpenseCredit = 'Credit expense is required.';
    } else if (isNaN(form.ExpenseCredit) || form.ExpenseCredit < 0) {
        form.errors.ExpenseCredit = 'Credit expense must be a positive number.';
    } else {
        form.errors.ExpenseCredit = '';
    }
};
const validateExpenseCouncil = () => {
    if (!form.ExpenseCouncil) {
        form.errors.ExpenseCouncil = 'Council tax expense is required.';
    } else if (isNaN(form.ExpenseCouncil) || form.ExpenseCouncil < 0) {
        form.errors.ExpenseCouncil = 'Council tax expense must be a positive number.';
    } else {
        form.errors.ExpenseCouncil = '';
    }
};
const validateExpenseOther = () => {
    if (!form.ExpenseOther) {
        form.errors.ExpenseOther = 'Other expense is required.';
    } else if (isNaN(form.ExpenseOther) || form.ExpenseOther < 0) {
        form.errors.ExpenseOther = 'Other expense must be a positive number.';
    } else {
        form.errors.ExpenseOther = '';
    }
};
const validateBankCard = () => {
    // debugger
    if (!form.BankCard) {
        form.errors.BankCard = 'Bank card is required.';
    } else {
        // Optionally add more complex validation for card number format here (e.g., Luhn algorithm for checking card number validity).
        form.errors.BankCard = '';
    }
};
const validateBankAccountNumber = () => {
    if (!form.BankAccountNumber) {
        form.errors.BankAccountNumber = 'Bank account number is required.';
    } else if (isNaN(form.BankAccountNumber) || form.BankAccountNumber.length < 8) {
        form.errors.BankAccountNumber = 'Account number must be a valid 8-digit number.';
    } else {
        form.errors.BankAccountNumber = '';
    }
};
const validateBankSortCode = () => {
    const sortCodeRegex = /^[0-9]{6}$/; // UK sort code format (6 digits).
    if (!form.BankSortCode) {
        form.errors.BankSortCode = 'Bank sort code is required.';
    } else if (!sortCodeRegex.test(form.BankSortCode)) {
        form.errors.BankSortCode = 'Sort code must be a valid 6-digit number.';
    } else {
        form.errors.BankSortCode = '';
    }
};
const validateConsentMarketing = () => {
    if (form.ConsentMarketing === null) {
        form.errors.ConsentMarketing = 'Consent to marketing is required.';
    } else {
        form.errors.ConsentMarketing = '';
    }
};


const showLoanInfo = ref(false)
const isSubmitting = ref(false);
const isFinished = ref(false);
const isAccepted = ref(false);
const isRejected = ref(false);
const applicationId = ref(null);
const applicationStatus = ref(null);
const pollInterval = ref(null);
const progressText = ref('Submitting your application...'); // Dynamic text during submission


const submitApplication = async (event) => {
    event.preventDefault(); // Prevent the default form submission

    // Validate each step first
    if (!isStep1Valid.value) {
        goToStep(1);
        return; // Exit if Step 1 is not valid
    } else if (!isStep2Valid.value) {
        goToStep(2);
        return; // Exit if Step 2 is not valid
    } else if (!isStep3Valid.value) {
        goToStep(3);
        return; // Exit if Step 3 is not valid
    } else if (!isStep4Valid.value) {
        goToStep(4);
        return; // Exit if Step 4 is not valid
    } else if (!isStep5Valid.value) {
        goToStep(5);
        return; // Exit if Step 5 is not valid
    } else if (!isStep6Valid.value) {
        goToStep(6);
        return; // Exit if Step 6 is not valid
    }

    // If all steps are valid, proceed with submission
    form.touched.BankCard = true;
    form.touched.BankAccountNumber = true;
    form.touched.BankSortCode = true;
    form.touched.ConsentMarketing = true;



    // Submit the form on Step 6
    if (currentStep.value === 6) {
        console.log(form);
        if (!isStep6Valid.value) {
            hasErrors.value = true;
            return; // Stop if Step 6 has validation errors
        } else {
            // Show the spinner and progress text
            isSubmitting.value = true;
            isFinished.value = false;
            isAccepted.value = false;
            isRejected.value = false;
            progressText.value = 'Validating your details...';

            try {
                // Submit the form using axios
                const response = await axios.post('/api/submit', form);
                if (response.status === 201) {
                    applicationId.value = response.data.applicationId;
                    progressText.value = 'Checking application status...';
                    pollStatus(applicationId.value);
                }
            } catch (error) {
                console.error('Error submitting application:', error);
                isSubmitting.value = false;
                progressText.value = 'Submission failed. Please try again.';
            }
        }
    }
};



const pollStatus = (applicationId) => {
    pollInterval.value = setInterval(async () => {
        try {
            const response = await axios.get(`/api/status/${applicationId}`);

            // debugger

            if (response.status === 200) {
                const status = response.data.Status;
                applicationStatus.value = status;
                // debugger

                if (status === 'accepted') {
                    clearInterval(pollInterval.value);
                    // isSubmitting.value = false; // hide spinner
                    progressText.value = 'We found you a lender. Redirecting in 5 seconds...';
                    isFinished.value = true;
                    isAccepted.value = true;

                    // Start countdown
                    let countdown = 5;
                    const countdownInterval = setInterval(() => {
                        countdown--;
                        progressText.value = `We found you a lender. Redirecting in ${countdown} seconds...`;

                        if (countdown <= 0) {
                            clearInterval(countdownInterval);
                            window.location.href = response.data.RedirectURL;
                        }
                    }, 1000);
                }

                if (status === 'rejected') {
                    clearInterval(pollInterval.value);
                    // isSubmitting.value = false; // hide spinner
                    isFinished.value = true;
                    isRejected.value = true;
                    progressText.value = 'Unfortunately, we couldn’t match you with a lender at this time.';
                }
            }
        } catch (error) {
            console.error('Error checking application status:', error);
            clearInterval(pollInterval.value);
            isSubmitting.value = false;
            progressText.value = 'Error checking status. Please try again.';
        }
    }, 5000); // Poll every 5 seconds
};

const stopPolling = () => {
    if (pollInterval.value) {
        clearInterval(pollInterval.value);
    }
};


</script>

<template>
    <div class="max-w-xl mx-auto py-10 bg-transparent">

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
                            @click="goToStep(step)"
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

            <div v-if="hasErrors" class="fixed top-0 left-0 right-0 flex justify-center z-50">
                <div class="bg-red-500 text-white p-4 w-full max-w-2xl text-center relative rounded shadow">
                    <!-- Dismiss Button -->
                    <button
                        @click="hasErrors = false"
                        class="absolute top-2 right-2 text-white hover:text-gray-200 text-lg font-bold"
                        aria-label="Close"
                    >
                        &times;
                    </button>

                    <strong class="text-lg block">Please fix the following errors:</strong>
                    <ul class="mt-2">
                        <li v-for="(error, index) in errorMessages" :key="index" class="text-sm mt-1">
                            - {{ error }}
                        </li>
                    </ul>
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
                <!-- Floating Info Icon -->
<!--                <button-->
<!--                    v-if="!showLoanInfo"-->
<!--                    @click="showLoanInfo = true"-->
<!--                    class="fixed  bg-white  text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-700 transition"-->
<!--                    title="Show Info"-->
<!--                >-->
<!--                    ℹ️-->
<!--                </button>-->
            </div>

            <!-- Step 2: Personal Details -->
            <div v-if="currentStep === 2">
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Your details</h2>

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
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Your Employer</h2>

                <!-- Employment Status -->
                <EmploymentStatus
                    v-model="form.EmploymentStatus"
                    :error="form.errors.EmploymentStatus"
                    :class="{'border-red-500 bg-red-100': form.errors.EmploymentStatus}"
                    @change="validateEmploymentStatus"
                    @blur="validateEmploymentStatus"
                />

                <!-- Employer Name & Job Title (conditionally shown) -->
                <template v-if="['Full time', 'Part time', 'Self employed'].includes(form.EmploymentStatus)">
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
                <EmployerIndustry
                    v-model="form.EmployerIndustry"
                    :error="form.errors.EmployerIndustry"
                    :class="{'border-red-500 bg-red-100': form.errors.EmployerIndustry}"
                    @change="validateEmployerIndustry"
                    @blur="validateEmployerIndustry"
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
            </div>

            <!-- Step 4: Address Details -->
            <div v-if="currentStep === 4">
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Your Address</h2>

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
                <h2 class="text-3xl font-bold text-teal-400 mb-6 text-center">Your Monthly Expenses</h2>

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
                    @change="validateExpenseTransport"
                    @blur="validateExpenseTransport"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseTransport}"
                />
                <Utilities
                    v-model="form.ExpenseUtilities"
                    :error="form.errors.ExpenseUtilities"
                    @change="validateExpenseUtilities"
                    @blur="validateExpenseUtilities"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseUtilities}"
                />
                <!-- Food -->
                <Food
                    v-model="form.ExpenseFood"
                    :error="form.errors.ExpenseFood"
                    @change="validateExpenseFood"
                    @blur="validateExpenseFood"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseFood}"
                />

                <!-- Credit -->
                <Credit
                    v-model="form.ExpenseCredit"
                    :error="form.errors.ExpenseCredit"
                    @change="validateExpenseCredit"
                    @blur="validateExpenseCredit"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseCredit}"
                />

                <!-- Council -->
                <Council
                    v-model="form.ExpenseCouncil"
                    :error="form.errors.ExpenseCouncil"
                    @change="validateExpenseCouncil"
                    @blur="validateExpenseCouncil"
                    :class="{'border-red-500 bg-red-100': form.errors.ExpenseCouncil}"
                />

                <!-- Other -->
                <Other
                    v-model="form.ExpenseOther"
                    :error="form.errors.ExpenseOther"
                    @change="validateExpenseOther"
                    @blur="validateExpenseOther"
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
                    v-model="form.ConsentMarketing"
                    :error="form.errors.ConsentMarketing"
                    @input="validateConsentMarketing"
                    @blur="validateConsentMarketing"
                    @change="validateConsentMarketing"
                />
            </div>


            <!-- Navigation Buttons -->
            <div class="flex justify-between">
                <!-- Previous Button - Hide when currentStep is 6 -->
                <button v-if="currentStep > 1 && currentStep < 6" @click="prevStep" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">
                    Previous
                </button>

                <!-- Next Button -->
                <button
                    v-if="currentStep < 6"
                    @click="handleNextStep"
                    class="px-6 py-3 bg-cyan-400 text-white rounded-md hover:bg-cyan-600 transition-all duration-300"
                    :class="{'ml-auto': currentStep === 1}"
                    :disabled="!isStepValid"
                >
                    Next
                </button>

<!--                 Submit Button - Only shown if currentStep is 6, and bigger size-->
                <div class="flex justify-center w-full" v-if="currentStep === 6">
                    <button
                        type="submit"
                        @click="submitApplication"
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
