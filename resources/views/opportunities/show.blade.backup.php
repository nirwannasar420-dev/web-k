@extends('layouts.app')

@section('title', 'Detail Opportunity')
@section('page-title', 'Detail Opportunity')

@section('content')

<style>
    .opportunity-page {
        width: 100%;
        padding: 28px 30px 40px;
        box-sizing: border-box;
    }

    .opportunity-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 26px;
    }

    .opportunity-title h1 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #0B2A6F;
    }

    .opportunity-title p {
        margin: 7px 0 0;
        color: #7b8494;
        font-size: 14px;
    }

    .opportunity-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-opportunity {
        text-decoration: none;
        border: none;
        padding: 10px 17px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: 0.2s;
    }

    .btn-edit {
        background: #E30613;
        color: #fff;
    }

    .btn-edit:hover {
        background: #c80511;
        color: #fff;
    }

    .btn-back {
        background: #fff;
        color: #0B2A6F;
        border: 1px solid #dfe3ea;
    }

    .btn-back:hover {
        background: #f5f7fb;
        color: #0B2A6F;
    }

    .opportunity-grid {
        display: grid;
        grid-template-columns: minmax(0, 2fr) minmax(290px, 1fr);
        gap: 22px;
        align-items: start;
    }

    .opportunity-card {
        background: #fff;
        border: 1px solid #e7eaf0;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        box-sizing: border-box;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 24px;
    }

    .card-header-left {
        min-width: 0;
    }

    .small-label {
        color: #8992a3;
        font-size: 12px;
        margin-bottom: 6px;
    }

    .opportunity-name {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #1d2739;
        word-break: break-word;
    }

    .stage-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .stage-prospect {
        background: #eaf0ff;
        color: #0B2A6F;
    }

    .stage-qualified {
        background: #e7f1ff;
        color: #1769aa;
    }

    .stage-proposition {
        background: #fff0df;
        color: #c15b00;
    }

    .stage-won {
        background: #e7f7ef;
        color: #16794c;
    }

    .stage-lost {
        background: #fde9ec;
        color: #c82d3a;
    }

    .stage-default {
        background: #f0f2f5;
        color: #626b78;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .detail-box {
        background: #f7f8fa;
        border: 1px solid #edf0f4;
        border-radius: 12px;
        padding: 16px;
        min-height: 77px;
        box-sizing: border-box;
    }

    .detail-box.full {
        grid-column: 1 / -1;
    }

    .detail-label {
        font-size: 12px;
        color: #8992a3;
        margin-bottom: 8px;
    }

    .detail-value {
        color: #243047;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    .revenue-value {
        font-size: 20px;
        color: #0B2A6F;
        font-weight: 700;
    }

    .stars {
        display: flex;
        align-items: center;
        gap: 2px;
        font-size: 18px;
    }

    .star-filled {
        color: #f5b301;
    }

    .star-empty {
        color: #d5d8de;
    }

    .rating-number {
        color: #6f7785;
        font-size: 13px;
        margin-left: 7px;
    }

    .notes-section {
        margin-top: 22px;
    }

    .section-title {
        margin: 0;
        font-size: 17px;
        color: #1d2739;
        font-weight: 700;
    }

    .section-subtitle {
        margin: 5px 0 0;
        color: #8992a3;
        font-size: 13px;
    }

    .notes-box {
        margin-top: 15px;
        background: #f7f8fa;
        border: 1px solid #edf0f4;
        border-radius: 12px;
        padding: 16px;
        color: #374151;
        font-size: 14px;
        line-height: 1.7;
        white-space: pre-line;
        min-height: 70px;
    }

    .customer-card {
        margin-bottom: 22px;
    }

    .side-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .side-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #eaf0ff;
        color: #0B2A6F;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .side-heading h2 {
        margin: 0;
        color: #1d2739;
        font-size: 17px;
        font-weight: 700;
    }

    .side-heading p {
        margin: 4px 0 0;
        color: #8992a3;
        font-size: 12px;
    }

    .customer-item {
        margin-bottom: 16px;
    }

    .customer-label {
        color: #8992a3;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .customer-value {
        color: #243047;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    .customer-link {
        width: 100%;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        margin-top: 20px;
        padding: 11px 14px;
        background: #0B2A6F;
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
    }

    .customer-link:hover {
        background: #09235d;
        color: #fff;
    }

    .summary-card {
        margin-bottom: 22px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 12px 0;
        border-bottom: 1px solid #eef0f4;
        font-size: 13px;
    }

    .summary-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .summary-label {
        color: #8992a3;
    }

    .summary-value {
        color: #243047;
        font-weight: 600;
        text-align: right;
    }

    .activity-card {
        margin-top: 22px;
    }

    .activity-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .activity-count {
        background: #eaf0ff;
        color: #0B2A6F;
        padding: 7px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .activity-item {
        border: 1px solid #e8ebef;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 12px;
        background: #fff;
    }

    .activity-item:last-child {
        margin-bottom: 0;
    }

    .activity-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
    }

    .activity-subject {
        color: #243047;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .activity-description {
        color: #737d8d;
        font-size: 13px;
        line-height: 1.6;
    }

    .activity-status {
        background: #f1f3f6;
        color: #5f6876;
        padding: 5px 9px;
        border-radius: 15px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .activity-date {
        color: #8992a3;
        font-size: 12px;
        margin-top: 10px;
    }

    .empty-state {
        text-align: center;
        padding: 30px 15px;
        color: #8992a3;
    }

    .empty-icon {
        font-size: 35px;
        margin-bottom: 8px;
        color: #b5bbc5;
    }

    .empty-title {
        color: #475166;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .empty-text {
        font-size: 12px;
    }

    @media (max-width: 1000px) {
        .opportunity-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {
        .opportunity-page {
            padding: 20px 15px 30px;
        }

        .opportunity-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .opportunity-actions {
            width: 100%;
        }

        .btn-opportunity {
            flex: 1;
            justify-content: center;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .detail-box.full {
            grid-column: auto;
        }

        .card-header,
        .activity-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

@php
    $stageName = strtolower($opportunity->stage->name ?? '');

    if ($stageName === 'prospect') {
        $stageClass = 'stage-prospect';
    } elseif ($stageName === 'qualified') {
        $stageClass = 'stage-qualified';
    } elseif ($stageName === 'proposition') {
        $stageClass = 'stage-proposition';
    } elseif ($stageName === 'won') {
        $stageClass = 'stage-won';
    } elseif ($stageName === 'lost') {
        $stageClass = 'stage-lost';
    } else {
        $stageClass = 'stage-default';
    }
@endphp

<div class="opportunity-page">

    {{-- HEADER --}}
    <div class="opportunity-header">

        <div class="opportunity-title">
            <h1>Detail Opportunity</h1>

            <p>
                Informasi lengkap mengenai opportunity
            </p>
        </div>

        <div class="opportunity-actions">

            <a href="{{ route('opportunities.edit', $opportunity->id) }}"
               class="btn-opportunity btn-edit">
                ✎ Edit
            </a>

            <a href="{{ route('opportunities.index') }}"
               class="btn-opportunity btn-back">
                ← Kembali
            </a>

        </div>

    </div>


    {{-- CONTENT GRID --}}
    <div class="opportunity-grid">

        {{-- KOLOM KIRI --}}
        <div>

            {{-- DETAIL UTAMA --}}
            <div class="opportunity-card">

                <div class="card-header">

                    <div class="card-header-left">

                        <div class="small-label">
                            OPPORTUNITY
                        </div>

                        <h2 class="opportunity-name">
                            {{ $opportunity->name }}
                        </h2>

                    </div>

                    <span class="stage-badge {{ $stageClass }}">
                        {{ $opportunity->stage->name ?? '-' }}
                    </span>

                </div>


                <div class="detail-grid">

                    {{-- Nama --}}
                    <div class="detail-box">

                        <div class="detail-label">
                            Nama Opportunity
                        </div>

                        <div class="detail-value">
                            {{ $opportunity->name }}
                        </div>

                    </div>


                    {{-- Stage --}}
                    <div class="detail-box">

                        <div class="detail-label">
                            Stage
                        </div>

                        <div class="detail-value">
                            {{ $opportunity->stage->name ?? '-' }}
                        </div>

                    </div>


                    {{-- Revenue --}}
                    <div class="detail-box">

                        <div class="detail-label">
                            Expected Revenue
                        </div>

                        <div class="revenue-value">
                            Rp{{ number_format($opportunity->expected_revenue, 0, ',', '.') }}
                        </div>

                    </div>


                    {{-- Rating --}}
                    <div class="detail-box">

                        <div class="detail-label">
                            Rating
                        </div>

                        <div class="stars">

                            @for($i = 1; $i <= 5; $i++)

                                @if($i <= $opportunity->rating)
                                    <span class="star-filled">★</span>
                                @else
                                    <span class="star-empty">★</span>
                                @endif

                            @endfor

                            <span class="rating-number">
                                {{ $opportunity->rating }}/5
                            </span>

                        </div>

                    </div>


                    {{-- Tanggal --}}
                    <div class="detail-box">

                        <div class="detail-label">
                            Tanggal Opportunity
                        </div>

                        <div class="detail-value">

                            @if($opportunity->opportunity_date)

                                {{ \Illuminate\Support\Carbon::parse($opportunity->opportunity_date)->format('d/m/Y') }}

                            @else
                                -
                            @endif

                        </div>

                    </div>


                    {{-- Customer --}}
                    <div class="detail-box">

                        <div class="detail-label">
                            Customer
                        </div>

                        <div class="detail-value">
                            {{ $opportunity->customer->name ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- NOTES --}}
                <div class="notes-section">

                    <h3 class="section-title">
                        Notes
                    </h3>

                    <p class="section-subtitle">
                        Catatan mengenai opportunity
                    </p>


                    <div class="notes-box">

                        @if($opportunity->notes)

                            {{ $opportunity->notes }}

                        @else

                            <span style="color:#a0a7b3;">
                                Belum ada catatan.
                            </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- AKTIVITAS --}}
            <div class="opportunity-card activity-card">

                <div class="activity-header">

                    <div>

                        <h3 class="section-title">
                            Aktivitas
                        </h3>

                        <p class="section-subtitle">
                            Riwayat aktivitas pada opportunity ini
                        </p>

                    </div>

                    <span class="activity-count">
                        {{ $opportunity->activities->count() }} Aktivitas
                    </span>

                </div>


              @forelse($opportunity->activities as $activity)

    <a href="{{ route('activities.show', $activity->id) }}"
       style="
            display:block;
            text-decoration:none;
            color:inherit;
            border:1px solid #e8ebef;
            border-radius:12px;
            padding:15px;
            margin-bottom:12px;
            background:#fff;
            transition:.2s;
       "
       onmouseover="this.style.background='#f8fafc';"
       onmouseout="this.style.background='#fff';">

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:15px;
        ">

            <div>

                <div style="
                    color:#243047;
                    font-weight:700;
                    font-size:14px;
                    margin-bottom:5px;
                ">
                    {{ $activity->subject }}
                </div>

                <div style="
                    color:#0B2A6F;
                    font-size:12px;
                    font-weight:600;
                ">
                    {{ $activity->type ?? 'Aktivitas' }}
                </div>

            </div>


            @php
                $activityStatus = strtolower($activity->status ?? '');

                if ($activityStatus === 'planned') {
                    $activityStatusBg = '#fff1df';
                    $activityStatusColor = '#b85a00';
                } elseif ($activityStatus === 'done') {
                    $activityStatusBg = '#e8f7ef';
                    $activityStatusColor = '#18784d';
                } elseif ($activityStatus === 'cancelled') {
                    $activityStatusBg = '#fde9ec';
                    $activityStatusColor = '#c52e3d';
                } else {
                    $activityStatusBg = '#f0f2f5';
                    $activityStatusColor = '#667085';
                }
            @endphp


            <span style="
                background:{{ $activityStatusBg }};
                color:{{ $activityStatusColor }};
                padding:6px 10px;
                border-radius:20px;
                font-size:11px;
                font-weight:700;
                white-space:nowrap;
            ">
                {{ ucfirst($activityStatus) }}
            </span>

        </div>


        <div style="
            margin-top:10px;
            color:#8992a3;
            font-size:12px;
        ">

            📅

            @if($activity->activity_date)

                {{ \Illuminate\Support\Carbon::parse($activity->activity_date)->format('d/m/Y H:i') }}

            @else

                -

            @endif

            <span style="float:right;">
                Lihat detail →
            </span>

        </div>

    </a>

@empty

    <div class="empty-state">

        <div class="empty-icon">
            ◷
        </div>

        <div class="empty-title">
            Belum ada aktivitas
        </div>

        <div class="empty-text">
            Belum terdapat aktivitas untuk opportunity ini.
        </div>

    </div>

@endforelse  


            </div>

        </div>


        {{-- KOLOM KANAN --}}
        <div>

            {{-- CUSTOMER --}}
            <div class="opportunity-card customer-card">

                <div class="side-heading">

                    <div class="side-icon">
                        ◉
                    </div>

                    <div>

                        <h2>
                            Customer
                        </h2>

                        <p>
                            Informasi customer
                        </p>

                    </div>

                </div>


                @if($opportunity->customer)

                    <div class="customer-item">

                        <div class="customer-label">
                            Nama
                        </div>

                        <div class="customer-value">
                            {{ $opportunity->customer->name }}
                        </div>

                    </div>


                    <div class="customer-item">

                        <div class="customer-label">
                            Perusahaan
                        </div>

                        <div class="customer-value">
                            {{ $opportunity->customer->company ?? '-' }}
                        </div>

                    </div>


                    @if(!empty($opportunity->customer->email))

                        <div class="customer-item">

                            <div class="customer-label">
                                Email
                            </div>

                            <div class="customer-value">
                                {{ $opportunity->customer->email }}
                            </div>

                        </div>

                    @endif


                    @if(!empty($opportunity->customer->phone))

                        <div class="customer-item">

                            <div class="customer-label">
                                Telepon
                            </div>

                            <div class="customer-value">
                                {{ $opportunity->customer->phone }}
                            </div>

                        </div>

                    @endif


                    <a href="{{ route('customers.show', $opportunity->customer->id) }}"
                       class="customer-link">
                        Lihat Customer →
                    </a>

                @else

                    <div style="color:#8992a3; font-size:13px;">
                        Customer tidak ditemukan.
                    </div>

                @endif

            </div>


            {{-- RINGKASAN --}}
            <div class="opportunity-card summary-card">

                <div class="side-heading">

                    <div class="side-icon">
                        ✓
                    </div>

                    <div>

                        <h2>
                            Ringkasan
                        </h2>

                        <p>
                            Ringkasan opportunity
                        </p>

                    </div>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Stage
                    </span>

                    <span class="summary-value">
                        {{ $opportunity->stage->name ?? '-' }}
                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Revenue
                    </span>

                    <span class="summary-value">
                        Rp{{ number_format($opportunity->expected_revenue, 0, ',', '.') }}
                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Rating
                    </span>

                    <span class="summary-value">
                        {{ $opportunity->rating }}/5
                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Aktivitas
                    </span>

                    <span class="summary-value">
                        {{ $opportunity->activities->count() }}
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection