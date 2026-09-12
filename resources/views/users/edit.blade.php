@extends('layouts.app')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('styles')

<style>

    /* =====================================================
       PAGE
    ===================================================== */

    .user-edit-page {
        max-width: 900px;
        margin: 0 auto;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .user-edit-header {
        display: flex;

        align-items: flex-end;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 25px;
    }


    .user-edit-header h1 {
        margin: 0 0 6px;

        color: #202124;

        font-size: 28px;

        font-weight: 700;
    }


    .user-edit-header p {
        margin: 0;

        color: #5F6368;

        font-size: 13px;
    }


    /* =====================================================
       BUTTON
    ===================================================== */

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


    /* =====================================================
       CARD
    ===================================================== */

    .user-edit-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        padding: 28px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);
    }


    /* =====================================================
       CURRENT USER
    ===================================================== */

    .current-user {
        display: flex;

        align-items: center;

        gap: 12px;

        padding: 14px;

        margin-bottom: 25px;

        background: #F8F9FA;

        border: 1px solid #E8EAED;

        border-radius: 10px;
    }


    .current-user-avatar {
        width: 44px;

        height: 44px;

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


    .current-user-label {
        margin-bottom: 3px;

        color: #80868B;

        font-size: 10px;
    }


    .current-user-name {
        color: #202124;

        font-size: 13px;

        font-weight: 700;
    }


    /* =====================================================
       SECTION
    ===================================================== */

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


    /* =====================================================
       FORM GRID
    ===================================================== */

    .form-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;
    }


    .form-group.full {
        grid-column: 1 / -1;
    }


    /* =====================================================
       LABEL
    ===================================================== */

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


    /* =====================================================
       INPUT
    ===================================================== */

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

        transition: .2s ease;
    }


    .form-input:focus,
    .form-select:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 3px rgba(11,42,111,.08);
    }


    .form-input::placeholder {
        color: #9AA0A6;
    }


    /* =====================================================
       HELP
    ===================================================== */

    .field-help {
        margin-top: 6px;

        color: #80868B;

        font-size: 10px;

        line-height: 1.5;
    }


    /* =====================================================
       ERROR
    ===================================================== */

    .field-error {
        margin-top: 5px;

        color: #D93025;

        font-size: 10px;
    }


    /* =====================================================
       ROLE INFO
    ===================================================== */

    .role-info {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 10px;

        margin-top: 10px;
    }


    .role-box {
        padding: 12px;

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
        background: #F1F5FB;

        border-color: #D5E0F1;
    }


    .role-sales {
        background: #F7F2FC;

        border-color: #E2D7F4;
    }


    /* =====================================================
       ACTIONS
    ===================================================== */

    .form-actions {
        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 8px;

        margin-top: 28px;

        padding-top: 20px;

        border-top: 1px solid #E8EAED;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .user-edit-header {
            flex-direction: column;

            align-items: flex-start;
        }


        .user-edit-card {
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

<div class="user-edit-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="user-edit-header">


        <div>

            <h1>
                Edit User
            </h1>

            <p>
                Perbarui informasi dan hak akses pengguna CRM.
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
         CARD
    ====================================================== -->

    <div class="user-edit-card">


        <!-- =================================================
             CURRENT USER
        ================================================== -->

        <div class="current-user">


            <div class="current-user-avatar">

                {{ strtoupper(
                    substr(
                        $user->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <div>


                <div class="current-user-label">

                    User yang sedang diedit

                </div>


                <div class="current-user-name">

                    {{ $user->name }}

                </div>


            </div>


        </div>


        <!-- =================================================
             FORM
        ================================================== -->

        <form
            action="{{ route(
                'users.update',
                $user
            ) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- =================================================
                 INFORMASI USER
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Informasi User
                    </h2>

                    <p>
                        Perbarui identitas pengguna.
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
                            value="{{ old(
                                'name',
                                $user->name
                            ) }}"
                            required
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
                            value="{{ old(
                                'email',
                                $user->email
                            ) }}"
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
                        Password
                    </h2>

                    <p>
                        Kosongkan password jika tidak ingin mengubahnya.
                    </p>

                </div>


                <div class="form-grid">


                    <!-- PASSWORD -->

                    <div class="form-group">


                        <label
                            for="password"
                            class="form-label"
                        >

                            Password Baru

                        </label>


                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Masukkan password baru"
                            autocomplete="new-password"
                        >


                        <div class="field-help">

                            Minimal 8 karakter.

                        </div>


                        @error('password')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- CONFIRM -->

                    <div class="form-group">


                        <label
                            for="password_confirmation"
                            class="form-label"
                        >

                            Konfirmasi Password

                        </label>


                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-input"
                            placeholder="Ulangi password baru"
                            autocomplete="new-password"
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
                        Atur peran pengguna dalam CRM.
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


                            <option
                                value="admin"
                                {{ old(
                                    'role',
                                    $user->role
                                ) === 'admin'
                                    ? 'selected'
                                    : ''
                                }}
                            >

                                Admin

                            </option>


                            <option
                                value="sales"
                                {{ old(
                                    'role',
                                    $user->role
                                ) === 'sales'
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


                        <div class="role-info">


                            <div class="role-box role-admin">


                                <div class="role-box-title">

                                    Admin

                                </div>


                                <div class="role-box-description">

                                    Akses penuh ke CRM,
                                    termasuk Reports dan Users.

                                </div>


                            </div>


                            <div class="role-box role-sales">


                                <div class="role-box-title">

                                    Sales

                                </div>


                                <div class="role-box-description">

                                    Mengelola aktivitas dan
                                    proses penjualan.

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
                    href="{{ route(
                        'users.index'
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