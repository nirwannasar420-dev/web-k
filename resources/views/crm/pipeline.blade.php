@extends('layouts.app')

@section('title', 'Pipeline CRM')
@section('page-title', 'Pipeline CRM')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .pipeline-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .pipeline-header {
        display: flex;

        align-items: flex-end;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 24px;
    }


    .pipeline-header-left h1 {
        margin: 0 0 6px;

        color: #0B2A6F;

        font-size: 30px;

        font-weight: 800;

        line-height: 1.15;

        letter-spacing: -.3px;
    }


    .pipeline-header-left p {
        margin: 0;

        color: #64748B;

        font-size: 13px;
    }


    /* =========================================================
       ADD BUTTON
    ========================================================= */

    .btn-add-opportunity {
        height: 42px;

        padding: 0 17px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        background: #0B2A6F;

        color: #FFFFFF;

        border: 1px solid #0B2A6F;

        border-radius: 10px;

        text-decoration: none;

        font-size: 12px;

        font-weight: 700;

        white-space: nowrap;

        box-shadow:
            0 5px 12px rgba(11,42,111,.14);

        transition: .2s ease;
    }


    .btn-add-opportunity:hover {
        background: #071D4D;

        border-color: #071D4D;

        color: #FFFFFF;

        transform: translateY(-1px);

        box-shadow:
            0 8px 16px rgba(11,42,111,.20);
    }


    .btn-add-opportunity svg {
        width: 16px;

        height: 16px;
    }


    /* =========================================================
       BOARD WRAPPER
    ========================================================= */

    .pipeline-board-wrapper {
        width: 100%;

        overflow-x: auto;

        padding-bottom: 10px;
    }


    .pipeline-board-wrapper::-webkit-scrollbar {
        height: 8px;
    }


    .pipeline-board-wrapper::-webkit-scrollbar-thumb {
        background: #CBD5E1;

        border-radius: 20px;
    }


    .pipeline-board-wrapper::-webkit-scrollbar-track {
        background: #E2E8F0;

        border-radius: 20px;
    }


    /* =========================================================
       BOARD
    ========================================================= */

    .pipeline-board {
        display: flex;

        align-items: flex-start;

        gap: 16px;

        min-width: max-content;
    }


    /* =========================================================
       COLUMN
    ========================================================= */

    .pipeline-column {
        width: 292px;

        min-width: 292px;

        background: #F8FAFC;

        border: 1px solid #E2E8F0;

        border-radius: 16px;

        padding: 13px;

        box-shadow:
            0 3px 10px rgba(15,23,42,.035);
    }


    /* =========================================================
       COLUMN HEADER
    ========================================================= */

    .column-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 10px;

        padding: 5px 4px 12px;

        margin-bottom: 12px;

        border-bottom: 1px solid #E2E8F0;
    }


    .column-name {
        display: flex;

        align-items: center;

        gap: 9px;

        color: #172033;

        font-size: 13px;

        font-weight: 800;
    }


    .column-dot {
        width: 9px;

        height: 9px;

        border-radius: 50%;

        flex-shrink: 0;
    }


    .dot-prospect {
        background: #0B2A6F;

        box-shadow:
            0 0 0 4px #E8EEF9;
    }


    .dot-qualified {
        background: #7C4DFF;

        box-shadow:
            0 0 0 4px #EEE7FF;
    }


    .dot-proposition {
        background: #D98200;

        box-shadow:
            0 0 0 4px #FFF2DE;
    }


    .dot-won {
        background: #159A6C;

        box-shadow:
            0 0 0 4px #E7F6EF;
    }


    .dot-lost {
        background: #E30613;

        box-shadow:
            0 0 0 4px #FDEBED;
    }


    .column-count {
        min-width: 27px;

        height: 27px;

        padding: 0 7px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        background: #FFFFFF;

        color: #0B2A6F;

        border: 1px solid #DDE4EE;

        border-radius: 8px;

        font-size: 10px;

        font-weight: 800;
    }


    /* =========================================================
       OPPORTUNITY CARD
    ========================================================= */

    .opportunity-card {
        position: relative;

        padding: 15px;

        margin-bottom: 11px;

        background: #FFFFFF;

        border: 1px solid #E2E8F0;

        border-radius: 13px;

        box-shadow:
            0 3px 9px rgba(15,23,42,.045);

        transition:
            transform .18s ease,
            box-shadow .18s ease,
            border-color .18s ease;
    }


    .opportunity-card:last-child {
        margin-bottom: 0;
    }


    .opportunity-card:hover {
        transform: translateY(-2px);

        border-color: #CBD5E1;

        box-shadow:
            0 8px 18px rgba(15,23,42,.08);
    }


    /* =========================================================
       OPPORTUNITY TITLE
    ========================================================= */

    .opportunity-name {
        margin-bottom: 11px;

        padding-right: 3px;

        color: #172033;

        font-size: 13px;

        font-weight: 800;

        line-height: 1.45;
    }


    /* =========================================================
       CUSTOMER
    ========================================================= */

    .opportunity-customer {
        display: flex;

        align-items: center;

        gap: 8px;

        margin-bottom: 13px;

        color: #64748B;

        font-size: 11px;

        font-weight: 600;
    }


    .customer-icon {
        width: 28px;

        height: 28px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        background: #E8EEF9;

        border: 1px solid #D7E1F2;

        border-radius: 8px;

        color: #0B2A6F;
    }


    .customer-icon svg {
        width: 15px;

        height: 15px;
    }


    /* =========================================================
       REVENUE
    ========================================================= */

    .opportunity-revenue {
        margin-bottom: 10px;

        color: #0B2A6F;

        font-size: 15px;

        font-weight: 800;

        line-height: 1.2;
    }


    /* =========================================================
       RATING
    ========================================================= */

    .opportunity-rating {
        display: flex;

        align-items: center;

        gap: 2px;

        margin-bottom: 13px;

        color: #E7A400;

        font-size: 14px;

        letter-spacing: .5px;
    }


    /* =========================================================
       STAGE AREA
    ========================================================= */

    .stage-form {
        padding-top: 11px;

        border-top: 1px solid #EEF2F7;
    }


    .stage-label {
        display: block;

        margin-bottom: 6px;

        color: #7C8798;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .stage-select {
        width: 100%;

        height: 36px;

        padding: 0 10px;

        background: #FFFFFF;

        border: 1px solid #D7DEE8;

        border-radius: 8px;

        color: #334155;

        font-size: 11px;

        font-weight: 600;

        outline: none;

        cursor: pointer;

        transition: .2s ease;
    }


    .stage-select:hover {
        border-color: #B9C5D5;
    }


    .stage-select:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 3px rgba(11,42,111,.08);
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .opportunity-footer {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 10px;

        margin-top: 11px;

        padding-top: 10px;

        border-top: 1px solid #EEF2F7;
    }


    .opportunity-date {
        color: #94A3B8;

        font-size: 10px;

        white-space: nowrap;
    }


    .detail-link {
        display: inline-flex;

        align-items: center;

        gap: 4px;

        color: #0B2A6F;

        font-size: 10px;

        font-weight: 800;

        text-decoration: none;

        white-space: nowrap;
    }


    .detail-link:hover {
        color: #E30613;
    }


    .detail-link svg {
        width: 12px;

        height: 12px;
    }


    /* =========================================================
       EMPTY COLUMN
    ========================================================= */

    .empty-column {
        min-height: 150px;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        padding: 22px 12px;

        background: #FFFFFF;

        border: 1px dashed #CBD5E1;

        border-radius: 12px;

        color: #94A3B8;

        font-size: 10px;

        text-align: center;
    }


    .empty-column-icon {
        width: 38px;

        height: 38px;

        margin-bottom: 9px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #F1F5F9;

        border: 1px solid #E2E8F0;

        border-radius: 10px;

        color: #94A3B8;
    }


    .empty-column-icon svg {
        width: 17px;

        height: 17px;
    }


    .empty-column-title {
        color: #64748B;

        font-size: 11px;

        font-weight: 700;

        margin-bottom: 3px;
    }


    /* =========================================================
       STAGE COLOR ACCENTS
    ========================================================= */

    .pipeline-column.prospect {
        border-top: 4px solid #0B2A6F;
    }


    .pipeline-column.qualified {
        border-top: 4px solid #7C4DFF;
    }


    .pipeline-column.proposition {
        border-top: 4px solid #D98200;
    }


    .pipeline-column.won {
        border-top: 4px solid #159A6C;
    }


    .pipeline-column.lost {
        border-top: 4px solid #E30613;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .pipeline-header {
            align-items: flex-start;

            flex-direction: column;
        }


        .btn-add-opportunity {
            width: 100%;
        }

    }


    @media (max-width: 600px) {

        .pipeline-header-left h1 {
            font-size: 25px;
        }


        .pipeline-column {
            width: 270px;

            min-width: 270px;
        }

    }

</style>

@endsection


@section('content')

<div class="pipeline-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="pipeline-header">


        <div class="pipeline-header-left">

            <h1>
                Pipeline CRM
            </h1>

            <p>
                Kelola dan pantau peluang penjualan berdasarkan tahapan.
            </p>

        </div>


        <a
            href="{{ route('opportunities.create') }}"
            class="btn-add-opportunity"
        >

            <svg
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


            Tambah Opportunity

        </a>

    </div>



    <!-- =====================================================
         PIPELINE BOARD
    ====================================================== -->

    <div class="pipeline-board-wrapper">


        <div class="pipeline-board">


            @foreach($stages as $stage)


                @php

                    $stageName = strtolower(
                        $stage->name
                    );


                    $columnClass = match($stageName) {

                        'prospect'
                            => 'prospect',

                        'qualified'
                            => 'qualified',

                        'proposition'
                            => 'proposition',

                        'won'
                            => 'won',

                        'lost'
                            => 'lost',

                        default
                            => 'prospect',

                    };


                    $dotClass = match($stageName) {

                        'prospect'
                            => 'dot-prospect',

                        'qualified'
                            => 'dot-qualified',

                        'proposition'
                            => 'dot-proposition',

                        'won'
                            => 'dot-won',

                        'lost'
                            => 'dot-lost',

                        default
                            => 'dot-prospect',

                    };

                @endphp



                <!-- =================================================
                     COLUMN
                ================================================== -->

                <div
                    class="pipeline-column {{ $columnClass }}"
                >


                    <!-- =================================================
                         COLUMN HEADER
                    ================================================== -->

                    <div class="column-header">


                        <div class="column-name">

                            <span
                                class="column-dot {{ $dotClass }}"
                            ></span>


                            <span>
                                {{ $stage->name }}
                            </span>

                        </div>


                        <div class="column-count">

                            {{ $stage->opportunities->count() }}

                        </div>


                    </div>



                    <!-- =================================================
                         OPPORTUNITIES
                    ================================================== -->

                    @forelse(
                        $stage->opportunities
                        as $opportunity
                    )


                        <div class="opportunity-card">


                            <!-- =================================================
                                 NAME
                            ================================================== -->

                            <div class="opportunity-name">

                                {{ $opportunity->name }}

                            </div>



                            <!-- =================================================
                                 CUSTOMER
                            ================================================== -->

                            <div class="opportunity-customer">


                                <span class="customer-icon">

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
                                            cy="8"
                                            r="3"
                                        />

                                        <path
                                            d="M5 21c0-4 3-6 7-6s7 2 7 6"
                                        />

                                    </svg>

                                </span>


                                <span>

                                    {{ $opportunity->customer->name ?? '-' }}

                                </span>

                            </div>



                            <!-- =================================================
                                 REVENUE
                            ================================================== -->

                            <div class="opportunity-revenue">

                                Rp {{ number_format(
                                    $opportunity->expected_revenue,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </div>



                            <!-- =================================================
                                 RATING
                            ================================================== -->

                            <div class="opportunity-rating">


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


                            </div>



                            <!-- =================================================
                                 CHANGE STAGE
                            ================================================== -->

                            <div class="stage-form">


                                <form
                                    action="{{ route(
                                        'crm.opportunities.stage',
                                        $opportunity
                                    ) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('PATCH')


                                    <label
                                        class="stage-label"
                                    >

                                        Pindah Stage

                                    </label>


                                    <select
                                        name="stage_id"
                                        class="stage-select"
                                        onchange="this.form.submit()"
                                    >


                                        @foreach(
                                            $stages
                                            as $stageOption
                                        )


                                            <option
                                                value="{{ $stageOption->id }}"

                                                {{
                                                    $opportunity->stage_id
                                                    == $stageOption->id
                                                        ? 'selected'
                                                        : ''
                                                }}
                                            >

                                                {{ $stageOption->name }}

                                            </option>


                                        @endforeach


                                    </select>


                                </form>


                            </div>



                            <!-- =================================================
                                 FOOTER
                            ================================================== -->

                            <div class="opportunity-footer">


                                <div class="opportunity-date">

                                    @if(
                                        $opportunity->opportunity_date
                                    )

                                        {{ \Illuminate\Support\Carbon::parse(
                                            $opportunity->opportunity_date
                                        )->format('d M Y') }}

                                    @else

                                        Tanggal belum diatur

                                    @endif

                                </div>


                                <a
                                    href="{{ route(
                                        'opportunities.show',
                                        $opportunity
                                    ) }}"
                                    class="detail-link"
                                >

                                    Detail


                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <path d="M5 12h14"/>

                                        <path d="m13 5 7 7-7 7"/>

                                    </svg>

                                </a>


                            </div>


                        </div>


                    @empty


                        <!-- EMPTY -->

                        <div class="empty-column">


                            <div class="empty-column-icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >

                                    <rect
                                        x="4"
                                        y="4"
                                        width="16"
                                        height="16"
                                        rx="2"
                                    />

                                    <path d="M8 12h8"/>

                                </svg>

                            </div>


                            <div class="empty-column-title">

                                Belum ada opportunity

                            </div>


                            <div>

                                Opportunity pada tahap ini akan muncul di sini.

                            </div>


                        </div>


                    @endforelse


                </div>


            @endforeach


        </div>

    </div>


</div>

@endsection