@extends('layouts.app')

@section('title', 'Leads')
@section('page-title', 'Leads')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .leads-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .leads-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
    }

    .leads-header-left h1 {
        margin: 0 0 6px;
        color: #0B2A6F;
        font-size: 27px;
        font-weight: 700;
        line-height: 1.2;
    }

    .leads-header-left p {
        margin: 0;
        color: #6B7280;
        font-size: 13px;
    }


    /* =========================================================
       ADD LEAD BUTTON - NAVY
    ========================================================= */

    .btn-add-lead {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        height: 42px;

        padding: 0 17px;

        background: #0B2A6F;

        color: #FFFFFF;

        border: 1px solid #0B2A6F;

        border-radius: 10px;

        text-decoration: none;

        font-size: 12px;

        font-weight: 700;

        white-space: nowrap;

        box-shadow:
            0 4px 10px rgba(11, 42, 111, .12);

        transition: .2s ease;
    }

    .btn-add-lead:hover {
        background: #071D4D;

        border-color: #071D4D;

        color: #FFFFFF;

        transform: translateY(-1px);

        box-shadow:
            0 7px 15px rgba(11, 42, 111, .18);
    }

    .btn-add-lead svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .leads-card {
        background: #FFFFFF;

        border: 1px solid #E5E7EB;

        border-radius: 16px;

        box-shadow:
            0 3px 12px rgba(0,0,0,.04);

        overflow: hidden;
    }


    /* =========================================================
       TOOLBAR
    ========================================================= */

    .leads-toolbar {
        display: flex;

        align-items: center;

        gap: 10px;

        padding: 18px 20px;

        border-bottom: 1px solid #E5E7EB;
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

        color: #98A2B3;

        pointer-events: none;
    }

    .search-input {
        width: 100%;

        height: 41px;

        padding: 0 13px 0 38px;

        border: 1px solid #DDE1E6;

        border-radius: 9px;

        outline: none;

        background: #FFFFFF;

        color: #344054;

        font-size: 12px;

        box-sizing: border-box;
    }

    .search-input::placeholder {
        color: #98A2B3;
    }

    .search-input:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 3px rgba(11,42,111,.07);
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-select {
        width: 165px;

        height: 41px;

        padding: 0 12px;

        border: 1px solid #DDE1E6;

        border-radius: 9px;

        outline: none;

        background: #FFFFFF;

        color: #344054;

        font-size: 12px;

        cursor: pointer;

        box-sizing: border-box;
    }

    .status-select:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 3px rgba(11,42,111,.07);
    }


    /* =========================================================
       SEARCH BUTTON
    ========================================================= */

    .btn-search {
        height: 41px;

        padding: 0 17px;

        border: none;

        border-radius: 9px;

        background: #0B2A6F;

        color: #FFFFFF;

        font-size: 12px;

        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;
    }

    .btn-search:hover {
        background: #071D4D;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    .leads-table {
        width: 100%;

        min-width: 900px;

        border-collapse: collapse;
    }

    .leads-table th {
        padding: 13px 18px;

        background: #F8F9FA;

        border-bottom: 1px solid #E5E7EB;

        text-align: left;

        color: #7A8494;

        font-size: 10px;

        font-weight: 700;

        text-transform: uppercase;

        white-space: nowrap;
    }

    .leads-table td {
        padding: 15px 18px;

        border-bottom: 1px solid #F0F1F3;

        color: #344054;

        font-size: 12px;

        vertical-align: middle;
    }

    .leads-table tbody tr {
        transition: .15s ease;
    }

    .leads-table tbody tr:hover {
        background: #FAFBFC;
    }

    .leads-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================================================
       LEAD
    ========================================================= */

    .lead-info {
        display: flex;

        align-items: center;

        gap: 10px;

        min-width: 190px;
    }

    .lead-avatar {
        width: 37px;
        height: 37px;

        flex-shrink: 0;

        border-radius: 10px;

        background: #EAF0FF;

        color: #0B2A6F;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 12px;

        font-weight: 700;
    }

    .lead-name {
        color: #1F2937;

        font-size: 13px;

        font-weight: 700;
    }


    /* =========================================================
       TEXT
    ========================================================= */

    .contact-text,
    .email-text,
    .source-text {
        color: #667085;
    }

    .email-text {
        word-break: break-word;
    }


    /* =========================================================
       STATUS BADGE
    ========================================================= */

    .status-badge {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 6px 10px;

        border-radius: 20px;

        font-size: 10px;

        font-weight: 700;

        white-space: nowrap;
    }

    .status-badge::before {
        content: '';

        width: 5px;
        height: 5px;

        border-radius: 50%;

        background: currentColor;
    }

    .status-new {
        background: #EAF0FF;

        color: #0B2A6F;
    }

    .status-contacted {
        background: #FFF1DF;

        color: #B85A00;
    }

    .status-qualified {
        background: #EEE7FF;

        color: #6A1B9A;
    }

    .status-converted {
        background: #E8F7EF;

        color: #18784D;
    }

    .status-lost {
        background: #FDE9EC;

        color: #C52E3D;
    }

    .status-default {
        background: #F0F2F5;

        color: #667085;
    }


    /* =========================================================
       ACTION
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
        height: 32px;

        padding: 0 10px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        border: none;

        border-radius: 8px;

        font-size: 10px;

        font-weight: 700;

        text-decoration: none;

        cursor: pointer;

        box-sizing: border-box;
    }

    .action-detail {
        background: #F1F3F5;

        color: #475467;
    }

    .action-detail:hover {
        background: #E5E7EB;
    }

    .action-edit {
        background: #EAF0FF;

        color: #0B2A6F;
    }

    .action-edit:hover {
        background: #DDE8FF;
    }

    .action-delete {
        background: #FDE9EC;

        color: #D92D3D;
    }

    .action-delete:hover {
        background: #F9D5DA;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-state {
        padding: 55px 20px;

        text-align: center;
    }

    .empty-icon {
        width: 58px;
        height: 58px;

        margin: 0 auto 13px;

        border-radius: 15px;

        background: #F1F3F5;

        color: #98A2B3;

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

        color: #475467;

        font-size: 13px;

        font-weight: 700;
    }

    .empty-description {
        color: #98A2B3;

        font-size: 11px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-area {
        padding: 15px 20px;

        border-top: 1px solid #E5E7EB;
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

        background: rgba(15,23,42,.45);
    }

    .delete-modal.show {
        display: flex;
    }

    .delete-modal-box {
        width: 410px;

        max-width: 100%;

        padding: 28px;

        background: #FFFFFF;

        border-radius: 16px;

        text-align: center;

        box-shadow:
            0 18px 45px rgba(15,23,42,.20);
    }

    .delete-icon {
        width: 58px;
        height: 58px;

        margin: 0 auto 15px;

        border-radius: 50%;

        background: #FDE9EC;

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

        color: #1F2937;

        font-size: 18px;
    }

    .delete-modal-box p {
        margin: 0;

        color: #667085;

        font-size: 12px;

        line-height: 1.6;
    }

    .delete-modal-box strong {
        color: #1F2937;
    }

    .delete-actions {
        display: flex;

        justify-content: center;

        gap: 8px;

        margin-top: 22px;
    }

    .cancel-delete {
        padding: 10px 16px;

        border: none;

        border-radius: 8px;

        background: #F1F3F5;

        color: #475467;

        font-size: 12px;

        font-weight: 700;

        cursor: pointer;
    }

    .confirm-delete {
        padding: 10px 16px;

        border: none;

        border-radius: 8px;

        background: #E30613;

        color: #FFFFFF;

        font-size: 12px;

        font-weight: 700;

        cursor: pointer;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .leads-header {
            align-items: flex-start;

            flex-direction: column;
        }

    }


    @media (max-width: 700px) {

        .leads-toolbar {
            align-items: stretch;

            flex-direction: column;
        }

        .status-select,
        .btn-search {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="leads-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="leads-header">

        <div class="leads-header-left">

            <h1>
                Leads
            </h1>

            <p>
                Manage potential customers and sales prospects.
            </p>

        </div>


        <a
            href="{{ route('leads.create') }}"
            class="btn-add-lead"
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

            Add Lead

        </a>

    </div>


    <!-- =====================================================
         MAIN CARD
    ====================================================== -->

    <div class="leads-card">


        <!-- TOOLBAR -->

        <form
            action="{{ route('leads.index') }}"
            method="GET"
            class="leads-toolbar"
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
                    placeholder="Search lead name, contact, or email..."
                >

            </div>


            <select
                name="status"
                class="status-select"
            >

                <option value="">
                    All Statuses
                </option>

                <option
                    value="new"
                    {{ request('status') === 'new' ? 'selected' : '' }}
                >
                    New
                </option>

                <option
                    value="contacted"
                    {{ request('status') === 'contacted' ? 'selected' : '' }}
                >
                    Contacted
                </option>

                <option
                    value="qualified"
                    {{ request('status') === 'qualified' ? 'selected' : '' }}
                >
                    Qualified
                </option>

                <option
                    value="converted"
                    {{ request('status') === 'converted' ? 'selected' : '' }}
                >
                    Converted
                </option>

                <option
                    value="lost"
                    {{ request('status') === 'lost' ? 'selected' : '' }}
                >
                    Lost
                </option>

            </select>


            <button
                type="submit"
                class="btn-search"
            >
                Search
            </button>

        </form>


        <!-- TABLE -->

        <div class="table-wrapper">

            <table class="leads-table">

                <thead>

                    <tr>

                        <th>
                            Lead
                        </th>

                        <th>
                            Contact
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Source
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($leads as $lead)

                        @php

                            $leadStatus =
                                strtolower(
                                    $lead->status ?? ''
                                );

                        @endphp


                        <tr>


                            <!-- LEAD -->

                            <td>

                                <div class="lead-info">

                                    <div class="lead-avatar">

                                        {{ strtoupper(
                                            substr(
                                                $lead->name ?? '-',
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>


                                    <div>

                                        <div class="lead-name">

                                            {{ $lead->name }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            <!-- CONTACT -->

                            <td>

                                <div class="contact-text">

                                    {{ $lead->contact_name ?? '-' }}

                                </div>

                            </td>


                            <!-- EMAIL -->

                            <td>

                                <div class="email-text">

                                    {{ $lead->email ?? '-' }}

                                </div>

                            </td>


                            <!-- SOURCE -->

                            <td>

                                <div class="source-text">

                                    {{ $lead->source ?? '-' }}

                                </div>

                            </td>


                            <!-- STATUS -->

                            <td>

                                @if($leadStatus === 'new')

                                    <span class="status-badge status-new">
                                        New
                                    </span>

                                @elseif($leadStatus === 'contacted')

                                    <span class="status-badge status-contacted">
                                        Contacted
                                    </span>

                                @elseif($leadStatus === 'qualified')

                                    <span class="status-badge status-qualified">
                                        Qualified
                                    </span>

                                @elseif($leadStatus === 'converted')

                                    <span class="status-badge status-converted">
                                        Converted
                                    </span>

                                @elseif($leadStatus === 'lost')

                                    <span class="status-badge status-lost">
                                        Lost
                                    </span>

                                @else

                                    <span class="status-badge status-default">
                                        {{ ucfirst($lead->status ?? '-') }}
                                    </span>

                                @endif

                            </td>


                            <!-- ACTION -->

                            <td>

                                <div class="actions">


                                    <a
                                        href="{{ route(
                                            'leads.show',
                                            $lead
                                        ) }}"
                                        class="action-btn action-detail"
                                    >
                                        Details
                                    </a>


                                    <a
                                        href="{{ route(
                                            'leads.edit',
                                            $lead
                                        ) }}"
                                        class="action-btn action-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route(
                                            'leads.destroy',
                                            $lead
                                        ) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="button"
                                            class="action-btn action-delete"
                                            onclick="openLeadDeleteModal(
                                                '{{ route(
                                                    'leads.destroy',
                                                    $lead
                                                ) }}',
                                                @js($lead->name)
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

                            <td colspan="6">

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

                                            <circle
                                                cx="12"
                                                cy="8"
                                                r="3"
                                            />

                                            <path
                                                d="M4 20c0-4 3.5-6 8-6s8 2 8 6"
                                            />

                                        </svg>

                                    </div>


                                    <div class="empty-title">
                                        No leads yet
                                    </div>


                                    <div class="empty-description">
                                        Add your first lead to get started.
                                    </div>


                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- PAGINATION -->

        @if($leads->hasPages())

            <div class="pagination-area">

                {{ $leads->links() }}

            </div>

        @endif


    </div>

</div>


<!-- =========================================================
     DELETE MODAL
========================================================== -->

<div
    id="leadDeleteModal"
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

                <polyline points="3 6 5 6 21 6"/>

                <path d="M19 6l-1 14H6L5 6"/>

                <path d="M10 11v6"/>

                <path d="M14 11v6"/>

                <path d="M9 6V4h6v2"/>

            </svg>

        </div>


        <h3>
            Delete Lead?
        </h3>


        <p>

            Are you sure you want to delete

            <strong id="leadDeleteName"></strong>?

        </p>


        <div class="delete-actions">


            <button
                type="button"
                class="cancel-delete"
                onclick="closeLeadDeleteModal()"
            >
                Cancel
            </button>


            <form
                id="leadDeleteForm"
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


<script>

    function openLeadDeleteModal(
        action,
        leadName
    )
    {
        document.getElementById(
            'leadDeleteName'
        ).textContent = leadName;


        document.getElementById(
            'leadDeleteForm'
        ).action = action;


        document.getElementById(
            'leadDeleteModal'
        ).classList.add('show');
    }


    function closeLeadDeleteModal()
    {
        document.getElementById(
            'leadDeleteModal'
        ).classList.remove('show');
    }


    document.addEventListener(
        'click',
        function(event)
        {

            const modal =
                document.getElementById(
                    'leadDeleteModal'
                );


            if (event.target === modal) {

                closeLeadDeleteModal();

            }

        }
    );


    document.addEventListener(
        'keydown',
        function(event)
        {

            if (event.key === 'Escape') {

                closeLeadDeleteModal();

            }

        }
    );

</script>

@endsection