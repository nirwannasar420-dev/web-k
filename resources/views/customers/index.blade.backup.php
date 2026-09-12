@extends('layouts.app')

@section('title', 'Customers')

@section('page-title', 'Customers')

@section('styles')

<style>

    /* ==============================
       PAGE HEADER
    ============================== */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .page-header h1 {
        font-size: 26px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
    }

    .page-header p {
        color: #6b7280;
        font-size: 14px;
    }


    /* ==============================
       BUTTON
    ============================== */

    .btn {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

    .btn-detail {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-detail:hover {
        background: #e5e7eb;
    }

    .btn-edit {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-edit:hover {
        background: #dbeafe;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fee2e2;
    }


    /* ==============================
       CARD
    ============================== */

    .card {
        background: white;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        border: 1px solid #eef0f3;
    }


    /* ==============================
       SEARCH
    ============================== */

    .search-box {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .search-box input {
        flex: 1;
        padding: 11px 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        outline: none;
        font-size: 13px;
    }

    .search-box input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
    }

    .search-box button {
        padding: 11px 18px;
        border: none;
        border-radius: 8px;
        background: #2563eb;
        color: white;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .search-box button:hover {
        background: #1d4ed8;
    }


    /* ==============================
       TABLE
    ============================== */

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    td {
        padding: 15px 14px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 13px;
        color: #374151;
        vertical-align: middle;
    }

    tbody tr:hover {
        background: #f9fafb;
    }

    .customer-name {
        font-weight: 600;
        color: #111827;
    }

    .company {
        color: #6b7280;
    }


    /* ==============================
       ACTIONS
    ============================== */

    .actions {
        display: flex;
        gap: 6px;
        align-items: center;
        flex-wrap: wrap;
    }

    .actions form {
        margin: 0;
    }


    /* ==============================
       EMPTY STATE
    ============================== */

    .empty {
        text-align: center;
        padding: 45px 20px;
        color: #9ca3af;
    }


    /* ==============================
       DELETE MODAL
    ============================== */

    .delete-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.55);
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 20px;
    }

    .delete-modal.show {
        display: flex;
    }

    .delete-modal-box {
        width: 420px;
        max-width: 100%;
        background: white;
        border-radius: 16px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
        animation: modalShow 0.2s ease;
    }

    @keyframes modalShow {

        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }

    }

    .delete-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 18px;
        border-radius: 50%;
        background: #fee2e2;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 27px;
    }

    .delete-modal-box h3 {
        margin-bottom: 10px;
        font-size: 20px;
        color: #111827;
    }

    .delete-modal-box p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
        line-height: 1.6;
    }

    .delete-modal-box strong {
        color: #111827;
    }

    .delete-actions {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 25px;
    }

    .cancel-delete {
        background: #f3f4f6;
        color: #374151;
        border: none;
        padding: 11px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .cancel-delete:hover {
        background: #e5e7eb;
    }

    .confirm-delete {
        background: #dc2626;
        color: white;
        border: none;
        padding: 11px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .confirm-delete:hover {
        background: #b91c1c;
    }


    /* ==============================
       RESPONSIVE
    ============================== */

    @media (max-width: 700px) {

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .search-box {
            flex-direction: column;
        }

        .search-box button {
            width: 100%;
        }

        .card {
            padding: 18px;
        }

    }

</style>

@endsection


@section('content')

<!-- ==============================
     PAGE HEADER
============================== -->

<div class="page-header">

    <div>

        <h1>
            Customers
        </h1>

        <p>
            Kelola data customer PT Petra Textima Mandiri.
        </p>

    </div>


    <a
        href="{{ route('customers.create') }}"
        class="btn btn-primary"
    >
        + Tambah Customer
    </a>

</div>


<!-- ==============================
     CUSTOMER CARD
============================== -->

<div class="card">

    <!-- SEARCH -->

    <form
        method="GET"
        action="{{ route('customers.index') }}"
        class="search-box"
    >

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama, perusahaan, atau email..."
        >

        <button type="submit">
            Cari
        </button>

    </form>


    <!-- TABLE -->

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>
                        Nama
                    </th>

                    <th>
                        Perusahaan
                    </th>

                    <th>
                        Email
                    </th>

                    <th>
                        Telepon
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($customers as $customer)

                    <tr>

                        <!-- NAMA -->

                        <td>

                            <div class="customer-name">
                                {{ $customer->name }}
                            </div>

                        </td>


                        <!-- PERUSAHAAN -->

                        <td>

                            <div class="company">
                                {{ $customer->company ?? '-' }}
                            </div>

                        </td>


                        <!-- EMAIL -->

                        <td>
                            {{ $customer->email ?? '-' }}
                        </td>


                        <!-- TELEPON -->

                        <td>
                            {{ $customer->phone ?? '-' }}
                        </td>


                        <!-- AKSI -->

                        <td>

                            <div class="actions">

                                <!-- DETAIL -->

                                <a
                                    href="{{ route(
                                        'customers.show',
                                        $customer
                                    ) }}"
                                    class="btn btn-detail"
                                >
                                    Detail
                                </a>


                                <!-- EDIT -->

                                <a
                                    href="{{ route(
                                        'customers.edit',
                                        $customer
                                    ) }}"
                                    class="btn btn-edit"
                                >
                                    Edit
                                </a>


                                <!-- HAPUS -->

                                <form
                                    action="{{ route(
                                        'customers.destroy',
                                        $customer
                                    ) }}"
                                    method="POST"
                                    class="delete-form"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="button"
                                        class="btn btn-delete"
                                        onclick="openDeleteModal(
                                            '{{ route(
                                                'customers.destroy',
                                                $customer
                                            ) }}',
                                            '{{ addslashes($customer->name) }}'
                                        )"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5">

                            <div class="empty">

                                <div style="
                                    font-size: 42px;
                                    margin-bottom: 12px;
                                ">
                                    🏢
                                </div>

                                <strong>
                                    Belum ada customer
                                </strong>

                                <p style="
                                    margin-top: 6px;
                                ">
                                    Silakan tambahkan customer pertama.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <!-- PAGINATION -->

    @if($customers->hasPages())

        <div style="margin-top: 20px;">

            {{ $customers->links() }}

        </div>

    @endif

</div>


<!-- ==============================
     DELETE MODAL
============================== -->

<div
    id="deleteModal"
    class="delete-modal"
>

    <div class="delete-modal-box">

        <div class="delete-icon">
            🗑️
        </div>


        <h3>
            Hapus Customer?
        </h3>


        <p>
            Apakah Anda yakin ingin menghapus
            <strong id="deleteCustomerName"></strong>?
        </p>


        <div class="delete-actions">

            <button
                type="button"
                class="cancel-delete"
                onclick="closeDeleteModal()"
            >
                Batal
            </button>


            <form
                id="confirmDeleteForm"
                method="POST"
            >

                @csrf

                @method('DELETE')

                <button
                    type="submit"
                    class="confirm-delete"
                >
                    Hapus
                </button>

            </form>

        </div>

    </div>

</div>

@endsection


@section('scripts')

<script>

    function openDeleteModal(action, customerName)
    {
        const modal = document.getElementById('deleteModal');

        const customerNameElement =
            document.getElementById('deleteCustomerName');

        const deleteForm =
            document.getElementById('confirmDeleteForm');


        customerNameElement.textContent = customerName;

        deleteForm.action = action;

        modal.classList.add('show');
    }


    function closeDeleteModal()
    {
        const modal = document.getElementById('deleteModal');

        modal.classList.remove('show');
    }


    /* Tutup modal saat klik area luar */

    document.addEventListener('click', function(event)
    {
        const modal =
            document.getElementById('deleteModal');

        if (
            event.target === modal
        ) {
            closeDeleteModal();
        }
    });


    /* Tutup modal dengan tombol ESC */

    document.addEventListener('keydown', function(event)
    {
        if (event.key === 'Escape') {
            closeDeleteModal();
        }
    });

</script>

@endsection