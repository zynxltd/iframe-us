// src/composables/useStepValidation.js
import { computed } from 'vue'

export function useStepValidation(form, currentStep) {
    const isStep1Valid = computed(() => {
        let v = true
        if (form.touched.LoanAmount      && !form.LoanAmount)       v = false
        if (form.touched.LoanTerm        && !form.LoanTerm)         v = false
        if (form.touched.LoanPurpose     && !form.LoanPurpose)      v = false
        if (form.touched.RecentLoanCount && !form.RecentLoanCount)  v = false
        return v
    })

    const isStep2Valid = computed(() => {
        let v = true
        const nameRe = /^[A-Za-z\s]+$/
        if (form.touched.Title             && !form.Title)             v = false
        if (form.touched.FirstName         && (!form.FirstName || !nameRe.test(form.FirstName))) v = false
        if (form.touched.LastName          && (!form.LastName  || !nameRe.test(form.LastName)))  v = false
        if (form.touched.DateOfBirth       && !form.DateOfBirth)       v = false
        if (form.touched.Email             && !/.+@.+\..+/.test(form.Email))                      v = false
        if (form.touched.MobilePhone       && !/^07\d{9}$/.test(form.MobilePhone))               v = false
        if (form.touched.HomePhone         && form.HomePhone && !/^0\d{10}$/.test(form.HomePhone)) v = false
        if (form.touched.Dependants        && !form.Dependants)        v = false
        if (form.touched.MaritalStatus     && !form.MaritalStatus)     v = false
        if (form.touched.AdultsLivingWith  && !form.AdultsLivingWith)  v = false
        return v
    })

    const isStep3Valid = computed(() => {
        let v = true
        const today = new Date().setHours(0,0,0,0)
        const npd   = form.NextPayDate     ? new Date(form.NextPayDate).setHours(0,0,0,0)       : null
        const fpd   = form.FollowingPayDate? new Date(form.FollowingPayDate).setHours(0,0,0,0): null
        const needsEmp = [1,2,3].includes(form.EmploymentStatus)

        if (form.touched.EmploymentStatus   && !form.EmploymentStatus)   v = false
        if (form.touched.IncomeFrequency    && !form.IncomeFrequency)    v = false
        if (needsEmp && form.touched.EmployerName   && !form.EmployerName)   v = false
        if (needsEmp && form.touched.JobTitle       && !form.JobTitle)       v = false
        if (form.touched.EmploymentIndustry && !form.EmploymentIndustry) v = false
        if (form.touched.EmployerYears      && !form.EmployerYears)      v = false
        if (form.touched.NetMonthlyIncome  && !form.NetMonthlyIncome)   v = false

        if (form.touched.NextPayDate) {
            if (!form.NextPayDate || npd < today || npd === fpd) v = false
        }
        if (form.touched.FollowingPayDate) {
            if (!form.FollowingPayDate || fpd < today || fpd === npd) v = false
        }
        return v
    })

    const isStep4Valid = computed(() => {
        let v = true
        if (form.touched.HouseNameNumber && !form.HouseNameNumber) v = false
        if (form.touched.StreetAddress   && !form.StreetAddress)   v = false
        if (form.touched.County          && !form.County)          v = false
        if (form.touched.City            && !form.City)            v = false

        if (form.touched.Postcode) {
            const val = (form.Postcode || '').trim()
            if (!val || form.errors.Postcode) v = false
        }

        if (form.touched.AddressYears    && !form.AddressYears)    v = false
        return v
    })

    const isStep5Valid = computed(() => {
        let v = true
        const ch = f => form.touched[f] && !form[f]
        if (ch('ExpenseMonthlyMortgageRent')) v = false
        if (ch('ExpenseTransport'))           v = false
        if (ch('ExpenseUtilities'))           v = false
        if (ch('ExpenseFood'))                v = false
        if (ch('ExpenseCredit'))              v = false
        if (ch('ExpenseCouncil'))             v = false
        if (ch('ExpenseOther'))               v = false
        return v
    })

    const isStep6Valid = computed(() => {
        let v = true
        if (form.touched.BankCard          && !form.BankCard)             v = false
        if (form.touched.BankAccountNumber && (!form.BankAccountNumber || form.BankAccountNumber.length !== 8)) v = false
        if (form.touched.BankSortCode      && !/^\d{6}$/.test(form.BankSortCode)) v = false
        return v
    })

    // overall for current step
    const isStepValid = computed(() => {
        const map = {
            1: isStep1Valid,
            2: isStep2Valid,
            3: isStep3Valid,
            4: isStep4Valid,
            5: isStep5Valid,
            6: isStep6Valid,
        }
        return map[currentStep.value]?.value ?? true
    })

    // expose array for progress-bar coloring
    const validatorsByStep = [
        isStep1Valid,
        isStep2Valid,
        isStep3Valid,
        isStep4Valid,
        isStep5Valid,
        isStep6Valid,
    ]

    return {
        isStepValid,
        validatorsByStep,
        isStep1Valid,
        isStep2Valid,
        isStep3Valid,
        isStep4Valid,
        isStep5Valid,
        isStep6Valid,
    }
}
