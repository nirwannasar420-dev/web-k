@extends('layouts.app')

@section('content')

<style>
    .activity-detail-page {
        padding: 28px 30px 40px;
        width: 100%;
        box-sizing: border-box;
    }

    .activity-detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .activity-title h1 {
        margin: 0;
        color: #0B2A6F;
        font-size: 26px;
        font-weight: 700;
    }

    .activity-title p {
        margin: 7px 0 0;
        color: #8992a3;
        font-size: 14px;
    }

    .header-actions {
        display: flex;
        gap: 10px;
    }

    .btn-detail {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 42px;
        padding: 0 17px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        box-sizing: border-box;
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
        background: #f7f8fa;
        color: #0B2A6F;
    }

    .detail-layout {
        display: grid;
        grid-template-columns: minmax(0, 2fr) minmax(280px, 1fr);
        gap: 22px;
        align-items: start;
    }

    .detail-card {
        background: #fff;
        border: 1px solid #e7eaf0;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
        padding: 25px;
        box-sizing: border-box;
        margin-bottom: 22px;
    }

    .detail-card:last-child {
        margin-bottom: 0;
    }

    .main-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        padding-bottom: 22px;
        margin-bottom: 22px;
        border-bottom: 1px solid #eef0f4;
    }

    .activity-type {
        display: inline-flex;
        padding: 6px 11px;
        background: #eaf0ff;
        color: #0B2A6F;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .activity-subject {
        margin: 0;
        color: #1d2739;
        font-size: 22px;
        font-weight: 700;
        word-break: break-word;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 12px;
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

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .info-box {
        padding: 15px;
        background: #f7f8fa;
        border: 1px solid #edf0f4;
        border-radius: 12px;
        min-height: 75px;
        box-sizing: border-box;
    }

    .info-label {
        color: #8992a3;
        font-size: 12px;
        margin-bottom: 7px;
    }

    .info-value {
        color: #243047;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    .section-title {
        margin: 0;
        color: #1d2739;
        font-size: 17px;
        font-weight: 700;
    }

    .section-subtitle {
        margin: 5px 0 18px;
        color: #8992a3;
        font-size: 12px;
    }

    .notes-box {
        background: #f7f8fa;
        border: 1px solid #edf0f4;
        border-radius: 12px;
        padding: 17px;
        color: #374151;
        font-size: 14px;
        line-height: 1.7;
        min-height: 80px;
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
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf0ff;
        color: #0B2A6F;
        font-size: 18px;
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

    .side-item {
        margin-bottom: 16px;
    }

    .side-label {
        color: #8992a3;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .side-value {
        color: #243047;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    .side-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 42px;
        margin-top: 20px;
        border-radius: 10px;
        background: #0B2A6F;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .side-link:hover {
        background: #09235d;
        color: #fff;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    @media (max-width: 950px) {
        .detail-layout {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 650px) {
        .activity-detail-page {
            padding: 20px 15px 30px;
        }

        .activity-detail-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-actions {
            width: 100%;
        }

        .btn-detail {
            flex: 1;
        }

        .main-card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


@php
    $status = strtolower($activity->status ?? '');

    if ($status === 'planned') {
        $statusClass = 'status-planned';
    } elseif ($status === 'done') {
        $statusClass = 'status-done';
    } elseif ($status === 'cancelled') {
        $statusClass = 'status-cancelled';
    } else {
        $statusClass = 'status-default';
    }
@endphp


<div class="activity-detail-page">

    {{-- HEADER --}}
    <div class="activity-detail-header">

        <div class="activity-title">

            <h1>Detail Aktivitas</h1>

            <p>
                Informasi lengkap aktivitas CRM
            </p>

        </div>


        <div class="header-actions">

            <a href="{{ route('activities.edit', $activity->id) }}"
               class="btn-detail btn-edit">
                ✎ Edit
            </a>

            <a href="{{ route('activities.index') }}"
               class="btn-detail btn-back">
                ← Kembali
            </a>

        </div>

    </div>


    <div class="detail-layout">

        {{-- KOLOM UTAMA --}}
        <div>

            {{-- DETAIL ACTIVITY --}}
            <div class="detail-card">

                <div class="main-card-header">

                    <div>

                        <div class="activity-type">
                            {{ $activity->type ?? 'Aktivitas' }}
                        </div>

                        <h2 class="activity-subject">
                            {{ $activity->subject }}
                        </h2>

                    </div>


                    <span class="status-badge {{ $statusClass }}">
                        {{ ucfirst($status ?: '-') }}
                    </span>

                </div>


                <div class="info-grid">

                    {{-- TYPE --}}
                    <div class="info-box">

                        <div class="info-label">
                            Jenis Aktivitas
                        </div>

                        <div class="info-value">
                            {{ $activity->type ?? '-' }}
                        </div>

                    </div>


                    {{-- SUBJECT --}}
                    <div class="info-box">

                        <div class="info-label">
                            Judul Aktivitas
                        </div>

                        <div class="info-value">
                            {{ $activity->subject }}
                        </div>

                    </div>


                    {{-- TANGGAL --}}
                    <div class="info-box">

                        <div class="info-label">
                            Tanggal & Waktu
                        </div>

                        <div class="info-value">

                            @if($activity->activity_date)

                                {{ \Illuminate\Support\Carbon::parse($activity->activity_date)->format('d/m/Y H:i') }}

                            @else

                                -

                            @endif

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div class="info-box">

                        <div class="info-label">
                            Status
                        </div>

                        <div class="info-value">
                            {{ ucfirst($status ?: '-') }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- OPPORTUNITY --}}
            <div class="detail-card">

                <h3 class="section-title">
                    Opportunity Terkait
                </h3>

                <p class="section-subtitle">
                    Opportunity yang menjadi tujuan aktivitas ini
                </p>


                @if($activity->opportunity)

                    <div class="info-grid">

                        <div class="info-box">

                            <div class="info-label">
                                Nama Opportunity
                            </div>

                            <div class="info-value">
                                {{ $activity->opportunity->name }}
                            </div>

                        </div>


                        <div class="info-box">

                            <div class="info-label">
                                Customer
                            </div>

                            <div class="info-value">
                                {{ $activity->opportunity->customer->name ?? '-' }}
                            </div>

                        </div>


                        <div class="info-box">

                            <div class="info-label">
                                Stage
                            </div>

                            <div class="info-value">
                                {{ $activity->opportunity->stage->name ?? '-' }}
                            </div>

                        </div>


                        <div class="info-box">

                            <div class="info-label">
                                Expected Revenue
                            </div>

                            <div class="info-value">

                                Rp{{ number_format($activity->opportunity->expected_revenue, 0, ',', '.') }}

                            </div>

                        </div>

                    </div>

                @else

                    <div class="notes-box">
                        Opportunity tidak ditemukan.
                    </div>

                @endif

            </div>

        </div>


        {{-- SIDEBAR --}}
        <div>

            {{-- CUSTOMER --}}
            <div class="detail-card">

                <div class="side-heading">

                    <div class="side-icon">
                        ◉
                    </div>

                    <div>

                        <h2>
                            Customer
                        </h2>

                        <p>
                            Customer terkait aktivitas
                        </p>

                    </div>

                </div>


                @if($activity->opportunity && $activity->opportunity->customer)

                    <div class="side-item">

                        <div class="side-label">
                            Nama
                        </div>

                        <div class="side-value">
                            {{ $activity->opportunity->customer->name }}
                        </div>

                    </div>


                    <div class="side-item">

                        <div class="side-label">
                            Perusahaan
                        </div>

                        <div class="side-value">
                            {{ $activity->opportunity->customer->company ?? '-' }}
                        </div>

                    </div>


                    @if(!empty($activity->opportunity->customer->email))

                        <div class="side-item">

                            <div class="side-label">
                                Email
                            </div>

                            <div class="side-value">
                                {{ $activity->opportunity->customer->email }}
                            </div>

                        </div>

                    @endif


                    @if(!empty($activity->opportunity->customer->phone))

                        <div class="side-item">

                            <div class="side-label">
                                Telepon
                            </div>

                            <div class="side-value">
                                {{ $activity->opportunity->customer->phone }}
                            </div>

                        </div>

                    @endif


                    <a href="{{ route('customers.show', $activity->opportunity->customer->id) }}"
                       class="side-link">
                        Lihat Customer →
                    </a>

                @else

                    <div class="notes-box">
                        Customer tidak tersedia.
                    </div>

                @endif

            </div>


            {{-- RINGKASAN --}}
            <div class="detail-card">

                <div class="side-heading">

                    <div class="side-icon">
                        ✓
                    </div>

                    <div>

                        <h2>
                            Ringkasan
                        </h2>

                        <p>
                            Ringkasan aktivitas
                        </p>

                    </div>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Jenis
                    </span>

                    <span class="summary-value">
                        {{ $activity->type ?? '-' }}
                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Status
                    </span>

                    <span class="summary-value">
                        {{ ucfirst($status ?: '-') }}
                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Opportunity
                    </span>

                    <span class="summary-value">

                        {{ $activity->opportunity->name ?? '-' }}

                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Customer
                    </span>

                    <span class="summary-value">

                        {{ $activity->opportunity->customer->name ?? '-' }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection