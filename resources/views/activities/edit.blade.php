@extends('layouts.app')

@section('title', 'Edit Activity')
@section('page-title', 'Edit Activity')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .activity-form-page {
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
       ERROR ALERT
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
    .form-select {
        width: 100%;
        height: 40px;
        padding: 0 12px;
        border: 1px solid #DADCE0;
        border-radius: 8px;
        outline: none;
        background: #FFFFFF;
        color: #202124;
        font-size: 12px;
        box-sizing: border-box;
        transition: .2s ease;
    }


    .form-input:focus,
    .form-select:focus {
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
       STATUS
    ========================================================= */

    .status-options {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }


    .status-option {
        position: relative;
    }


    .status-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }


    .status-option label {
        height: 40px;
        padding: 0 10px;
        border: 1px solid #DADCE0;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #596273;
        background: #FFFFFF;
        font-size: 12px;
        font-weight: 600;
        transition: .2s ease;
    }


    .status-option label:hover {
        border-color: #CBD5E1;
        background: #F8FAFC;
    }


    .status-option.planned input:checked + label {
        border-color: #D98200;
        background: #FFF2DE;
        color: #B86500;
    }


    .status-option.done input:checked + label {
        border-color: #159A6C;
        background: #E7F6EF;
        color: #137A55;
    }


    .status-option.cancelled input:checked + label {
        border-color: #E30613;
        background: #FDEBED;
        color: #C72F3C;
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


        .status-options {
            grid-template-columns: 1fr;
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

<div class="activity-form-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="form-page-header">

        <div>

            <h1>
                Edit Activity
            </h1>

            <p>
                Perbarui informasi aktivitas CRM.
            </p>

        </div>


        <a
            href="{{ route('activities.index') }}"
            class="btn btn-secondary"
        >
            ← Kembali
        </a>

    </div>


    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="form-card">


        {{-- ERROR GLOBAL --}}

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
            action="{{ route('activities.update', $activity->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            {{-- =================================================
                 INFORMASI AKTIVITAS
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Informasi Aktivitas
                    </h2>

                    <p>
                        Perbarui data aktivitas yang telah dibuat.
                    </p>

                </div>


                <div class="form-grid">


                    {{-- OPPORTUNITY --}}

                    <div class="form-group">

                        <label
                            for="opportunity_id"
                            class="form-label"
                        >

                            Opportunity
                            <span class="required">*</span>

                        </label>


                        <select
                            name="opportunity_id"
                            id="opportunity_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Pilih Opportunity
                            </option>


                            @foreach($opportunities as $opportunity)

                                <option
                                    value="{{ $opportunity->id }}"
                                    {{ old('opportunity_id', $activity->opportunity_id) == $opportunity->id ? 'selected' : '' }}
                                >

                                    {{ $opportunity->name }}
                                    —
                                    {{ $opportunity->customer->name ?? '-' }}

                                </option>

                            @endforeach

                        </select>


                        @error('opportunity_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- JUDUL --}}

                    <div class="form-group">

                        <label
                            for="subject"
                            class="form-label"
                        >

                            Judul Aktivitas
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            name="subject"
                            id="subject"
                            class="form-input"
                            value="{{ old('subject', $activity->subject) }}"
                            placeholder="Contoh: Pembahasan harga"
                            maxlength="255"
                            required
                        >


                        @error('subject')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- JENIS AKTIVITAS --}}

                    <div class="form-group">

                        <label
                            for="type"
                            class="form-label"
                        >

                            Jenis Aktivitas
                            <span class="required">*</span>

                        </label>


                        <select
                            name="type"
                            id="type"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Pilih Jenis Aktivitas
                            </option>


                            <option
                                value="Meeting"
                                {{ old('type', $activity->type) === 'Meeting' ? 'selected' : '' }}
                            >
                                Meeting
                            </option>


                            <option
                                value="Follow Up"
                                {{ old('type', $activity->type) === 'Follow Up' ? 'selected' : '' }}
                            >
                                Follow Up
                            </option>


                            <option
                                value="Telepon"
                                {{ old('type', $activity->type) === 'Telepon' ? 'selected' : '' }}
                            >
                                Telepon
                            </option>


                            <option
                                value="Email"
                                {{ old('type', $activity->type) === 'Email' ? 'selected' : '' }}
                            >
                                Email
                            </option>


                            <option
                                value="Pembahasan Harga"
                                {{ old('type', $activity->type) === 'Pembahasan Harga' ? 'selected' : '' }}
                            >
                                Pembahasan Harga
                            </option>


                            <option
                                value="Lainnya"
                                {{ old('type', $activity->type) === 'Lainnya' ? 'selected' : '' }}
                            >
                                Lainnya
                            </option>

                        </select>


                        @error('type')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- TANGGAL & WAKTU --}}

                    <div class="form-group">

                        <label
                            for="activity_date"
                            class="form-label"
                        >

                            Tanggal & Waktu
                            <span class="required">*</span>

                        </label>


                        <input
                            type="datetime-local"
                            name="activity_date"
                            id="activity_date"
                            class="form-input"
                            value="{{ old(
                                'activity_date',
                                $activity->activity_date
                                    ? \Illuminate\Support\Carbon::parse(
                                        $activity->activity_date
                                    )->format('Y-m-d\TH:i')
                                    : ''
                            ) }}"
                            required
                        >


                        @error('activity_date')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>

            </div>


            {{-- =================================================
                 STATUS
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Status Aktivitas
                    </h2>

                    <p>
                        Tentukan status aktivitas saat ini.
                    </p>

                </div>


                <div class="status-options">


                    {{-- PLANNED --}}

                    <div class="status-option planned">

                        <input
                            type="radio"
                            name="status"
                            id="status_planned"
                            value="planned"
                            {{ old('status', strtolower($activity->status)) === 'planned' ? 'checked' : '' }}
                            required
                        >


                        <label for="status_planned">
                            Planned
                        </label>

                    </div>


                    {{-- DONE --}}

                    <div class="status-option done">

                        <input
                            type="radio"
                            name="status"
                            id="status_done"
                            value="done"
                            {{ old('status', strtolower($activity->status)) === 'done' ? 'checked' : '' }}
                        >


                        <label for="status_done">
                            Done
                        </label>

                    </div>


                    {{-- CANCELLED --}}

                    <div class="status-option cancelled">

                        <input
                            type="radio"
                            name="status"
                            id="status_cancelled"
                            value="cancelled"
                            {{ old('status', strtolower($activity->status)) === 'cancelled' ? 'checked' : '' }}
                        >


                        <label for="status_cancelled">
                            Cancelled
                        </label>

                    </div>


                </div>


                @error('status')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="form-actions">


                <a
                    href="{{ route('activities.index') }}"
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

                    Simpan Perubahan

                </button>

            </div>


        </form>

    </div>


</div>

@endsection