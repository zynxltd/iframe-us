<script setup lang="ts">

</script>

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
const validateIncomeFrequency = () => {
if (!form.IncomeFrequency) {
form.errors.IncomeFrequency = 'Income Frequency is required.';
} else {
form.errors.IncomeFrequency = ''; // Clear error if valid
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
const validateNetMonthlyIncome = () => {
if (!form.NetMonthlyIncome) {
form.errors.NetMonthlyIncome = 'Net Monthly Income is required.';
} else {
form.errors.NetMonthlyIncome = ''; // Clear error if valid
}
};
const validateEmploymentIndustry = () => {
if (!form.EmploymentIndustry) {
form.errors.EmploymentIndustry = 'Employer industry is required.';
} else {
form.errors.EmploymentIndustry = ''; // Clear error if valid
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

const requiresEmployerDetails = [1, 2, 3].includes(form.EmploymentStatus);

// Employment Status
if (form.touched.EmploymentStatus && !form.EmploymentStatus) {
form.errors.EmploymentStatus = 'Employment status is required.';
valid = false;
} else {
form.errors.EmploymentStatus = '';
}
// IncomeFrequency
if (form.touched.IncomeFrequency && !form.IncomeFrequency) {
form.errors.IncomeFrequency = 'Employment status is required.';
valid = false;
} else {
form.errors.IncomeFrequency = '';
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
if (form.touched.EmploymentIndustry && !form.EmploymentIndustry) {
form.errors.EmploymentIndustry = 'Employer industry is required.';
valid = false;
} else {
form.errors.EmploymentIndustry = '';
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

const handleNextStep = () => {

// debugger
const hasErrors = ref(false)
const errorMessages = ref([])

if (currentStep.value === 1) {
form.touched.LoanAmount = true;
form.touched.LoanTerm = true;
form.touched.LoanPurpose = true;
form.touched.RecentLoanCount = true;

// const hasErrors = ref(false)
// const errorMessages = ref([])

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

// const hasErrors = ref(false)
// const errorMessages = ref([])

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

// const hasErrors = ref(false)
// const errorMessages = ref([])

const today = new Date().setHours(0, 0, 0, 0);
const nextPayDate = form.NextPayDate ? new Date(form.NextPayDate).setHours(0, 0, 0, 0) : null;
const followingPayDate = form.FollowingPayDate ? new Date(form.FollowingPayDate).setHours(0, 0, 0, 0) : null;

const requiresEmployerDetails = [1,2,3].includes(form.EmploymentStatus);

form.touched.EmploymentStatus = true;
form.touched.EmployerName = true;
form.touched.JobTitle = true;
form.touched.EmploymentIndustry = true;
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

// Employment Status
if (!form.IncomeFrequency) {
form.errors.IncomeFrequency = 'Income Frequency is required.';
hasErrors.value = true;
errorMessages.value.push('Income Frequency is required.');
} else {
form.errors.IncomeFrequency = '';
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
if (!form.EmploymentIndustry) {
form.errors.EmploymentIndustry = 'Employer industry is required.';
hasErrors.value = true;
errorMessages.value.push('Employer industry is required.');
} else {
form.errors.EmploymentIndustry = '';
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

// const hasErrors = ref(false)
// const errorMessages = ref([])


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


// const hasErrors = ref(false)
// const errorMessages = ref([])

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

// const hasErrors = ref(false)
// const errorMessages = ref([])

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


debugger
if (currentStep.value === 1 && isStep1Valid.value === true) {
currentStep.value = 2;
} else if (currentStep.value === 2 && isStep2Valid.value === true) {
currentStep.value = 3;
} else if (currentStep.value === 3 && isStep2Valid.value === true) {
currentStep.value = 4;
} else if (currentStep.value === 4 && isStep2Valid.value === true) {
currentStep.value = 5;
} else if (currentStep.value === 5 && isStep2Valid.value === true) {
currentStep.value = 6;
}
// If the step is valid, proceed to the next step
// nextStep();
window.scrollTo({
top: 0,
behavior: 'smooth' // Smooth scrolling
});
// }
};

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
ReferrerUrl: document.referrer || window.location.href, // URL of the page that referred to this one
IpAddress: '127.0.0.1', // You would need to get this from the backend
UserAgent: navigator.userAgent, // Browser information
});

console.log(form); // Log the form data to verify
});
const submitApplication = async (event) => {
event.preventDefault(); // Prevent the default form submission

// Check if the current step is valid
if (isStepValid.value === false) {
// Optionally re-trigger the validation UI or logic for the current step
console.warn(`Step ${currentStep.value} is not valid`);
return; // Exit early if the current step is not valid
}
debugger

// If all steps are valid, proceed with submission
form.touched.BankCard = true;
form.touched.BankAccountNumber = true;
form.touched.BankSortCode = true;
form.touched.ConsentMarketing = true;



// Submit the form on Step 6
if (currentStep.value === 6) {
console.log(form);
if (!isStep6Valid.value) {
// hasErrors.value = true;
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

return;
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

<template>

</template>

<style scoped>

</style>
