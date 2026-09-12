@php
    use App\Models\Opportunity;
@endphp

@extends('layouts.app')

@section('title', 'Detail Lead')
@section('page-title', 'Detail Lead')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .lead-detail-page {
        max-width: 1050px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .lead-detail-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .lead-detail-header-left h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
    }

    .lead-detail-header-left p {
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


    .btn-edit {
        background: #E8EEF9;
        color: #0B2A6F;
    }

    .btn-edit:hover {
        background: #D8E3F4;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .detail-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        padding: 28px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);
    }


    /* =========================================================
       PROFILE
    ========================================================= */

    .lead-profile {
        display: flex;
        align-items: center;
        gap: 15px;

        padding-bottom: 22px;
        margin-bottom: 22px;

        border-bottom: 1px solid #E8EAED;
    }


    .lead-profile-avatar {
        width: 58px;
        height: 58px;

        flex-shrink: 0;

        border-radius: 15px;

        background: #E8EEF9;

        color: #0B2A6F;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 19px;

        font-weight: 700;
    }


    .lead-profile-info h2 {
        margin: 0 0 5px;

        color: #202124;

        font-size: 20px;

        font-weight: 700;
    }


    .lead-profile-info p {
        margin: 0;

        color: #5F6368;

        font-size: 12px;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        margin-top: 8px;

        padding: 5px 10px;

        border-radius: 20px;

        font-size: 10px;

        font-weight: 600;
    }


    .status-badge::before {
        content: '';

        width: 5px;
        height: 5px;

        border-radius: 50%;

        background: currentColor;
    }


    .status-new {
        background: #E8EEF9;
        color: #0B2A6F;
    }


    .status-contacted {
        background: #FEF7E0;
        color: #B06000;
    }


    .status-qualified {
        background: #EEE7FF;
        color: #6A1B9A;
    }


    .status-converted {
        background: #E6F4EA;
        color: #137333;
    }


    .status-lost {
        background: #FCE8E6;
        color: #D93025;
    }


    /* =========================================================
       DETAIL GRID
    ========================================================= */

    .detail-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 0 35px;
    }


    .detail-item {
        padding: 15px 0;

        border-bottom: 1px solid #F1F3F4;
    }


    .detail-label {
        margin-bottom: 6px;

        color: #80868B;

        font-size: 10px;

        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .detail-value {
        color: #202124;

        font-size: 13px;

        line-height: 1.5;

        word-break: break-word;
    }


    /* =========================================================
       NOTES
    ========================================================= */

    .notes-section {
        margin-top: 22px;
    }


    .notes-title {
        margin-bottom: 10px;

        color: #202124;

        font-size: 15px;

        font-weight: 700;
    }


    .notes-box {
        min-height: 90px;

        padding: 15px;

        background: #F8F9FA;

        border: 1px solid #E8EAED;

        border-radius: 10px;

        color: #5F6368;

        font-size: 12px;

        line-height: 1.7;
    }


    /* =========================================================
       READY TO CONVERT
    ========================================================= */

    .convert-card {
        margin-top: 25px;

        padding: 20px;

        background: #F1F5FB;

        border: 1px solid #D5E0F1;

        border-radius: 12px;
    }


    .convert-card-title {
        margin-bottom: 6px;

        color: #0B2A6F;

        font-size: 14px;

        font-weight: 700;
    }


    .convert-card-description {
        margin-bottom: 15px;

        color: #5F6368;

        font-size: 12px;

        line-height: 1.6;
    }


    /* =========================================================
       HASIL KONVERSI
    ========================================================= */

    .converted-card {
        margin-top: 25px;

        padding: 20px;

        background: #F4FAF5;

        border: 1px solid #B7E1C3;

        border-radius: 12px;
    }


    .converted-title {
        display: flex;

        align-items: center;

        gap: 8px;

        margin-bottom: 6px;

        color: #137333;

        font-size: 14px;

        font-weight: 700;
    }


    .converted-check {
        width: 20px;
        height: 20px;

        border-radius: 50%;

        background: #E6F4EA;

        color: #188038;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 11px;

        font-weight: 700;
    }


    .converted-description {
        margin-bottom: 18px;

        color: #5F6368;

        font-size: 12px;

        line-height: 1.6;
    }


    /* =========================================================
       CONVERSION FLOW
    ========================================================= */

    .conversion-flow {
        display: grid;

        grid-template-columns: 1fr 35px 1fr;

        align-items: center;

        gap: 10px;
    }


    .conversion-box {
        padding: 16px;

        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 10px;
    }


    .conversion-box-label {
        margin-bottom: 6px;

        color: #80868B;

        font-size: 10px;

        font-weight: 600;

        text-transform: uppercase;
    }


    .conversion-box-name {
        margin-bottom: 4px;

        color: #202124;

        font-size: 14px;

        font-weight: 700;
    }


    .conversion-box-company {
        margin-bottom: 12px;

        color: #5F6368;

        font-size: 11px;
    }


    .conversion-arrow {
        display: flex;

        align-items: center;

        justify-content: center;

        color: #9AA0A6;

        font-size: 20px;
    }


    /* =========================================================
       OPPORTUNITY RESULT
    ========================================================= */

    .opportunity-result {
        margin-top: 15px;

        padding: 16px;

        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 10px;
    }


    .opportunity-result-header {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 12px;

        margin-bottom: 12px;
    }


    .opportunity-label {
        color: #80868B;

        font-size: 10px;

        font-weight: 600;

        text-transform: uppercase;
    }


    .opportunity-name {
        margin-top: 4px;

        color: #202124;

        font-size: 14px;

        font-weight: 700;
    }


    .opportunity-meta {
        display: flex;

        flex-wrap: wrap;

        gap: 8px;

        margin-top: 10px;
    }


    .meta-badge {
        padding: 5px 8px;

        border-radius: 20px;

        background: #F1F3F4;

        color: #5F6368;

        font-size: 10px;

        font-weight: 600;
    }


    .meta-badge.prospect {
        background: #E8EEF9;

        color: #0B2A6F;
    }


    .meta-badge.qualified {
        background: #EEE7FF;

        color: #6A1B9A;
    }


    .meta-badge.proposition {
        background: #FEF7E0;

        color: #B06000;
    }


    .meta-badge.won {
        background: #E6F4EA;

        color: #137333;
    }


    .meta-badge.lost {
        background: #FCE8E6;

        color: #D93025;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .detail-actions {
        display: flex;

        align-items: center;

        gap: 8px;

        margin-top: 25px;

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

        .lead-detail-header {
            flex-direction: column;
            align-items: flex-start;
        }


        .detail-grid {
            grid-template-columns: 1fr;
        }


        .conversion-flow {
            grid-template-columns: 1fr;
        }


        .conversion-arrow {
            transform: rotate(90deg);
            height: 20px;
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

<div class="lead-detail-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="lead-detail-header">


        <div class="lead-detail-header-left">

            <h1>
                Detail Lead
            </h1>

            <p>
                Informasi lengkap calon pelanggan.
            </p>

        </div>


        <a
            href="{{ route('leads.index') }}"
            class="btn btn-secondary"
        >

            ← Kembali

        </a>


    </div>


    <!-- =====================================================
         MAIN CARD
    ====================================================== -->

    <div class="detail-card">


        <!-- =================================================
             PROFILE
        ================================================== -->

        <div class="lead-profile">


            <div class="lead-profile-avatar">

                {{ strtoupper(
                    substr(
                        $lead->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <div class="lead-profile-info">

                <h2>
                    {{ $lead->name }}
                </h2>


                <p>

                    {{ $lead->contact_name ?? 'Kontak belum diisi' }}

                </p>


                <!-- STATUS -->

                @switch(
                    strtolower(
                        $lead->status
                    )
                )

                    @case('new')

                        <span
                            class="
                                status-badge
                                status-new
                            "
                        >
                            New
                        </span>

                        @break


                    @case('contacted')

                        <span
                            class="
                                status-badge
                                status-contacted
                            "
                        >
                            Contacted
                        </span>

                        @break


                    @case('qualified')

                        <span
                            class="
                                status-badge
                                status-qualified
                            "
                        >
                            Qualified
                        </span>

                        @break


                    @case('converted')

                        <span
                            class="
                                status-badge
                                status-converted
                            "
                        >
                            Converted
                        </span>

                        @break


                    @case('lost')

                        <span
                            class="
                                status-badge
                                status-lost
                            "
                        >
                            Lost
                        </span>

                        @break


                    @default

                        <span class="status-badge">

                            {{ ucfirst(
                                $lead->status
                            ) }}

                        </span>

                @endswitch


            </div>


        </div>


        <!-- =================================================
             DATA LEAD
        ================================================== -->

        <div class="detail-grid">


            <div class="detail-item">

                <div class="detail-label">
                    Nama Lead
                </div>

                <div class="detail-value">

                    {{ $lead->name }}

                </div>

            </div>


            <div class="detail-item">

                <div class="detail-label">
                    Nama Kontak
                </div>

                <div class="detail-value">

                    {{ $lead->contact_name ?? '-' }}

                </div>

            </div>


            <div class="detail-item">

                <div class="detail-label">
                    Email
                </div>

                <div class="detail-value">

                    {{ $lead->email ?? '-' }}

                </div>

            </div>


            <div class="detail-item">

                <div class="detail-label">
                    Telepon
                </div>

                <div class="detail-value">

                    {{ $lead->phone ?? '-' }}

                </div>

            </div>


            <div class="detail-item">

                <div class="detail-label">
                    Sumber Lead
                </div>

                <div class="detail-value">

                    {{ $lead->source ?? '-' }}

                </div>

            </div>


            <div class="detail-item">

                <div class="detail-label">
                    Status Lead
                </div>

                <div class="detail-value">

                    {{ ucfirst(
                        $lead->status
                    ) }}

                </div>

            </div>


            <div class="detail-item">

                <div class="detail-label">
                    Dibuat
                </div>

                <div class="detail-value">

                    {{
                        $lead->created_at
                            ? $lead->created_at->format(
                                'd/m/Y H:i'
                            )
                            : '-'
                    }}

                </div>

            </div>


            <div class="detail-item">

                <div class="detail-label">
                    Terakhir Diperbarui
                </div>

                <div class="detail-value">

                    {{
                        $lead->updated_at
                            ? $lead->updated_at->format(
                                'd/m/Y H:i'
                            )
                            : '-'
                    }}

                </div>

            </div>


        </div>


        <!-- =================================================
             CATATAN
        ================================================== -->

        <div class="notes-section">

            <div class="notes-title">
                Catatan
            </div>


            <div class="notes-box">

                @if($lead->notes)

                    {!! nl2br(
                        e($lead->notes)
                    ) !!}

                @else

                    Belum ada catatan untuk lead ini.

                @endif

            </div>

        </div>


        <!-- =================================================
             HASIL / PROSES KONVERSI
        ================================================== -->

        @if(
            strtolower($lead->status) === 'converted'
            && $lead->customer_id
        )


            @php

                $convertedCustomer =
                    $lead->customer;


                $convertedOpportunity =
                    null;


                if ($lead->customer_id) {

                    $convertedOpportunity =
                        Opportunity::where(
                            'customer_id',
                            $lead->customer_id
                        )
                        ->with('stage')
                        ->latest('id')
                        ->first();

                }

            @endphp


            <!-- =============================================
                 SUDAH DIKONVERSI
            ============================================== -->

            <div class="converted-card">


                <div class="converted-title">

                    <div class="converted-check">
                        ✓
                    </div>

                    Hasil Konversi

                </div>


                <div class="converted-description">

                    Lead ini sudah berhasil dikonversi.
                    Berikut Customer dan Opportunity
                    yang terkait dengan Lead ini.

                </div>


                <!-- =========================================
                     LEAD → CUSTOMER
                ========================================== -->


                @if($convertedCustomer)


                    <div class="conversion-flow">


                        <!-- LEAD -->

                        <div class="conversion-box">

                            <div class="conversion-box-label">
                                Lead
                            </div>


                            <div class="conversion-box-name">

                                {{ $lead->name }}

                            </div>


                            <div class="conversion-box-company">

                                Status:
                                {{ ucfirst(
                                    $lead->status
                                ) }}

                            </div>

                        </div>


                        <!-- ARROW -->

                        <div class="conversion-arrow">

                            →

                        </div>


                        <!-- CUSTOMER -->

                        <div class="conversion-box">


                            <div class="conversion-box-label">
                                Customer
                            </div>


                            <div class="conversion-box-name">

                                {{ $convertedCustomer->name }}

                            </div>


                            <div class="conversion-box-company">

                                {{ $convertedCustomer->company ?? '-' }}

                            </div>


                            <a
                                href="{{ route(
                                    'customers.show',
                                    $convertedCustomer
                                ) }}"
                                class="btn btn-secondary"
                            >

                                Lihat Customer

                            </a>


                        </div>


                    </div>


                @endif


                <!-- =========================================
                     OPPORTUNITY
                ========================================== -->


                @if($convertedOpportunity)


                    <div class="opportunity-result">


                        <div class="opportunity-result-header">


                            <div>

                                <div class="opportunity-label">

                                    Opportunity

                                </div>


                                <div class="opportunity-name">

                                    {{ $convertedOpportunity->name }}

                                </div>

                            </div>


                            <a
                                href="{{ route(
                                    'opportunities.show',
                                    $convertedOpportunity
                                ) }}"
                                class="btn btn-secondary"
                            >

                                Lihat Opportunity

                            </a>


                        </div>


                        <div class="opportunity-meta">


                            <!-- REVENUE -->

                            <span class="meta-badge">

                                Rp
                                {{ number_format(
                                    $convertedOpportunity
                                        ->expected_revenue,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </span>


                            <!-- STAGE -->

                            @php

                                $opportunityStage =
                                    strtolower(
                                        $convertedOpportunity
                                            ->stage
                                            ->name ?? ''
                                    );

                            @endphp


                            @if(
                                $opportunityStage === 'prospect'
                            )

                                <span
                                    class="
                                        meta-badge
                                        prospect
                                    "
                                >

                                    Prospect

                                </span>

                            @elseif(
                                $opportunityStage === 'qualified'
                            )

                                <span
                                    class="
                                        meta-badge
                                        qualified
                                    "
                                >

                                    Qualified

                                </span>

                            @elseif(
                                $opportunityStage === 'proposition'
                            )

                                <span
                                    class="
                                        meta-badge
                                        proposition
                                    "
                                >

                                    Proposition

                                </span>

                            @elseif(
                                $opportunityStage === 'won'
                            )

                                <span
                                    class="
                                        meta-badge
                                        won
                                    "
                                >

                                    Won

                                </span>

                            @elseif(
                                $opportunityStage === 'lost'
                            )

                                <span
                                    class="
                                        meta-badge
                                        lost
                                    "
                                >

                                    Lost

                                </span>

                            @else

                                <span class="meta-badge">

                                    {{
                                        $convertedOpportunity
                                            ->stage
                                            ->name ?? '-'
                                    }}

                                </span>

                            @endif


                            <!-- RATING -->

                            <span class="meta-badge">

                                Rating:
                                {{ $convertedOpportunity->rating }}/5

                            </span>


                        </div>


                    </div>


                @else


                    <div class="opportunity-result">

                        <div class="opportunity-label">
                            Opportunity
                        </div>


                        <div
                            style="
                                margin-top:6px;
                                color:#5F6368;
                                font-size:12px;
                            "
                        >

                            Belum ditemukan opportunity
                            yang terkait dengan customer ini.

                        </div>

                    </div>


                @endif


            </div>


        @elseif(
            strtolower($lead->status) === 'qualified'
            && ! $lead->customer_id
        )


            <!-- =============================================
                 SIAP DIKONVERSI
            ============================================== -->

            <div class="convert-card">


                <div class="convert-card-title">

                    Lead Siap Dikonversi

                </div>


                <div class="convert-card-description">

                    Lead ini sudah berstatus
                    <strong>Qualified</strong>.
                    Kamu dapat mengubahnya menjadi Customer
                    dan membuat Opportunity baru.

                </div>


                <a
                    href="{{ route(
                        'leads.convert.form',
                        $lead
                    ) }}"
                    class="btn btn-primary"
                >

                    Convert Lead

                </a>


            </div>


        @endif


        <!-- =================================================
             ACTIONS
        ================================================== -->

        <div class="detail-actions">


            <a
                href="{{ route(
                    'leads.edit',
                    $lead
                ) }}"
                class="btn btn-edit"
            >

                Edit Lead

            </a>


            <div class="detail-actions-spacer"></div>


            <a
                href="{{ route(
                    'leads.index'
                ) }}"
                class="btn btn-secondary"
            >

                Kembali

            </a>


        </div>


    </div>


</div>

@endsection