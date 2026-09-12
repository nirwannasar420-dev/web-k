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
        margin-bottom: 26px;
    }

    .pipeline-header-left h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
        line-height: 1.2;
    }

    .pipeline-header-left p {
        margin: 0;
        color: #5F6368;
        font-size: 13px;
    }


    /* =========================================================
       BUTTON TAMBAH
    ========================================================= */

    .btn-add-opportunity {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        height: 40px;
        padding: 0 16px;

        background: #0B2A6F;
        color: #FFFFFF;

        border: none;
        border-radius: 9px;

        text-decoration: none;

        font-size: 12px;
        font-weight: 600;

        transition: .2s ease;
        white-space: nowrap;
    }

    .btn-add-opportunity:hover {
        background: #071D4D;
        color: #FFFFFF;
    }

    .btn-add-opportunity svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       BOARD WRAPPER
    ========================================================= */

    .pipeline-board-wrapper {
        width: 100%;
        overflow-x: auto;
        padding-bottom: 8px;
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
        width: 285px;
        min-width: 285px;

        background: #F8F9FA;

        border: 1px solid #E8EAED;
        border-radius: 14px;

        padding: 12px;

        box-sizing: border-box;
    }


    /* =========================================================
       COLUMN HEADER
    ========================================================= */

    .column-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 4px 3px 11px;

        border-bottom: 1px solid #E8EAED;

        margin-bottom: 12px;
    }


    .column-name {
        display: flex;
        align-items: center;
        gap: 8px;

        color: #202124;
        font-size: 13px;
        font-weight: 700;
    }


    .column-dot {
        width: 8px;
        height: 8px;

        border-radius: 50%;

        flex-shrink: 0;
    }


    .dot-prospect {
        background: #0B2A6F;
    }

    .dot-qualified {
        background: #7C4DFF;
    }

    .dot-proposition {
        background: #F9AB00;
    }

    .dot-won {
        background: #188038;
    }

    .dot-lost {
        background: #E30613;
    }


    .column-count {
        min-width: 24px;
        height: 24px;

        padding: 0 6px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #FFFFFF;

        border: 1px solid #E1E4E8;
        border-radius: 50%;

        color: #5F6368;

        font-size: 11px;
        font-weight: 700;
    }


    /* =========================================================
       OPPORTUNITY CARD
    ========================================================= */

    .opportunity-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;
        border-radius: 11px;

        padding: 15px;

        margin-bottom: 10px;

        box-shadow: 0 2px 5px rgba(60, 64, 67, .05);

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }


    .opportunity-card:hover {
        transform: translateY(-2px);

        border-color: #D5DCE7;

        box-shadow:
            0 7px 17px rgba(60, 64, 67, .10);
    }


    .opportunity-card:last-child {
        margin-bottom: 0;
    }


    /* =========================================================
       OPPORTUNITY NAME
    ========================================================= */

    .opportunity-name {
        margin-bottom: 8px;

        color: #202124;

        font-size: 13px;
        font-weight: 700;

        line-height: 1.4;
    }


    /* =========================================================
       CUSTOMER
    ========================================================= */

    .opportunity-customer {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-bottom: 12px;

        color: #5F6368;

        font-size: 11px;
    }


    .customer-icon {
        width: 16px;
        height: 16px;

        color: #9AA0A6;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .customer-icon svg {
        width: 14px;
        height: 14px;
    }


    /* =========================================================
       REVENUE
    ========================================================= */

    .opportunity-revenue {
        margin-bottom: 10px;

        color: #0B2A6F;

        font-size: 13px;
        font-weight: 700;
    }


    /* =========================================================
       RATING
    ========================================================= */

    .opportunity-rating {
        display: flex;
        align-items: center;

        margin-bottom: 12px;

        color: #F9AB00;

        font-size: 12px;
        letter-spacing: 1px;
    }


    /* =========================================================
       STAGE SELECT
    ========================================================= */

    .stage-form {
        margin-top: 2px;
    }


    .stage-label {
        display: block;

        margin-bottom: 5px;

        color: #80868B;

        font-size: 10px;
        font-weight: 500;
    }


    .stage-select {
        width: 100%;

        height: 35px;

        padding: 0 9px;

        background: #FFFFFF;

        border: 1px solid #DADCE0;
        border-radius: 7px;

        color: #3C4043;

        font-size: 11px;

        outline: none;

        cursor: pointer;
    }


    .stage-select:hover {
        border-color: #C4C7C5;
    }


    .stage-select:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 2px rgba(11, 42, 111, .08);
    }


    /* =========================================================
       FOOTER CARD
    ========================================================= */

    .opportunity-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;

        margin-top: 11px;
        padding-top: 10px;

        border-top: 1px solid #F1F3F4;
    }


    .opportunity-date {
        color: #9AA0A6;

        font-size: 10px;
    }


    .detail-link {
        color: #0B2A6F;

        font-size: 10px;
        font-weight: 600;

        text-decoration: none;
    }


    .detail-link:hover {
        color: #071D4D;
        text-decoration: underline;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-column {
        min-height: 115px;

        background: #FFFFFF;

        border: 1px dashed #DADCE0;
        border-radius: 10px;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;

        padding: 20px 10px;

        color: #9AA0A6;

        font-size: 11px;

        text-align: center;
    }


    .empty-column-icon {
        width: 32px;
        height: 32px;

        margin-bottom: 8px;

        background: #F1F3F4;

        border-radius: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #9AA0A6;
    }

    .empty-column-icon svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .pipeline-header {
            align-items: flex-start;
            flex-direction: column;
        }

    }


    @media (max-width: 600px) {

        .pipeline-column {
            width: 260px;
            min-width: 260px;
        }

        .pipeline-header-left h1 {
            font-size: 24px;
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

                <div class="pipeline-column">


                    <!-- COLUMN HEADER -->

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


                            <!-- NAME -->

                            <div class="opportunity-name">

                                {{ $opportunity->name }}

                            </div>


                            <!-- CUSTOMER -->

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


                            <!-- REVENUE -->

                            <div class="opportunity-revenue">

                                Rp {{ number_format(
                                    $opportunity->expected_revenue,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </div>


                            <!-- RATING -->

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


                            <!-- CHANGE STAGE -->

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


                                    <label class="stage-label">

                                        Stage

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


                            <!-- FOOTER -->

                            <div class="opportunity-footer">


                                <div class="opportunity-date">

                                    {{
                                        $opportunity->opportunity_date
                                            ? $opportunity
                                                ->opportunity_date
                                                ->format('d/m/Y')
                                            : '-'
                                    }}

                                </div>


                                <a
                                    href="{{ route(
                                        'opportunities.show',
                                        $opportunity
                                    ) }}"
                                    class="detail-link"
                                >

                                    Detail →

                                </a>


                            </div>


                        </div>


                    @empty


                        <!-- EMPTY COLUMN -->

                        <div class="empty-column">

                            <div class="empty-column-icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >

                                    <rect
                                        x="4"
                                        y="4"
                                        width="16"
                                        height="16"
                                        rx="3"
                                    />

                                    <path d="M12 8v8"/>
                                    <path d="M8 12h8"/>

                                </svg>

                            </div>


                            Belum ada opportunity.

                        </div>


                    @endforelse


                </div>


            @endforeach


        </div>

    </div>


</div>

@endsection