<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->decimal('LoanAmount', 10, 2);
            $table->integer('LoanTerm');
            $table->string('LoanPurpose');
            $table->string('Title');
            $table->string('FirstName');
            $table->string('LastName');
            $table->date('DateOfBirth');
            $table->string('MobilePhone');
            $table->string('HomePhone')->nullable();
            $table->string('Email');
            $table->integer('Dependants');
            $table->string('EmploymentStatus');
            $table->string('EmployerName');
            $table->string('JobTitle');
            $table->string('EmployerIndustry');
            $table->integer('EmployerYears');
            $table->date('NextPayDate');
            $table->date('FollowingPayDate');
            $table->string('HouseNameNumber');
            $table->string('StreetAddress');
            $table->string('County');
            $table->string('City');
            $table->string('Postcode');
            $table->integer('AddressYears');
            $table->decimal('ExpenseTransport', 10, 2);
            $table->decimal('ExpenseFood', 10, 2);
            $table->decimal('ExpenseCredit', 10, 2);
            $table->decimal('ExpenseCouncil', 10, 2);
            $table->decimal('ExpenseOther', 10, 2);
            $table->string('BankCard');
            $table->string('BankAccountNumber');
            $table->string('BankSortCode');
            $table->boolean('ConsentMarketing');
            $table->string('status')->default('pending'); // Adding status column to track application status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
