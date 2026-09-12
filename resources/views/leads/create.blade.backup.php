@extends('layouts.app')

@section('title', 'Tambah Lead')
@section('page-title', 'Tambah Lead')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .lead-form-page {
        max-width: 950px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .form-page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .form-page-header h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
    }

    .form-page-header p {
        margin: 0;
        color: #5F6368;
        font-size: 13px;
    }


    /* =========================================================
       CARD
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
    .form-select,
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
       ERROR
    ========================================================= */

    .field-error {
        margin-top: 5px;
        color: #D93025;
        font-size: 10px;
    }


    /* =========================================================
       STATUS INFO
    ========================================================= */

    .status-info {
        display: flex;
        align-items: center;
        gap: 9px;
        min-height: 40px;
        padding: 0 12px;
        background: #F8F9FA;
        border: 1px solid #E8EAED;
        border-radius: 8px;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #0B2A6F;
    }

    .status-info-text {
        color: #3C4043;
        font-size: 12px;
    }


    /* =========================================================
       ACTION
    ========================================================= */

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
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

    .btn-secondary {
        background: #F1F3F4;
        color: #3C4043;
    }

    .btn-secondary:hover {
        background: #E8EAED;
    }

    .btn-primary {
        background: #0B2A6F;
        color: #FFFFFF;
    }

    .btn-primary:hover {
        background: #071D4D;
    }

    .btn-primary svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .form-page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-card {
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

<div class="lead-form-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="form-page-header">

        <div>

            <h1>
                Tambah Lead
            </h1>

            <p>
                Tambahkan calon pelanggan baru ke dalam CRM.
            </p>

        </div>


        <a
            href="{{ route('leads.index') }}"
            class="btn btn-secondary"
        >
            ← Kembali
        </a>

    </div>


    <!-- =====================================================
         FORM CARD
    ====================================================== -->

    <div class="form-card">


        <form
            action="{{ route('leads.store') }}"
            method="POST"
        >

            @csrf


            <!-- =================================================
                 INFORMASI LEAD
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Informasi Lead
                    </h2>

                    <p>
                        Masukkan informasi dasar calon pelanggan.
                    </p>

                </div>


                <div class="form-grid">


                    <!-- NAMA -->

                    <div class="form-group">

                        <label class="form-label">

                            Nama Lead
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-input"
                            value="{{ old('name') }}"
                            required
                        >


                        @error('name')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- KONTAK -->

                    <div class="form-group">

                        <label class="form-label">
                            Nama Kontak
                        </label>


                        <input
                            type="text"
                            name="contact_name"
                            class="form-input"
                            value="{{ old('contact_name') }}"
                        >


                        @error('contact_name')

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
                            value="{{ old('email') }}"
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
                            value="{{ old('phone') }}"
                        >


                        @error('phone')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- SUMBER -->

                    <div class="form-group">

                        <label class="form-label">
                            Sumber Lead
                        </label>


                        <select
                            name="source"
                            class="form-select"
                        >

                            <option value="">
                                Pilih sumber
                            </option>


                            <option
                                value="Website"
                                {{ old('source') === 'Website'
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                Website
                            </option>


                            <option
                                value="Marketing"
                                {{ old('source') === 'Marketing'
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                Marketing
                            </option>


                            <option
                                value="Referral"
                                {{ old('source') === 'Referral'
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                Referral
                            </option>


                            <option
                                value="Event"
                                {{ old('source') === 'Event'
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                Event
                            </option>


                            <option
                                value="Other"
                                {{ old('source') === 'Other'
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                Other
                            </option>

                        </select>


                        @error('source')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- STATUS -->

                    <div class="form-group">

                        <label class="form-label">
                            Status
                        </label>


                        <div class="status-info">

                            <span class="status-dot"></span>

                            <span class="status-info-text">
                                New
                            </span>

                        </div>


                        <input
                            type="hidden"
                            name="status"
                            value="new"
                        >

                    </div>


                </div>

            </div>


            <!-- =================================================
                 CATATAN
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Catatan
                    </h2>

                    <p>
                        Tambahkan informasi tambahan mengenai lead.
                    </p>

                </div>


                <div class="form-grid">


                    <div class="form-group full">

                        <label class="form-label">
                            Catatan
                        </label>


                        <textarea
                            name="notes"
                            class="form-textarea"
                        >{{ old('notes') }}</textarea>


                        @error('notes')

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
                    href="{{ route('leads.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
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

                    Simpan Lead

                </button>


            </div>


        </form>


    </div>


</div>

@endsection