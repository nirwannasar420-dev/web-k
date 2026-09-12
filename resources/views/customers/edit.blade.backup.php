@extends('layouts.app')

@section('title', 'Edit Customer')
@section('page-title', 'Edit Customer')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .customer-edit-page {
        max-width: 950px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .customer-edit-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .customer-edit-header-left h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
        line-height: 1.2;
    }

    .customer-edit-header-left p {
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
       FORM CARD
    ========================================================= */

    .customer-edit-card {
        background: #FFFFFF;
        border: 1px solid #E8EAED;
        border-radius: 16px;
        padding: 28px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);
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
        grid-template-columns: 1fr 1fr;
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

        border: 1px solid #DADCE0;
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


    .form-input:focus,
    .form-textarea:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 2px rgba(11,42,111,.08);
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .field-error {
        margin-top: 5px;
        color: #D93025;
        font-size: 10px;
    }


    /* =========================================================
       CUSTOMER INFO
    ========================================================= */

    .current-customer {
        display: flex;
        align-items: center;
        gap: 12px;

        padding: 14px;

        margin-bottom: 20px;

        background: #F8F9FA;

        border: 1px solid #E8EAED;

        border-radius: 10px;
    }


    .current-avatar {
        width: 42px;
        height: 42px;

        flex-shrink: 0;

        border-radius: 11px;

        background: #E8EEF9;

        color: #0B2A6F;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 13px;
        font-weight: 700;
    }


    .current-info-label {
        margin-bottom: 3px;

        color: #80868B;

        font-size: 10px;
    }


    .current-info-name {
        color: #202124;

        font-size: 13px;

        font-weight: 700;
    }


    /* =========================================================
       ACTIONS
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

        .customer-edit-header {
            flex-direction: column;
            align-items: flex-start;
        }


        .customer-edit-card {
            padding: 20px;
        }


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

<div class="customer-edit-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="customer-edit-header">


        <div class="customer-edit-header-left">

            <h1>
                Edit Customer
            </h1>

            <p>
                Perbarui informasi pelanggan dalam sistem CRM.
            </p>

        </div>


        <a
            href="{{ route('customers.index') }}"
            class="btn btn-secondary"
        >

            ← Kembali

        </a>


    </div>


    <!-- =====================================================
         FORM CARD
    ====================================================== -->

    <div class="customer-edit-card">


        <!-- CURRENT CUSTOMER -->

        <div class="current-customer">


            <div class="current-avatar">

                {{ strtoupper(
                    substr(
                        $customer->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <div>

                <div class="current-info-label">
                    Customer yang sedang diedit
                </div>


                <div class="current-info-name">

                    {{ $customer->name }}

                </div>

            </div>


        </div>


        <!-- FORM -->

        <form
            action="{{ route(
                'customers.update',
                $customer
            ) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- =================================================
                 INFORMASI CUSTOMER
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Informasi Customer
                    </h2>

                    <p>
                        Perbarui data utama pelanggan.
                    </p>

                </div>


                <div class="form-grid">


                    <!-- NAMA -->

                    <div class="form-group">

                        <label class="form-label">

                            Nama Customer
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-input"
                            value="{{ old(
                                'name',
                                $customer->name
                            ) }}"
                            required
                        >


                        @error('name')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- PERUSAHAAN -->

                    <div class="form-group">

                        <label class="form-label">

                            Perusahaan
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            name="company"
                            class="form-input"
                            value="{{ old(
                                'company',
                                $customer->company
                            ) }}"
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

                        <label class="form-label">
                            Email
                        </label>


                        <input
                            type="email"
                            name="email"
                            class="form-input"
                            value="{{ old(
                                'email',
                                $customer->email
                            ) }}"
                        >


                        @error('email')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- TELEPON -->

                    <div class="form-group">

                        <label class="form-label">
                            Telepon
                        </label>


                        <input
                            type="text"
                            name="phone"
                            class="form-input"
                            value="{{ old(
                                'phone',
                                $customer->phone
                            ) }}"
                        >


                        @error('phone')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- ALAMAT -->

                    <div class="form-group full">

                        <label class="form-label">
                            Alamat
                        </label>


                        <textarea
                            name="address"
                            class="form-textarea"
                        >{{ old(
                            'address',
                            $customer->address
                        ) }}</textarea>


                        @error('address')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                </div>

            </div>


            <!-- =================================================
                 ACTION
            ================================================== -->

            <div class="form-actions">


                <a
                    href="{{ route(
                        'customers.index'
                    ) }}"
                    class="btn btn-secondary"
                >

                    Batal

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
                        stroke-linejoin="round"
                    >

                        <path d="M5 12h14"/>

                        <path d="M12 5v14"/>

                    </svg>

                    Simpan Perubahan

                </button>


            </div>


        </form>


    </div>


</div>

@endsection