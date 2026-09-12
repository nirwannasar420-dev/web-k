@extends('layouts.app')

@section('title', 'CRM Dashboard')

@section('page-title', 'CRM Dashboard')


@section('styles')

<style>

    /* =========================================================
       DASHBOARD
    ========================================================= */

    .dashboard-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .dashboard-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 22px;
    }

    .dashboard-top h1 {
        margin: 0 0 6px;
        color: #0B2A6F;
        font-size: 30px;
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -.3px;
    }

    .dashboard-top p {
        margin: 0;
        color: #64748B;
        font-size: 13px;
    }

    .today-label {
        color: #64748B;
        font-size: 12px;
        font-weight: 500;
        white-space: nowrap;
    }


    /* =========================================================
       ACTIVITY REMINDER
    ========================================================= */

    .activity-reminder {
        margin-bottom: 22px;

        background: #FFFFFF;

        border: 1px solid #E2E8F0;

        border-left: 5px solid #0B2A6F;

        border-radius: 16px;

        padding: 20px 22px;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, .04);
    }


    .activity-reminder-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-bottom: 15px;
    }


    .activity-reminder-title {
        display: flex;

        align-items: center;

        gap: 10px;
    }


    .activity-reminder-icon {
        width: 38px;
        height: 38px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #E8EEF9;

        color: #0B2A6F;
    }


    .activity-reminder-icon svg {
        width: 19px;
        height: 19px;
    }


    .activity-reminder-title h3 {
        margin: 0;

        color: #172033;

        font-size: 15px;

        font-weight: 800;
    }


    .activity-reminder-title p {
        margin: 3px 0 0;

        color: #94A3B8;

        font-size: 10px;
    }


    .activity-reminder-count {
        min-width: 28px;

        height: 28px;

        padding: 0 8px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        border-radius: 999px;

        background: #E8EEF9;

        color: #0B2A6F;

        font-size: 11px;

        font-weight: 800;
    }


    .reminder-list {
        display: grid;

        gap: 8px;
    }


    .reminder-item {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 12px 14px;

        background: #F8FAFC;

        border: 1px solid #EEF2F7;

        border-radius: 10px;

        transition: .2s ease;
    }


    .reminder-item:hover {
        background: #F1F5F9;

        border-color: #E2E8F0;
    }


    .reminder-main {
        min-width: 0;
    }


    .reminder-subject {
        color: #172033;

        font-size: 12px;

        font-weight: 800;
    }


    .reminder-meta {
        margin-top: 4px;

        color: #64748B;

        font-size: 10px;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }


    .reminder-time {
        flex-shrink: 0;

        text-align: right;

        color: #0B2A6F;

        font-size: 11px;

        font-weight: 800;

        white-space: nowrap;
    }


    .reminder-empty {
        padding: 13px 14px;

        background: #F8FAFC;

        border: 1px solid #EEF2F7;

        border-radius: 10px;

        color: #94A3B8;

        font-size: 11px;
    }


    /* =========================================================
       STAT GRID
    ========================================================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 22px;
    }


    /* =========================================================
       STAT CARD
    ========================================================= */

    .stat-card {
        position: relative;

        min-height: 154px;

        padding: 20px 20px 18px 23px;

        background: #FFFFFF;

        border: 1px solid #E2E8F0;

        border-radius: 16px;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, .045);

        overflow: hidden;

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }


    .stat-card::before {
        content: '';

        position: absolute;

        top: 0;
        left: 0;
        bottom: 0;

        width: 5px;

        background: #0B2A6F;

        border-radius: 16px 0 0 16px;
    }


    .stat-card:hover {
        transform: translateY(-3px);

        border-color: #CBD5E1;

        box-shadow:
            0 10px 24px rgba(15, 23, 42, .09);
    }


    /* =========================================================
       STAT TOP
    ========================================================= */

    .stat-top {
        display: flex;

        justify-content: space-between;

        align-items: flex-start;

        gap: 15px;

        margin-bottom: 16px;
    }


    /* =========================================================
       STAT TEXT
    ========================================================= */

    .stat-title {
        color: #334155;

        font-size: 12px;

        font-weight: 700;
    }


    .stat-subtitle {
        margin-top: 4px;

        color: #94A3B8;

        font-size: 10px;

        font-weight: 500;
    }


    /* =========================================================
       MODERN STAT ICON
    ========================================================= */

    .stat-icon {
        width: 45px;
        height: 45px;

        flex-shrink: 0;

        display: flex;

        align-items: center;
        justify-content: center;

        background: #F8FAFC;

        border: 1.5px solid #0B2A6F;

        border-radius: 12px;

        color: #0B2A6F;

        transition:
            background .2s ease,
            color .2s ease,
            transform .2s ease;
    }


    .stat-icon svg {
        width: 22px;
        height: 22px;
    }


    .stat-card:hover .stat-icon {
        background: #0B2A6F;

        color: #FFFFFF;

        transform: scale(1.04);
    }


    /* =========================================================
       STAT VALUE
    ========================================================= */

    .stat-value {
        color: #0B2A6F;

        font-size: 32px;

        line-height: 1;

        font-weight: 800;

        letter-spacing: -.6px;
    }


    /* =========================================================
       STAT BOTTOM
    ========================================================= */

    .stat-bottom {
        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-top: 15px;

        padding-top: 10px;

        border-top: 1px solid #EEF2F7;

        color: #94A3B8;

        font-size: 10px;

        font-weight: 500;
    }


    .stat-arrow {
        color: #0B2A6F;

        font-size: 14px;

        font-weight: 800;
    }


    /* =========================================================
       MAIN GRID
    ========================================================= */

    .dashboard-grid {
        display: grid;

        grid-template-columns: 1.42fr .58fr;

        gap: 20px;

        margin-bottom: 20px;
    }


    /* =========================================================
       GENERAL CARD
    ========================================================= */

    .dashboard-card,
    .table-card {
        background: #FFFFFF;

        border: 1px solid #E2E8F0;

        border-radius: 17px;

        padding: 22px;

        box-shadow:
            0 4px 14px rgba(15, 23, 42, .04);
    }


    .card-header {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

        margin-bottom: 20px;
    }


    .card-header h3 {
        margin: 0;

        color: #172033;

        font-size: 16px;

        font-weight: 800;
    }


    .card-header a {
        color: #0B2A6F;

        text-decoration: none;

        font-size: 11px;

        font-weight: 700;

        transition: .2s ease;
    }


    .card-header a:hover {
        color: #E30613;
    }


    /* =========================================================
       PIPELINE
    ========================================================= */

    .pipeline-wrapper {
        width: 100%;

        overflow-x: auto;

        padding-bottom: 3px;
    }


    .pipeline {
        min-width: 650px;

        display: flex;

        align-items: flex-start;

        padding: 10px 0 6px;
    }


    .pipeline-item {
        flex: 1;

        text-align: center;

        position: relative;
    }


    .pipeline-item:not(:last-child)::after {
        content: '';

        position: absolute;

        top: 17px;

        left: calc(50% + 18px);

        right: calc(-50% + 18px);

        height: 4px;

        border-radius: 20px;

        background: #E2E8F0;

        z-index: 0;
    }


    .pipeline-item.active:not(:last-child)::after {
        background: #CBD5E1;
    }


    /* =========================================================
       PIPELINE DOT
    ========================================================= */

    .pipeline-dot {
        width: 38px;
        height: 38px;

        border-radius: 50%;

        margin: 0 auto 10px;

        background: #F8FAFC;

        border: 4px solid #FFFFFF;

        box-shadow:
            0 0 0 2px #CBD5E1;

        display: flex;

        align-items: center;

        justify-content: center;

        position: relative;

        z-index: 2;

        color: #64748B;

        font-size: 11px;

        font-weight: 800;
    }


    .pipeline-item.active .pipeline-dot {
        background: #E8EEF9;

        color: #0B2A6F;

        box-shadow:
            0 0 0 2px #0B2A6F;
    }


    .pipeline-item.won .pipeline-dot {
        background: #E7F6EF;

        color: #159A6C;

        box-shadow:
            0 0 0 2px #159A6C;
    }


    .pipeline-item.lost .pipeline-dot {
        background: #FDEBED;

        color: #E30613;

        box-shadow:
            0 0 0 2px #E30613;
    }


    .pipeline-title {
        color: #334155;

        font-size: 12px;

        font-weight: 800;
    }


    .pipeline-count {
        margin-top: 4px;

        color: #94A3B8;

        font-size: 10px;

        font-weight: 500;
    }


    /* =========================================================
       SUMMARY
    ========================================================= */

    .summary-list {
        display: flex;

        flex-direction: column;

        gap: 10px;
    }


    .summary-item {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 12px 13px;

        background: #F8FAFC;

        border: 1px solid #EEF2F7;

        border-radius: 11px;

        transition: .2s ease;
    }


    .summary-item:hover {
        background: #F1F5F9;

        border-color: #E2E8F0;
    }


    .summary-left {
        display: flex;

        align-items: center;

        gap: 9px;

        min-width: 0;
    }


    .summary-indicator {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        flex-shrink: 0;
    }


    .indicator-blue {
        background: #0B2A6F;
    }


    .indicator-green {
        background: #159A6C;
    }


    .indicator-red {
        background: #E30613;
    }


    .indicator-orange {
        background: #D98200;
    }


    .summary-label {
        color: #64748B;

        font-size: 11px;

        font-weight: 600;
    }


    .summary-value {
        color: #172033;

        font-size: 13px;

        font-weight: 800;

        white-space: nowrap;
    }


    .summary-revenue {
        color: #0B2A6F;

        font-size: 13px;

        font-weight: 800;

        white-space: nowrap;
    }


    /* =========================================================
       STATUS GRID
    ========================================================= */

    .status-grid {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 20px;

        margin-bottom: 20px;
    }


    .status-row {
        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 12px 0;

        border-bottom: 1px solid #EEF2F7;
    }


    .status-row:last-child {
        border-bottom: none;
    }


    .status-label {
        color: #64748B;

        font-size: 11px;

        font-weight: 600;
    }


    /* =========================================================
       BADGE
    ========================================================= */

    .badge {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-width: 28px;

        padding: 5px 9px;

        border-radius: 999px;

        font-size: 10px;

        font-weight: 800;
    }


    .badge-blue {
        background: #E8EEF9;

        color: #0B2A6F;
    }


    .badge-orange {
        background: #FFF2DE;

        color: #B86500;
    }


    .badge-green {
        background: #E7F6EF;

        color: #137A55;
    }


    .badge-red {
        background: #FDEBED;

        color: #C72F3C;
    }


    .badge-gray {
        background: #F1F5F9;

        color: #64748B;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    .crm-table {
        width: 100%;

        min-width: 700px;

        border-collapse: collapse;
    }


    .crm-table th {
        padding: 13px 10px;

        border-bottom: 1px solid #E2E8F0;

        color: #7C8798;

        text-align: left;

        font-size: 10px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .3px;

        white-space: nowrap;
    }


    .crm-table td {
        padding: 14px 10px;

        border-bottom: 1px solid #F1F5F9;

        color: #334155;

        font-size: 11px;

        vertical-align: middle;
    }


    .crm-table tr:last-child td {
        border-bottom: none;
    }


    .crm-table tbody tr {
        transition: .15s ease;
    }


    .crm-table tbody tr:hover {
        background: #F8FAFC;
    }


    .primary-text {
        color: #172033;

        font-weight: 800;
    }


    .secondary-text {
        color: #64748B;
    }


    .revenue-text {
        color: #0B2A6F;

        font-weight: 800;

        white-space: nowrap;
    }


    .date-text {
        color: #64748B;

        white-space: nowrap;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 35px 15px;

        text-align: center;

        color: #94A3B8;

        font-size: 11px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1100px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }


        .dashboard-grid {
            grid-template-columns: 1fr;
        }


        .status-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 650px) {

        .dashboard-top {
            flex-direction: column;

            align-items: flex-start;

            gap: 8px;
        }


        .stats-grid {
            grid-template-columns: 1fr;
        }


        .dashboard-card,
        .table-card {
            padding: 18px;
        }


        .stat-card {
            min-height: auto;
        }


        .activity-reminder {
            padding: 17px;
        }


        .reminder-item {
            align-items: flex-start;

            flex-direction: column;

            gap: 6px;
        }


        .reminder-time {
            text-align: left;
        }

    }

</style>

@endsection


@section('content')

<div class="dashboard-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="dashboard-top">

        <div>

            <h1>
                Dashboard
            </h1>

            <p>
                Monitor CRM activities and performance of PT Petra Textima Mandiri.
            </p>

        </div>


        <div class="today-label">

            {{ now()->translatedFormat('l, d F Y') }}

        </div>

    </div>


    {{-- =====================================================
         ACTIVITY REMINDER
    ====================================================== --}}

    <div class="activity-reminder">

        <div class="activity-reminder-header">

            <div class="activity-reminder-title">

                <div class="activity-reminder-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path
                            d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"
                        />

                        <path
                            d="M10 21h4"
                        />

                    </svg>

                </div>


                <div>

                    <h3>
                        Activity Reminder
                    </h3>

                    <p>
                        Planned activities in the next 7 days
                    </p>

                </div>

            </div>


            <div class="activity-reminder-count">

                {{ $upcomingActivitiesCount }}

            </div>

        </div>


        <div class="reminder-list">

            @forelse($upcomingActivities as $activity)

                <div class="reminder-item">

                    <div class="reminder-main">

                        <div class="reminder-subject">

                            {{ $activity->subject }}

                        </div>


                        <div class="reminder-meta">

                            {{ $activity->opportunity->name ?? '-' }}

                            ·

                            {{ $activity->opportunity->customer->name ?? '-' }}

                        </div>

                    </div>


                    @php

                        $activityDate = \Illuminate\Support\Carbon::parse(
                            $activity->activity_date
                        );

                        $today = now()->startOfDay();

                        $activityDay = $activityDate->copy()->startOfDay();

                        $daysUntil = $today->diffInDays(
                            $activityDay,
                            false
                        );

                    @endphp


                    <div class="reminder-time">

                        @if($daysUntil === 0)

                            <div style="
                                color:#E30613;
                                font-weight:800;
                                margin-bottom:3px;
                            ">
                                Today
                            </div>

                        @elseif($daysUntil === 1)

                            <div style="
                                color:#D98200;
                                font-weight:800;
                                margin-bottom:3px;
                            ">
                                Tomorrow
                            </div>

                        @elseif($daysUntil > 1)

                            <div style="
                                color:#0B2A6F;
                                font-weight:800;
                                margin-bottom:3px;
                            ">
                                {{ $daysUntil }} days from now
                            </div>

                        @else

                            <div style="
                                color:#E30613;
                                font-weight:800;
                                margin-bottom:3px;
                            ">
                                Overdue
                            </div>

                        @endif


                        <div>
                            {{ $activityDate->format('d/m/Y H:i') }}
                        </div>

                    </div>

                </div>

            @empty

                <div class="reminder-empty">

                    No planned activities in the next 7 days.

                </div>

            @endforelse

        </div>

    </div>


    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="stats-grid">


        {{-- =================================================
             TOTAL LEADS
        ================================================== --}}

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-title">
                        Total Leads
                    </div>

                    <div class="stat-subtitle">
                        Potential customers
                    </div>

                </div>


                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <circle
                            cx="9"
                            cy="7"
                            r="4"
                        />

                        <path
                            d="M3 21v-2a6 6 0 0 1 12 0v2"
                        />

                        <path
                            d="M16 4.5a4 4 0 0 1 0 7"
                        />

                        <path
                            d="M18 15a5 5 0 0 1 3 4v2"
                        />

                    </svg>

                </div>

            </div>


            <div class="stat-value">
                {{ $totalLeads }}
            </div>


            <div class="stat-bottom">

                <span>
                    Lead data
                </span>

                <span class="stat-arrow">
                    →
                </span>

            </div>

        </div>


        {{-- =================================================
             TOTAL CUSTOMERS
        ================================================== --}}

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-title">
                        Total Customers
                    </div>

                    <div class="stat-subtitle">
                        CRM customers
                    </div>

                </div>


                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M3 21h18"/>

                        <path d="M5 21V5l7-2 7 2v16"/>

                        <path d="M9 8h1"/>

                        <path d="M14 8h1"/>

                        <path d="M9 12h1"/>

                        <path d="M14 12h1"/>

                        <path d="M9 16h1"/>

                        <path d="M14 16h1"/>

                        <path d="M10 21v-4h4v4"/>

                    </svg>

                </div>

            </div>


            <div class="stat-value">
                {{ $totalCustomers }}
            </div>


            <div class="stat-bottom">

                <span>
                    Customer data
                </span>

                <span class="stat-arrow">
                    →
                </span>

            </div>

        </div>


        {{-- =================================================
             TOTAL OPPORTUNITIES
        ================================================== --}}

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-title">
                        Total Opportunities
                    </div>

                    <div class="stat-subtitle">
                        Sales opportunities
                    </div>

                </div>


                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <circle
                            cx="12"
                            cy="12"
                            r="9"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="5"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="1.5"
                        />

                        <path d="M19 5l-3 3"/>

                        <path d="M19 5h-4"/>

                        <path d="M19 5v4"/>

                    </svg>

                </div>

            </div>


            <div class="stat-value">
                {{ $totalOpportunities }}
            </div>


            <div class="stat-bottom">

                <span>
                    Total opportunities
                </span>

                <span class="stat-arrow">
                    →
                </span>

            </div>

        </div>


        {{-- =================================================
             TOTAL ACTIVITIES
        ================================================== --}}

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-title">
                        Total Activities
                    </div>

                    <div class="stat-subtitle">
                        Sales activities
                    </div>

                </div>


                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
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

                        <path d="M8 15l2 2 5-5"/>

                    </svg>

                </div>

            </div>


            <div class="stat-value">
                {{ $totalActivities }}
            </div>


            <div class="stat-bottom">

                <span>
                    Total activities
                </span>

                <span class="stat-arrow">
                    →
                </span>

            </div>

        </div>

    </div>


    {{-- =====================================================
         PIPELINE + SUMMARY
    ====================================================== --}}

    <div class="dashboard-grid">


        {{-- =================================================
             PIPELINE
        ================================================== --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h3>
                    Sales Pipeline
                </h3>

                <a href="{{ route('crm.pipeline') }}">
                    View Pipeline →
                </a>

            </div>


            @php

                $stageNames = [
                    'Prospect',
                    'Qualified',
                    'Proposition',
                    'Won',
                    'Lost'
                ];

            @endphp


            <div class="pipeline-wrapper">

                <div class="pipeline">

                    @foreach($stageNames as $stageName)

                        @php

                            $stage =
                                $stages->firstWhere(
                                    'name',
                                    $stageName
                                );

                            $count =
                                $stage
                                ? $stage->opportunities_count
                                : 0;

                        @endphp


                        <div
                            class="
                                pipeline-item

                                {{ $count > 0 ? 'active' : '' }}

                                {{ $stageName === 'Won'
                                    ? 'won'
                                    : ''
                                }}

                                {{ $stageName === 'Lost'
                                    ? 'lost'
                                    : ''
                                }}
                            "
                        >

                            <div class="pipeline-dot">

                                {{ $count }}

                            </div>


                            <div class="pipeline-title">

                                {{ $stageName }}

                            </div>


                            <div class="pipeline-count">

                                {{ $count }} Opportunity

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>


        {{-- =================================================
             SUMMARY
        ================================================== --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h3>
                    Summary
                </h3>

            </div>


            <div class="summary-list">


                <div class="summary-item">

                    <div class="summary-left">

                        <span
                            class="summary-indicator indicator-blue"
                        ></span>

                        <span class="summary-label">
                            Active Opportunities
                        </span>

                    </div>


                    <span class="summary-value">
                        {{ $activeOpportunities }}
                    </span>

                </div>


                <div class="summary-item">

                    <div class="summary-left">

                        <span
                            class="summary-indicator indicator-green"
                        ></span>

                        <span class="summary-label">
                            Won Opportunities
                        </span>

                    </div>


                    <span class="summary-value">
                        {{ $won }}
                    </span>

                </div>


                <div class="summary-item">

                    <div class="summary-left">

                        <span
                            class="summary-indicator indicator-red"
                        ></span>

                        <span class="summary-label">
                            Lost Opportunities
                        </span>

                    </div>


                    <span class="summary-value">
                        {{ $lost }}
                    </span>

                </div>


                <div class="summary-item">

                    <div class="summary-left">

                        <span
                            class="summary-indicator indicator-orange"
                        ></span>

                        <span class="summary-label">
                            Planned Activities
                        </span>

                    </div>


                    <span class="summary-value">
                        {{ $plannedActivities }}
                    </span>

                </div>


                <div class="summary-item">

                    <div class="summary-left">

                        <span
                            class="summary-indicator indicator-blue"
                        ></span>

                        <span class="summary-label">
                            Estimated Revenue
                        </span>

                    </div>


                    <span class="summary-revenue">

                        Rp{{ number_format(
                            $totalRevenue,
                            0,
                            ',',
                            '.'
                        ) }}

                    </span>

                </div>


            </div>

        </div>

    </div>


    {{-- =====================================================
         CRM STATUS
    ====================================================== --}}

    <div class="status-grid">


        {{-- =================================================
             LEAD STATUS
        ================================================== --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h3>
                    Lead Status
                </h3>

                <a href="{{ route('leads.index') }}">
                    View Leads →
                </a>

            </div>


            <div class="status-row">

                <span class="status-label">
                    New
                </span>

                <span class="badge badge-blue">
                    {{ $newLeads }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Contacted
                </span>

                <span class="badge badge-orange">
                    {{ $contactedLeads }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Qualified
                </span>

                <span class="badge badge-blue">
                    {{ $qualifiedLeads }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Converted
                </span>

                <span class="badge badge-green">
                    {{ $convertedLeads }}
                </span>

            </div>

        </div>


        {{-- =================================================
             OPPORTUNITY
        ================================================== --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h3>
                    Opportunities
                </h3>

                <a href="{{ route('opportunities.index') }}">
                    View Opportunities →
                </a>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Total
                </span>

                <span class="badge badge-blue">
                    {{ $totalOpportunities }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Active
                </span>

                <span class="badge badge-orange">
                    {{ $activeOpportunities }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Won
                </span>

                <span class="badge badge-green">
                    {{ $won }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Lost
                </span>

                <span class="badge badge-red">
                    {{ $lost }}
                </span>

            </div>

        </div>


        {{-- =================================================
             ACTIVITY
        ================================================== --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h3>
                    Activities
                </h3>

                <a href="{{ route('activities.index') }}">
                    View Activities →
                </a>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Total
                </span>

                <span class="badge badge-blue">
                    {{ $totalActivities }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Planned
                </span>

                <span class="badge badge-orange">
                    {{ $plannedActivities }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Done
                </span>

                <span class="badge badge-green">
                    {{ $doneActivities }}
                </span>

            </div>


            <div class="status-row">

                <span class="status-label">
                    Cancelled
                </span>

                <span class="badge badge-red">
                    {{ $cancelledActivities }}
                </span>

            </div>

        </div>

    </div>


    {{-- =====================================================
         RECENT OPPORTUNITIES
    ====================================================== --}}

    <div class="table-card">

        <div class="card-header">

            <h3>
                Recent Opportunities
            </h3>

            <a href="{{ route('opportunities.index') }}">
                View All →
            </a>

        </div>


        <div class="table-wrapper">

            <table class="crm-table">

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
                            Revenue
                        </th>

                        <th>
                            Date
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse(
                        $recentOpportunities
                        as $opportunity
                    )

                        @php

                            $stageName =
                                strtolower(
                                    $opportunity->stage->name ?? ''
                                );

                        @endphp


                        <tr>

                            <td>

                                <div class="primary-text">

                                    {{ $opportunity->name }}

                                </div>

                            </td>


                            <td>

                                <div class="secondary-text">

                                    {{ $opportunity->customer->name ?? '-' }}

                                </div>

                            </td>


                            <td>

                                @if($stageName === 'prospect')

                                    <span class="badge badge-blue">
                                        Prospect
                                    </span>

                                @elseif($stageName === 'qualified')

                                    <span class="badge badge-blue">
                                        Qualified
                                    </span>

                                @elseif($stageName === 'proposition')

                                    <span class="badge badge-orange">
                                        Proposition
                                    </span>

                                @elseif($stageName === 'won')

                                    <span class="badge badge-green">
                                        Won
                                    </span>

                                @elseif($stageName === 'lost')

                                    <span class="badge badge-red">
                                        Lost
                                    </span>

                                @else

                                    <span class="badge badge-gray">

                                        {{ $opportunity->stage->name ?? '-' }}

                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="revenue-text">

                                    Rp{{ number_format(
                                        $opportunity->expected_revenue,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </div>

                            </td>


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

                        </tr>


                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="empty-state">
                                    No opportunities yet.
                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =====================================================
         RECENT ACTIVITIES
    ====================================================== --}}

    <div
        class="table-card"
        style="margin-top:20px;"
    >

        <div class="card-header">

            <h3>
                Recent Activities
            </h3>

            <a href="{{ route('activities.index') }}">
                View All →
            </a>

        </div>


        <div class="table-wrapper">

            <table class="crm-table">

                <thead>

                    <tr>

                        <th>
                            Activity
                        </th>

                        <th>
                            Opportunity
                        </th>

                        <th>
                            Customer
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse(
                        $recentActivities
                        as $activity
                    )

                        @php

                            $activityStatus =
                                strtolower(
                                    $activity->status ?? ''
                                );

                        @endphp


                        <tr>

                            <td>

                                <div class="primary-text">

                                    {{ $activity->subject }}

                                </div>

                                <div class="secondary-text">

                                    {{ $activity->type ?? '-' }}

                                </div>

                            </td>


                            <td>

                                <div class="secondary-text">

                                    {{ $activity->opportunity->name ?? '-' }}

                                </div>

                            </td>


                            <td>

                                <div class="secondary-text">

                                    {{ $activity->opportunity->customer->name ?? '-' }}

                                </div>

                            </td>


                            <td>

                                <div class="date-text">

                                    @if($activity->activity_date)

                                        {{ \Illuminate\Support\Carbon::parse(
                                            $activity->activity_date
                                        )->format('d/m/Y H:i') }}

                                    @else

                                        -

                                    @endif

                                </div>

                            </td>


                            <td>

                                @if($activityStatus === 'planned')

                                    <span class="badge badge-orange">
                                        Planned
                                    </span>

                                @elseif($activityStatus === 'done')

                                    <span class="badge badge-green">
                                        Done
                                    </span>

                                @elseif($activityStatus === 'cancelled')

                                    <span class="badge badge-red">
                                        Cancelled
                                    </span>

                                @else

                                    <span class="badge badge-gray">

                                        {{ ucfirst($activityStatus ?: '-') }}

                                    </span>

                                @endif

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="empty-state">
                                    No activities yet.
                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


</div>

@endsection