@extends('layouts.app')

@section('title', 'Convert Lead')
@section('page-title', 'Convert Lead')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .convert-page {
        max-width: 950px;
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
    }


    /* =========================================================
       INFO LEAD
    ========================================================= */

    .lead-info-card {
        background: #E8EEF9;
        border: 1px solid #D5E0F1;
        border-radius: 14px;
        padding: 18px;
        margin-bottom: 20px;
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
       ERROR GLOBAL
    ========================================================= */

    .alert-error {
        margin-bottom: 22px;
        padding: 14px 15px;
        border-radius: 10px;
        background: #FFF0F1;
        border: 1px solid #F4C8CC;
        color: #B4232D;
        font-size: 12px;
        line-height: 1.6;
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .form-section {
        margin-bottom: 28px;
    }


    .form-section:last-child {
        margin-bottom: 0;
    }


    .section-title {
        margin-bottom: 18px;
        padding-bottom: 11px;
        border-bottom: 1px solid #F1F3F4;
        color: #202124;
        font-size: 15px;
        font-weight: 700;
    }


    .section-description {
        margin-top: -10px;
        margin-bottom: 18px;
        color: #80868B;
        font-size: 11px;
    }


    /* =========================================================
       GRID
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
        border: 1px solid #DADCE0;
        border-radius: 8px;
        background: #FFFFFF;
        color: #202124;
        outline: none;
        font-size: 12px;
        box-sizing: border-box;
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


    /* =========================================================
       INPUT ERROR
    ========================================================= */

    .input-error {
        border-color: #E30613 !important;
        box-shadow: 0 0 0 2px rgba(227,6,19,.08) !important;
    }


    /* =========================================================
       FIELD ERROR
    ========================================================= */

    .field-error {
        margin-top: 5px;
        color: #D93025;
        font-size: 10px;
        line-height: 1.4;
    }


    .client-error {
        display: none;
    }


    .client-error.show {
        display: block;
    }


    /* =========================================================
       CURRENT STAGE
    ========================================================= */

    .current-stage {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 40px;
        padding: 0 12px;
        background: #F8F9FA;
        border: 1px solid #E8EAED;
        border-radius: 8px;
        box-sizing: border-box;
    }


    .stage-dot {
        width: 8px;
        height: 8px;
        background: #0B2A6F;
        border-radius: 50%;
        flex-shrink: 0;
    }


    .current-stage-text {
        color: #3C4043;
        font-size: 12px;
        font-weight: 600;
    }


    /* =========================================================
       REVENUE NOTE
    ========================================================= */

    .field-hint {
        margin-top: 5px;
        color: #94A3B8;
        font-size: 10px;
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
        border-radius: 8px;
        border: none;
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


    .btn-convert svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .lead-info-grid,
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
            Ubah lead yang sudah memenuhi kualifikasi menjadi Customer
            dan Opportunity baru.
        </p>

    </div>


    {{-- =====================================================
         LEAD INFO
    ====================================================== --}}

    <div class="lead-info-card">

        <div class="lead-info-title">
            Data Lead
        </div>


        <div class="lead-info-grid">


            {{-- NAMA LEAD --}}

            <div class="lead-info-item">

                <span class="lead-info-label">
                    Lead
                </span>

                <span class="lead-info-value">
                    {{ $lead->name }}
                </span>

            </div>


            {{-- KONTAK --}}

            <div class="lead-info-item">

                <span class="lead-info-label">
                    Kontak
                </span>

                <span class="lead-info-value">
                    {{ $lead->contact_name ?? '-' }}
                </span>

            </div>


            {{-- STATUS --}}

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
         FORM CARD
    ====================================================== --}}

    <div class="form-card">


        {{-- ERROR GLOBAL DARI LARAVEL --}}

        @if($errors->any())

            <div class="alert-error">

                <strong>
                    Terjadi kesalahan:
                </strong>

                <div style="margin-top:6px;">

                    @foreach($errors->all() as $error)

                        <div>
                            • {{ $error }}
                        </div>

                    @endforeach

                </div>

            </div>

        @endif


        <form
            action="{{ route('leads.convert', $lead) }}"
            method="POST"
            id="convertLeadForm"
        >

            @csrf


            {{-- =================================================
                 DATA CUSTOMER
            ================================================== --}}

            <div class="form-section">

                <div class="section-title">
                    Data Customer
                </div>

                <div class="section-description">
                    Data ini akan digunakan untuk membuat customer baru.
                </div>


                <div class="form-grid">


                    {{-- CUSTOMER NAME --}}

                    <div class="form-group">

                        <label
                            for="customer_name"
                            class="form-label"
                        >

                            Nama Customer
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            name="customer_name"
                            id="customer_name"
                            class="form-input"
                            value="{{ old(
                                'customer_name',
                                $lead->contact_name ?? $lead->name
                            ) }}"
                            required
                            maxlength="255"
                        >


                        @error('customer_name')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- COMPANY --}}

                    <div class="form-group">

                        <label
                            for="company"
                            class="form-label"
                        >

                            Perusahaan
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            name="company"
                            id="company"
                            class="form-input"
                            value="{{ old(
                                'company',
                                $lead->name
                            ) }}"
                            required
                            maxlength="255"
                        >


                        @error('company')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

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
                            name="email"
                            id="email"
                            class="form-input"
                            value="{{ old(
                                'email',
                                $lead->email
                            ) }}"
                            maxlength="255"
                            autocomplete="email"
                        >


                        @error('email')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- TELEPON --}}

                    <div class="form-group">

                        <label
                            for="phone"
                            class="form-label"
                        >
                            Telepon
                        </label>


                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            class="form-input"
                            value="{{ old(
                                'phone',
                                $lead->phone
                            ) }}"
                            inputmode="numeric"
                            autocomplete="tel"
                            maxlength="50"
                            placeholder="Contoh: 081234567890"
                        >


                        <div
                            id="phoneError"
                            class="field-error client-error"
                        >
                            Nomor telepon harus berupa angka.
                        </div>


                        @error('phone')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>

            </div>


            {{-- =================================================
                 DATA OPPORTUNITY
            ================================================== --}}

            <div class="form-section">

                <div class="section-title">
                    Data Opportunity
                </div>

                <div class="section-description">
                    Opportunity baru akan otomatis dimulai dari stage Prospect.
                </div>


                <div class="form-grid">


                    {{-- OPPORTUNITY NAME --}}

                    <div class="form-group full">

                        <label
                            for="opportunity_name"
                            class="form-label"
                        >

                            Nama Opportunity
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            name="opportunity_name"
                            id="opportunity_name"
                            class="form-input"
                            value="{{ old(
                                'opportunity_name',
                                'Peluang ' . $lead->name
                            ) }}"
                            required
                            maxlength="255"
                        >


                        @error('opportunity_name')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- EXPECTED REVENUE --}}

                    <div class="form-group">

                        <label
                            for="expected_revenue"
                            class="form-label"
                        >

                            Estimasi Revenue
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            name="expected_revenue"
                            id="expected_revenue"
                            class="form-input"
                            value="{{ old(
                                'expected_revenue',
                                '0'
                            ) }}"
                            inputmode="numeric"
                            autocomplete="off"
                            required
                            placeholder="Contoh: 50000000"
                        >


                        <div
                            id="revenueError"
                            class="field-error client-error"
                        >
                            Estimasi Revenue harus berupa angka dan tidak boleh negatif.
                        </div>


                        <div class="field-hint">
                            Masukkan angka tanpa titik atau koma.
                            Contoh: 50000000
                        </div>


                        @error('expected_revenue')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

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
                            name="rating"
                            id="rating"
                            class="form-select"
                            required
                        >

                            <option
                                value="1"
                                {{ old('rating', 1) == 1
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                ★☆☆☆☆
                            </option>


                            <option
                                value="2"
                                {{ old('rating') == 2
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                ★★☆☆☆
                            </option>


                            <option
                                value="3"
                                {{ old('rating') == 3
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                ★★★☆☆
                            </option>


                            <option
                                value="4"
                                {{ old('rating') == 4
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                ★★★★☆
                            </option>


                            <option
                                value="5"
                                {{ old('rating') == 5
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                ★★★★★
                            </option>

                        </select>


                        @error('rating')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- STAGE --}}

                    <div class="form-group full">

                        <label class="form-label">
                            Stage Awal
                        </label>


                        <div class="current-stage">

                            <div class="stage-dot"></div>

                            <div class="current-stage-text">
                                Prospect
                            </div>

                        </div>

                    </div>


                    {{-- NOTES --}}

                    <div class="form-group full">

                        <label
                            for="notes"
                            class="form-label"
                        >
                            Catatan
                        </label>


                        <textarea
                            name="notes"
                            id="notes"
                            class="form-textarea"
                            placeholder="Tambahkan catatan mengenai opportunity..."
                        >{{ old('notes') }}</textarea>


                        @error('notes')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>

            </div>


            {{-- =================================================
                 ACTION
            ================================================== --}}

            <div class="form-actions">


                <a
                    href="{{ route('leads.show', $lead) }}"
                    class="btn btn-cancel"
                >
                    Batal
                </a>


                <button
                    type="submit"
                    class="btn btn-convert"
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

                    Convert Lead

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


            const phoneInput =
                document.getElementById(
                    'phone'
                );


            const phoneError =
                document.getElementById(
                    'phoneError'
                );


            const revenueInput =
                document.getElementById(
                    'expected_revenue'
                );


            const revenueError =
                document.getElementById(
                    'revenueError'
                );


            /*
            |--------------------------------------------------------------------------
            | VALIDASI PHONE
            |--------------------------------------------------------------------------
            */

            function validatePhone() {

                const value =
                    phoneInput.value.trim();


                // Telepon boleh kosong
                if (value === '') {

                    phoneInput.classList.remove(
                        'input-error'
                    );

                    phoneError.classList.remove(
                        'show'
                    );

                    return true;
                }


                const valid =
                    /^[0-9]+$/.test(value);


                if (!valid) {

                    phoneInput.classList.add(
                        'input-error'
                    );

                    phoneError.classList.add(
                        'show'
                    );

                    return false;
                }


                phoneInput.classList.remove(
                    'input-error'
                );

                phoneError.classList.remove(
                    'show'
                );

                return true;
            }


            /*
            |--------------------------------------------------------------------------
            | VALIDASI REVENUE
            |--------------------------------------------------------------------------
            */

            function validateRevenue() {

                const value =
                    revenueInput.value.trim();


                // Revenue wajib diisi
                if (value === '') {

                    revenueInput.classList.add(
                        'input-error'
                    );

                    revenueError.textContent =
                        'Estimasi Revenue wajib diisi.';

                    revenueError.classList.add(
                        'show'
                    );

                    return false;
                }


                /*
                 * Hanya angka 0-9.
                 * Tidak menerima:
                 * titik
                 * koma
                 * minus
                 * huruf
                 */

                const valid =
                    /^[0-9]+$/.test(value);


                if (!valid) {

                    revenueInput.classList.add(
                        'input-error'
                    );

                    revenueError.textContent =
                        'Estimasi Revenue harus berupa angka dan tidak boleh negatif.';

                    revenueError.classList.add(
                        'show'
                    );

                    return false;
                }


                /*
                 * Pastikan nilainya tidak negatif.
                 * Regex di atas sebenarnya sudah mencegah minus,
                 * tetapi pengecekan ini menjaga validasi tetap jelas.
                 */

                const numericValue =
                    Number(value);


                if (
                    !Number.isSafeInteger(
                        numericValue
                    ) ||
                    numericValue < 0
                ) {

                    revenueInput.classList.add(
                        'input-error'
                    );

                    revenueError.textContent =
                        'Estimasi Revenue tidak valid.';

                    revenueError.classList.add(
                        'show'
                    );

                    return false;
                }


                revenueInput.classList.remove(
                    'input-error'
                );

                revenueError.classList.remove(
                    'show'
                );

                return true;
            }


            /*
            |--------------------------------------------------------------------------
            | EVENT PHONE
            |--------------------------------------------------------------------------
            */

            phoneInput.addEventListener(
                'input',
                function () {

                    validatePhone();

                }
            );


            phoneInput.addEventListener(
                'blur',
                function () {

                    validatePhone();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | EVENT REVENUE
            |--------------------------------------------------------------------------
            */

            revenueInput.addEventListener(
                'input',
                function () {

                    validateRevenue();

                }
            );


            revenueInput.addEventListener(
                'blur',
                function () {

                    validateRevenue();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | SUBMIT
            |--------------------------------------------------------------------------
            */

            form.addEventListener(
                'submit',
                function (event) {

                    const phoneValid =
                        validatePhone();


                    const revenueValid =
                        validateRevenue();


                    if (
                        !phoneValid ||
                        !revenueValid
                    ) {

                        event.preventDefault();

                        if (!phoneValid) {

                            phoneInput.focus();

                        } else {

                            revenueInput.focus();

                        }

                    }

                }
            );


            /*
            |--------------------------------------------------------------------------
            | INITIAL VALIDATION
            |--------------------------------------------------------------------------
            */

            validatePhone();
            validateRevenue();

        }
    );

</script>

@endsection