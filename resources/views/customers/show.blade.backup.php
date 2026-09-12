@php
    use App\Models\Activity;
@endphp
@extends('layouts.app')

@section('title', 'Detail Customer')
@section('page-title', 'Detail Customer')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .customer-detail-page {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .customer-detail-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }


    .customer-detail-header-left h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
    }


    .customer-detail-header-left p {
        margin: 0;
        color: #5F6368;
        font-size: 13px;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

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


    .btn-danger-soft {
        background: #FDE8EA;
        color: #E30613;
    }


    /* =========================================================
       PROFILE CARD
    ========================================================= */

    .customer-profile-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        padding: 28px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);

        margin-bottom: 20px;
    }


    .customer-profile {
        display: flex;
        align-items: center;
        gap: 16px;

        padding-bottom: 22px;

        border-bottom: 1px solid #E8EAED;
    }


    .customer-avatar-large {
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


    .customer-profile-info h2 {
        margin: 0 0 5px;

        color: #202124;

        font-size: 21px;

        font-weight: 700;
    }


    .customer-profile-info p {
        margin: 0;

        color: #5F6368;

        font-size: 12px;
    }


    /* =========================================================
       CUSTOMER DETAIL
    ========================================================= */

    .customer-info-grid {
        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 0 40px;

        margin-top: 10px;
    }


    .customer-info-item {
        padding: 15px 0;

        border-bottom: 1px solid #F1F3F4;
    }


    .customer-info-label {
        margin-bottom: 6px;

        color: #80868B;

        font-size: 10px;

        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .customer-info-value {
        color: #202124;

        font-size: 13px;

        line-height: 1.5;

        word-break: break-word;
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .section-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        padding: 25px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);

        margin-bottom: 20px;
    }


    .section-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-bottom: 20px;
    }


    .section-header h3 {
        margin: 0;

        color: #202124;

        font-size: 16px;

        font-weight: 700;
    }


    .section-header p {
        margin: 4px 0 0;

        color: #80868B;

        font-size: 11px;
    }


    /* =========================================================
       OPPORTUNITY CARD
    ========================================================= */

    .opportunity-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }


    .opportunity-item {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 16px;

        border: 1px solid #E8EAED;

        border-radius: 11px;

        background: #FFFFFF;

        transition: .2s ease;
    }


    .opportunity-item:hover {
        background: #FAFAFA;

        border-color: #DADCE0;
    }


    .opportunity-left {
        min-width: 0;

        flex: 1;
    }


    .opportunity-name {
        margin-bottom: 6px;

        color: #202124;

        font-size: 13px;

        font-weight: 700;
    }


    .opportunity-meta {
        display: flex;

        align-items: center;

        flex-wrap: wrap;

        gap: 7px;
    }


    .meta-badge {
        display: inline-flex;

        align-items: center;

        padding: 5px 8px;

        border-radius: 20px;

        background: #F1F3F4;

        color: #5F6368;

        font-size: 10px;

        font-weight: 600;
    }


    .meta-revenue {
        background: #E8EEF9;

        color: #0B2A6F;
    }


    .meta-prospect {
        background: #E8EEF9;

        color: #0B2A6F;
    }


    .meta-qualified {
        background: #EEE7FF;

        color: #6A1B9A;
    }


    .meta-proposition {
        background: #FEF7E0;

        color: #B06000;
    }


    .meta-won {
        background: #E6F4EA;

        color: #137333;
    }


    .meta-lost {
        background: #FCE8E6;

        color: #D93025;
    }


    .opportunity-right {
        flex-shrink: 0;
    }


    /* =========================================================
       ACTIVITY
    ========================================================= */

    .activity-list {
        display: flex;

        flex-direction: column;

        gap: 10px;
    }


    .activity-item {
        display: grid;

        grid-template-columns: 42px 1fr auto;

        align-items: center;

        gap: 12px;

        padding: 14px;

        border: 1px solid #E8EAED;

        border-radius: 10px;
    }


    .activity-icon {
        width: 38px;
        height: 38px;

        border-radius: 10px;

        background: #E8EEF9;

        color: #0B2A6F;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 16px;
    }


    .activity-subject {
        margin-bottom: 4px;

        color: #202124;

        font-size: 12px;

        font-weight: 600;
    }


    .activity-meta {
        color: #80868B;

        font-size: 10px;
    }


    .activity-status {
        padding: 5px 9px;

        border-radius: 20px;

        font-size: 10px;

        font-weight: 600;

        white-space: nowrap;
    }


    .activity-planned {
        background: #FEF7E0;

        color: #B06000;
    }


    .activity-done {
        background: #E6F4EA;

        color: #137333;
    }


    .activity-cancelled {
        background: #FCE8E6;

        color: #D93025;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-state {
        padding: 35px 15px;

        text-align: center;

        color: #9AA0A6;

        font-size: 12px;
    }


    .empty-icon {
        width: 48px;
        height: 48px;

        margin: 0 auto 10px;

        border-radius: 13px;

        background: #F1F3F4;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #9AA0A6;
    }


    .empty-icon svg {
        width: 21px;
        height: 21px;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .detail-actions {
        display: flex;

        align-items: center;

        gap: 8px;

        margin-top: 5px;

        padding-top: 20px;

        border-top: 1px solid #E8EAED;
    }


    .detail-actions-spacer {
        flex: 1;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 750px) {

        .customer-detail-header {
            flex-direction: column;

            align-items: flex-start;
        }


        .customer-info-grid {
            grid-template-columns: 1fr;
        }


        .opportunity-item {
            flex-direction: column;

            align-items: flex-start;
        }


        .opportunity-right {
            width: 100%;
        }


        .activity-item {
            grid-template-columns: 38px 1fr;
        }


        .activity-status {
            grid-column: 2;
            width: fit-content;
        }


        .detail-actions {
            flex-wrap: wrap;
        }


        .detail-actions-spacer {
            display: none;
        }

    }

</style>

@endsection


@section('content')

<div class="customer-detail-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="customer-detail-header">


        <div class="customer-detail-header-left">

            <h1>
                Detail Customer
            </h1>

            <p>
                Informasi pelanggan dan aktivitas penjualan.
            </p>

        </div>


        <a
            href="{{ route('customers.index') }}"
            class="btn btn-secondary"
        >

            ← Kembali

        </a>


    </div>


    <!-- =====================================================
         CUSTOMER PROFILE
    ====================================================== -->

    <div class="customer-profile-card">


        <div class="customer-profile">


            <div class="customer-avatar-large">

                {{ strtoupper(
                    substr(
                        $customer->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <div class="customer-profile-info">

                <h2>

                    {{ $customer->name }}

                </h2>


                <p>

                    {{ $customer->company ?? 'Perusahaan belum diisi' }}

                </p>

            </div>


        </div>


        <!-- =================================================
             CUSTOMER INFORMATION
        ================================================== -->

        <div class="customer-info-grid">


            <!-- NAMA -->

            <div class="customer-info-item">

                <div class="customer-info-label">
                    Nama Customer
                </div>

                <div class="customer-info-value">

                    {{ $customer->name }}

                </div>

            </div>


            <!-- PERUSAHAAN -->

            <div class="customer-info-item">

                <div class="customer-info-label">
                    Perusahaan
                </div>

                <div class="customer-info-value">

                    {{ $customer->company ?? '-' }}

                </div>

            </div>


            <!-- EMAIL -->

            <div class="customer-info-item">

                <div class="customer-info-label">
                    Email
                </div>

                <div class="customer-info-value">

                    {{ $customer->email ?? '-' }}

                </div>

            </div>


            <!-- TELEPON -->

            <div class="customer-info-item">

                <div class="customer-info-label">
                    Telepon
                </div>

                <div class="customer-info-value">

                    {{ $customer->phone ?? '-' }}

                </div>

            </div>


            <!-- ALAMAT -->

            <div class="customer-info-item">

                <div class="customer-info-label">
                    Alamat
                </div>

                <div class="customer-info-value">

                    {{ $customer->address ?? '-' }}

                </div>

            </div>


            <!-- DIBUAT -->

            <div class="customer-info-item">

                <div class="customer-info-label">
                    Terdaftar
                </div>

                <div class="customer-info-value">

                    {{
                        $customer->created_at
                            ? $customer->created_at->format(
                                'd/m/Y H:i'
                            )
                            : '-'
                    }}

                </div>

            </div>


        </div>


        <!-- ACTION -->

        <div class="detail-actions">


            <a
                href="{{ route(
                    'customers.edit',
                    $customer
                ) }}"
                class="btn btn-primary"
            >

                Edit Customer

            </a>


            <div class="detail-actions-spacer"></div>


            <a
                href="{{ route(
                    'customers.index'
                ) }}"
                class="btn btn-secondary"
            >

                Kembali

            </a>


        </div>


    </div>


    <!-- =====================================================
         OPPORTUNITIES
    ====================================================== -->

    <div class="section-card">


        <div class="section-header">

            <div>

                <h3>
                    Opportunities
                </h3>

                <p>
                    Peluang penjualan yang terkait dengan customer ini.
                </p>

            </div>


            <a
                href="{{ route(
                    'opportunities.create'
                ) }}"
                class="btn btn-primary"
            >

                + Opportunity

            </a>


        </div>


        @if(
            $customer->opportunities
            && $customer->opportunities->count()
        )


            <div class="opportunity-list">


                @foreach(
                    $customer->opportunities
                    as $opportunity
                )


                    @php

                        $stageName =
                            strtolower(
                                $opportunity
                                    ->stage
                                    ->name ?? ''
                            );

                    @endphp


                    <div class="opportunity-item">


                        <div class="opportunity-left">


                            <div class="opportunity-name">

                                {{ $opportunity->name }}

                            </div>


                            <div class="opportunity-meta">


                                <!-- REVENUE -->

                                <span
                                    class="
                                        meta-badge
                                        meta-revenue
                                    "
                                >

                                    Rp
                                    {{ number_format(
                                        $opportunity
                                            ->expected_revenue,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>


                                <!-- STAGE -->

                                @if(
                                    $stageName === 'prospect'
                                )

                                    <span
                                        class="
                                            meta-badge
                                            meta-prospect
                                        "
                                    >
                                        Prospect
                                    </span>

                                @elseif(
                                    $stageName === 'qualified'
                                )

                                    <span
                                        class="
                                            meta-badge
                                            meta-qualified
                                        "
                                    >
                                        Qualified
                                    </span>

                                @elseif(
                                    $stageName === 'proposition'
                                )

                                    <span
                                        class="
                                            meta-badge
                                            meta-proposition
                                        "
                                    >
                                        Proposition
                                    </span>

                                @elseif(
                                    $stageName === 'won'
                                )

                                    <span
                                        class="
                                            meta-badge
                                            meta-won
                                        "
                                    >
                                        Won
                                    </span>

                                @elseif(
                                    $stageName === 'lost'
                                )

                                    <span
                                        class="
                                            meta-badge
                                            meta-lost
                                        "
                                    >
                                        Lost
                                    </span>

                                @else

                                    <span class="meta-badge">

                                        {{
                                            $opportunity
                                                ->stage
                                                ->name ?? '-'
                                        }}

                                    </span>

                                @endif


                                <!-- RATING -->

                                <span class="meta-badge">

                                    Rating:
                                    {{ $opportunity->rating }}/5

                                </span>


                            </div>


                        </div>


                        <div class="opportunity-right">


                            <a
                                href="{{ route(
                                    'opportunities.show',
                                    $opportunity
                                ) }}"
                                class="btn btn-secondary"
                            >

                                Detail →

                            </a>


                        </div>


                    </div>


                @endforeach


            </div>


        @else


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

                        <path d="M4 17l5-5 4 3 7-8"/>

                        <path d="M15 7h5v5"/>

                    </svg>


                </div>


                Belum ada opportunity untuk customer ini.


            </div>


        @endif


    </div>


    <!-- =====================================================
         ACTIVITIES
    ====================================================== -->

    <div class="section-card">


        <div class="section-header">

            <div>

                <h3>
                    Activities
                </h3>

                <p>
                    Riwayat aktivitas yang terkait dengan opportunity customer.
                </p>

            </div>


            <a
                href="{{ route(
                    'activities.create'
                ) }}?customer_id={{ $customer->id }}"
                class="btn btn-primary"
            >

                + Activity

            </a>


        </div>


        @php

            $customerActivities =
                \App\Models\Activity::whereHas(
                    'opportunity',
                    function ($query) use ($customer) {

                        $query->where(
                            'customer_id',
                            $customer->id
                        );

                    }
                )
                ->with('opportunity')
                ->latest('activity_date')
                ->get();

        @endphp


        @if(
            $customerActivities->count()
        )


            <div class="activity-list">


                @foreach(
                    $customerActivities
                    as $activity
                )


                    @php

                        $activityType =
                            strtolower(
                                $activity->type
                            );

                        $activityIcon =
                            match($activityType) {

                                'call'
                                    => '☎',

                                'email'
                                    => '✉',

                                'meeting'
                                    => '◆',

                                'follow up'
                                    => '↻',

                                'visit'
                                    => '⌂',

                                default
                                    => '•',

                            };


                    @endphp


                    <div class="activity-item">


                        <!-- ICON -->

                        <div class="activity-icon">

                            {{ $activityIcon }}

                        </div>


                        <!-- INFO -->

                        <div>


                            <div class="activity-subject">

                                {{ $activity->subject }}

                            </div>


                            <div class="activity-meta">

                                {{ strtoupper(
                                    $activity->type
                                ) }}

                                ·

                                {{ $activity->opportunity->name ?? '-' }}

                                ·

                                {{
                                    $activity->activity_date
                                        ? $activity
                                            ->activity_date
                                            ->format(
                                                'd/m/Y H:i'
                                            )
                                        : '-'
                                }}

                            </div>


                        </div>


                        <!-- STATUS -->

                        @if(
                            $activity->status === 'planned'
                        )

                            <span
                                class="
                                    activity-status
                                    activity-planned
                                "
                            >
                                Planned
                            </span>

                        @elseif(
                            $activity->status === 'done'
                        )

                            <span
                                class="
                                    activity-status
                                    activity-done
                                "
                            >
                                Done
                            </span>

                        @elseif(
                            $activity->status === 'cancelled'
                        )

                            <span
                                class="
                                    activity-status
                                    activity-cancelled
                                "
                            >
                                Cancelled
                            </span>

                        @else

                            <span class="activity-status">

                                {{
                                    ucfirst(
                                        $activity->status
                                    )
                                }}

                            </span>

                        @endif


                    </div>


                @endforeach


            </div>


        @else


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


                Belum ada activity untuk customer ini.


            </div>


        @endif


    </div>


</div>

@endsection