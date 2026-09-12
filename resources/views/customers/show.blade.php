@extends('layouts.app')

@section('title', 'Detail Customer')
@section('page-title', 'Detail Customer')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .customer-detail-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .customer-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
    }

    .customer-header-left h1 {
        margin: 0 0 6px;
        color: #0B2A6F;
        font-size: 27px;
        font-weight: 700;
    }

    .customer-header-left p {
        margin: 0;
        color: #6B7280;
        font-size: 13px;
    }

    .header-actions {
        display: flex;
        gap: 9px;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .btn {
        min-height: 41px;
        padding: 0 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        box-sizing: border-box;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: #0B2A6F;
        color: #FFFFFF;
    }

    .btn-primary:hover {
        background: #09235D;
        color: #FFFFFF;
    }

    .btn-edit {
        background: #E30613;
        color: #FFFFFF;
    }

    .btn-edit:hover {
        background: #C80511;
        color: #FFFFFF;
    }

    .btn-secondary {
        background: #FFFFFF;
        color: #475467;
        border: 1px solid #DDE1E6;
    }

    .btn-secondary:hover {
        background: #F7F8FA;
        color: #0B2A6F;
    }


    /* =========================================================
       PROFILE CARD
    ========================================================= */

    .profile-card {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 16px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 3px 12px rgba(0,0,0,.04);
    }

    .profile-top {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-bottom: 21px;
        border-bottom: 1px solid #EEF0F3;
    }

    .avatar {
        width: 58px;
        height: 58px;
        flex-shrink: 0;
        border-radius: 14px;
        background: #EAF0FF;
        color: #0B2A6F;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        font-weight: 700;
    }

    .profile-info h2 {
        margin: 0 0 5px;
        color: #1F2937;
        font-size: 21px;
        font-weight: 700;
    }

    .profile-info p {
        margin: 0;
        color: #7A8494;
        font-size: 12px;
    }


    /* =========================================================
       CUSTOMER INFORMATION
    ========================================================= */

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 20px;
    }

    .info-box {
        padding: 15px;
        background: #F8F9FA;
        border: 1px solid #EDF0F4;
        border-radius: 12px;
    }

    .info-label {
        margin-bottom: 7px;
        color: #98A2B3;
        font-size: 11px;
    }

    .info-value {
        color: #344054;
        font-size: 13px;
        font-weight: 600;
        line-height: 1.5;
        word-break: break-word;
    }


    /* =========================================================
       ACTION AREA
    ========================================================= */

    .profile-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #EEF0F3;
    }


    /* =========================================================
       SECTION CARD
    ========================================================= */

    .section-card {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 16px;
        padding: 23px;
        margin-bottom: 20px;
        box-shadow: 0 3px 12px rgba(0,0,0,.04);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .section-header h2 {
        margin: 0;
        color: #1F2937;
        font-size: 17px;
        font-weight: 700;
    }

    .section-header p {
        margin: 5px 0 0;
        color: #98A2B3;
        font-size: 12px;
    }


    /* =========================================================
       OPPORTUNITY
    ========================================================= */

    .opportunity-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .opportunity-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        padding: 15px;
        border: 1px solid #E8EBEF;
        border-radius: 12px;
        background: #FFFFFF;
        transition: .2s ease;
    }

    .opportunity-item:hover {
        background: #FAFBFC;
        border-color: #D9DEE6;
    }

    .opportunity-left {
        min-width: 0;
        flex: 1;
    }

    .opportunity-name {
        margin-bottom: 8px;
        color: #1F2937;
        font-size: 13px;
        font-weight: 700;
        word-break: break-word;
    }

    .opportunity-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }

    .meta {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 20px;
        background: #F0F2F5;
        color: #667085;
        font-size: 10px;
        font-weight: 700;
    }

    .meta-revenue {
        background: #EAF0FF;
        color: #0B2A6F;
    }

    .meta-prospect {
        background: #EAF0FF;
        color: #0B2A6F;
    }

    .meta-qualified {
        background: #EEE7FF;
        color: #6A1B9A;
    }

    .meta-proposition {
        background: #FFF1DF;
        color: #B85A00;
    }

    .meta-won {
        background: #E8F7EF;
        color: #18784D;
    }

    .meta-lost {
        background: #FDE9EC;
        color: #C52E3D;
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

    .activity-link {
        display: block;
        color: inherit;
        text-decoration: none;
    }

    .activity-link:hover {
        color: inherit;
        text-decoration: none;
    }

    .activity-item {
        display: grid;
        grid-template-columns: 40px minmax(0, 1fr) auto;
        align-items: center;
        gap: 12px;
        padding: 14px;
        border: 1px solid #E8EBEF;
        border-radius: 11px;
        background: #FFFFFF;
        transition: .2s ease;
    }

    .activity-link:hover .activity-item {
        background: #FAFBFC;
        border-color: #D9DEE6;
    }

    .activity-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #EAF0FF;
        color: #0B2A6F;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
    }

    .activity-subject {
        margin-bottom: 4px;
        color: #1F2937;
        font-size: 13px;
        font-weight: 700;
        word-break: break-word;
    }

    .activity-meta {
        color: #7A8494;
        font-size: 11px;
        line-height: 1.5;
    }

    .activity-status {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-planned {
        background: #FFF1DF;
        color: #B85A00;
    }

    .status-done {
        background: #E8F7EF;
        color: #18784D;
    }

    .status-cancelled {
        background: #FDE9EC;
        color: #C52E3D;
    }

    .status-default {
        background: #F0F2F5;
        color: #667085;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 35px 15px;
        text-align: center;
        color: #98A2B3;
        font-size: 12px;
    }

    .empty-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 10px;
        border-radius: 13px;
        background: #F1F3F5;
        color: #98A2B3;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .customer-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-actions {
            width: 100%;
        }

        .header-actions .btn {
            flex: 1;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .opportunity-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .opportunity-right {
            width: 100%;
        }

        .opportunity-right .btn {
            width: 100%;
        }

        .activity-item {
            grid-template-columns: 38px minmax(0, 1fr);
        }

        .activity-status {
            grid-column: 2;
            width: fit-content;
        }

        .profile-actions {
            flex-direction: column;
        }

        .profile-actions .btn {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="customer-detail-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="customer-header">

        <div class="customer-header-left">

            <h1>
                Detail Customer
            </h1>

            <p>
                Informasi pelanggan dan aktivitas penjualan.
            </p>

        </div>


        <div class="header-actions">

            <a
                href="{{ route('customers.edit', $customer) }}"
                class="btn btn-edit"
            >
                ✎ Edit
            </a>


            <a
                href="{{ route('customers.index') }}"
                class="btn btn-secondary"
            >
                ← Kembali
            </a>

        </div>

    </div>


    {{-- =====================================================
         PROFILE
    ====================================================== --}}

    <div class="profile-card">

        <div class="profile-top">

            <div class="avatar">

                {{ strtoupper(
                    substr(
                        $customer->name ?? '-',
                        0,
                        1
                    )
                ) }}

            </div>


            <div class="profile-info">

                <h2>
                    {{ $customer->name }}
                </h2>

                <p>
                    {{ $customer->company ?? 'Perusahaan belum diisi' }}
                </p>

            </div>

        </div>


        <div class="info-grid">

            {{-- NAMA --}}
            <div class="info-box">

                <div class="info-label">
                    Nama Customer
                </div>

                <div class="info-value">
                    {{ $customer->name }}
                </div>

            </div>


            {{-- PERUSAHAAN --}}
            <div class="info-box">

                <div class="info-label">
                    Perusahaan
                </div>

                <div class="info-value">
                    {{ $customer->company ?? '-' }}
                </div>

            </div>


            {{-- EMAIL --}}
            <div class="info-box">

                <div class="info-label">
                    Email
                </div>

                <div class="info-value">
                    {{ $customer->email ?? '-' }}
                </div>

            </div>


            {{-- TELEPON --}}
            <div class="info-box">

                <div class="info-label">
                    Telepon
                </div>

                <div class="info-value">
                    {{ $customer->phone ?? '-' }}
                </div>

            </div>


            {{-- ALAMAT --}}
            <div class="info-box">

                <div class="info-label">
                    Alamat
                </div>

                <div class="info-value">
                    {{ $customer->address ?? '-' }}
                </div>

            </div>


            {{-- TERDAFTAR --}}
            <div class="info-box">

                <div class="info-label">
                    Terdaftar
                </div>

                <div class="info-value">

                    @if($customer->created_at)

                        {{ $customer->created_at->format('d/m/Y H:i') }}

                    @else

                        -

                    @endif

                </div>

            </div>

        </div>


        <div class="profile-actions">

            <a
                href="{{ route('customers.edit', $customer) }}"
                class="btn btn-edit"
            >
                Edit Customer
            </a>


            <a
                href="{{ route('customers.index') }}"
                class="btn btn-secondary"
            >
                Kembali ke Customers
            </a>

        </div>

    </div>


    {{-- =====================================================
         OPPORTUNITIES
    ====================================================== --}}

    <div class="section-card">

        <div class="section-header">

            <div>

                <h2>
                    Opportunities
                </h2>

                <p>
                    Peluang penjualan yang terkait dengan customer ini.
                </p>

            </div>


            <a
                href="{{ route(
                    'opportunities.create',
                    ['customer_id' => $customer->id]
                ) }}"
                class="btn btn-primary"
            >
                + Opportunity
            </a>

        </div>


        @if($customer->opportunities->count() > 0)

            <div class="opportunity-list">

                @foreach($customer->opportunities as $opportunity)

                    @php

                        $stageName =
                            strtolower(
                                $opportunity->stage->name ?? ''
                            );

                    @endphp


                    <div class="opportunity-item">

                        <div class="opportunity-left">

                            <div class="opportunity-name">
                                {{ $opportunity->name }}
                            </div>


                            <div class="opportunity-meta">

                                {{-- REVENUE --}}
                                <span class="meta meta-revenue">

                                    Rp{{ number_format(
                                        $opportunity->expected_revenue,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>


                                {{-- STAGE --}}
                                @if($stageName === 'prospect')

                                    <span class="meta meta-prospect">
                                        Prospect
                                    </span>

                                @elseif($stageName === 'qualified')

                                    <span class="meta meta-qualified">
                                        Qualified
                                    </span>

                                @elseif($stageName === 'proposition')

                                    <span class="meta meta-proposition">
                                        Proposition
                                    </span>

                                @elseif($stageName === 'won')

                                    <span class="meta meta-won">
                                        Won
                                    </span>

                                @elseif($stageName === 'lost')

                                    <span class="meta meta-lost">
                                        Lost
                                    </span>

                                @else

                                    <span class="meta">
                                        {{ $opportunity->stage->name ?? '-' }}
                                    </span>

                                @endif


                                {{-- RATING --}}
                                <span class="meta">

                                    Rating {{ $opportunity->rating }}/5

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
                    +
                </div>

                Belum ada opportunity untuk customer ini.

            </div>

        @endif

    </div>


    {{-- =====================================================
         ACTIVITIES
    ====================================================== --}}

    <div class="section-card">

        <div class="section-header">

            <div>

                <h2>
                    Activities
                </h2>

                <p>
                    Riwayat aktivitas dari seluruh opportunity customer.
                </p>

            </div>


            @if($customer->opportunities->count() > 0)

                <a
                    href="{{ route(
                        'activities.create',
                        [
                            'opportunity_id'
                            => $customer->opportunities->first()->id
                        ]
                    ) }}"
                    class="btn btn-primary"
                >
                    + Activity
                </a>

            @endif

        </div>


        @if($activities->count() > 0)

            <div class="activity-list">

                @foreach($activities as $activity)

                    @php

                        $activityType =
                            strtolower(
                                $activity->type ?? ''
                            );

                        if (
                            $activityType === 'telepon' ||
                            $activityType === 'call'
                        ) {

                            $activityIcon = '☎';

                        } elseif (
                            $activityType === 'email'
                        ) {

                            $activityIcon = '✉';

                        } elseif (
                            $activityType === 'meeting'
                        ) {

                            $activityIcon = '◆';

                        } elseif (
                            $activityType === 'follow up'
                        ) {

                            $activityIcon = '↻';

                        } elseif (
                            $activityType === 'pembahasan harga'
                        ) {

                            $activityIcon = 'Rp';

                        } else {

                            $activityIcon = '•';

                        }


                        $activityStatus =
                            strtolower(
                                $activity->status ?? ''
                            );

                        if (
                            $activityStatus === 'planned'
                        ) {

                            $activityStatusClass =
                                'status-planned';

                        } elseif (
                            $activityStatus === 'done'
                        ) {

                            $activityStatusClass =
                                'status-done';

                        } elseif (
                            $activityStatus === 'cancelled'
                        ) {

                            $activityStatusClass =
                                'status-cancelled';

                        } else {

                            $activityStatusClass =
                                'status-default';

                        }

                    @endphp


                    <a
                        href="{{ route(
                            'activities.show',
                            $activity
                        ) }}"
                        class="activity-link"
                    >

                        <div class="activity-item">


                            <div class="activity-icon">

                                {{ $activityIcon }}

                            </div>


                            <div>

                                <div class="activity-subject">

                                    {{ $activity->subject }}

                                </div>


                                <div class="activity-meta">

                                    {{ $activity->type ?? '-' }}

                                    ·

                                    {{ $activity->opportunity->name ?? '-' }}

                                    ·

                                    @if($activity->activity_date)

                                        {{ \Illuminate\Support\Carbon::parse(
                                            $activity->activity_date
                                        )->format('d/m/Y H:i') }}

                                    @else

                                        -

                                    @endif

                                </div>

                            </div>


                            <span
                                class="activity-status {{ $activityStatusClass }}"
                            >

                                {{ ucfirst(
                                    $activityStatus ?: '-'
                                ) }}

                            </span>


                        </div>

                    </a>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    ◷
                </div>

                Belum ada activity untuk customer ini.

            </div>

        @endif

    </div>


</div>

@endsection