/// <reference types="cypress" />

describe('Loan Application — Steps 1–5', () => {
    beforeEach(() => {
        cy.visit('https://iframe.test/form')
    })

    it('completes Steps 1–5 and advances to Step 6', () => {
        // — STEP 1 —
        cy.get('[data-cy=next-button]').click()
        cy.get('[data-cy=loan-amount]').parent().should('have.class', 'bg-red-100')
        cy.get('[data-cy=loan-term]').parent().should('have.class', 'bg-red-100')
        cy.get('[data-cy=loan-purpose]').parent().should('have.class', 'bg-red-100')
        cy.get('[data-cy=recent-loan-count]').parent().should('have.class', 'bg-red-100')

        cy.get('[data-cy=loan-amount]').select('£500')
        cy.get('[data-cy=loan-term-2]').click()
        cy.get('[data-cy=loan-purpose-5]').click()
        cy.get('[data-cy=recent-loan-count-1]').click()
        cy.get('[data-cy=next-button]').click()

        // — STEP 2 —
        cy.contains('Your details').should('be.visible')
        // cy.get('[data-cy=next-button]').should('be.disabled')

        cy.get('[data-cy=title-1]').click()
        cy.get('[data-cy=first-name]').type('Alice').blur()
        cy.get('[data-cy=last-name]').type('Smith').blur()
        cy.get('[data-cy=dob-day]').type('20').blur()
        cy.get('[data-cy=dob-month]').type('05').blur()
        cy.get('[data-cy=dob-year]').type('1990').blur()
        cy.get('[data-cy=email]').type('alice@example.com').blur()

        cy.get('[data-cy=mobile-phone]').type('07123456789').should('have.value','07123456789').blur()
        cy.get('[data-cy=home-phone]').type('01234567890').should('have.value','01234567890').blur()

        cy.get('[data-cy=dependants-1]').click()
        cy.get('[data-cy=marital-status-1]').click()
        cy.get('[data-cy=adults-living-with-1]').click()
        cy.get('[data-cy=next-button]').should('be.enabled').click()

        // — STEP 3 —
        cy.contains('Your Employer').should('be.visible')
        // cy.get('[data-cy=next-button]').should('be.disabled')

        cy.get('[data-cy=employment-status-1]').click()
        cy.get('[data-cy=income-frequency-1]').click()
        cy.get('[data-cy=employer-name]').type('Acme Corp').blur()
        cy.get('[data-cy=job-title]').type('Developer').blur()
        cy.get('[data-cy=employment-industry]').select('Accounting').should('have.value','1')
        cy.get('[data-cy=employer-years]').select('1').should('have.value','1')

        cy.get('[data-cy=next-pay-date]').clear().type('30/05/2025').blur()
        cy.get('[data-cy=following-pay-date]').clear().type('06/06/2025').blur()
        cy.get('[data-cy=net-monthly-income]').type('2500').blur()

        cy.get('[data-cy=next-button]').should('be.enabled').click()
        cy.contains('Your Employer').should('not.exist')
        // cy.contains('Your Income').should('be.visible')

        // — STEP 4 —
        cy.contains('Your Address').should('be.visible')
        // cy.get('[data-cy=next-button]').should('be.disabled')

        cy.get('[data-cy=residential-status-1]').click()
        cy.get('[data-cy=house-name-number]').type('221B Baker Street').blur()
        cy.get('[data-cy=street-address]').type('Baker Street').blur()
        cy.get('[data-cy=county]').select('London').should('have.value','London')
        cy.get('[data-cy=city]').select('London').should('have.value','London')
        cy.get('[data-cy=postcode]').type('NW16XE').blur()
        cy.get('[data-cy=address-years]').select('1').should('have.value','1')
        cy.get('[data-cy=next-button]').should('be.enabled').click()
        cy.contains('Your Address').should('not.exist')
        // cy.contains('Your Expenses').should('be.visible')

        // — STEP 5: Monthly Expenses —
        cy.contains('Your Monthly Expenses').should('be.visible')

// Select valid options
        cy.get('[data-cy=expense-council-2]').click()  // £100 Council Tax
        cy.get('[data-cy=expense-credit-2]').click()   // £100 Credit
        cy.get('[data-cy=expense-food-2]').click()     // £100 Food
        cy.get('[data-cy=expense-transport-2]').click()// £100 Transport
        cy.get('[data-cy=expense-utilities-2]').click()// £100 Utilities
        cy.get('[data-cy=expense-other-2]').click()    // £100 Other
        cy.get('[data-cy=expense-monthly-mortgage-rent-2]').click() // £100 Mortgage/Rent

// Advance to Step 6
        cy.get('[data-cy=next-button]').should('be.enabled').click()
        cy.contains('Your Monthly Expenses').should('not.exist')
        // cy.contains('Your Consent').should('be.visible')

        // Advance to Step 6
        // cy.get('[data-cy=next-button]').should('be.enabled').click()
        cy.contains('Your Monthly Expenses').should('not.exist')
        cy.contains('Last bit...').should('be.visible')

        // — STEP 6: Additional Information —
        cy.get('[data-cy=bank-card-1]').click() // selects Visa
        cy.get('[data-cy=bank-account-number]').type('12345678').blur()

        // Sort code fields: assume three inputs
        cy.get('[data-cy=bank-sortcode-part1]').type('12')
        cy.get('[data-cy=bank-sortcode-part2]').type('34')
        cy.get('[data-cy=bank-sortcode-part3]').type('56')

        // Consent checkbox
        // cy.get('[data-cy=consent-financial]').check()

        // Submit application
        cy.get('[data-cy=submit-button]').should('be.enabled').click()
        cy.contains('Thank you').should('be.visible')


    })
})
