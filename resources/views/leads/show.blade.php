@extends('layouts.app')
@php
    use App\Models\Opportunity;
@endphp
@section('title', 'Detail Lead')
@section('page-title', 'Detail Lead')

@section('styles')

<style>

    .lead-detail-page {
        width: 100%;
        padding: 0;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .lead-detail-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
    }

    .lead-detail-title h1 {
        margin: 0 0 6px;
        color: #0B2A6F;
        font-size: 27px;
        font-weight: 700;
    }

    .lead-detail-title p {
        margin: 0;
        color: #6B7280;
        font-size: 13px;
    }

    .header-actions {
        display: flex;
        gap: 9px;
    }

    .btn-detail {
        min-height: 41px;
        padding: 0 16px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        box-sizing: border-box;
    }

    .btn-edit {
        background: #E30613;
        color: #FFFFFF;
    }

    .btn-edit:hover {
        background: #C80511;
        color: #FFFFFF;
    }

    .btn-back {
        background: #FFFFFF;
        color: #0B2A6F;
        border: 1px solid #DDE1E6;
    }

    .btn-back:hover {
        background: #F7F8FA;
        color: #0B2A6F;
    }


    /* =========================================================
       LAYOUT
    ========================================================= */

    .lead-detail-grid {
        display: grid;
        grid-template-columns: minmax(0, 2fr) minmax(280px, 1fr);
        gap: 20px;
        align-items: start;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .lead-card {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 3px 12px rgba(0,0,0,.04);
        box-sizing: border-box;
        margin-bottom: 20px;
    }

    .lead-card:last-child {
        margin-bottom: 0;
    }


    /* =========================================================
       PROFILE HEADER
    ========================================================= */

    .lead-profile-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 18px;
        padding-bottom: 20px;
        margin-bottom: 20px;
        border-bottom: 1px solid #EEF0F3;
    }

    .lead-profile {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }

    .lead-avatar-large {
        width: 53px;
        height: 53px;
        flex-shrink: 0;
        border-radius: 14px;
        background: #EAF0FF;
        color: #0B2A6F;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 700;
    }

    .lead-profile-text {
        min-width: 0;
    }

    .lead-profile-label {
        color: #98A2B3;
        font-size: 10px;
        margin-bottom: 4px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .lead-profile-name {
        color: #1F2937;
        font-size: 21px;
        line-height: 1.3;
        font-weight: 700;
        word-break: break-word;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        border-radius: 20px;
        font-size: 11px;
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
       INFO GRID
    ========================================================= */

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .info-box {
        min-height: 76px;
        padding: 15px;
        background: #F8F9FA;
        border: 1px solid #EDF0F4;
        border-radius: 12px;
        box-sizing: border-box;
    }

    .info-label {
        margin-bottom: 7px;
        color: #98A2B3;
        font-size: 11px;
    }

    .info-value {
        color: #344054;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .section-heading {
        margin-bottom: 18px;
    }

    .section-heading h2 {
        margin: 0;
        color: #1F2937;
        font-size: 17px;
        font-weight: 700;
    }

    .section-heading p {
        margin: 5px 0 0;
        color: #98A2B3;
        font-size: 12px;
    }


    /* =========================================================
       CONVERSION
    ========================================================= */

    .conversion-box {
        padding: 17px;
        border: 1px solid #E5E7EB;
        border-radius: 12px;
        background: #F8FAFC;
    }

    .conversion-title {
        margin-bottom: 13px;
        color: #1F2937;
        font-size: 13px;
        font-weight: 700;
    }

    .conversion-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        padding: 11px 0;
        border-bottom: 1px solid #E5E7EB;
    }

    .conversion-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .conversion-label {
        color: #7A8494;
        font-size: 12px;
    }

    .conversion-value {
        color: #243047;
        font-size: 13px;
        font-weight: 700;
        text-align: right;
    }

    .conversion-link {
        color: #0B2A6F;
        text-decoration: none;
    }

    .conversion-link:hover {
        color: #E30613;
        text-decoration: underline;
    }

    .not-converted {
        padding: 15px;
        border-radius: 11px;
        background: #F8F9FA;
        border: 1px dashed #D7DCE3;
        color: #7A8494;
        font-size: 12px;
    }


    /* =========================================================
       SIDE CARD
    ========================================================= */

    .side-heading {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 20px;
    }

    .side-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #EAF0FF;
        color: #0B2A6F;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
    }

    .side-heading h2 {
        margin: 0;
        color: #1F2937;
        font-size: 17px;
        font-weight: 700;
    }

    .side-heading p {
        margin: 4px 0 0;
        color: #98A2B3;
        font-size: 11px;
    }

    .side-item {
        margin-bottom: 16px;
    }

    .side-label {
        margin-bottom: 5px;
        color: #98A2B3;
        font-size: 11px;
    }

    .side-value {
        color: #344054;
        font-size: 13px;
        font-weight: 600;
        word-break: break-word;
    }


    /* =========================================================
       SUMMARY
    ========================================================= */

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 11px 0;
        border-bottom: 1px solid #EEF0F3;
    }

    .summary-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .summary-label {
        color: #7A8494;
        font-size: 12px;
    }

    .summary-value {
        color: #243047;
        font-size: 13px;
        font-weight: 700;
        text-align: right;
    }


    /* =========================================================
       CONVERT BUTTON
    ========================================================= */

    .btn-convert {
        width: 100%;
        min-height: 42px;
        margin-top: 10px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        background: #0B2A6F;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-convert:hover {
        background: #09235D;
        color: #FFFFFF;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .lead-detail-grid {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 650px) {

        .lead-detail-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-actions {
            width: 100%;
        }

        .btn-detail {
            flex: 1;
        }

        .lead-profile-header {
            flex-direction: column;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .lead-card {
            padding: 18px;
        }

    }

</style>

@endsection


@section('content')

@php

    $leadStatus = strtolower($lead->status ?? '');

    if ($leadStatus === 'new') {

        $statusClass = 'status-new';

    } elseif ($leadStatus === 'contacted') {

        $statusClass = 'status-contacted';

    } elseif ($leadStatus === 'qualified') {

        $statusClass = 'status-qualified';

    } elseif ($leadStatus === 'converted') {

        $statusClass = 'status-converted';

    } elseif ($leadStatus === 'lost') {

        $statusClass = 'status-lost';

    } else {

        $statusClass = 'status-default';

    }

@endphp


<div class="lead-detail-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="lead-detail-header">

        <div class="lead-detail-title">

            <h1>
                Detail Lead
            </h1>

            <p>
                Informasi lengkap mengenai calon pelanggan.
            </p>

        </div>


        <div class="header-actions">

            <a
                href="{{ route('leads.edit', $lead) }}"
                class="btn-detail btn-edit"
            >
                ✎ Edit
            </a>


            <a
                href="{{ route('leads.index') }}"
                class="btn-detail btn-back"
            >
                ← Kembali
            </a>

        </div>

    </div>


    <div class="lead-detail-grid">


        {{-- =================================================
             KOLOM KIRI
        ================================================== --}}

        <div>


            {{-- DATA LEAD --}}

            <div class="lead-card">

                <div class="lead-profile-header">


                    <div class="lead-profile">

                        <div class="lead-avatar-large">

                            {{ strtoupper(
                                substr(
                                    $lead->name ?? '-',
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        <div class="lead-profile-text">

                            <div class="lead-profile-label">
                                Lead
                            </div>

                            <div class="lead-profile-name">

                                {{ $lead->name }}

                            </div>

                        </div>

                    </div>


                    <span class="status-badge {{ $statusClass }}">

                        {{ ucfirst($leadStatus ?: '-') }}

                    </span>


                </div>


                <div class="info-grid">


                    {{-- NAMA --}}

                    <div class="info-box">

                        <div class="info-label">
                            Nama Lead
                        </div>

                        <div class="info-value">

                            {{ $lead->name }}

                        </div>

                    </div>


                    {{-- CONTACT --}}

                    <div class="info-box">

                        <div class="info-label">
                            Nama Kontak
                        </div>

                        <div class="info-value">

                            {{ $lead->contact_name ?? '-' }}

                        </div>

                    </div>


                    {{-- EMAIL --}}

                    <div class="info-box">

                        <div class="info-label">
                            Email
                        </div>

                        <div class="info-value">

                            {{ $lead->email ?? '-' }}

                        </div>

                    </div>


                    {{-- SOURCE --}}

                    <div class="info-box">

                        <div class="info-label">
                            Sumber Lead
                        </div>

                        <div class="info-value">

                            {{ $lead->source ?? '-' }}

                        </div>

                    </div>


                    {{-- STATUS --}}

                    <div class="info-box">

                        <div class="info-label">
                            Status
                        </div>

                        <div class="info-value">

                            {{ ucfirst($leadStatus ?: '-') }}

                        </div>

                    </div>


                </div>

            </div>


            {{-- HASIL KONVERSI --}}

            @if($lead->customer)

                <div class="lead-card">


                    <div class="section-heading">

                        <h2>
                            Hasil Konversi
                        </h2>

                        <p>
                            Data yang terbentuk setelah Lead dikonversi.
                        </p>

                    </div>


                    <div class="conversion-box">


                        <div class="conversion-title">
                            Lead berhasil dikonversi
                        </div>


                        {{-- CUSTOMER --}}

                        <div class="conversion-row">

                            <span class="conversion-label">
                                Customer
                            </span>

                            <span class="conversion-value">

                                <a
                                    href="{{ route(
                                        'customers.show',
                                        $lead->customer
                                    ) }}"
                                    class="conversion-link"
                                >

                                    {{ $lead->customer->name }}

                                </a>

                            </span>

                        </div>


                        {{-- PERUSAHAAN --}}

                        <div class="conversion-row">

                            <span class="conversion-label">
                                Perusahaan
                            </span>

                            <span class="conversion-value">

                                {{ $lead->customer->company ?? '-' }}

                            </span>

                        </div>


                        {{-- OPPORTUNITY --}}

                        @php

                            $convertedOpportunity =
                                \App\Models\Opportunity::where(
                                    'customer_id',
                                    $lead->customer->id
                                )
                                ->latest()
                                ->first();

                        @endphp


                        <div class="conversion-row">

                            <span class="conversion-label">
                                Opportunity
                            </span>

                            <span class="conversion-value">

                                @if($convertedOpportunity)

                                    <a
                                        href="{{ route(
                                            'opportunities.show',
                                            $convertedOpportunity
                                        ) }}"
                                        class="conversion-link"
                                    >

                                        {{ $convertedOpportunity->name }}

                                    </a>

                                @else

                                    -

                                @endif

                            </span>

                        </div>

                    </div>

                </div>

            @else

                <div class="lead-card">


                    <div class="section-heading">

                        <h2>
                            Hasil Konversi
                        </h2>

                        <p>
                            Lead ini belum dikonversi menjadi Customer.
                        </p>

                    </div>


                    <div class="not-converted">

                        Belum ada Customer atau Opportunity hasil konversi.

                    </div>


                </div>

            @endif


        </div>


        {{-- =================================================
             KOLOM KANAN
        ================================================== --}}

        <div>


            {{-- INFORMASI KONTAK --}}

            <div class="lead-card">

                <div class="side-heading">

                    <div class="side-icon">
                        ●
                    </div>

                    <div>

                        <h2>
                            Informasi Kontak
                        </h2>

                        <p>
                            Data kontak Lead
                        </p>

                    </div>

                </div>


                <div class="side-item">

                    <div class="side-label">
                        Nama Kontak
                    </div>

                    <div class="side-value">

                        {{ $lead->contact_name ?? '-' }}

                    </div>

                </div>


                <div class="side-item">

                    <div class="side-label">
                        Email
                    </div>

                    <div class="side-value">

                        {{ $lead->email ?? '-' }}

                    </div>

                </div>


                <div class="side-item">

                    <div class="side-label">
                        Sumber Lead
                    </div>

                    <div class="side-value">

                        {{ $lead->source ?? '-' }}

                    </div>

                </div>


            </div>


            {{-- RINGKASAN --}}

            <div class="lead-card">

                <div class="side-heading">

                    <div class="side-icon">
                        ✓
                    </div>

                    <div>

                        <h2>
                            Ringkasan
                        </h2>

                        <p>
                            Status Lead saat ini
                        </p>

                    </div>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Status
                    </span>

                    <span class="status-badge {{ $statusClass }}">

                        {{ ucfirst($leadStatus ?: '-') }}

                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Sumber
                    </span>

                    <span class="summary-value">

                        {{ $lead->source ?? '-' }}

                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-label">
                        Customer
                    </span>

                    <span class="summary-value">

                        {{ $lead->customer ? 'Sudah' : 'Belum' }}

                    </span>

                </div>


                @if(
                    strtolower($lead->status ?? '') !== 'converted'
                    && strtolower($lead->status ?? '') !== 'lost'
                )

                    <a
                        href="{{ route(
                            'leads.convert.form',
                            $lead
                        ) }}"
                        class="btn-convert"
                    >

                        Convert Lead

                    </a>

                @endif


            </div>


        </div>

    </div>

</div>

@endsection