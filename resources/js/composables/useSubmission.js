// src/composables/useSubmission.js
import { ref } from 'vue'
import axios from 'axios'

export function useSubmission(form, currentStep, isStep6Valid) {
    // state
    const isSubmitting      = ref(false)
    const isFinished        = ref(false)
    const isAccepted        = ref(false)
    const isRejected        = ref(false)
    const applicationId     = ref(null)
    const applicationStatus = ref(null)
    const pollInterval      = ref(null)
    const progressText      = ref('Submitting your application...')

    // internal poller
    const pollStatus = (id) => {
        pollInterval.value = setInterval(async () => {
            try {
                const { data, status } = await axios.get(`/api/status/${id}`)
                if (status === 200) {
                    applicationStatus.value = data.Status
                    if (data.Status === 'accepted') {
                        clearInterval(pollInterval.value)
                        isFinished.value = true
                        isAccepted.value = true
                        let countdown = 5
                        progressText.value = `We found you a lender. Redirecting in ${countdown} seconds...`
                        const cInt = setInterval(() => {
                            countdown--
                            progressText.value = `We found you a lender. Redirecting in ${countdown} seconds...`
                            if (countdown <= 0) {
                                clearInterval(cInt)
                                window.location.href = data.RedirectURL
                            }
                        }, 1000)
                    }
                    if (data.Status === 'rejected') {
                        clearInterval(pollInterval.value)
                        isFinished.value = true
                        isRejected.value = true
                        progressText.value = `Unfortunately, we couldn’t match you with a lender at this time.`
                    }
                }
            } catch (e) {
                clearInterval(pollInterval.value)
                isSubmitting.value = false
                progressText.value = 'Error checking status. Please try again.'
            }
        }, 5000)
    }

    // main submit function
    const submitApplication = async (e) => {
        e.preventDefault()

        // only submit on step 6, and if it passes final validation
        if (currentStep.value !== 6 || !isStep6Valid.value) {
            console.warn(`Cannot submit on step ${currentStep.value}`)
            return
        }

        // show spinner
        isSubmitting.value = true
        isFinished.value   = false
        isAccepted.value   = false
        isRejected.value   = false
        progressText.value = 'Validating your details...'

        try {
            const response = await axios.post('/api/submit', form)
            if (response.status === 201) {
                applicationId.value = response.data.applicationId
                progressText.value = 'Checking application status...'
                pollStatus(applicationId.value)
            }
        } catch (err) {
            console.error('Submission error', err)
            isSubmitting.value = false
            progressText.value = 'Submission failed. Please try again.'
        }
    }

    return {
        isSubmitting,
        isFinished,
        isAccepted,
        isRejected,
        progressText,
        submitApplication,
    }
}
