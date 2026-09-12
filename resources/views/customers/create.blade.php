@extends('layouts.app')

@section('title', 'Add Customer')
@section('page-title', 'Add Customer')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .customer-form-page {
        max-width: 950px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .customer-form-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }


    .customer-form-header-left h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
        line-height: 1.2;
    }


    .customer-form-header-left p {
        margin: 0;
        color: #5F6368;
        font-size: 13px;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .btn {
        height: 40px;
        padding: 0 16px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        border: none;
        border-radius: 8px;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;
        cursor: pointer;

        transition: .2s ease;
    }


    .btn-primary {
        background: #0B2A6F;
        color: #FFFFFF;
    }


    .btn-primary:hover {
        background: #071D4D;
        color: #FFFFFF;
    }


    .btn-secondary {
        background: #F1F3F4;
        color: #3C4043;
    }


    .btn-secondary:hover {
        background: #E8EAED;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .customer-form-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        padding: 28px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);
    }


    /* =========================================================
       FORM SECTION
    ========================================================= */

    .form-section {
        margin-bottom: 28px;
    }


    .form-section:last-child {
        margin-bottom: 0;
    }


    .section-heading {
        margin-bottom: 18px;

        padding-bottom: 11px;

        border-bottom: 1px solid #F1F3F4;
    }


    .section-heading h2 {
        margin: 0 0 4px;

        color: #202124;

        font-size: 15px;

        font-weight: 700;
    }


    .section-heading p {
        margin: 0;

        color: #80868B;

        font-size: 11px;
    }


    /* =========================================================
       FORM GRID
    ========================================================= */

    .form-grid {
        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 18px;
    }


    .form-group.full {
        grid-column: 1 / -1;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .form-label {
        display: block;

        margin-bottom: 7px;

        color: #3C4043;

        font-size: 12px;

        font-weight: 600;
    }


    .required {
        color: #E30613;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .form-input,
    .form-textarea {

        width: 100%;

        border:
            1px solid #DADCE0;

        border-radius: 8px;

        outline: none;

        background: #FFFFFF;

        color: #202124;

        font-size: 12px;

        transition: .2s ease;
    }


    .form-input {

        height: 40px;

        padding: 0 12px;
    }


    .form-textarea {

        min-height: 115px;

        padding: 11px 12px;

        resize: vertical;

        line-height: 1.6;
    }


    .form-input::placeholder,
    .form-textarea::placeholder {

        color: #9AA0A6;
    }


    .form-input:focus,
    .form-textarea:focus {

        border-color: #0B2A6F;

        box-shadow:
            0 0 0 2px
            rgba(11,42,111,.08);
    }


    /* =========================================================
       INPUT ERROR
    ========================================================= */

    .form-input.input-error {

        border-color: #E30613 !important;

        box-shadow:
            0 0 0 2px
            rgba(227,6,19,.08) !important;
    }


    .field-error {

        margin-top: 5px;

        color: #D93025;

        font-size: 10px;
    }


    /* =========================================================
       FORM FOOTER
    ========================================================= */

    .form-actions {

        display: flex;

        justify-content: flex-end;

        align-items: center;

        gap: 8px;

        margin-top: 28px;

        padding-top: 20px;

        border-top: 1px solid #E8EAED;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .customer-form-header {

            flex-direction: column;

            align-items: flex-start;
        }


        .customer-form-card {

            padding: 20px;
        }


        .form-grid {

            grid-template-columns:
                1fr;
        }


        .form-group.full {

            grid-column: auto;
        }


        .form-actions {

            flex-direction:
                column-reverse;

            align-items:
                stretch;
        }


        .btn {

            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="customer-form-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="customer-form-header">


        <div class="customer-form-header-left">

            <h1>
                Add Customer
            </h1>


            <p>
                Add a new customer to the CRM.
            </p>

        </div>


        <a
            href="{{ route('customers.index') }}"
            class="btn btn-secondary"
        >

            ← Back

        </a>


    </div>


    <!-- =====================================================
         FORM CARD
    ====================================================== -->

    <div class="customer-form-card">


        <form
            action="{{ route('customers.store') }}"
            method="POST"
            id="customerForm"
        >

            @csrf


            <!-- =================================================
                 CUSTOMER INFORMATION
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Customer Information
                    </h2>


                    <p>
                        Enter the main information of the customer.
                    </p>

                </div>


                <div class="form-grid">


                    <!-- CUSTOMER NAME -->

                    <div class="form-group">

                        <label
                            for="name"
                            class="form-label"
                        >

                            Customer Name

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            value="{{ old('name') }}"
                            placeholder="Example: Budi Santoso"
                            required
                        >


                        @error('name')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- COMPANY -->

                    <div class="form-group">

                        <label
                            for="company"
                            class="form-label"
                        >

                            Company

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            id="company"
                            name="company"
                            class="form-input"
                            value="{{ old('company') }}"
                            placeholder="Example: PT Maju Jaya"
                            required
                        >


                        @error('company')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label"
                        >

                            Email

                        </label>


                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            value="{{ old('email') }}"
                            placeholder="Example: customer@example.com"
                        >


                        @error('email')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- PHONE -->

                    <div class="form-group">

                        <label
                            for="phone"
                            class="form-label"
                        >

                            Phone

                        </label>


                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="form-input"
                            value="{{ old('phone') }}"
                            inputmode="numeric"
                            autocomplete="tel"
                            placeholder="Example: 081234567890"
                        >


                        <div
                            class="field-error"
                            id="phoneError"
                            style="display: none;"
                        >
                            Phone number must contain numbers only.
                        </div>


                        @error('phone')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- ADDRESS -->

                    <div class="form-group full">

                        <label
                            for="address"
                            class="form-label"
                        >

                            Address

                        </label>


                        <textarea
                            id="address"
                            name="address"
                            class="form-textarea"
                            placeholder="Enter the customer's complete address."
                        >{{ old('address') }}</textarea>


                        @error('address')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                </div>

            </div>


            <!-- =================================================
                 ACTIONS
            ================================================== -->

            <div class="form-actions">


                <a
                    href="{{ route('customers.index') }}"
                    class="btn btn-secondary"
                >

                    Cancel

                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >


                    <svg
                        width="15"
                        height="15"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                    >

                        <path d="M12 5v14"/>

                        <path d="M5 12h14"/>

                    </svg>


                    Save Customer


                </button>


            </div>


        </form>


    </div>


</div>


@endsection


@section('scripts')

<script>

document.addEventListener(
    'DOMContentLoaded',
    function ()
    {

        const phoneInput =
            document.getElementById(
                'phone'
            );


        const phoneError =
            document.getElementById(
                'phoneError'
            );


        const customerForm =
            document.getElementById(
                'customerForm'
            );


        /* =====================================================
           PHONE VALIDATION
        ===================================================== */

        function validatePhone()
        {

            const value =
                phoneInput.value.trim();


            /*
             * Phone is optional.
             */

            if (value === '') {

                phoneInput.classList.remove(
                    'input-error'
                );

                phoneError.style.display =
                    'none';

                return true;
            }


            /*
             * Numbers 0-9 only.
             */

            const onlyNumbers =
                /^[0-9]+$/;


            if (
                !onlyNumbers.test(
                    value
                )
            ) {

                phoneInput.classList.add(
                    'input-error'
                );

                phoneError.style.display =
                    'block';

                return false;
            }


            phoneInput.classList.remove(
                'input-error'
            );

            phoneError.style.display =
                'none';

            return true;
        }


        /*
         * Check while typing.
         */

        phoneInput.addEventListener(
            'input',
            function ()
            {

                validatePhone();

            }
        );


        /*
         * Check when leaving the field.
         */

        phoneInput.addEventListener(
            'blur',
            function ()
            {

                validatePhone();

            }
        );


        /*
         * Check before submitting.
         */

        customerForm.addEventListener(
            'submit',
            function (event)
            {

                if (
                    !validatePhone()
                ) {

                    event.preventDefault();

                    phoneInput.focus();

                }

            }
        );


        validatePhone();

    }
);

</script>

@endsection