@extends('layouts.app')

@section('title', 'Convert Lead')
@section('page-title', 'Convert Lead')

@php
    $customerList = $customers ?? collect();
    $salespersonList = $salespeople ?? collect();
    $opportunityLabel = 'Opportunity';
@endphp

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .convert-page {
        max-width: 1000px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .convert-header {
        margin-bottom: 25px;
    }


    .convert-header h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
    }


    .convert-header p {
        margin: 0;
        color: #5F6368;
        font-size: 13px;
        line-height: 1.6;
    }


    /* =========================================================
       LEAD INFORMATION
    ========================================================= */

    .lead-info-card {
        margin-bottom: 20px;
        padding: 18px 20px;
        background: #E8EEF9;
        border: 1px solid #D5E0F1;
        border-radius: 14px;
    }


    .lead-info-title {
        margin-bottom: 12px;
        color: #0B2A6F;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
    }


    .lead-info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
    }


    .lead-info-item {
        min-width: 0;
    }


    .lead-info-item span {
        display: block;
    }


    .lead-info-label {
        margin-bottom: 4px;
        color: #5F6368;
        font-size: 10px;
    }


    .lead-info-value {
        color: #202124;
        font-size: 12px;
        font-weight: 600;
        word-break: break-word;
    }


    /* =========================================================
       FORM CARD
    ========================================================= */

    .form-card {
        background: #FFFFFF;
        border: 1px solid #E8EAED;
        border-radius: 16px;
        padding: 28px;
        box-shadow: 0 2px 7px rgba(60,64,67,.06);
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .form-section {
        margin-bottom: 30px;
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
        line-height: 1.6;
    }


    /* =========================================================
       CUSTOMER MODE
    ========================================================= */

    .customer-mode-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 18px;
    }


    .mode-option {
        position: relative;
    }


    .mode-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }


    .mode-card {
        display: block;
        padding: 15px 16px;
        background: #FFFFFF;
        border: 1px solid #DADCE0;
        border-radius: 10px;
        cursor: pointer;
        transition: .2s ease;
    }


    .mode-card:hover {
        border-color: #AEB8CA;
        box-shadow: 0 2px 8px rgba(11,42,111,.06);
    }


    .mode-option input:checked + .mode-card {
        border-color: #0B2A6F;
        background: #F5F8FD;
        box-shadow: 0 0 0 2px rgba(11,42,111,.08);
    }


    .mode-title {
        margin-bottom: 4px;
        color: #202124;
        font-size: 12px;
        font-weight: 700;
    }


    .mode-description {
        color: #80868B;
        font-size: 10px;
        line-height: 1.5;
    }


    /* =========================================================
       PANELS
    ========================================================= */

    .customer-panel {
        display: none;
    }


    .customer-panel.active {
        display: block;
    }


    /* =========================================================
       FORM GRID
    ========================================================= */

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }


    .form-group {
        min-width: 0;
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
    .form-select,
    .form-textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #DADCE0;
        border-radius: 8px;
        background: #FFFFFF;
        color: #202124;
        outline: none;
        font-size: 12px;
        transition: .2s ease;
    }


    .form-input,
    .form-select {
        height: 40px;
        padding: 0 12px;
    }


    .form-textarea {
        min-height: 110px;
        padding: 11px 12px;
        resize: vertical;
        line-height: 1.6;
    }


    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #9AA0A6;
    }


    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #0B2A6F;
        box-shadow: 0 0 0 2px rgba(11,42,111,.08);
    }


    .form-input[readonly] {
        background: #F8F9FA;
        cursor: not-allowed;
    }


    /* =========================================================
       INFO BOX
    ========================================================= */

    .info-box {
        margin-top: 10px;
        padding: 11px 12px;
        background: #F8F9FA;
        border: 1px solid #E8EAED;
        border-radius: 8px;
        color: #5F6368;
        font-size: 10px;
        line-height: 1.6;
    }


    /* =========================================================
       FIXED STAGE
    ========================================================= */

    .fixed-field {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 40px;
        padding: 0 12px;
        box-sizing: border-box;
        background: #F8F9FA;
        border: 1px solid #E8EAED;
        border-radius: 8px;
    }


    .fixed-dot {
        width: 8px;
        height: 8px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #0B2A6F;
    }


    .fixed-text {
        color: #3C4043;
        font-size: 12px;
        font-weight: 600;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 9px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #E8EAED;
    }


    .btn {
        height: 40px;
        padding: 0 16px;
        border: none;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s ease;
    }


    .btn-cancel {
        background: #F1F3F4;
        color: #3C4043;
    }


    .btn-cancel:hover {
        background: #E8EAED;
    }


    .btn-convert {
        background: #0B2A6F;
        color: #FFFFFF;
    }


    .btn-convert:hover {
        background: #071D4D;
    }


    .btn-convert:disabled {
        opacity: .65;
        cursor: not-allowed;
    }


    .btn-convert svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 800px) {

        .lead-info-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 700px) {

        .form-card {
            padding: 20px;
        }


        .customer-mode-grid,
        .form-grid {
            grid-template-columns: 1fr;
        }


        .form-group.full {
            grid-column: auto;
        }


        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }


        .btn {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="convert-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="convert-header">

        <h1>
            Convert Lead
        </h1>

        <p>
            Convert this qualified lead into a Customer and a new {{ $opportunityLabel }}.
        </p>

    </div>


    {{-- =====================================================
         LEAD INFORMATION
    ====================================================== --}}

    <div class="lead-info-card">

        <div class="lead-info-title">
            Lead Information
        </div>


        <div class="lead-info-grid">


            <div class="lead-info-item">

                <span class="lead-info-label">
                    Lead
                </span>

                <span class="lead-info-value">
                    {{ $lead->name }}
                </span>

            </div>


            <div class="lead-info-item">

                <span class="lead-info-label">
                    Contact
                </span>

                <span class="lead-info-value">
                    {{ $lead->contact_name ?? '-' }}
                </span>

            </div>


            <div class="lead-info-item">

                <span class="lead-info-label">
                    Status
                </span>

                <span class="lead-info-value">
                    {{ ucfirst($lead->status) }}
                </span>

            </div>


        </div>

    </div>


    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="form-card">


        <form
            action="{{ route('leads.convert', $lead) }}"
            method="POST"
            id="convertLeadForm"
        >

            @csrf


            {{-- =================================================
                 CUSTOMER
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Customer
                    </h2>

                    <p>
                        Choose whether to create a new customer or use an existing customer.
                    </p>

                </div>


                {{-- CUSTOMER MODE --}}

                <div class="customer-mode-grid">


                    <div class="mode-option">

                        <input
                            type="radio"
                            id="customer_mode_new"
                            name="customer_mode"
                            value="new"
                            {{ old('customer_mode', 'new') === 'new' ? 'checked' : '' }}
                        >


                        <label
                            for="customer_mode_new"
                            class="mode-card"
                        >

                            <div class="mode-title">
                                Create New Customer
                            </div>

                            <div class="mode-description">
                                Create a new customer record using the lead information.
                            </div>

                        </label>

                    </div>


                    <div class="mode-option">

                        <input
                            type="radio"
                            id="customer_mode_existing"
                            name="customer_mode"
                            value="existing"
                            {{ old('customer_mode') === 'existing' ? 'checked' : '' }}
                        >


                        <label
                            for="customer_mode_existing"
                            class="mode-card"
                        >

                            <div class="mode-title">
                                Use Existing Customer
                            </div>

                            <div class="mode-description">
                                Link this lead to a customer that already exists in the CRM.
                            </div>

                        </label>

                    </div>


                </div>


                {{-- =================================================
                     EXISTING CUSTOMER
                ================================================== --}}

                <div
                    id="existingCustomerPanel"
                    class="customer-panel"
                >

                    <div class="form-grid">


                        <div class="form-group full">

                            <label
                                for="customer_id"
                                class="form-label"
                            >

                                Existing Customer

                                <span class="required">*</span>

                            </label>


                            <select
                                id="customer_id"
                                name="customer_id"
                                class="form-select"
                            >

                                <option value="">
                                    Select Customer
                                </option>


                                @foreach($customerList as $customer)

                                    <option
                                        value="{{ $customer->id }}"
                                        {{ (string) old('customer_id') === (string) $customer->id ? 'selected' : '' }}
                                    >

                                        {{ $customer->name }}

                                        @if($customer->company)
                                            — {{ $customer->company }}
                                        @endif

                                    </option>

                                @endforeach

                            </select>


                            <div class="info-box">
                                The selected customer will be reused. No duplicate customer record will be created.
                            </div>

                        </div>


                    </div>

                </div>


                {{-- =================================================
                     NEW CUSTOMER
                ================================================== --}}

                <div
                    id="newCustomerPanel"
                    class="customer-panel"
                >

                    <div class="form-grid">


                        {{-- CUSTOMER NAME --}}

                        <div class="form-group">

                            <label
                                for="customer_name"
                                class="form-label"
                            >

                                Customer Name

                                <span class="required">*</span>

                            </label>


                            <input
                                type="text"
                                id="customer_name"
                                name="customer_name"
                                class="form-input"
                                value="{{ old('customer_name', $lead->contact_name ?? $lead->name) }}"
                                placeholder="Example: John Doe"
                                maxlength="255"
                            >

                        </div>


                        {{-- COMPANY --}}

                        <div class="form-group">

                            <label
                                for="company"
                                class="form-label"
                            >

                                Company

                                <span class="required">*</span>

                            </label>


                            <input
                                type="text"
                                id="company"
                                name="company"
                                class="form-input"
                                value="{{ old('company', $lead->name) }}"
                                placeholder="Example: PT Maju Textile"
                                maxlength="255"
                            >

                        </div>


                        {{-- EMAIL --}}

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
                                value="{{ old('email', $lead->email) }}"
                                placeholder="email@company.com"
                                maxlength="255"
                                autocomplete="email"
                            >

                        </div>


                        {{-- PHONE --}}

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
                                value="{{ old('phone', $lead->phone) }}"
                                placeholder="081234567890"
                                inputmode="numeric"
                                autocomplete="tel"
                                maxlength="50"
                            >

                        </div>


                    </div>

                </div>


            </div>


            {{-- =================================================
                 OPPORTUNITY
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        {{ $opportunityLabel }}
                    </h2>

                    <p>
                        Enter the information for the new sales {{ strtolower($opportunityLabel) }}.
                    </p>

                </div>


                <div class="form-grid">


                    {{-- OPPORTUNITY NAME --}}

                    <div class="form-group full">

                        <label
                            for="opportunity_name"
                            class="form-label"
                        >

                            {{ $opportunityLabel }} Name

                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            id="opportunity_name"
                            name="opportunity_name"
                            class="form-input"
                            value="{{ old('opportunity_name', $opportunityLabel . ' - ' . $lead->name) }}"
                            placeholder="Example: Yarn Order from PT ABC"
                            maxlength="255"
                            required
                        >

                    </div>


                    {{-- EXPECTED REVENUE --}}

                    <div class="form-group">

                        <label
                            for="expected_revenue"
                            class="form-label"
                        >

                            Expected Revenue

                            <span class="required">*</span>

                        </label>


                        <input
                            type="number"
                            id="expected_revenue"
                            name="expected_revenue"
                            class="form-input"
                            value="{{ old('expected_revenue', 0) }}"
                            min="0"
                            step="0.01"
                            placeholder="5000000"
                            required
                        >

                    </div>


                    {{-- RATING --}}

                    <div class="form-group">

                        <label
                            for="rating"
                            class="form-label"
                        >

                            Rating

                            <span class="required">*</span>

                        </label>


                        <select
                            id="rating"
                            name="rating"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Rating
                            </option>


                            @for($rating = 1; $rating <= 5; $rating++)

                                <option
                                    value="{{ $rating }}"
                                    {{ (string) old('rating') === (string) $rating ? 'selected' : '' }}
                                >
                                    {{ str_repeat('★', $rating) . str_repeat('☆', 5 - $rating) }}
                                </option>

                            @endfor

                        </select>

                    </div>


                    {{-- SALESPERSON --}}

                    <div class="form-group">

                        <label
                            for="salesperson_id"
                            class="form-label"
                        >

                            Salesperson

                            <span class="required">*</span>

                        </label>


                        @if(
                            auth()->check() &&
                            auth()->user()->role === 'sales'
                        )

                            <input
                                type="text"
                                class="form-input"
                                value="{{ auth()->user()->name }}"
                                readonly
                            >


                            <input
                                type="hidden"
                                name="salesperson_id"
                                value="{{ auth()->user()->id }}"
                            >

                        @else

                            <select
                                id="salesperson_id"
                                name="salesperson_id"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Salesperson
                                </option>


                                @foreach($salespersonList as $salesperson)

                                    <option
                                        value="{{ $salesperson->id }}"
                                        {{ (string) old('salesperson_id') === (string) $salesperson->id ? 'selected' : '' }}
                                    >

                                        {{ $salesperson->name }}

                                        @if($salesperson->email)
                                            — {{ $salesperson->email }}
                                        @endif

                                    </option>

                                @endforeach

                            </select>

                        @endif

                    </div>


                    {{-- INITIAL STAGE --}}

                    <div class="form-group">

                        <label class="form-label">
                            Initial Stage
                        </label>


                        <div class="fixed-field">

                            <span class="fixed-dot"></span>

                            <span class="fixed-text">
                                Prospect
                            </span>

                        </div>


                        <div class="info-box">
                            New sales opportunities created through lead conversion always start at Prospect.
                        </div>

                    </div>


                    {{-- NOTES --}}

                    <div class="form-group full">

                        <label
                            for="notes"
                            class="form-label"
                        >
                            Notes
                        </label>


                        <textarea
                            id="notes"
                            name="notes"
                            class="form-textarea"
                            placeholder="Add additional information about this sales opportunity..."
                        >{{ old('notes', $lead->notes) }}</textarea>

                    </div>


                </div>

            </div>


            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="form-actions">


                <a
                    href="{{ route('leads.show', $lead) }}"
                    class="btn btn-cancel"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="btn btn-convert"
                    id="convertButton"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M5 12h14"/>

                        <path d="M12 5v14"/>

                    </svg>


                    <span id="convertButtonText">
                        Convert Lead
                    </span>

                </button>


            </div>


        </form>


    </div>


</div>


<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const form =
                document.getElementById(
                    'convertLeadForm'
                );


            const newMode =
                document.getElementById(
                    'customer_mode_new'
                );


            const existingMode =
                document.getElementById(
                    'customer_mode_existing'
                );


            const newPanel =
                document.getElementById(
                    'newCustomerPanel'
                );


            const existingPanel =
                document.getElementById(
                    'existingCustomerPanel'
                );


            const customerName =
                document.getElementById(
                    'customer_name'
                );


            const company =
                document.getElementById(
                    'company'
                );


            const customerId =
                document.getElementById(
                    'customer_id'
                );


            const convertButton =
                document.getElementById(
                    'convertButton'
                );


            const convertButtonText =
                document.getElementById(
                    'convertButtonText'
                );


            /* =================================================
               CUSTOMER MODE
            ================================================== */

            function updateCustomerMode() {

                if (
                    !newMode ||
                    !existingMode ||
                    !newPanel ||
                    !existingPanel
                ) {
                    return;
                }


                const isNewCustomer =
                    newMode.checked;


                if (isNewCustomer) {

                    newPanel.classList.add(
                        'active'
                    );


                    existingPanel.classList.remove(
                        'active'
                    );


                    if (customerName) {

                        customerName.required =
                            true;

                    }


                    if (company) {

                        company.required =
                            true;

                    }


                    if (customerId) {

                        customerId.required =
                            false;

                    }

                } else {

                    newPanel.classList.remove(
                        'active'
                    );


                    existingPanel.classList.add(
                        'active'
                    );


                    if (customerName) {

                        customerName.required =
                            false;

                    }


                    if (company) {

                        company.required =
                            false;

                    }


                    if (customerId) {

                        customerId.required =
                            true;

                    }

                }

            }


            if (newMode) {

                newMode.addEventListener(
                    'change',
                    updateCustomerMode
                );

            }


            if (existingMode) {

                existingMode.addEventListener(
                    'change',
                    updateCustomerMode
                );

            }


            updateCustomerMode();


            /* =================================================
               PREVENT DOUBLE SUBMIT
            ================================================== */

            let isSubmitting = false;


            if (form) {

                form.addEventListener(
                    'submit',
                    function (event) {

                        if (isSubmitting) {

                            event.preventDefault();

                            return;

                        }


                        isSubmitting = true;


                        if (convertButton) {

                            convertButton.disabled =
                                true;

                        }


                        if (convertButtonText) {

                            convertButtonText.textContent =
                                'Converting...';

                        }

                    }
                );

            }

        }
    );

</script>

@endsection