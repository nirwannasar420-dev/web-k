@extends('layouts.app')

@section('title', 'Reports')
@section('page-title', 'Reports')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .reports-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .reports-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }


    .reports-header-left h1 {
        margin: 0 0 6px;
        color: #0B2A6F;
        font-size: 30px;
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -.3px;
    }


    .reports-header-left p {
        margin: 0;
        color: #64748B;
        font-size: 13px;
    }


    .report-period {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 12px;
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 9px;
        color: #64748B;
        font-size: 11px;
        font-weight: 600;
    }


    .report-period svg {
        width: 14px;
        height: 14px;
        color: #0B2A6F;
    }


    /* =========================================================
       STAT GRID
    ========================================================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 24px;
    }


    /* =========================================================
       STAT CARD
    ========================================================= */

    .stat-card {
        position: relative;
        overflow: hidden;
        min-height: 148px;
        padding: 19px 20px 17px 23px;
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        box-shadow:
            0 4px 14px rgba(15,23,42,.045);
        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }


    .stat-card::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background: #0B2A6F;
        border-radius: 16px 0 0 16px;
    }


    .stat-card:nth-child(2)::before {
        background: #0B2A6F;
    }


    .stat-card:nth-child(3)::before {
        background: #159A6C;
    }


    .stat-card:nth-child(4)::before {
        background: #D98200;
    }


    .stat-card:hover {
        transform: translateY(-3px);
        border-color: #CBD5E1;
        box-shadow:
            0 10px 24px rgba(15,23,42,.08);
    }


    /* =========================================================
       STAT TOP
    ========================================================= */

    .stat-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 16px;
    }


    .stat-label {
        color: #64748B;
        font-size: 11px;
        font-weight: 700;
    }


    .stat-small {
        margin-top: 4px;
        color: #94A3B8;
        font-size: 10px;
    }


    /* =========================================================
       STAT ICON
    ========================================================= */

    .stat-icon {
        width: 44px;
        height: 44px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #F8FAFC;
        border: 1.5px solid #0B2A6F;
        border-radius: 12px;
        color: #0B2A6F;
    }


    .stat-icon svg {
        width: 21px;
        height: 21px;
    }


    .stat-card:nth-child(3) .stat-icon {
        color: #159A6C;
        border-color: #159A6C;
    }


    .stat-card:nth-child(4) .stat-icon {
        color: #D98200;
        border-color: #D98200;
    }


    .stat-value {
        color: #172033;
        font-size: 29px;
        line-height: 1;
        font-weight: 800;
    }


    .stat-card:nth-child(3) .stat-value {
        color: #159A6C;
    }


    .stat-card:nth-child(4) .stat-value {
        color: #D98200;
    }


    /* =========================================================
       SECTION HEADING
    ========================================================= */

    .section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin: 28px 0 14px;
    }


    .section-heading-left h2 {
        margin: 0;
        color: #172033;
        font-size: 17px;
        font-weight: 800;
    }


    .section-heading-left p {
        margin: 4px 0 0;
        color: #94A3B8;
        font-size: 11px;
    }


    /* =========================================================
       REVENUE
    ========================================================= */

    .revenue-grid {
        display: grid;
        grid-template-columns: 1.25fr 1fr 1fr;
        gap: 18px;
    }


    .revenue-card {
        position: relative;
        overflow: hidden;
        padding: 20px;
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        box-shadow:
            0 4px 14px rgba(15,23,42,.045);
    }


    .revenue-card.total {
        background: #0B2A6F;
        border-color: #0B2A6F;
    }


    .revenue-label {
        color: #64748B;
        font-size: 11px;
        font-weight: 700;
        margin-bottom: 9px;
    }


    .revenue-card.total .revenue-label {
        color: rgba(255,255,255,.72);
    }


    .revenue-value {
        color: #0B2A6F;
        font-size: 21px;
        font-weight: 800;
        line-height: 1.2;
        word-break: break-word;
    }


    .revenue-card.total .revenue-value {
        color: #FFFFFF;
        font-size: 24px;
    }


    .revenue-won {
        color: #159A6C;
    }


    .revenue-lost {
        color: #E30613;
    }


    .revenue-line {
        margin-top: 15px;
        width: 100%;
        height: 4px;
        background: #E8EEF9;
        border-radius: 99px;
        overflow: hidden;
    }


    .revenue-card.total .revenue-line {
        background: rgba(255,255,255,.18);
    }


    .revenue-line span {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: 99px;
        background: #E30613;
    }


    .revenue-card.won .revenue-line {
        background: #E7F6EF;
    }


    .revenue-card.won .revenue-line span {
        background: #159A6C;
    }


    .revenue-card.lost .revenue-line {
        background: #FDEBED;
    }


    .revenue-card.lost .revenue-line span {
        background: #E30613;
    }


    /* =========================================================
       DONUT GRID
    ========================================================= */

    .donut-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }


    /* =========================================================
       DONUT CARD
    ========================================================= */

    .donut-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 17px;
        overflow: hidden;
        box-shadow:
            0 4px 14px rgba(15,23,42,.045);
        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }


    .donut-card:hover {
        transform: translateY(-2px);
        box-shadow:
            0 9px 22px rgba(15,23,42,.07);
    }


    /* =========================================================
       DONUT HEADER
    ========================================================= */

    .donut-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 18px 19px;
        border-bottom: 1px solid #EEF2F7;
    }


    .donut-title-area {
        display: flex;
        align-items: center;
        gap: 10px;
    }


    .donut-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #E8EEF9;
        color: #0B2A6F;
        border-radius: 10px;
    }


    .donut-icon svg {
        width: 18px;
        height: 18px;
    }


    .donut-title h3 {
        margin: 0;
        color: #172033;
        font-size: 14px;
        font-weight: 800;
    }


    .donut-title p {
        margin: 4px 0 0;
        color: #94A3B8;
        font-size: 10px;
    }


    .donut-total-badge {
        padding: 5px 8px;
        background: #F1F5F9;
        color: #64748B;
        border-radius: 7px;
        font-size: 9px;
        font-weight: 700;
        white-space: nowrap;
    }


    /* =========================================================
       DONUT CONTENT
    ========================================================= */

    .donut-content {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 20px 18px 21px;
    }


    /* =========================================================
       DONUT
    ========================================================= */

    .donut-chart {
        position: relative;
        width: 148px;
        height: 148px;
        flex-shrink: 0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow:
            inset 0 0 0 1px rgba(15,23,42,.03);
    }


    .donut-chart::after {
        content: '';
        position: absolute;
        width: 88px;
        height: 88px;
        background: #FFFFFF;
        border-radius: 50%;
        box-shadow:
            0 1px 5px rgba(15,23,42,.05);
    }


    .donut-center {
        position: relative;
        z-index: 2;
        text-align: center;
    }


    .donut-center-value {
        color: #172033;
        font-size: 24px;
        line-height: 1;
        font-weight: 800;
    }


    .donut-center-label {
        margin-top: 5px;
        color: #94A3B8;
        font-size: 8px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
    }


    /* =========================================================
       LEGEND
    ========================================================= */

    .donut-legend {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }


    .legend-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        padding: 5px 0;
    }


    .legend-left {
        display: flex;
        align-items: center;
        gap: 7px;
        min-width: 0;
    }


    .legend-dot {
        width: 8px;
        height: 8px;
        flex-shrink: 0;
        border-radius: 50%;
    }


    .legend-label {
        overflow: hidden;
        color: #64748B;
        font-size: 10px;
        font-weight: 600;
        text-overflow: ellipsis;
        white-space: nowrap;
    }


    .legend-value {
        color: #172033;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }


    .legend-percent {
        color: #94A3B8;
        font-size: 9px;
        font-weight: 600;
        margin-left: 2px;
    }


    /* =========================================================
       DONUT COLORS
    ========================================================= */

    .color-blue {
        background: #0B2A6F;
    }


    .color-purple {
        background: #7C4DFF;
    }


    .color-orange {
        background: #D98200;
    }


    .color-green {
        background: #159A6C;
    }


    .color-red {
        background: #E30613;
    }


    /* =========================================================
       STATUS GRID
    ========================================================= */

    .status-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }


    .report-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        overflow: hidden;
        box-shadow:
            0 4px 14px rgba(15,23,42,.04);
    }


    .report-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 18px 20px;
        border-bottom: 1px solid #EEF2F7;
    }


    .report-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }


    .report-card-icon {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #E8EEF9;
        color: #0B2A6F;
    }


    .report-card-icon svg {
        width: 17px;
        height: 17px;
    }


    .report-card-header h2 {
        margin: 0;
        color: #172033;
        font-size: 15px;
        font-weight: 800;
    }


    .report-card-header p {
        margin: 4px 0 0;
        color: #94A3B8;
        font-size: 10px;
    }


    .report-card-total {
        color: #64748B;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }


    .report-body {
        padding: 17px 20px 19px;
    }


    .report-row {
        padding: 10px 0;
        border-bottom: 1px solid #EEF2F7;
    }


    .report-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }


    .report-row-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 7px;
    }


    .report-label {
        color: #64748B;
        font-size: 11px;
        font-weight: 600;
    }


    .report-value {
        color: #172033;
        font-size: 12px;
        font-weight: 800;
    }


    .report-progress {
        width: 100%;
        height: 6px;
        background: #F1F5F9;
        border-radius: 99px;
        overflow: hidden;
    }


    .report-progress span {
        display: block;
        height: 100%;
        border-radius: 99px;
        background: #0B2A6F;
    }


    .progress-orange span {
        background: #D98200;
    }


    .progress-green span {
        background: #159A6C;
    }


    .progress-red span {
        background: #E30613;
    }


    .progress-purple span {
        background: #7C4DFF;
    }


    /* =========================================================
       PERFORMANCE SUMMARY
    ========================================================= */

    .performance-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
        margin-bottom: 24px;
    }


    .performance-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 16px;
        padding: 20px;
        box-shadow:
            0 4px 14px rgba(15,23,42,.04);
    }


    .performance-card-title {
        margin-bottom: 16px;
    }


    .performance-card-title h3 {
        margin: 0;
        color: #172033;
        font-size: 15px;
        font-weight: 800;
    }


    .performance-card-title p {
        margin: 4px 0 0;
        color: #94A3B8;
        font-size: 10px;
    }


    .performance-list {
        display: grid;
        gap: 10px;
    }


    .performance-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 12px 13px;
        background: #F8FAFC;
        border: 1px solid #EEF2F7;
        border-radius: 10px;
    }


    .performance-label {
        color: #64748B;
        font-size: 11px;
        font-weight: 600;
    }


    .performance-value {
        color: #172033;
        font-size: 13px;
        font-weight: 800;
    }


    .performance-value.blue {
        color: #0B2A6F;
    }


    .performance-value.green {
        color: #159A6C;
    }


    .performance-value.red {
        color: #E30613;
    }


    .performance-value.orange {
        color: #D98200;
    }


    /* =========================================================
       BADGE
    ========================================================= */

    .badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
    }


    .badge::before {
        content: '';
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: currentColor;
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


    .badge-purple {
        background: #EEE7FF;
        color: #6A1B9A;
    }


    .badge-gray {
        background: #F1F5F9;
        color: #64748B;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1150px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }


        .donut-grid {
            grid-template-columns: 1fr;
        }


        .status-grid {
            grid-template-columns: 1fr;
        }


        .revenue-grid {
            grid-template-columns: 1fr;
        }


        .performance-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 700px) {

        .reports-header {
            align-items: flex-start;
            flex-direction: column;
        }


        .stats-grid {
            grid-template-columns: 1fr;
        }


        .section-heading {
            align-items: flex-start;
            flex-direction: column;
        }


        .donut-content {
            flex-direction: column;
            justify-content: center;
        }


        .donut-legend {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="reports-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="reports-header">

        <div class="reports-header-left">

            <h1>
                Reports
            </h1>

            <p>
                Analyze CRM performance and data distribution for Petra Textima.
            </p>

        </div>


        <div class="report-period">

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

            </svg>

            CRM Summary

        </div>

    </div>


    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="stats-grid">


        {{-- TOTAL LEADS --}}

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-label">
                        Total Leads
                    </div>

                    <div class="stat-small">
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

        </div>


        {{-- TOTAL CUSTOMERS --}}

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-label">
                        Total Customers
                    </div>

                    <div class="stat-small">
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

        </div>


        {{-- TOTAL OPPORTUNITIES --}}

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-label">
                        Total Opportunities
                    </div>

                    <div class="stat-small">
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

        </div>


        {{-- TOTAL ACTIVITIES --}}

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-label">
                        Total Activities
                    </div>

                    <div class="stat-small">
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

        </div>


    </div>


    {{-- =====================================================
         REVENUE
    ====================================================== --}}

    <div class="section-heading">

        <div class="section-heading-left">

            <h2>
                Revenue Summary
            </h2>

            <p>
                Overview of opportunity values and CRM sales results.
            </p>

        </div>

    </div>


    <div class="revenue-grid">


        {{-- TOTAL EXPECTED REVENUE --}}

        <div class="revenue-card total">

            <div class="revenue-label">
                Total Expected Revenue
            </div>


            <div class="revenue-value">

                Rp{{ number_format(
                    $totalExpectedRevenue,
                    0,
                    ',',
                    '.'
                ) }}

            </div>


            <div class="revenue-line">
                <span></span>
            </div>

        </div>


        {{-- WON REVENUE --}}

        <div class="revenue-card won">

            <div class="revenue-label">
                Won Revenue
            </div>


            <div class="revenue-value revenue-won">

                Rp{{ number_format(
                    $wonRevenue,
                    0,
                    ',',
                    '.'
                ) }}

            </div>


            <div class="revenue-line">
                <span></span>
            </div>

        </div>


        {{-- LOST REVENUE --}}

        <div class="revenue-card lost">

            <div class="revenue-label">
                Lost Revenue
            </div>


            <div class="revenue-value revenue-lost">

                Rp{{ number_format(
                    $lostRevenue,
                    0,
                    ',',
                    '.'
                ) }}

            </div>


            <div class="revenue-line">
                <span></span>
            </div>

        </div>


    </div>


    {{-- =====================================================
         CRM DATA ANALYSIS
    ====================================================== --}}

    <div class="section-heading">

        <div class="section-heading-left">

            <h2>
                CRM Data Analysis
            </h2>

            <p>
                Data composition based on CRM status and stages.
            </p>

        </div>

    </div>


    @php

        $leadTotal = max(
            $totalLeads,
            1
        );

        $opportunityTotal = max(
            $totalOpportunities,
            1
        );

        $activityTotal = max(
            $totalActivities,
            1
        );


        $newLeadPercent =
            ($newLeads / $leadTotal) * 100;

        $contactedLeadPercent =
            ($contactedLeads / $leadTotal) * 100;

        $qualifiedLeadPercent =
            ($qualifiedLeads / $leadTotal) * 100;

        $convertedLeadPercent =
            ($convertedLeads / $leadTotal) * 100;


        $prospectPercent =
            ($prospectOpportunities / $opportunityTotal) * 100;

        $qualifiedOpportunityPercent =
            ($qualifiedOpportunities / $opportunityTotal) * 100;

        $propositionPercent =
            ($propositionOpportunities / $opportunityTotal) * 100;

        $wonPercent =
            ($wonOpportunities / $opportunityTotal) * 100;

        $lostPercent =
            ($lostOpportunities / $opportunityTotal) * 100;


        $plannedPercent =
            ($plannedActivities / $activityTotal) * 100;

        $donePercent =
            ($doneActivities / $activityTotal) * 100;

        $cancelledPercent =
            ($cancelledActivities / $activityTotal) * 100;


        $leadEnd1 =
            $newLeadPercent;

        $leadEnd2 =
            $leadEnd1 +
            $contactedLeadPercent;

        $leadEnd3 =
            $leadEnd2 +
            $qualifiedLeadPercent;


        $opportunityEnd1 =
            $prospectPercent;

        $opportunityEnd2 =
            $opportunityEnd1 +
            $qualifiedOpportunityPercent;

        $opportunityEnd3 =
            $opportunityEnd2 +
            $propositionPercent;

        $opportunityEnd4 =
            $opportunityEnd3 +
            $wonPercent;


        $activityEnd1 =
            $plannedPercent;

        $activityEnd2 =
            $activityEnd1 +
            $donePercent;

    @endphp


    <div class="donut-grid">


        {{-- =================================================
             LEAD STATUS
        ================================================== --}}

        <div class="donut-card">

            <div class="donut-header">

                <div class="donut-title-area">

                    <div class="donut-icon">

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
                                r="3"
                            />

                            <path
                                d="M3 21v-2a6 6 0 0 1 12 0v2"
                            />

                            <path
                                d="M16 5a3 3 0 0 1 0 5"
                            />

                        </svg>

                    </div>


                    <div class="donut-title">

                        <h3>
                            Lead Status
                        </h3>

                        <p>
                            Potential customer composition
                        </p>

                    </div>

                </div>


                <div class="donut-total-badge">
                    {{ $totalLeads }} Total
                </div>

            </div>


            <div class="donut-content">


                <div
                    class="donut-chart"
                    style="
                        background:
                        conic-gradient(
                            #0B2A6F 0% {{ $leadEnd1 }}%,
                            #D98200 {{ $leadEnd1 }}% {{ $leadEnd2 }}%,
                            #7C4DFF {{ $leadEnd2 }}% {{ $leadEnd3 }}%,
                            #159A6C {{ $leadEnd3 }}% 100%
                        );
                    "
                >

                    <div class="donut-center">

                        <div class="donut-center-value">
                            {{ $totalLeads }}
                        </div>

                        <div class="donut-center-label">
                            Leads
                        </div>

                    </div>

                </div>


                <div class="donut-legend">


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-blue"></span>

                            <span class="legend-label">
                                New
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $newLeads }}

                            <span class="legend-percent">
                                {{ round($newLeadPercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-orange"></span>

                            <span class="legend-label">
                                Contacted
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $contactedLeads }}

                            <span class="legend-percent">
                                {{ round($contactedLeadPercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-purple"></span>

                            <span class="legend-label">
                                Qualified
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $qualifiedLeads }}

                            <span class="legend-percent">
                                {{ round($qualifiedLeadPercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-green"></span>

                            <span class="legend-label">
                                Converted
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $convertedLeads }}

                            <span class="legend-percent">
                                {{ round($convertedLeadPercent) }}%
                            </span>

                        </div>

                    </div>


                </div>

            </div>

        </div>


        {{-- =================================================
             OPPORTUNITY STAGE
        ================================================== --}}

        <div class="donut-card">

            <div class="donut-header">

                <div class="donut-title-area">

                    <div class="donut-icon">

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

                        </svg>

                    </div>


                    <div class="donut-title">

                        <h3>
                            Opportunity Stage
                        </h3>

                        <p>
                            Pipeline composition
                        </p>

                    </div>

                </div>


                <div class="donut-total-badge">
                    {{ $totalOpportunities }} Total
                </div>

            </div>


            <div class="donut-content">


                <div
                    class="donut-chart"
                    style="
                        background:
                        conic-gradient(
                            #0B2A6F 0% {{ $opportunityEnd1 }}%,
                            #7C4DFF {{ $opportunityEnd1 }}% {{ $opportunityEnd2 }}%,
                            #D98200 {{ $opportunityEnd2 }}% {{ $opportunityEnd3 }}%,
                            #159A6C {{ $opportunityEnd3 }}% {{ $opportunityEnd4 }}%,
                            #E30613 {{ $opportunityEnd4 }}% 100%
                        );
                    "
                >

                    <div class="donut-center">

                        <div class="donut-center-value">
                            {{ $totalOpportunities }}
                        </div>

                        <div class="donut-center-label">
                            Opportunities
                        </div>

                    </div>

                </div>


                <div class="donut-legend">


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-blue"></span>

                            <span class="legend-label">
                                Prospect
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $prospectOpportunities }}

                            <span class="legend-percent">
                                {{ round($prospectPercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-purple"></span>

                            <span class="legend-label">
                                Qualified
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $qualifiedOpportunities }}

                            <span class="legend-percent">
                                {{ round($qualifiedOpportunityPercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-orange"></span>

                            <span class="legend-label">
                                Proposition
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $propositionOpportunities }}

                            <span class="legend-percent">
                                {{ round($propositionPercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-green"></span>

                            <span class="legend-label">
                                Won
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $wonOpportunities }}

                            <span class="legend-percent">
                                {{ round($wonPercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-red"></span>

                            <span class="legend-label">
                                Lost
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $lostOpportunities }}

                            <span class="legend-percent">
                                {{ round($lostPercent) }}%
                            </span>

                        </div>

                    </div>


                </div>

            </div>

        </div>


        {{-- =================================================
             ACTIVITY STATUS
        ================================================== --}}

        <div class="donut-card">

            <div class="donut-header">

                <div class="donut-title-area">

                    <div class="donut-icon">

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


                    <div class="donut-title">

                        <h3>
                            Activity Status
                        </h3>

                        <p>
                            Activity composition
                        </p>

                    </div>

                </div>


                <div class="donut-total-badge">
                    {{ $totalActivities }} Total
                </div>

            </div>


            <div class="donut-content">


                <div
                    class="donut-chart"
                    style="
                        background:
                        conic-gradient(
                            #D98200 0% {{ $activityEnd1 }}%,
                            #159A6C {{ $activityEnd1 }}% {{ $activityEnd2 }}%,
                            #E30613 {{ $activityEnd2 }}% 100%
                        );
                    "
                >

                    <div class="donut-center">

                        <div class="donut-center-value">
                            {{ $totalActivities }}
                        </div>

                        <div class="donut-center-label">
                            Activities
                        </div>

                    </div>

                </div>


                <div class="donut-legend">


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-orange"></span>

                            <span class="legend-label">
                                Planned
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $plannedActivities }}

                            <span class="legend-percent">
                                {{ round($plannedPercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-green"></span>

                            <span class="legend-label">
                                Done
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $doneActivities }}

                            <span class="legend-percent">
                                {{ round($donePercent) }}%
                            </span>

                        </div>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span class="legend-dot color-red"></span>

                            <span class="legend-label">
                                Cancelled
                            </span>

                        </div>

                        <div class="legend-value">

                            {{ $cancelledActivities }}

                            <span class="legend-percent">
                                {{ round($cancelledPercent) }}%
                            </span>

                        </div>

                    </div>


                </div>

            </div>

        </div>


    </div>


    {{-- =====================================================
         CRM STATUS
    ====================================================== --}}

    <div class="section-heading">

        <div class="section-heading-left">

            <h2>
                CRM Status Details
            </h2>

            <p>
                Status distribution to help evaluate performance.
            </p>

        </div>

    </div>


    <div class="status-grid">


        {{-- LEAD STATUS --}}

        <div class="report-card">

            <div class="report-card-header">

                <div class="report-card-title">

                    <div class="report-card-icon">

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
                                r="3"
                            />

                            <path
                                d="M3 21v-2a6 6 0 0 1 12 0v2"
                            />

                        </svg>

                    </div>


                    <div>

                        <h2>
                            Lead Status
                        </h2>

                        <p>
                            Lead status distribution
                        </p>

                    </div>

                </div>


                <div class="report-card-total">
                    {{ $totalLeads }} Leads
                </div>

            </div>


            <div class="report-body">


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            New
                        </span>

                        <span class="report-value">
                            {{ $newLeads }}
                        </span>

                    </div>


                    <div class="report-progress">

                        <span
                            style="
                                width:
                                {{ $newLeadPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Contacted
                        </span>

                        <span class="report-value">
                            {{ $contactedLeads }}
                        </span>

                    </div>


                    <div class="report-progress progress-orange">

                        <span
                            style="
                                width:
                                {{ $contactedLeadPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Qualified
                        </span>

                        <span class="report-value">
                            {{ $qualifiedLeads }}
                        </span>

                    </div>


                    <div class="report-progress progress-purple">

                        <span
                            style="
                                width:
                                {{ $qualifiedLeadPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Converted
                        </span>

                        <span class="report-value">
                            {{ $convertedLeads }}
                        </span>

                    </div>


                    <div class="report-progress progress-green">

                        <span
                            style="
                                width:
                                {{ $convertedLeadPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


            </div>

        </div>


        {{-- OPPORTUNITY STATUS --}}

        <div class="report-card">

            <div class="report-card-header">

                <div class="report-card-title">

                    <div class="report-card-icon">

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

                        </svg>

                    </div>


                    <div>

                        <h2>
                            Opportunity Stage
                        </h2>

                        <p>
                            Opportunity stage distribution
                        </p>

                    </div>

                </div>


                <div class="report-card-total">
                    {{ $totalOpportunities }} Opportunities
                </div>

            </div>


            <div class="report-body">


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Prospect
                        </span>

                        <span class="report-value">
                            {{ $prospectOpportunities }}
                        </span>

                    </div>


                    <div class="report-progress">

                        <span
                            style="
                                width:
                                {{ $prospectPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Qualified
                        </span>

                        <span class="report-value">
                            {{ $qualifiedOpportunities }}
                        </span>

                    </div>


                    <div class="report-progress progress-purple">

                        <span
                            style="
                                width:
                                {{ $qualifiedOpportunityPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Proposition
                        </span>

                        <span class="report-value">
                            {{ $propositionOpportunities }}
                        </span>

                    </div>


                    <div class="report-progress progress-orange">

                        <span
                            style="
                                width:
                                {{ $propositionPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Won
                        </span>

                        <span class="report-value">
                            {{ $wonOpportunities }}
                        </span>

                    </div>


                    <div class="report-progress progress-green">

                        <span
                            style="
                                width:
                                {{ $wonPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Lost
                        </span>

                        <span class="report-value">
                            {{ $lostOpportunities }}
                        </span>

                    </div>


                    <div class="report-progress progress-red">

                        <span
                            style="
                                width:
                                {{ $lostPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


            </div>

        </div>


        {{-- ACTIVITY STATUS --}}

        <div class="report-card">

            <div class="report-card-header">

                <div class="report-card-title">

                    <div class="report-card-icon">

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


                    <div>

                        <h2>
                            Activity Status
                        </h2>

                        <p>
                            CRM activity status
                        </p>

                    </div>

                </div>


                <div class="report-card-total">
                    {{ $totalActivities }} Activities
                </div>

            </div>


            <div class="report-body">


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Planned
                        </span>

                        <span class="report-value">
                            {{ $plannedActivities }}
                        </span>

                    </div>


                    <div class="report-progress progress-orange">

                        <span
                            style="
                                width:
                                {{ $plannedPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Done
                        </span>

                        <span class="report-value">
                            {{ $doneActivities }}
                        </span>

                    </div>


                    <div class="report-progress progress-green">

                        <span
                            style="
                                width:
                                {{ $donePercent }}%;
                            "
                        ></span>

                    </div>

                </div>


                <div class="report-row">

                    <div class="report-row-top">

                        <span class="report-label">
                            Cancelled
                        </span>

                        <span class="report-value">
                            {{ $cancelledActivities }}
                        </span>

                    </div>


                    <div class="report-progress progress-red">

                        <span
                            style="
                                width:
                                {{ $cancelledPercent }}%;
                            "
                        ></span>

                    </div>

                </div>


            </div>

        </div>


    </div>


    {{-- =====================================================
         PERFORMANCE SUMMARY
    ====================================================== --}}

    <div class="section-heading">

        <div class="section-heading-left">

            <h2>
                Performance Summary
            </h2>

            <p>
                Key indicators for quickly evaluating CRM performance.
            </p>

        </div>

    </div>


    <div class="performance-grid">


        {{-- SALES PERFORMANCE --}}

        <div class="performance-card">

            <div class="performance-card-title">

                <h3>
                    Sales Performance
                </h3>

                <p>
                    Opportunity results by stage.
                </p>

            </div>


            <div class="performance-list">


                <div class="performance-item">

                    <span class="performance-label">
                        Active Opportunities
                    </span>

                    <span class="performance-value blue">
                        {{ max(
                            0,
                            $totalOpportunities
                            - $wonOpportunities
                            - $lostOpportunities
                        ) }}
                    </span>

                </div>


                <div class="performance-item">

                    <span class="performance-label">
                        Won Opportunities
                    </span>

                    <span class="performance-value green">
                        {{ $wonOpportunities }}
                    </span>

                </div>


                <div class="performance-item">

                    <span class="performance-label">
                        Lost Opportunities
                    </span>

                    <span class="performance-value red">
                        {{ $lostOpportunities }}
                    </span>

                </div>


            </div>

        </div>


        {{-- CONVERSION PERFORMANCE --}}

        <div class="performance-card">

            <div class="performance-card-title">

                <h3>
                    Conversion Performance
                </h3>

                <p>
                    Overview of Lead conversion into Customers.
                </p>

            </div>


            <div class="performance-list">


                <div class="performance-item">

                    <span class="performance-label">
                        Total Leads
                    </span>

                    <span class="performance-value blue">
                        {{ $totalLeads }}
                    </span>

                </div>


                <div class="performance-item">

                    <span class="performance-label">
                        Converted Leads
                    </span>

                    <span class="performance-value green">
                        {{ $convertedLeads }}
                    </span>

                </div>


                <div class="performance-item">

                    <span class="performance-label">
                        Conversion Rate
                    </span>

                    <span class="performance-value orange">
                        {{ $totalLeads > 0
                            ? round(
                                ($convertedLeads / $totalLeads) * 100
                            )
                            : 0
                        }}%
                    </span>

                </div>


            </div>

        </div>


    </div>


</div>

@endsection