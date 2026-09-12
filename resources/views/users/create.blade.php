@extends('layouts.app')

@section('title', 'Tambah User')
@section('page-title', 'Tambah User')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .user-create-page {
        max-width: 900px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .user-create-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }


    .user-create-header h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
        line-height: 1.2;
    }


    .user-create-header p {
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
       CARD
    ========================================================= */

    .user-create-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        padding: 28px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);
    }


    /* =========================================================
       ALERT
    ========================================================= */

    .alert {
        margin-bottom: 18px;
        padding: 12px 15px;
        border-radius: 9px;
        font-size: 12px;
    }


    .alert-error {
        background: #FCE8E6;
        border: 1px solid #F5B8B3;
        color: #D93025;
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
       GRID
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

        height: 42px;

        padding: 0 12px;

        border: 1px solid #DADCE0;

        border-radius: 8px;

        background: #FFFFFF;

        color: #202124;

        font-size: 12px;

        outline: none;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }


    .form-input::placeholder {
        color: #9AA0A6;
    }


    .form-input:focus,
    .form-select:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 3px rgba(11,42,111,.08);
    }


    /* =========================================================
       PASSWORD INFO
    ========================================================= */

    .field-help {
        margin-top: 6px;

        color: #80868B;

        font-size: 10px;

        line-height: 1.5;
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
       ROLE SELECT
    ========================================================= */

    .role-info {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 10px;

        margin-top: 9px;
    }


    .role-box {
        padding: 11px 12px;

        border-radius: 9px;

        border: 1px solid #E8EAED;

        background: #F8F9FA;
    }


    .role-box-title {
        margin-bottom: 4px;

        color: #202124;

        font-size: 11px;

        font-weight: 700;
    }


    .role-box-description {
        color: #80868B;

        font-size: 10px;

        line-height: 1.5;
    }


    .role-admin {
        border-color: #D5E0F1;

        background: #F1F5FB;
    }


    .role-sales {
        border-color: #E2D7F4;

        background: #F7F2FC;
    }


    /* =========================================================
       FORM ACTION
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


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .user-create-header {
            flex-direction: column;
            align-items: flex-start;
        }


        .user-create-card {
            padding: 20px;
        }


        .form-grid {
            grid-template-columns: 1fr;
        }


        .form-group.full {
            grid-column: auto;
        }


        .role-info {
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

<div class="user-create-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="user-create-header">


        <div>

            <h1>
                Tambah User
            </h1>

            <p>
                Buat akun baru untuk pengguna CRM Petra Textima.
            </p>

        </div>


        <a
            href="{{ route('users.index') }}"
            class="btn btn-secondary"
        >

            ← Kembali

        </a>


    </div>


    <!-- =====================================================
         VALIDATION ERROR
    ====================================================== -->

    @if($errors->any())

        <div class="alert alert-error">

            <strong>
                Data belum dapat disimpan.
            </strong>

            Silakan periksa kembali data yang kamu masukkan.

        </div>

    @endif


    <!-- =====================================================
         FORM CARD
    ====================================================== -->

    <div class="user-create-card">


        <form
            action="{{ route('users.store') }}"
            method="POST"
        >

            @csrf


            <!-- =================================================
                 INFORMASI USER
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Informasi User
                    </h2>

                    <p>
                        Masukkan identitas pengguna yang akan menggunakan CRM.
                    </p>

                </div>


                <div class="form-grid">


                    <!-- NAMA -->

                    <div class="form-group">


                        <label
                            for="name"
                            class="form-label"
                        >

                            Nama
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama pengguna"
                            required
                            autofocus
                        >


                        @error('name')

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
                            <span class="required">*</span>

                        </label>


                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            value="{{ old('email') }}"
                            placeholder="contoh@petra.com"
                            required
                        >


                        @error('email')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                </div>

            </div>


            <!-- =================================================
                 PASSWORD
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Keamanan Akun
                    </h2>

                    <p>
                        Tentukan password untuk akun pengguna.
                    </p>

                </div>


                <div class="form-grid">


                    <!-- PASSWORD -->

                    <div class="form-group">


                        <label
                            for="password"
                            class="form-label"
                        >

                            Password
                            <span class="required">*</span>

                        </label>


                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
                            required
                        >


                        <div class="field-help">

                            Password minimal 8 karakter.

                        </div>


                        @error('password')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div class="form-group">


                        <label
                            for="password_confirmation"
                            class="form-label"
                        >

                            Konfirmasi Password
                            <span class="required">*</span>

                        </label>


                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-input"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            required
                        >


                        @error('password_confirmation')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                </div>

            </div>


            <!-- =================================================
                 ROLE
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Hak Akses
                    </h2>

                    <p>
                        Tentukan peran pengguna dalam sistem CRM.
                    </p>

                </div>


                <div class="form-grid">


                    <div class="form-group full">


                        <label
                            for="role"
                            class="form-label"
                        >

                            Role
                            <span class="required">*</span>

                        </label>


                        <select
                            id="role"
                            name="role"
                            class="form-select"
                            required
                        >


                            <option value="">

                                Pilih role pengguna

                            </option>


                            <option
                                value="admin"
                                {{ old('role') === 'admin'
                                    ? 'selected'
                                    : ''
                                }}
                            >

                                Admin

                            </option>


                            <option
                                value="sales"
                                {{ old('role') === 'sales'
                                    ? 'selected'
                                    : ''
                                }}
                            >

                                Sales

                            </option>


                        </select>


                        @error('role')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror


                        <!-- ROLE DESCRIPTION -->

                        <div class="role-info">


                            <div class="role-box role-admin">


                                <div class="role-box-title">

                                    Admin

                                </div>


                                <div class="role-box-description">

                                    Memiliki akses penuh, termasuk
                                    Reports dan User Management.

                                </div>


                            </div>


                            <div class="role-box role-sales">


                                <div class="role-box-title">

                                    Sales

                                </div>


                                <div class="role-box-description">

                                    Fokus mengelola Leads, Customers,
                                    Opportunities, Pipeline, dan Activities.

                                </div>


                            </div>


                        </div>


                    </div>


                </div>

            </div>


            <!-- =================================================
                 ACTION
            ================================================== -->

            <div class="form-actions">


                <a
                    href="{{ route('users.index') }}"
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
                    >

                        <path d="M12 5v14"/>

                        <path d="M5 12h14"/>

                    </svg>


                    Simpan User

                </button>


            </div>


        </form>


    </div>


</div>

@endsection