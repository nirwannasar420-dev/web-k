@extends('layouts.app')

@section('title', 'Activities')
@section('page-title', 'Activities')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .activities-page {
        padding: 28px 30px 40px;
        width: 100%;
        box-sizing: border-box;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .activities-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }


    .activities-title h1 {
        margin: 0;
        font-size: 26px;
        color: #0B2A6F;
        font-weight: 700;
    }


    .activities-title p {
        margin: 7px 0 0;
        color: #8992a3;
        font-size: 14px;
    }


    /* =========================================================
       BUTTON TAMBAH ACTIVITY
    ========================================================= */

    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        height: 42px;
        padding: 0 17px;
        background: #0B2A6F;
        color: #FFFFFF;
        border: 1px solid #0B2A6F;
        text-decoration: none;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        box-shadow: 0 4px 10px rgba(11,42,111,.12);
        transition: .2s ease;
    }


    .btn-add:hover {
        background: #071D4D;
        border-color: #071D4D;
        color: #FFFFFF;
        transform: translateY(-1px);
        box-shadow: 0 7px 15px rgba(11,42,111,.18);
    }


    .btn-add svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       ACTIVITY CARD
    ========================================================= */

    .activity-card {
        background: #FFFFFF;
        border: 1px solid #e7eaf0;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
    }


    /* =========================================================
       FILTER
    ========================================================= */

    .filter-area {
        padding: 20px;
        border-bottom: 1px solid #eef0f4;
    }


    .filter-form {
        display: grid;
        grid-template-columns:
            minmax(200px, 1fr)
            190px
            190px
            auto;
        gap: 12px;
        align-items: end;
    }


    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-size: 12px;
        font-weight: 600;
        color: #667085;
    }


    .form-control-custom,
    .form-select-custom {
        width: 100%;
        height: 42px;
        padding: 0 12px;
        border: 1px solid #dfe3ea;
        border-radius: 9px;
        background: #FFFFFF;
        color: #253047;
        font-size: 13px;
        outline: none;
        box-sizing: border-box;
    }


    .form-control-custom:focus,
    .form-select-custom:focus {
        border-color: #0B2A6F;
        box-shadow: 0 0 0 3px rgba(11,42,111,.08);
    }


    /* =========================================================
       FILTER BUTTON
    ========================================================= */

    .btn-filter {
        height: 42px;
        padding: 0 17px;
        border: none;
        border-radius: 9px;
        background: #0B2A6F;
        color: #FFFFFF;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s ease;
    }


    .btn-filter:hover {
        background: #071D4D;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }


    .activities-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }


    .activities-table th {
        padding: 14px 18px;
        text-align: left;
        background: #f7f8fa;
        color: #70798a;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
        border-bottom: 1px solid #e8ebef;
    }


    .activities-table td {
        padding: 16px 18px;
        border-bottom: 1px solid #eef0f4;
        color: #344054;
        font-size: 13px;
        vertical-align: middle;
    }


    .activities-table tbody tr:hover {
        background: #fafbfc;
    }


    /* =========================================================
       ACTIVITY
    ========================================================= */

    .activity-subject {
        color: #172033;
        font-weight: 700;
        margin-bottom: 4px;
    }


    .activity-description {
        color: #8992a3;
        font-size: 12px;
        max-width: 280px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    /* =========================================================
       OPPORTUNITY
    ========================================================= */

    .opportunity-name {
        color: #0B2A6F;
        font-weight: 600;
    }


    /* =========================================================
       CUSTOMER
    ========================================================= */

    .customer-name {
        color: #344054;
        font-weight: 500;
    }


    /* =========================================================
       DATE
    ========================================================= */

    .date-text {
        color: #4b5565;
        white-space: nowrap;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }


    .status-planned {
        background: #fff1df;
        color: #b85a00;
    }


    .status-done {
        background: #e8f7ef;
        color: #18784d;
    }


    .status-cancelled {
        background: #fde9ec;
        color: #c52e3d;
    }


    .status-default {
        background: #f0f2f5;
        color: #667085;
    }


    /* =========================================================
       ACTION
       SAMA SEPERTI LEADS
    ========================================================= */

    .action-area {
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
    }


    .action-btn {
        height: 36px;

        padding: 0 12px;

        border-radius: 8px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        text-decoration: none;

        font-size: 11px;

        font-weight: 600;

        border: none;

        transition: .2s ease;

        box-sizing: border-box;
    }


    /* DETAIL */

    .action-view {
        background: #F1F3F5;
        color: #475467;
    }


    .action-view:hover {
        background: #E2E5E9;
        color: #344054;
    }


    /* EDIT */

    .action-edit {
        background: #E8EEF9;
        color: #0B2A6F;
    }


    .action-edit:hover {
        background: #DCE6F6;
        color: #071D4D;
    }


    /* HAPUS */

    .action-delete {
        background: #FDE9EC;

        color: #E30613;

        cursor: pointer;
    }


    .action-delete:hover {
        background: #FAD7DC;

        color: #C4000B;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-row {
        text-align: center;
        padding: 45px 20px !important;
    }


    .empty-icon {
        font-size: 38px;
        color: #b7bdc8;
        margin-bottom: 10px;
    }


    .empty-title {
        color: #4b5565;
        font-size: 14px;
        font-weight: 600;
    }


    .empty-description {
        margin-top: 4px;
        color: #8992a3;
        font-size: 12px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-area {
        padding: 18px 20px;

        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;
    }


    .pagination-info {
        color: #8992a3;
        font-size: 12px;
    }


    .pagination-links {
        display: flex;
        gap: 6px;
    }


    .pagination-links a,
    .pagination-links span {
        min-width: 32px;

        height: 32px;

        padding: 0 8px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        border: 1px solid #e1e5eb;

        border-radius: 7px;

        text-decoration: none;

        color: #4b5565;

        font-size: 12px;

        box-sizing: border-box;
    }


    .pagination-links .active {
        background: #0B2A6F;
        color: #FFFFFF;
        border-color: #0B2A6F;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .filter-form {
            grid-template-columns: 1fr 1fr;
        }

    }


    @media (max-width: 650px) {

        .activities-page {
            padding: 20px 15px 30px;
        }


        .activities-header {
            flex-direction: column;
            align-items: flex-start;
        }


        .btn-add {
            width: 100%;
        }


        .filter-form {
            grid-template-columns: 1fr;
        }


        .pagination-area {
            flex-direction: column;
            align-items: flex-start;
        }


        .action-area {
            flex-wrap: wrap;
        }

    }

</style>

@endsection


@section('content')

<div class="activities-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="activities-header">

        <div class="activities-title">

            <h1>
                Activities
            </h1>

            <p>
                Kelola aktivitas dan tindak lanjut Customer Relationship Management
            </p>

        </div>


        <a
            href="{{ route('activities.create') }}"
            class="btn-add"
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

            Tambah Activity

        </a>

    </div>


    {{-- =====================================================
         CARD
    ====================================================== --}}

    <div class="activity-card">


        {{-- =================================================
             FILTER
        ================================================== --}}

        <div class="filter-area">

            <form
                action="{{ route('activities.index') }}"
                method="GET"
                class="filter-form"
            >

                <div class="form-group">

                    <label>
                        Cari Aktivitas
                    </label>


                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control-custom"
                        placeholder="Cari subject aktivitas..."
                    >

                </div>


                <div class="form-group">

                    <label>
                        Status
                    </label>


                    <select
                        name="status"
                        class="form-select-custom"
                    >

                        <option value="">
                            Semua Status
                        </option>


                        <option
                            value="planned"
                            {{ request('status') == 'planned' ? 'selected' : '' }}
                        >
                            Planned
                        </option>


                        <option
                            value="done"
                            {{ request('status') == 'done' ? 'selected' : '' }}
                        >
                            Done
                        </option>


                        <option
                            value="cancelled"
                            {{ request('status') == 'cancelled' ? 'selected' : '' }}
                        >
                            Cancelled
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>
                        Opportunity
                    </label>


                    <select
                        name="opportunity_id"
                        class="form-select-custom"
                    >

                        <option value="">
                            Semua Opportunity
                        </option>


                        @if(isset($opportunities))

                            @foreach($opportunities as $opportunity)

                                <option
                                    value="{{ $opportunity->id }}"
                                    {{ request('opportunity_id') == $opportunity->id ? 'selected' : '' }}
                                >

                                    {{ $opportunity->name }}

                                </option>

                            @endforeach

                        @endif

                    </select>

                </div>


                <button
                    type="submit"
                    class="btn-filter"
                >

                    Cari

                </button>

            </form>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="table-wrapper">

            <table class="activities-table">


                <thead>

                    <tr>

                        <th>
                            Aktivitas
                        </th>

                        <th>
                            Opportunity
                        </th>

                        <th>
                            Customer
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($activities as $activity)

                        @php

                            $status =
                                strtolower(
                                    $activity->status ?? ''
                                );


                            if ($status === 'planned') {

                                $statusClass =
                                    'status-planned';

                            } elseif ($status === 'done') {

                                $statusClass =
                                    'status-done';

                            } elseif ($status === 'cancelled') {

                                $statusClass =
                                    'status-cancelled';

                            } else {

                                $statusClass =
                                    'status-default';

                            }

                        @endphp


                        <tr>


                            {{-- ACTIVITY --}}

                            <td>

                                <div class="activity-subject">

                                    {{ $activity->subject ?? 'Aktivitas' }}

                                </div>


                                @if(!empty($activity->description))

                                    <div class="activity-description">

                                        {{ $activity->description }}

                                    </div>

                                @endif

                            </td>


                            {{-- OPPORTUNITY --}}

                            <td>

                                @if($activity->opportunity)

                                    <div class="opportunity-name">

                                        {{ $activity->opportunity->name }}

                                    </div>

                                @else

                                    <span style="color:#8992a3;">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- CUSTOMER --}}

                            <td>

                                @if(
                                    $activity->opportunity &&
                                    $activity->opportunity->customer
                                )

                                    <div class="customer-name">

                                        {{ $activity->opportunity->customer->name }}

                                    </div>

                                @else

                                    <span style="color:#8992a3;">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- DATE --}}

                            <td>

                                <div class="date-text">

                                    @if(!empty($activity->activity_date))

                                        {{ \Illuminate\Support\Carbon::parse(
                                            $activity->activity_date
                                        )->format('d/m/Y H:i') }}

                                    @else

                                        -

                                    @endif

                                </div>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                <span
                                    class="status-badge {{ $statusClass }}"
                                >

                                    {{ ucfirst(
                                        $activity->status ?? '-'
                                    ) }}

                                </span>

                            </td>


                            {{-- ACTION --}}

                            <td>

                                <div class="action-area">


                                    {{-- DETAIL --}}

                                    <a
                                        href="{{ route(
                                            'activities.show',
                                            $activity->id
                                        ) }}"
                                        class="action-btn action-view"
                                    >
                                        Detail
                                    </a>


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route(
                                            'activities.edit',
                                            $activity->id
                                        ) }}"
                                        class="action-btn action-edit"
                                    >
                                        Edit
                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route(
                                            'activities.destroy',
                                            $activity->id
                                        ) }}"
                                        method="POST"
                                        class="delete-form"
                                        style="display:inline;"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="button"
                                            class="action-btn action-delete delete-button"
                                        >
                                            Hapus
                                        </button>

                                    </form>


                                </div>

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="6"
                                class="empty-row"
                            >

                                <div class="empty-icon">

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        width="38"
                                        height="38"
                                    >

                                        <rect
                                            x="3"
                                            y="4"
                                            width="18"
                                            height="17"
                                            rx="2"
                                        />

                                        <path d="M8 2v4"/>

                                        <path d="M16 2v4"/>

                                        <path d="M3 10h18"/>

                                    </svg>

                                </div>


                                <div class="empty-title">
                                    Belum ada aktivitas
                                </div>


                                <div class="empty-description">
                                    Belum terdapat data aktivitas pada CRM.
                                </div>

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if($activities->hasPages())

            <div class="pagination-area">

                <div class="pagination-info">

                    Menampilkan

                    {{ $activities->firstItem() ?? 0 }}

                    -

                    {{ $activities->lastItem() ?? 0 }}

                    dari

                    {{ $activities->total() }}

                    aktivitas

                </div>


                <div class="pagination-links">

                    @if($activities->onFirstPage())

                        <span>
                            ‹
                        </span>

                    @else

                        <a
                            href="{{ $activities->previousPageUrl() }}"
                        >
                            ‹
                        </a>

                    @endif


                    @foreach(
                        $activities->getUrlRange(
                            1,
                            $activities->lastPage()
                        )
                        as $page => $url
                    )

                        @if(
                            $page ==
                            $activities->currentPage()
                        )

                            <span class="active">
                                {{ $page }}
                            </span>

                        @else

                            <a href="{{ $url }}">
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach


                    @if($activities->hasMorePages())

                        <a
                            href="{{ $activities->nextPageUrl() }}"
                        >
                            ›
                        </a>

                    @else

                        <span>
                            ›
                        </span>

                    @endif

                </div>

            </div>

        @endif


    </div>

</div>


{{-- =========================================================
     DELETE MODAL
========================================================== --}}

<div
    id="deleteModal"
    style="
        display:none;
        position:fixed;
        inset:0;
        background:rgba(15,23,42,.45);
        z-index:9999;
        align-items:center;
        justify-content:center;
    "
>

    <div
        style="
            width:380px;
            max-width:90%;
            background:#fff;
            border-radius:16px;
            padding:25px;
            box-shadow:0 20px 50px rgba(0,0,0,.18);
        "
    >

        <h3
            style="
                margin:0 0 8px;
                color:#1d2739;
                font-size:18px;
            "
        >
            Hapus Activity?
        </h3>


        <p
            style="
                margin:0 0 20px;
                color:#8992a3;
                font-size:13px;
                line-height:1.6;
            "
        >
            Data activity yang dihapus tidak dapat dikembalikan.
        </p>


        <div
            style="
                display:flex;
                justify-content:flex-end;
                gap:10px;
            "
        >

            <button
                type="button"
                id="cancelDelete"
                style="
                    border:1px solid #dfe3ea;
                    background:#fff;
                    color:#475166;
                    padding:9px 16px;
                    border-radius:9px;
                    font-weight:600;
                    cursor:pointer;
                "
            >
                Batal
            </button>


            <button
                type="button"
                id="confirmDelete"
                style="
                    border:none;
                    background:#E30613;
                    color:#fff;
                    padding:9px 16px;
                    border-radius:9px;
                    font-weight:600;
                    cursor:pointer;
                "
            >
                Hapus
            </button>

        </div>

    </div>

</div>


<script>

    document.addEventListener(
        'DOMContentLoaded',
        function ()
        {

            const modal =
                document.getElementById(
                    'deleteModal'
                );


            const cancelButton =
                document.getElementById(
                    'cancelDelete'
                );


            const confirmButton =
                document.getElementById(
                    'confirmDelete'
                );


            let selectedForm = null;


            document
                .querySelectorAll('.delete-button')
                .forEach(
                    function(button)
                    {

                        button.addEventListener(
                            'click',
                            function()
                            {

                                selectedForm =
                                    this.closest(
                                        '.delete-form'
                                    );


                                modal.style.display =
                                    'flex';

                            }
                        );

                    }
                );


            cancelButton.addEventListener(
                'click',
                function()
                {

                    modal.style.display =
                        'none';

                    selectedForm = null;

                }
            );


            confirmButton.addEventListener(
                'click',
                function()
                {

                    if (selectedForm) {

                        selectedForm.submit();

                    }

                }
            );


            modal.addEventListener(
                'click',
                function(event)
                {

                    if (event.target === modal) {

                        modal.style.display =
                            'none';

                        selectedForm = null;

                    }

                }
            );

        }
    );

</script>

@endsection