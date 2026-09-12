@extends('layouts.app')

@section('title', 'Customers')
@section('page-title', 'Customers')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .customers-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .customers-header {
        display: flex;

        align-items: flex-end;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 25px;
    }


    .customers-header-left h1 {
        margin: 0 0 6px;

        color: #202124;

        font-size: 28px;

        font-weight: 700;

        line-height: 1.2;
    }


    .customers-header-left p {
        margin: 0;

        color: #5F6368;

        font-size: 13px;
    }


    /* =========================================================
       ADD CUSTOMER BUTTON
    ========================================================= */

    .btn-add-customer {
        height: 40px;

        padding: 0 16px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        background: #0B2A6F;

        color: #FFFFFF;

        border: none;

        border-radius: 9px;

        text-decoration: none;

        font-size: 12px;

        font-weight: 600;

        white-space: nowrap;

        transition: .2s ease;
    }


    .btn-add-customer:hover {
        background: #071D4D;

        color: #FFFFFF;
    }


    .btn-add-customer svg {
        width: 15px;

        height: 15px;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .customers-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        box-shadow:
            0 2px 7px rgba(60, 64, 67, .06);

        overflow: hidden;
    }


    /* =========================================================
       SEARCH BAR
    ========================================================= */

    .customers-toolbar {
        display: flex;

        align-items: center;

        gap: 10px;

        padding: 18px 20px;

        border-bottom: 1px solid #E8EAED;

        background: #FFFFFF;
    }


    .search-wrapper {
        position: relative;

        flex: 1;
    }


    .search-icon {
        position: absolute;

        left: 12px;

        top: 50%;

        width: 16px;

        height: 16px;

        transform: translateY(-50%);

        color: #9AA0A6;

        pointer-events: none;
    }


    .search-input {
        width: 100%;

        height: 40px;

        padding: 0 13px 0 38px;

        border: 1px solid #DADCE0;

        border-radius: 9px;

        outline: none;

        background: #FFFFFF;

        color: #202124;

        font-size: 12px;
    }


    .search-input::placeholder {
        color: #9AA0A6;
    }


    .search-input:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 2px rgba(11,42,111,.08);
    }


    .btn-search {
        height: 40px;

        padding: 0 17px;

        border: none;

        border-radius: 9px;

        background: #0B2A6F;

        color: #FFFFFF;

        font-size: 12px;

        font-weight: 600;

        cursor: pointer;

        transition: .2s ease;
    }


    .btn-search:hover {
        background: #071D4D;
    }


    /* =========================================================
       TABLE WRAPPER
    ========================================================= */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .customers-table {
        width: 100%;

        border-collapse: collapse;

        min-width: 850px;
    }


    .customers-table th {
        padding: 13px 18px;

        text-align: left;

        background: #FAFAFA;

        border-bottom: 1px solid #E8EAED;

        color: #80868B;

        font-size: 10px;

        font-weight: 600;

        text-transform: uppercase;

        white-space: nowrap;
    }


    .customers-table td {
        padding: 15px 18px;

        border-bottom: 1px solid #F1F3F4;

        color: #3C4043;

        font-size: 12px;

        vertical-align: middle;
    }


    .customers-table tbody tr {
        transition: background .15s ease;
    }


    .customers-table tbody tr:hover {
        background: #FAFAFA;
    }


    .customers-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================================================
       CUSTOMER INFO
    ========================================================= */

    .customer-info {
        display: flex;

        align-items: center;

        gap: 10px;

        min-width: 190px;
    }


    .customer-avatar {
        width: 36px;

        height: 36px;

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


    .customer-name {
        color: #202124;

        font-size: 12px;

        font-weight: 600;
    }


    /* =========================================================
       COMPANY
    ========================================================= */

    .company-text {
        color: #5F6368;

        white-space: nowrap;
    }


    /* =========================================================
       EMAIL
    ========================================================= */

    .email-text {
        color: #5F6368;
    }


    /* =========================================================
       PHONE
    ========================================================= */

    .phone-text {
        color: #5F6368;

        white-space: nowrap;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

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

        transition: .2s ease;
    }


    /* DETAIL */

    .action-detail {
        background: #F1F3F4;

        color: #3C4043;
    }


    .action-detail:hover {
        background: #E8EAED;
    }


    /* EDIT */

    .action-edit {
        background: #E8EEF9;

        color: #0B2A6F;
    }


    .action-edit:hover {
        background: #D8E3F4;
    }


    /* DELETE */

    .action-delete {
        background: #FDE8EA;

        color: #E30613;
    }


    .action-delete:hover {
        background: #FAD4D8;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 55px 20px;

        text-align: center;

        color: #9AA0A6;
    }


    .empty-icon {
        width: 58px;

        height: 58px;

        margin: 0 auto 13px;

        border-radius: 15px;

        background: #F1F3F4;

        color: #9AA0A6;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .empty-icon svg {
        width: 25px;

        height: 25px;
    }


    .empty-title {
        margin-bottom: 5px;

        color: #5F6368;

        font-size: 13px;

        font-weight: 600;
    }


    .empty-description {
        color: #9AA0A6;

        font-size: 11px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-area {
        padding: 15px 20px;

        border-top: 1px solid #E8EAED;
    }


    /* =========================================================
       DELETE MODAL
    ========================================================= */

    .delete-modal {
        display: none;

        position: fixed;

        inset: 0;

        z-index: 9999;

        align-items: center;

        justify-content: center;

        padding: 20px;

        background: rgba(32,33,36,.45);
    }


    .delete-modal.show {
        display: flex;
    }


    .delete-modal-box {
        width: 410px;

        max-width: 100%;

        background: #FFFFFF;

        border-radius: 16px;

        padding: 28px;

        text-align: center;

        box-shadow:
            0 18px 45px rgba(32,33,36,.18);
    }


    .delete-icon {
        width: 58px;

        height: 58px;

        margin: 0 auto 15px;

        border-radius: 50%;

        background: #FDE8EA;

        color: #E30613;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .delete-icon svg {
        width: 22px;

        height: 22px;
    }


    .delete-modal-box h3 {
        margin: 0 0 7px;

        color: #202124;

        font-size: 18px;
    }


    .delete-modal-box p {
        margin: 0;

        color: #5F6368;

        font-size: 12px;

        line-height: 1.6;
    }


    .delete-modal-box strong {
        color: #202124;
    }


    .delete-actions {
        display: flex;

        justify-content: center;

        gap: 8px;

        margin-top: 22px;
    }


    .cancel-delete,
    .confirm-delete {
        height: 40px;

        padding: 0 16px;

        border: none;

        border-radius: 8px;

        font-size: 12px;

        font-weight: 600;

        cursor: pointer;
    }


    .cancel-delete {
        background: #F1F3F4;

        color: #3C4043;
    }


    .cancel-delete:hover {
        background: #E8EAED;
    }


    .confirm-delete {
        background: #E30613;

        color: #FFFFFF;
    }


    .confirm-delete:hover {
        background: #B91C1C;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .customers-header {
            align-items: flex-start;

            flex-direction: column;
        }

    }


    @media (max-width: 650px) {

        .customers-toolbar {
            flex-direction: column;

            align-items: stretch;
        }


        .btn-search {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="customers-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="customers-header">


        <div class="customers-header-left">

            <h1>
                Customers
            </h1>

            <p>
                Manage customer data for PT Petra Textima Mandiri.
            </p>

        </div>


        <a
            href="{{ route('customers.create') }}"
            class="btn-add-customer"
        >

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
            >

                <path d="M12 5v14"/>

                <path d="M5 12h14"/>

            </svg>


            Add Customer


        </a>


    </div>


    <!-- =====================================================
         MAIN CARD
    ====================================================== -->

    <div class="customers-card">


        <!-- =================================================
             SEARCH
        ================================================== -->

        <form
            action="{{ route('customers.index') }}"
            method="GET"
            class="customers-toolbar"
        >


            <div class="search-wrapper">


                <svg
                    class="search-icon"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <circle
                        cx="11"
                        cy="11"
                        r="7"
                    />

                    <path d="m20 20-4-4"/>

                </svg>


                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="search-input"
                    placeholder="Search by name, company, or email..."
                >


            </div>


            <button
                type="submit"
                class="btn-search"
            >

                Search

            </button>


        </form>


        <!-- =================================================
             TABLE
        ================================================== -->

        <div class="table-wrapper">


            <table class="customers-table">


                <thead>

                    <tr>

                        <th>
                            Customer
                        </th>

                        <th>
                            Company
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Phone
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($customers as $customer)


                        <tr>


                            <!-- =================================
                                 CUSTOMER
                            ================================== -->

                            <td>


                                <div class="customer-info">


                                    <div class="customer-avatar">

                                        {{ strtoupper(
                                            substr(
                                                $customer->name,
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>


                                    <div class="customer-name">

                                        {{ $customer->name }}

                                    </div>


                                </div>


                            </td>


                            <!-- =================================
                                 COMPANY
                            ================================== -->

                            <td>

                                <div class="company-text">

                                    {{ $customer->company ?? '-' }}

                                </div>

                            </td>


                            <!-- =================================
                                 EMAIL
                            ================================== -->

                            <td>

                                <div class="email-text">

                                    {{ $customer->email ?? '-' }}

                                </div>

                            </td>


                            <!-- =================================
                                 PHONE
                            ================================== -->

                            <td>

                                <div class="phone-text">

                                    {{ $customer->phone ?? '-' }}

                                </div>

                            </td>


                            <!-- =================================
                                 ACTION
                            ================================== -->

                            <td>


                                <div class="actions">


                                    <!-- DETAIL -->

                                    <a
                                        href="{{ route(
                                            'customers.show',
                                            $customer
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
                                            'customers.edit',
                                            $customer
                                        ) }}"
                                        class="
                                            action-btn
                                            action-edit
                                        "
                                    >

                                        Edit

                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        action="{{ route(
                                            'customers.destroy',
                                            $customer
                                        ) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="button"
                                            class="
                                                action-btn
                                                action-delete
                                            "
                                            onclick="openCustomerDeleteModal(
                                                '{{ route(
                                                    'customers.destroy',
                                                    $customer
                                                ) }}',
                                                '{{ addslashes(
                                                    $customer->name
                                                ) }}'
                                            )"
                                        >

                                            Delete

                                        </button>


                                    </form>


                                </div>


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="5">


                                <div class="empty-state">


                                    <div class="empty-icon">


                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >

                                            <path
                                                d="M4 21v-2a6 6 0 0 1 12 0v2"
                                            />

                                            <circle
                                                cx="10"
                                                cy="7"
                                                r="3"
                                            />

                                            <path
                                                d="M18 8a3 3 0 1 1 0 6"
                                            />

                                            <path
                                                d="M18 16c2.2.5 3 2 3 5"
                                            />

                                        </svg>


                                    </div>


                                    <div class="empty-title">

                                        No customers yet

                                    </div>


                                    <div class="empty-description">

                                        Add your first customer to get started.

                                    </div>


                                </div>


                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


        <!-- =================================================
             PAGINATION
        ================================================== -->

        @if(
            method_exists(
                $customers,
                'hasPages'
            )
            && $customers->hasPages()
        )


            <div class="pagination-area">

                {{ $customers->links() }}

            </div>


        @endif


    </div>


</div>


<!-- =========================================================
     DELETE MODAL
========================================================== -->

<div
    id="customerDeleteModal"
    class="delete-modal"
>


    <div class="delete-modal-box">


        <div class="delete-icon">


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


        <h3>
            Delete Customer?
        </h3>


        <p>

            Are you sure you want to delete
            <strong id="customerDeleteName"></strong>?

        </p>


        <div class="delete-actions">


            <button
                type="button"
                class="cancel-delete"
                onclick="closeCustomerDeleteModal()"
            >

                Cancel

            </button>


            <form
                id="customerDeleteForm"
                method="POST"
            >

                @csrf

                @method('DELETE')


                <button
                    type="submit"
                    class="confirm-delete"
                >

                    Delete

                </button>


            </form>


        </div>


    </div>


</div>


@endsection


@section('scripts')

<script>

    function openCustomerDeleteModal(
        action,
        customerName
    )
    {

        document.getElementById(
            'customerDeleteName'
        ).textContent = customerName;


        document.getElementById(
            'customerDeleteForm'
        ).action = action;


        document.getElementById(
            'customerDeleteModal'
        ).classList.add('show');

    }


    function closeCustomerDeleteModal()
    {

        document.getElementById(
            'customerDeleteModal'
        ).classList.remove('show');

    }


    document.addEventListener(
        'click',
        function(event)
        {

            const modal =
                document.getElementById(
                    'customerDeleteModal'
                );


            if (
                event.target === modal
            ) {

                closeCustomerDeleteModal();

            }

        }
    );


    document.addEventListener(
        'keydown',
        function(event)
        {

            if (
                event.key === 'Escape'
            ) {

                closeCustomerDeleteModal();

            }

        }
    );

</script>

@endsection