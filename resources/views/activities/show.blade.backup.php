@extends('layouts.app')

@section('title', 'Detail Aktivitas')
@section('page-title', 'Detail Aktivitas')

@section('styles')

<style>

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
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-secondary {
        background: #f3f4f6;
        color: #374151;
    }

    .detail-card {
        background: white;
        max-width: 850px;
        padding: 30px;
        border-radius: 14px;
        border: 1px solid #eef0f3;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .activity-header {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-bottom: 25px;
        margin-bottom: 25px;
        border-bottom: 1px solid #e5e7eb;
    }

    .activity-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #dbeafe;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
    }

    .activity-header h2 {
        color: #111827;
        margin-bottom: 5px;
    }

    .activity-header p {
        color: #6b7280;
        font-size: 13px;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 20px;
        padding: 14px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .detail-label {
        color: #6b7280;
        font-size: 13px;
        font-weight: 600;
    }

    .detail-value {
        color: #111827;
        font-size: 14px;
    }

    .type {
        color: #2563eb;
        font-weight: 700;
    }

    .badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .planned {
        background: #fef3c7;
        color: #92400e;
    }

    .done {
        background: #dcfce7;
        color: #166534;
    }

    .cancelled {
        background: #fee2e2;
        color: #991b1b;
    }

    .actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    @media(max-width: 600px) {

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .detail-row {
            grid-template-columns: 1fr;
            gap: 5px;
        }

    }

</style>

@endsection


@section('content')

<div class="page-header">

    <h1>
        Detail Aktivitas
    </h1>

    <a
        href="{{ route('activities.index') }}"
        class="btn btn-secondary"
    >
        ← Kembali
    </a>

</div>


<div class="detail-card">

    <div class="activity-header">

        <div class="activity-icon">
            📅
        </div>

        <div>

            <h2>
                {{ $activity->subject }}
            </h2>

            <p>
                {{ $activity->opportunity->name ?? '-' }}
            </p>

        </div>

    </div>


    <div class="detail-row">

        <div class="detail-label">
            Jenis Aktivitas
        </div>

        <div class="detail-value type">
            {{ strtoupper($activity->type) }}
        </div>

    </div>


    <div class="detail-row">

        <div class="detail-label">
            Judul Aktivitas
        </div>

        <div class="detail-value">
            {{ $activity->subject }}
        </div>

    </div>


    <div class="detail-row">

        <div class="detail-label">
            Opportunity
        </div>

        <div class="detail-value">
            {{ $activity->opportunity->name ?? '-' }}
        </div>

    </div>


    <div class="detail-row">

        <div class="detail-label">
            Customer
        </div>

        <div class="detail-value">

            {{ $activity->opportunity->customer->name ?? '-' }}

        </div>

    </div>


    <div class="detail-row">

        <div class="detail-label">
            Tanggal & Waktu
        </div>

        <div class="detail-value">

            {{ $activity->activity_date
                ? $activity->activity_date->format(
                    'd/m/Y H:i'
                )
                : '-'
            }}

        </div>

    </div>


    <div class="detail-row">

        <div class="detail-label">
            Status
        </div>

        <div class="detail-value">

            <span class="badge {{ $activity->status }}">
                {{ ucfirst($activity->status) }}
            </span>

        </div>

    </div>


    <div class="detail-row">

        <div class="detail-label">
            Catatan
        </div>

        <div class="detail-value">

            {!! nl2br(
                e($activity->notes ?? '-')
            ) !!}

        </div>

    </div>


    <div class="detail-row">

        <div class="detail-label">
            Dibuat
        </div>

        <div class="detail-value">

            {{ $activity->created_at
                ? $activity->created_at->format(
                    'd/m/Y H:i'
                )
                : '-'
            }}

        </div>

    </div>


    <div class="actions">

        <a
            href="{{ route(
                'activities.edit',
                $activity
            ) }}"
            class="btn btn-primary"
        >
            Edit Aktivitas
        </a>

        <a
            href="{{ route(
                'opportunities.show',
                $activity->opportunity_id
            ) }}"
            class="btn btn-secondary"
        >
            Lihat Opportunity
        </a>

    </div>

</div>

@endsection