@extends('layouts.app')

@section('title', 'Detail User')
@section('page-title', 'Detail User')

@section('styles')

<style>

    /* =====================================================
       PAGE
    ===================================================== */

    .user-detail-page {
        max-width: 950px;
        margin: 0 auto;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .user-detail-header {
        display: flex;

        align-items: flex-end;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 25px;
    }


    .user-detail-header-left h1 {
        margin: 0 0 6px;

        color: #202124;

        font-size: 28px;

        font-weight: 700;
    }


    .user-detail-header-left p {
        margin: 0;

        color: #5F6368;

        font-size: 13px;
    }


    /* =====================================================
       BUTTON
    ===================================================== */

    .btn {
        height: 40px;

        padding: 0 15px;

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
       MAIN CARD
    ===================================================== */

    .user-detail-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        padding: 28px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);
    }


    /* =====================================================
       PROFILE
    ===================================================== */

    .user-profile {
        display: flex;

        align-items: center;

        gap: 16px;

        padding-bottom: 23px;

        border-bottom: 1px solid #E8EAED;
    }


    .user-avatar-large {
        width: 64px;

        height: 64px;

        flex-shrink: 0;

        border-radius: 16px;

        background: #E8EEF9;

        color: #0B2A6F;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 21px;

        font-weight: 700;
    }


    .user-profile-info h2 {
        margin: 0 0 5px;

        color: #202124;

        font-size: 21px;

        font-weight: 700;
    }


    .user-profile-info p {
        margin: 0 0 8px;

        color: #5F6368;

        font-size: 12px;
    }


    /* =====================================================
       ROLE BADGE
    ===================================================== */

    .role-badge {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 6px 10px;

        border-radius: 20px;

        font-size: 10px;

        font-weight: 600;
    }


    .role-badge::before {
        content: '';

        width: 5px;

        height: 5px;

        border-radius: 50%;

        background: currentColor;
    }


    .role-admin {
        background: #E8EEF9;

        color: #0B2A6F;
    }


    .role-sales {
        background: #EEE7FF;

        color: #6A1B9A;
    }


    .role-unknown {
        background: #F1F3F4;

        color: #5F6368;
    }


    /* =====================================================
       INFORMATION GRID
    ===================================================== */

    .user-info-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 0 40px;

        margin-top: 10px;
    }


    .user-info-item {
        padding: 17px 0;

        border-bottom: 1px solid #F1F3F4;
    }


    .user-info-label {
        margin-bottom: 6px;

        color: #80868B;

        font-size: 10px;

        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .user-info-value {
        color: #202124;

        font-size: 13px;

        line-height: 1.5;

        word-break: break-word;
    }


    .user-info-value.muted {
        color: #9AA0A6;
    }


    /* =====================================================
       ACCESS CARD
    ===================================================== */

    .access-card {
        margin-top: 24px;

        padding: 19px;

        background: #F8F9FA;

        border: 1px solid #E8EAED;

        border-radius: 12px;
    }


    .access-title {
        margin-bottom: 5px;

        color: #202124;

        font-size: 14px;

        font-weight: 700;
    }


    .access-description {
        margin-bottom: 15px;

        color: #5F6368;

        font-size: 11px;

        line-height: 1.6;
    }


    .access-list {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 9px;
    }


    .access-item {
        display: flex;

        align-items: center;

        gap: 8px;

        padding: 10px 12px;

        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 8px;

        color: #3C4043;

        font-size: 11px;
    }


    .access-check {
        width: 18px;

        height: 18px;

        border-radius: 50%;

        background: #E6F4EA;

        color: #137333;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 10px;

        font-weight: 700;
    }


    .access-lock {
        width: 18px;

        height: 18px;

        border-radius: 50%;

        background: #FCE8E6;

        color: #D93025;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 10px;

        font-weight: 700;
    }


    /* =====================================================
       ACTIONS
    ===================================================== */

    .user-actions {
        display: flex;

        align-items: center;

        gap: 8px;

        margin-top: 25px;

        padding-top: 20px;

        border-top: 1px solid #E8EAED;
    }


    .user-actions-spacer {
        flex: 1;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .user-detail-header {
            flex-direction: column;

            align-items: flex-start;
        }


        .user-detail-card {
            padding: 20px;
        }


        .user-info-grid,
        .access-list {
            grid-template-columns: 1fr;
        }


        .user-actions {
            flex-wrap: wrap;
        }


        .user-actions-spacer {
            display: none;
        }

    }

</style>

@endsection


@section('content')

<div class="user-detail-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="user-detail-header">


        <div class="user-detail-header-left">

            <h1>
                Detail User
            </h1>


            <p>
                Informasi akun dan hak akses pengguna CRM.
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
         MAIN CARD
    ====================================================== -->

    <div class="user-detail-card">


        <!-- =================================================
             PROFILE
        ================================================== -->

        <div class="user-profile">


            <div class="user-avatar-large">

                {{ strtoupper(
                    substr(
                        $user->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <div class="user-profile-info">


                <h2>

                    {{ $user->name }}

                </h2>


                <p>

                    {{ $user->email }}

                </p>


                <!-- ROLE -->

                @if($user->role === 'admin')


                    <span
                        class="
                            role-badge
                            role-admin
                        "
                    >

                        Admin

                    </span>


                @elseif($user->role === 'sales')


                    <span
                        class="
                            role-badge
                            role-sales
                        "
                    >

                        Sales

                    </span>


                @else


                    <span
                        class="
                            role-badge
                            role-unknown
                        "
                    >

                        {{ $user->role ?? 'Belum diatur' }}

                    </span>


                @endif


            </div>


        </div>


        <!-- =================================================
             USER INFORMATION
        ================================================== -->

        <div class="user-info-grid">


            <!-- NAMA -->

            <div class="user-info-item">


                <div class="user-info-label">
                    Nama
                </div>


                <div class="user-info-value">

                    {{ $user->name }}

                </div>


            </div>


            <!-- EMAIL -->

            <div class="user-info-item">


                <div class="user-info-label">
                    Email
                </div>


                <div class="user-info-value">

                    {{ $user->email }}

                </div>


            </div>


            <!-- ROLE -->

            <div class="user-info-item">


                <div class="user-info-label">
                    Role
                </div>


                <div class="user-info-value">

                    @if($user->role === 'admin')

                        Admin

                    @elseif($user->role === 'sales')

                        Sales

                    @else

                        {{ $user->role ?? 'Belum diatur' }}

                    @endif

                </div>


            </div>


            <!-- CREATED -->

            <div class="user-info-item">


                <div class="user-info-label">
                    Terdaftar
                </div>


                <div class="user-info-value">

                    @if($user->created_at)

                        {{
                            $user->created_at->format(
                                'd/m/Y H:i'
                            )
                        }}

                    @else

                        -

                    @endif

                </div>


            </div>


            <!-- UPDATED -->

            <div class="user-info-item">


                <div class="user-info-label">
                    Terakhir Diperbarui
                </div>


                <div class="user-info-value">

                    @if($user->updated_at)

                        {{
                            $user->updated_at->format(
                                'd/m/Y H:i'
                            )
                        }}

                    @else

                        -

                    @endif

                </div>


            </div>


        </div>


        <!-- =================================================
             HAK AKSES
        ================================================== -->

        <div class="access-card">


            <div class="access-title">

                Hak Akses

            </div>


            <div class="access-description">

                Hak akses pengguna ditentukan berdasarkan role
                yang diberikan oleh Administrator.

            </div>


            <div class="access-list">


                <!-- DASHBOARD -->

                <div class="access-item">

                    <span class="access-check">
                        ✓
                    </span>

                    Dashboard

                </div>


                <!-- PIPELINE -->

                <div class="access-item">

                    <span class="access-check">
                        ✓
                    </span>

                    Pipeline

                </div>


                <!-- LEADS -->

                <div class="access-item">

                    <span class="access-check">
                        ✓
                    </span>

                    Leads

                </div>


                <!-- CUSTOMERS -->

                <div class="access-item">

                    <span class="access-check">
                        ✓
                    </span>

                    Customers

                </div>


                <!-- OPPORTUNITIES -->

                <div class="access-item">

                    <span class="access-check">
                        ✓
                    </span>

                    Opportunities

                </div>


                <!-- ACTIVITIES -->

                <div class="access-item">

                    <span class="access-check">
                        ✓
                    </span>

                    Activities

                </div>


                <!-- REPORTS -->

                @if($user->role === 'admin')


                    <div class="access-item">

                        <span class="access-check">
                            ✓
                        </span>

                        Reports

                    </div>


                @else


                    <div class="access-item">

                        <span class="access-lock">
                            ×
                        </span>

                        Reports

                    </div>


                @endif


                <!-- USERS -->

                @if($user->role === 'admin')


                    <div class="access-item">

                        <span class="access-check">
                            ✓
                        </span>

                        User Management

                    </div>


                @else


                    <div class="access-item">

                        <span class="access-lock">
                            ×
                        </span>

                        User Management

                    </div>


                @endif


            </div>


        </div>


        <!-- =================================================
             ACTIONS
        ================================================== -->

        <div class="user-actions">


            <!-- EDIT -->

            <a
                href="{{ route(
                    'users.edit',
                    $user
                ) }}"
                class="btn btn-primary"
            >

                Edit User

            </a>


            <div class="user-actions-spacer"></div>


            <!-- KEMBALI -->

            <a
                href="{{ route(
                    'users.index'
                ) }}"
                class="btn btn-secondary"
            >

                Kembali

            </a>


        </div>


    </div>


</div>

@endsection