@php
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('layouts.app')

@section('title', 'Users')
@section('page-title', 'Users')

@section('styles')

<style>

    /* =====================================================
       PAGE
    ===================================================== */

    .users-page {
        width: 100%;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .users-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }


    .users-header-left h1 {
        margin: 0 0 6px;

        color: #202124;

        font-size: 28px;

        font-weight: 700;

        line-height: 1.2;
    }


    .users-header-left p {
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

        border-radius: 9px;

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
       ALERT
    ===================================================== */

    .alert {
        margin-bottom: 18px;

        padding: 12px 15px;

        border-radius: 9px;

        font-size: 12px;
    }


    .alert-success {
        background: #E6F4EA;

        border: 1px solid #B7E1C3;

        color: #137333;
    }


    .alert-error {
        background: #FCE8E6;

        border: 1px solid #F5B8B3;

        color: #D93025;
    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .users-card {
        overflow: hidden;

        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);
    }


    /* =====================================================
       TABLE
    ===================================================== */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    .users-table {
        width: 100%;

        min-width: 760px;

        border-collapse: collapse;
    }


    .users-table th {
        padding: 14px 18px;

        text-align: left;

        background: #FAFAFA;

        border-bottom: 1px solid #E8EAED;

        color: #80868B;

        font-size: 10px;

        font-weight: 600;

        text-transform: uppercase;

        white-space: nowrap;
    }


    .users-table td {
        padding: 15px 18px;

        border-bottom: 1px solid #F1F3F4;

        color: #3C4043;

        font-size: 12px;

        vertical-align: middle;
    }


    .users-table tbody tr:hover {
        background: #FAFAFA;
    }


    .users-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =====================================================
       USER INFO
    ===================================================== */

    .user-info {
        display: flex;

        align-items: center;

        gap: 10px;

        min-width: 200px;
    }


    .user-avatar {
        width: 38px;

        height: 38px;

        flex-shrink: 0;

        border-radius: 10px;

        background: #E8EEF9;

        color: #0B2A6F;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 12px;

        font-weight: 700;
    }


    .user-name {
        color: #202124;

        font-size: 12px;

        font-weight: 600;
    }


    .user-email {
        color: #5F6368;

        font-size: 12px;
    }


    /* =====================================================
       ROLE
    ===================================================== */

    .role-badge {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 5px 10px;

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
       ACTIONS
    ===================================================== */

    .actions {
        display: flex;

        align-items: center;

        gap: 6px;

        white-space: nowrap;
    }


    .actions form {
        margin: 0;
    }


    .action-btn {
        height: 31px;

        padding: 0 10px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        border: none;

        border-radius: 7px;

        font-size: 10px;

        font-weight: 600;

        text-decoration: none;

        cursor: pointer;
    }


    .action-detail {
        background: #F1F3F4;

        color: #3C4043;
    }


    .action-detail:hover {
        background: #E8EAED;
    }


    .action-edit {
        background: #E8EEF9;

        color: #0B2A6F;
    }


    .action-edit:hover {
        background: #D8E3F4;
    }


    .action-delete {
        background: #FDE8EA;

        color: #E30613;
    }


    .action-delete:hover {
        background: #FAD4D8;
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .empty-state {
        padding: 55px 20px;

        text-align: center;

        color: #9AA0A6;

        font-size: 12px;
    }


    .empty-state-title {
        margin-bottom: 5px;

        color: #5F6368;

        font-size: 13px;

        font-weight: 600;
    }


    .empty-state-description {
        color: #9AA0A6;

        font-size: 11px;
    }


    /* =====================================================
       DELETE MODAL OVERLAY
    ===================================================== */

    .delete-modal {
        position: fixed;

        inset: 0;

        z-index: 9999;

        display: none;

        align-items: center;

        justify-content: center;

        padding: 20px;

        background: rgba(32,33,36,.48);

        backdrop-filter: blur(2px);
    }


    .delete-modal.show {
        display: flex;
    }


    /* =====================================================
       DELETE MODAL BOX
    ===================================================== */

    .delete-modal-box {
        width: 100%;

        max-width: 420px;

        background: #FFFFFF;

        border-radius: 16px;

        padding: 28px;

        box-shadow:
            0 20px 50px rgba(32,33,36,.20);

        animation: deleteModalIn .15s ease;
    }


    @keyframes deleteModalIn {

        from {
            opacity: 0;

            transform: translateY(8px) scale(.98);
        }

        to {
            opacity: 1;

            transform: translateY(0) scale(1);
        }

    }


    /* =====================================================
       DELETE ICON
    ===================================================== */

    .delete-modal-icon {
        width: 52px;

        height: 52px;

        margin-bottom: 16px;

        border-radius: 14px;

        background: #FDE8EA;

        color: #E30613;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .delete-modal-icon svg {
        width: 23px;

        height: 23px;
    }


    /* =====================================================
       DELETE TITLE
    ===================================================== */

    .delete-modal-title {
        margin: 0 0 8px;

        color: #202124;

        font-size: 18px;

        font-weight: 700;
    }


    /* =====================================================
       DELETE TEXT
    ===================================================== */

    .delete-modal-text {
        margin: 0;

        color: #5F6368;

        font-size: 12px;

        line-height: 1.6;
    }


    .delete-modal-text strong {
        color: #202124;

        font-weight: 600;
    }


    /* =====================================================
       DELETE ACTIONS
    ===================================================== */

    .delete-modal-actions {
        display: flex;

        justify-content: flex-end;

        gap: 8px;

        margin-top: 24px;
    }


    .delete-cancel-btn,
    .delete-confirm-btn {
        height: 40px;

        padding: 0 16px;

        border: none;

        border-radius: 8px;

        font-size: 12px;

        font-weight: 600;

        cursor: pointer;

        transition: .2s ease;
    }


    .delete-cancel-btn {
        background: #F1F3F4;

        color: #3C4043;
    }


    .delete-cancel-btn:hover {
        background: #E8EAED;
    }


    .delete-confirm-btn {
        background: #E30613;

        color: #FFFFFF;
    }


    .delete-confirm-btn:hover {
        background: #C0000F;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .users-header {
            flex-direction: column;

            align-items: flex-start;
        }


        .delete-modal-box {
            padding: 22px;
        }


        .delete-modal-actions {
            flex-direction: column-reverse;
        }


        .delete-cancel-btn,
        .delete-confirm-btn {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="users-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="users-header">


        <div class="users-header-left">

            <h1>
                Users
            </h1>


            <p>
                Manage user accounts and CRM access permissions for Petra Textima.
            </p>

        </div>


        <a
            href="{{ route('users.create') }}"
            class="btn btn-primary"
        >

            + Add User

        </a>


    </div>


    <!-- =====================================================
         SUCCESS MESSAGE
    ====================================================== -->

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <!-- =====================================================
         ERROR MESSAGE
    ====================================================== -->

    @if(session('error'))

        <div class="alert alert-error">

            {{ session('error') }}

        </div>

    @endif


    <!-- =====================================================
         USER TABLE
    ====================================================== -->

    <div class="users-card">


        <div class="table-wrapper">


            <table class="users-table">


                <thead>

                    <tr>

                        <th>
                            User
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Role
                        </th>

                        <th>
                            Created
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($users as $user)


                        <tr>


                            <!-- USER -->

                            <td>

                                <div class="user-info">


                                    <div class="user-avatar">

                                        {{
                                            strtoupper(
                                                substr(
                                                    $user->name,
                                                    0,
                                                    1
                                                )
                                            )
                                        }}

                                    </div>


                                    <div class="user-name">

                                        {{ $user->name }}

                                    </div>


                                </div>

                            </td>


                            <!-- EMAIL -->

                            <td>

                                <div class="user-email">

                                    {{ $user->email }}

                                </div>

                            </td>


                            <!-- ROLE -->

                            <td>


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

                                        {{
                                            $user->role
                                            ?? 'Not configured'
                                        }}

                                    </span>


                                @endif


                            </td>


                            <!-- CREATED -->

                            <td>


                                @if($user->created_at)

                                    {{
                                        $user->created_at->format(
                                            'd/m/Y H:i'
                                        )
                                    }}

                                @else

                                    -

                                @endif


                            </td>


                            <!-- ACTION -->

                            <td>


                                <div class="actions">


                                    <!-- DETAIL -->

                                    <a
                                        href="{{ route(
                                            'users.show',
                                            $user
                                        ) }}"
                                        class="
                                            action-btn
                                            action-detail
                                        "
                                    >

                                        Details

                                    </a>


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route(
                                            'users.edit',
                                            $user
                                        ) }}"
                                        class="
                                            action-btn
                                            action-edit
                                        "
                                    >

                                        Edit

                                    </a>


                                    <!-- DELETE -->

                                    @if($user->id !== Auth::id())


                                        <form
                                            id="delete-user-form-{{ $user->id }}"
                                            action="{{ route(
                                                'users.destroy',
                                                $user
                                            ) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('DELETE')

                                        </form>


                                        <button
                                            type="button"
                                            class="
                                                action-btn
                                                action-delete
                                            "
                                            onclick="
                                                openDeleteUserModal(
                                                    {{ $user->id }},
                                                    @js($user->name)
                                                )
                                            "
                                        >

                                            Delete

                                        </button>


                                    @endif


                                </div>


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="5">


                                <div class="empty-state">


                                    <div class="empty-state-title">

                                        No users yet

                                    </div>


                                    <div class="empty-state-description">

                                        Add a user to get started.

                                    </div>


                                </div>


                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


<!-- =========================================================
     CUSTOM DELETE MODAL
========================================================== -->

<div
    id="deleteUserModal"
    class="delete-modal"
    aria-hidden="true"
>


    <div
        class="delete-modal-box"
        role="dialog"
        aria-modal="true"
        aria-labelledby="deleteUserTitle"
    >


        <!-- ICON -->

        <div class="delete-modal-icon">


            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
            >

                <polyline
                    points="3 6 5 6 21 6"
                />

                <path
                    d="M19 6l-1 14H6L5 6"
                />

                <path
                    d="M10 11v6"
                />

                <path
                    d="M14 11v6"
                />

                <path
                    d="M9 6V4h6v2"
                />

            </svg>


        </div>


        <!-- TITLE -->

        <h3
            id="deleteUserTitle"
            class="delete-modal-title"
        >

            Delete User?

        </h3>


        <!-- TEXT -->

        <p class="delete-modal-text">

            Are you sure you want to delete user

            <strong id="deleteUserName">
                this user
            </strong>?

            <br>

            The deleted account will no longer be able to log in.

        </p>


        <!-- BUTTON -->

        <div class="delete-modal-actions">


            <button
                type="button"
                class="delete-cancel-btn"
                onclick="closeDeleteUserModal()"
            >

                Cancel

            </button>


            <button
                type="button"
                class="delete-confirm-btn"
                onclick="submitDeleteUser()"
            >

                Delete User

            </button>


        </div>


    </div>


</div>


@endsection


@section('scripts')

<script>

    /*
    |--------------------------------------------------------------------------
    | USER TO DELETE
    |--------------------------------------------------------------------------
    */

    let deleteUserId = null;


    /*
    |--------------------------------------------------------------------------
    | OPEN MODAL
    |--------------------------------------------------------------------------
    */

    function openDeleteUserModal(
        userId,
        userName
    ) {

        deleteUserId = userId;


        document.getElementById(
            'deleteUserName'
        ).textContent = userName;


        const modal =
            document.getElementById(
                'deleteUserModal'
            );


        modal.classList.add('show');

        modal.setAttribute(
            'aria-hidden',
            'false'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | CLOSE MODAL
    |--------------------------------------------------------------------------
    */

    function closeDeleteUserModal()
    {

        const modal =
            document.getElementById(
                'deleteUserModal'
            );


        modal.classList.remove('show');

        modal.setAttribute(
            'aria-hidden',
            'true'
        );


        deleteUserId = null;

    }


    /*
    |--------------------------------------------------------------------------
    | CONFIRM DELETE
    |--------------------------------------------------------------------------
    */

    function submitDeleteUser()
    {

        if (!deleteUserId) {

            return;

        }


        const form =
            document.getElementById(
                'delete-user-form-' +
                deleteUserId
            );


        if (form) {

            form.submit();

        }

    }


    /*
    |--------------------------------------------------------------------------
    | CLICK OUTSIDE MODAL
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'click',
        function(event)
        {

            const modal =
                document.getElementById(
                    'deleteUserModal'
                );


            if (
                event.target === modal
            ) {

                closeDeleteUserModal();

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | ESCAPE
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'keydown',
        function(event)
        {

            if (
                event.key === 'Escape'
            ) {

                closeDeleteUserModal();

            }

        }
    );

</script>

@endsection