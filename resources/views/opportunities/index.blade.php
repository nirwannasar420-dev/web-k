@extends('layouts.app')

@section('title', 'Opportunities')
@section('page-title', 'Opportunities')


@section('styles')

<style>

/* =========================================================
   PAGE
========================================================= */

.opportunities-page {
    width: 100%;
}


/* =========================================================
   HEADER
========================================================= */

.opportunities-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;

    gap: 20px;

    margin-bottom: 25px;
}


.opportunities-header-left h1 {
    margin: 0 0 6px;

    color: #202124;

    font-size: 28px;
    font-weight: 700;

    line-height: 1.2;
}


.opportunities-header-left p {
    margin: 0;

    color: #5F6368;

    font-size: 13px;
}


/* =========================================================
   ADD BUTTON
========================================================= */

.btn-add-opportunity {
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

    font-size: 12px;
    font-weight: 600;

    text-decoration: none;

    white-space: nowrap;

    transition: .2s ease;
}


.btn-add-opportunity:hover {
    background: #071D4D;

    color: #FFFFFF;

    transform: translateY(-1px);
}


.btn-add-opportunity svg {
    width: 15px !important;
    height: 15px !important;

    flex-shrink: 0;
}


/* =========================================================
   MAIN CARD
========================================================= */

.opportunities-card {
    background: #FFFFFF;

    border: 1px solid #E8EAED;

    border-radius: 16px;

    overflow: hidden;

    box-shadow:
        0 2px 7px rgba(60,64,67,.06);
}


/* =========================================================
   TOOLBAR
========================================================= */

.opportunities-toolbar {
    display: flex;

    align-items: center;

    gap: 10px;

    padding: 18px 20px;

    border-bottom: 1px solid #E8EAED;
}


/* =========================================================
   SEARCH
========================================================= */

.search-wrapper {
    position: relative;

    flex: 1;

    min-width: 0;
}


.search-icon {
    position: absolute;

    left: 12px;

    top: 50%;

    width: 16px !important;
    height: 16px !important;

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

    background: #FFFFFF;

    color: #202124;

    font-size: 12px;

    outline: none;

    transition: .2s ease;
}


.search-input::placeholder {
    color: #9AA0A6;
}


.search-input:focus {
    border-color: #0B2A6F;

    box-shadow:
        0 0 0 2px rgba(11,42,111,.08);
}


/* =========================================================
   STAGE FILTER
========================================================= */

.stage-filter {
    width: 175px;

    height: 40px;

    padding: 0 12px;

    border: 1px solid #DADCE0;

    border-radius: 9px;

    background: #FFFFFF;

    color: #3C4043;

    font-size: 12px;

    outline: none;

    cursor: pointer;
}


.stage-filter:focus {
    border-color: #0B2A6F;

    box-shadow:
        0 0 0 2px rgba(11,42,111,.08);
}


/* =========================================================
   SEARCH BUTTON
========================================================= */

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

.opportunities-table {
    width: 100%;

    min-width: 1050px;

    border-collapse: collapse;
}


.opportunities-table th {
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


.opportunities-table td {
    padding: 15px 18px;

    border-bottom: 1px solid #F1F3F4;

    color: #3C4043;

    font-size: 12px;

    vertical-align: middle;
}


.opportunities-table tbody tr {
    transition: background .15s ease;
}


.opportunities-table tbody tr:hover {
    background: #FAFAFA;
}


.opportunities-table tbody tr:last-child td {
    border-bottom: none;
}


/* =========================================================
   OPPORTUNITY
========================================================= */

.opportunity-info {
    min-width: 230px;
}


.opportunity-name {
    margin-bottom: 5px;

    color: #202124;

    font-size: 12px;

    font-weight: 700;

    line-height: 1.4;
}


.opportunity-id {
    color: #9AA0A6;

    font-size: 10px;
}


/* =========================================================
   CUSTOMER
========================================================= */

.customer-info {
    display: flex;

    align-items: center;

    gap: 9px;

    min-width: 180px;
}


.customer-avatar {
    width: 34px;

    height: 34px;

    flex-shrink: 0;

    border-radius: 9px;

    background: #E8EEF9;

    color: #0B2A6F;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 11px;

    font-weight: 700;
}


.customer-name {
    color: #202124;

    font-size: 11px;

    font-weight: 600;
}


.customer-company {
    margin-top: 3px;

    color: #80868B;

    font-size: 10px;
}


/* =========================================================
   REVENUE
========================================================= */

.revenue {
    color: #0B2A6F;

    font-size: 12px;

    font-weight: 700;

    white-space: nowrap;
}


/* =========================================================
   RATING
========================================================= */

.rating {
    color: #F9AB00;

    font-size: 12px;

    letter-spacing: 1px;

    white-space: nowrap;
}


.rating-number {
    margin-left: 5px;

    color: #80868B;

    font-size: 10px;

    letter-spacing: 0;
}


/* =========================================================
   STAGE BADGE
========================================================= */

.stage-badge {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 5px 9px;

    border-radius: 20px;

    font-size: 10px;

    font-weight: 600;

    white-space: nowrap;
}


.stage-badge::before {
    content: '';

    width: 5px;

    height: 5px;

    border-radius: 50%;

    background: currentColor;
}


.stage-prospect {
    background: #E8EEF9;

    color: #0B2A6F;
}


.stage-qualified {
    background: #EEE7FF;

    color: #6A1B9A;
}


.stage-proposition {
    background: #FEF7E0;

    color: #B06000;
}


.stage-won {
    background: #E6F4EA;

    color: #137333;
}


.stage-lost {
    background: #FCE8E6;

    color: #D93025;
}


.stage-default {
    background: #F1F3F4;

    color: #5F6368;
}


/* =========================================================
   DATE
========================================================= */

.date-text {
    color: #5F6368;

    white-space: nowrap;

    font-size: 11px;
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
    background: #F9D4D8;
}


/* =========================================================
   EMPTY STATE
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

    background: #F1F3F4;

    color: #9AA0A6;

    display: flex;

    align-items: center;

    justify-content: center;
}


.empty-icon svg {
    width: 25px !important;

    height: 25px !important;
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
   SAME STYLE AS ACTIVITIES
========================================================= */

.pagination-area {
    padding: 18px 20px;

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 15px;
}


.pagination-info {
    color: #8992A3;

    font-size: 12px;
}


.pagination-links {
    display: flex;

    gap: 6px;

    align-items: center;
}


.pagination-links a,
.pagination-links span {
    min-width: 32px;

    height: 32px;

    padding: 0 8px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    border: 1px solid #E1E5EB;

    border-radius: 7px;

    text-decoration: none;

    color: #4B5565;

    background: #FFFFFF;

    font-size: 12px;

    box-sizing: border-box;
}


.pagination-links .active {
    background: #0B2A6F;

    color: #FFFFFF;

    border-color: #0B2A6F;
}


.pagination-links a:hover {
    background: #F1F3F4;
}


.pagination-links span:not(.active) {
    color: #4B5565;
}


/* =========================================================
   DELETE MODAL
========================================================= */

.delete-modal {
    position: fixed;

    inset: 0;

    z-index: 9999;

    display: none;

    align-items: center;

    justify-content: center;

    padding: 20px;

    background: rgba(15, 23, 42, .48);

    backdrop-filter: blur(2px);
}


.delete-modal.show {
    display: flex;
}


.delete-modal-box {
    width: 100%;

    max-width: 430px;

    padding: 28px;

    background: #FFFFFF;

    border-radius: 16px;

    box-shadow:
        0 20px 50px rgba(15, 23, 42, .20);
}


.delete-modal-icon {
    width: 54px;

    height: 54px;

    margin-bottom: 16px;

    border-radius: 14px;

    background: #FDE8EA;

    color: #E30613;

    display: flex;

    align-items: center;

    justify-content: center;
}


.delete-modal-icon svg {
    width: 24px !important;

    height: 24px !important;
}


.delete-modal-title {
    margin: 0 0 8px;

    color: #202124;

    font-size: 18px;

    font-weight: 700;
}


.delete-modal-text {
    margin: 0;

    color: #5F6368;

    font-size: 12px;

    line-height: 1.7;
}


.delete-modal-text strong {
    color: #202124;
}


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

    font-weight: 700;

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
    background: #C80511;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 800px) {

    .opportunities-header {
        flex-direction: column;

        align-items: flex-start;
    }


    .opportunities-toolbar {
        flex-direction: column;

        align-items: stretch;
    }


    .search-wrapper {
        width: 100%;
    }


    .stage-filter {
        width: 100%;
    }


    .btn-search {
        width: 100%;
    }


    .pagination-area {
        flex-direction: column;

        align-items: flex-start;
    }

}


@media (max-width: 600px) {

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

<div class="opportunities-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="opportunities-header">

        <div class="opportunities-header-left">

            <h1>
                Opportunities
            </h1>

            <p>
                Manage all sales opportunities and transaction processes.
            </p>

        </div>


        <a
            href="{{ route('opportunities.create') }}"
            class="btn-add-opportunity"
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

                <path d="M12 5v14"/>

                <path d="M5 12h14"/>

            </svg>

            Add Opportunity

        </a>

    </div>


    <!-- =====================================================
         MAIN CARD
    ====================================================== -->

    <div class="opportunities-card">


        <!-- =================================================
             SEARCH & FILTER
        ================================================== -->

        <form
            action="{{ route('opportunities.index') }}"
            method="GET"
            class="opportunities-toolbar"
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

                    <path
                        d="m20 20-4-4"
                    />

                </svg>


                <input
                    type="text"
                    name="search"
                    class="search-input"
                    value="{{ request('search') }}"
                    placeholder="Search opportunity name..."
                >

            </div>


            <select
                name="stage_id"
                class="stage-filter"
            >

                <option value="">
                    All Stages
                </option>


                @foreach($stages as $stage)

                    <option
                        value="{{ $stage->id }}"
                        {{ (string) request('stage_id') === (string) $stage->id ? 'selected' : '' }}
                    >

                        {{ $stage->name }}

                    </option>

                @endforeach

            </select>


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

            <table class="opportunities-table">

                <thead>

                    <tr>

                        <th>
                            Opportunity
                        </th>

                        <th>
                            Customer
                        </th>

                        <th>
                            Stage
                        </th>

                        <th>
                            Expected Revenue
                        </th>

                        <th>
                            Rating
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($opportunities as $opportunity)

                        @php

                            $stageName = strtolower(
                                $opportunity->stage->name ?? ''
                            );


                            $stageClass = match($stageName) {

                                'prospect'
                                    => 'stage-prospect',

                                'qualified'
                                    => 'stage-qualified',

                                'proposition'
                                    => 'stage-proposition',

                                'won'
                                    => 'stage-won',

                                'lost'
                                    => 'stage-lost',

                                default
                                    => 'stage-default',

                            };

                        @endphp


                        <tr>


                            <!-- OPPORTUNITY -->

                            <td>

                                <div class="opportunity-info">

                                    <div class="opportunity-name">

                                        {{ $opportunity->name }}

                                    </div>


                                    <div class="opportunity-id">

                                        ID #{{ $opportunity->id }}

                                    </div>

                                </div>

                            </td>


                            <!-- CUSTOMER -->

                            <td>

                                @if($opportunity->customer)

                                    <div class="customer-info">

                                        <div class="customer-avatar">

                                            {{ strtoupper(
                                                substr(
                                                    $opportunity->customer->name,
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>


                                        <div>

                                            <div class="customer-name">

                                                {{ $opportunity->customer->name }}

                                            </div>


                                            <div class="customer-company">

                                                {{ $opportunity->customer->company ?? '-' }}

                                            </div>

                                        </div>

                                    </div>

                                @else

                                    -

                                @endif

                            </td>


                            <!-- STAGE -->

                            <td>

                                <span
                                    class="stage-badge {{ $stageClass }}"
                                >

                                    {{ $opportunity->stage->name ?? '-' }}

                                </span>

                            </td>


                            <!-- REVENUE -->

                            <td>

                                <div class="revenue">

                                    Rp
                                    {{ number_format(
                                        $opportunity->expected_revenue,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </div>

                            </td>


                            <!-- RATING -->

                            <td>

                                <div class="rating">

                                    @for(
                                        $i = 1;
                                        $i <= 5;
                                        $i++
                                    )

                                        @if(
                                            $i <= $opportunity->rating
                                        )

                                            ★

                                        @else

                                            ☆

                                        @endif

                                    @endfor


                                    <span class="rating-number">

                                        {{ $opportunity->rating }}/5

                                    </span>

                                </div>

                            </td>


                            <!-- DATE -->

                            <td>

                                <div class="date-text">

                                    @if($opportunity->opportunity_date)

                                        {{ \Illuminate\Support\Carbon::parse(
                                            $opportunity->opportunity_date
                                        )->format('d/m/Y') }}

                                    @else

                                        -

                                    @endif

                                </div>

                            </td>


                            <!-- ACTIONS -->

                            <td>

                                <div class="actions">


                                    <!-- DETAILS -->

                                    <a
                                        href="{{ route(
                                            'opportunities.show',
                                            $opportunity
                                        ) }}"
                                        class="action-btn action-detail"
                                    >

                                        Details

                                    </a>


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route(
                                            'opportunities.edit',
                                            $opportunity
                                        ) }}"
                                        class="action-btn action-edit"
                                    >

                                        Edit

                                    </a>


                                    <!-- DELETE -->

                                    <form
                                        id="delete-opportunity-form-{{ $opportunity->id }}"
                                        action="{{ route(
                                            'opportunities.destroy',
                                            $opportunity
                                        ) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="button"
                                            class="action-btn action-delete"
                                            onclick="openOpportunityDeleteModal(
                                                {{ $opportunity->id }},
                                                @js($opportunity->name)
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

                            <td colspan="7">

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
                                                d="M4 17l5-5 4 3 7-8"
                                            />

                                            <path
                                                d="M15 7h5v5"
                                            />

                                        </svg>

                                    </div>


                                    <div class="empty-title">

                                        No opportunities yet

                                    </div>


                                    <div class="empty-description">

                                        Add an opportunity to start
                                        managing your sales pipeline.

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

        @if($opportunities->hasPages())

            <div class="pagination-area">


                <!-- INFORMATION -->

                <div class="pagination-info">

                    Showing
                    {{ $opportunities->firstItem() ?? 0 }}
                    -
                    {{ $opportunities->lastItem() ?? 0 }}
                    of
                    {{ $opportunities->total() }}
                    opportunities

                </div>


                <!-- LINKS -->

                <div class="pagination-links">


                    <!-- PREVIOUS -->

                    @if($opportunities->onFirstPage())

                        <span>
                            ‹
                        </span>

                    @else

                        <a
                            href="{{ $opportunities->previousPageUrl() }}"
                        >
                            ‹
                        </a>

                    @endif


                    <!-- PAGE NUMBERS -->

                    @foreach(
                        $opportunities->getUrlRange(
                            1,
                            $opportunities->lastPage()
                        )
                        as $page => $url
                    )

                        @if(
                            $page ==
                            $opportunities->currentPage()
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


                    <!-- NEXT -->

                    @if($opportunities->hasMorePages())

                        <a
                            href="{{ $opportunities->nextPageUrl() }}"
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


<!-- =========================================================
     DELETE MODAL
========================================================== -->

<div
    id="opportunityDeleteModal"
    class="delete-modal"
    aria-hidden="true"
>

    <div
        class="delete-modal-box"
        role="dialog"
        aria-modal="true"
        aria-labelledby="deleteOpportunityTitle"
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
            id="deleteOpportunityTitle"
            class="delete-modal-title"
        >
            Delete Opportunity?
        </h3>


        <!-- MESSAGE -->

        <p class="delete-modal-text">

            Are you sure you want to delete opportunity

            <strong id="deleteOpportunityName">
                this opportunity
            </strong>?

            <br>

            Deleted opportunity data cannot be recovered.

        </p>


        <!-- ACTION -->

        <div class="delete-modal-actions">


            <button
                type="button"
                class="delete-cancel-btn"
                id="deleteOpportunityCancel"
            >

                Cancel

            </button>


            <button
                type="button"
                class="delete-confirm-btn"
                id="deleteOpportunityConfirm"
            >

                Delete Opportunity

            </button>


        </div>


    </div>

</div>


@endsection


@section('scripts')

<script>

document.addEventListener(
    'DOMContentLoaded',
    function ()
    {

        let selectedOpportunityId = null;


        const modal =
            document.getElementById(
                'opportunityDeleteModal'
            );


        const deleteName =
            document.getElementById(
                'deleteOpportunityName'
            );


        const cancelButton =
            document.getElementById(
                'deleteOpportunityCancel'
            );


        const confirmButton =
            document.getElementById(
                'deleteOpportunityConfirm'
            );


        /* =====================================================
           OPEN MODAL
        ===================================================== */

        window.openOpportunityDeleteModal =
            function (
                opportunityId,
                opportunityName
            )
            {

                selectedOpportunityId =
                    opportunityId;


                deleteName.textContent =
                    opportunityName;


                modal.classList.add(
                    'show'
                );


                modal.setAttribute(
                    'aria-hidden',
                    'false'
                );

            };


        /* =====================================================
           CLOSE MODAL
        ===================================================== */

        function closeDeleteModal()
        {

            modal.classList.remove(
                'show'
            );


            modal.setAttribute(
                'aria-hidden',
                'true'
            );


            selectedOpportunityId =
                null;

        }


        /* =====================================================
           CANCEL
        ===================================================== */

        cancelButton.addEventListener(
            'click',
            function ()
            {

                closeDeleteModal();

            }
        );


        /* =====================================================
           CONFIRM DELETE
        ===================================================== */

        confirmButton.addEventListener(
            'click',
            function ()
            {

                if (!selectedOpportunityId) {

                    return;

                }


                const form =
                    document.getElementById(
                        'delete-opportunity-form-' +
                        selectedOpportunityId
                    );


                if (form) {

                    form.submit();

                }

            }
        );


        /* =====================================================
           CLICK OUTSIDE
        ===================================================== */

        modal.addEventListener(
            'click',
            function (event)
            {

                if (
                    event.target === modal
                ) {

                    closeDeleteModal();

                }

            }
        );


        /* =====================================================
           ESCAPE
        ===================================================== */

        document.addEventListener(
            'keydown',
            function (event)
            {

                if (
                    event.key === 'Escape'
                ) {

                    closeDeleteModal();

                }

            }
        );

    }
);

</script>

@endsection