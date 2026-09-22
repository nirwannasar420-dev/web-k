@extends('layouts.app')

@section('title', 'Opportunity Details')
@section('page-title', 'Opportunity Details')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .opportunity-page {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
        padding-bottom: 35px;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .opportunity-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;

        margin-bottom: 22px;
    }


    .opportunity-title-wrap {
        display: flex;
        align-items: center;
        gap: 13px;
    }


    .opportunity-main-icon {

        width: 48px;
        height: 48px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: #EEF4FF;
        color: #0B2A6F;
    }


    .opportunity-main-icon svg {
        width: 23px;
        height: 23px;
    }


    .opportunity-title h1 {

        margin: 0;

        color: #172033;

        font-size: 27px;
        font-weight: 800;

        line-height: 1.2;
    }


    .opportunity-title p {

        margin: 5px 0 0;

        color: #64748B;

        font-size: 12px;
    }


    .opportunity-actions {

        display: flex;
        align-items: center;
        gap: 8px;
    }


    .btn-opportunity {

        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 6px;

        min-height: 38px;

        padding: 0 13px;

        border-radius: 8px;

        font-size: 10px;
        font-weight: 800;

        text-decoration: none;

        transition: .2s ease;
    }


    .btn-opportunity svg {
        width: 14px;
        height: 14px;
    }


    .btn-edit {

        background: #0B2A6F;
        color: #FFFFFF;

        box-shadow:
            0 4px 12px rgba(11,42,111,.12);
    }


    .btn-edit:hover {

        background: #071D4D;

        color: #FFFFFF;
    }


    .btn-back {

        background: #FFFFFF;

        border:
            1px solid #E2E8F0;

        color: #64748B;
    }


    .btn-back:hover {

        background: #F8FAFC;

        color: #475569;
    }


    /* =========================================================
       MAIN GRID
    ========================================================= */

    .opportunity-grid {

        display: grid;

        grid-template-columns:
            minmax(0, 1.7fr)
            minmax(285px, .75fr);

        gap: 18px;

        align-items: start;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .opportunity-card {

        background: #FFFFFF;

        border:
            1px solid #E2E8F0;

        border-radius: 12px;

        box-shadow:
            0 3px 12px
            rgba(15,23,42,.04);

        margin-bottom: 18px;

        overflow: hidden;
    }


    .opportunity-card-inner {
        padding: 20px;
    }


    /* =========================================================
       OPPORTUNITY HEADER CARD
    ========================================================= */

    .card-header {

        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 15px;

        margin-bottom: 18px;
    }


    .card-header-left {
        min-width: 0;
    }


    .small-label {

        margin-bottom: 5px;

        color: #94A3B8;

        font-size: 9px;

        font-weight: 800;

        letter-spacing: .7px;

        text-transform: uppercase;
    }


    .opportunity-name {

        margin: 0;

        color: #172033;

        font-size: 20px;

        font-weight: 800;

        line-height: 1.35;

        word-break: break-word;
    }


    /* =========================================================
       STAGE BADGE
    ========================================================= */

    .stage-badge {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 7px 11px;

        border-radius: 20px;

        font-size: 10px;

        font-weight: 800;

        white-space: nowrap;
    }


    .stage-prospect {
        background: #EEF4FF;
        color: #0B2A6F;
    }


    .stage-qualified {
        background: #E8F2FF;
        color: #1769AA;
    }


    .stage-proposition {
        background: #FFF3E6;
        color: #B85A00;
    }


    .stage-won {
        background: #EAF8F0;
        color: #18784D;
    }


    .stage-lost {
        background: #FDECEF;
        color: #C52E3D;
    }


    .stage-default {
        background: #F1F5F9;
        color: #64748B;
    }


    /* =========================================================
       DETAIL GRID
    ========================================================= */

    .detail-grid {

        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 10px;
    }


    .detail-box {

        min-height: 74px;

        padding: 13px;

        border:
            1px solid #E8EDF3;

        border-radius: 9px;

        background: #F8FAFC;
    }


    .detail-label {

        margin-bottom: 6px;

        color: #94A3B8;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .45px;
    }


    .detail-value {

        color: #243047;

        font-size: 12px;

        font-weight: 700;

        line-height: 1.45;

        word-break: break-word;
    }


    .revenue-value {

        color: #0B2A6F;

        font-size: 17px;

        font-weight: 800;
    }


    /* =========================================================
       RATING
    ========================================================= */

    .stars {

        display: flex;

        align-items: center;

        gap: 1px;
    }


    .star-filled {

        color: #F9AB00;

        font-size: 17px;
    }


    .star-empty {

        color: #D5DAE2;

        font-size: 17px;
    }


    .rating-number {

        margin-left: 6px;

        color: #64748B;

        font-size: 10px;

        font-weight: 700;
    }


    /* =========================================================
       NOTES
    ========================================================= */

    .notes-section {

        margin-top: 20px;

        padding-top: 18px;

        border-top:
            1px solid #E2E8F0;
    }


    .section-title {

        margin: 0;

        color: #172033;

        font-size: 14px;

        font-weight: 800;
    }


    .section-subtitle {

        margin: 4px 0 0;

        color: #94A3B8;

        font-size: 10px;
    }


    .notes-box {

        min-height: 70px;

        margin-top: 11px;

        padding: 13px;

        border:
            1px solid #E8EDF3;

        border-radius: 9px;

        background: #F8FAFC;

        color: #475569;

        font-size: 11px;

        line-height: 1.7;

        white-space: pre-line;

        box-sizing: border-box;
    }


    /* =========================================================
       PRODUCT CARD
    ========================================================= */

    .products-card {

        margin-bottom: 18px;
    }


    .products-card-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 16px 18px;

        border-bottom:
            1px solid #E2E8F0;
    }


    .products-card-title {

        color: #172033;

        font-size: 14px;

        font-weight: 800;
    }


    .products-card-description {

        margin-top: 4px;

        color: #94A3B8;

        font-size: 10px;
    }


    .products-count {

        display: inline-flex;

        align-items: center;

        padding: 6px 9px;

        border-radius: 7px;

        background: #EEF4FF;

        color: #0B2A6F;

        font-size: 9px;

        font-weight: 800;

        white-space: nowrap;
    }


    .products-table-wrapper {

        width: 100%;

        overflow-x: auto;
    }


    .products-table {

        width: 100%;

        border-collapse: collapse;
    }


    .products-table thead {

        background: #F8FAFC;
    }


    .products-table th {

        padding: 11px 14px;

        border-bottom:
            1px solid #E2E8F0;

        color: #64748B;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .45px;

        text-align: left;

        white-space: nowrap;
    }


    .products-table td {

        padding: 13px 14px;

        border-bottom:
            1px solid #F1F5F9;

        color: #475569;

        font-size: 11px;

        vertical-align: middle;

        white-space: nowrap;
    }


    .products-table tbody tr:last-child td {

        border-bottom: none;
    }


    .products-table tbody tr {

        transition: .2s ease;
    }


    .products-table tbody tr:hover {

        background: #FAFCFF;
    }


    .product-identity {

        display: flex;

        align-items: center;

        gap: 9px;
    }


    .product-icon {

        width: 34px;
        height: 34px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 8px;

        background: #EEF4FF;

        color: #0B2A6F;
    }


    .product-icon svg {

        width: 17px;
        height: 17px;
    }


    .product-name {

        color: #172033;

        font-size: 11px;

        font-weight: 800;
    }


    .product-code {

        margin-top: 3px;

        color: #94A3B8;

        font-size: 9px;
    }


    .product-quantity {

        color: #334155;

        font-weight: 700;
    }


    .product-price {

        color: #475569;

        font-weight: 700;
    }


    .product-subtotal {

        color: #172033;

        font-weight: 800;
    }


    .products-total {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 14px 18px;

        border-top:
            1px solid #E2E8F0;

        background: #FAFCFF;
    }


    .products-total-label {

        color: #64748B;

        font-size: 10px;

        font-weight: 700;
    }


    .products-total-value {

        color: #0B2A6F;

        font-size: 17px;

        font-weight: 800;
    }


    .products-empty {

        padding: 42px 20px;

        text-align: center;

        color: #94A3B8;

        font-size: 10px;
    }


    .products-empty-icon {

        width: 48px;
        height: 48px;

        margin: 0 auto 11px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 11px;

        background: #F1F5F9;

        color: #94A3B8;
    }


    .products-empty-icon svg {

        width: 22px;
        height: 22px;
    }


    .products-empty-title {

        color: #475569;

        font-size: 12px;

        font-weight: 700;
    }


    .products-empty-text {

        margin-top: 4px;

        color: #94A3B8;

        font-size: 10px;
    }


    /* =========================================================
       CUSTOMER CARD
    ========================================================= */

    .side-card {

        padding: 18px;
    }


    .side-heading {

        display: flex;

        align-items: center;

        gap: 10px;

        margin-bottom: 18px;
    }


    .side-icon {

        width: 39px;
        height: 39px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 9px;

        background: #EEF4FF;

        color: #0B2A6F;
    }


    .side-icon svg {

        width: 19px;
        height: 19px;
    }


    .side-heading h2 {

        margin: 0;

        color: #172033;

        font-size: 14px;

        font-weight: 800;
    }


    .side-heading p {

        margin: 3px 0 0;

        color: #94A3B8;

        font-size: 9px;
    }


    .customer-item {

        margin-bottom: 14px;
    }


    .customer-label {

        margin-bottom: 4px;

        color: #94A3B8;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .45px;
    }


    .customer-value {

        color: #243047;

        font-size: 11px;

        font-weight: 700;

        line-height: 1.45;

        word-break: break-word;
    }


    .customer-link {

        display: flex;

        align-items: center;

        justify-content: center;

        width: 100%;

        min-height: 36px;

        margin-top: 18px;

        border-radius: 8px;

        background: #0B2A6F;

        color: #FFFFFF;

        font-size: 10px;

        font-weight: 800;

        text-decoration: none;
    }


    .customer-link:hover {

        background: #071D4D;

        color: #FFFFFF;
    }


    /* =========================================================
       SUMMARY CARD
    ========================================================= */

    .summary-row {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 12px;

        padding: 10px 0;

        border-bottom:
            1px solid #F1F5F9;

        font-size: 10px;
    }


    .summary-row:last-child {

        border-bottom: none;

        padding-bottom: 0;
    }


    .summary-label {

        color: #94A3B8;
    }


    .summary-value {

        color: #243047;

        font-weight: 800;

        text-align: right;
    }


    /* =========================================================
       ACTIVITY CARD
    ========================================================= */

    .activity-card {

        margin-top: 18px;

        margin-bottom: 0;
    }


    .activity-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding-bottom: 15px;

        margin-bottom: 2px;

        border-bottom:
            1px solid #E2E8F0;
    }


    .activity-count {

        display: inline-flex;

        padding: 6px 9px;

        border-radius: 20px;

        background: #EEF4FF;

        color: #0B2A6F;

        font-size: 9px;

        font-weight: 800;

        white-space: nowrap;
    }


    .activity-item {

        display: block;

        padding: 13px 0;

        border-bottom:
            1px solid #F1F5F9;

        color: inherit;

        text-decoration: none;
    }


    .activity-item:last-child {

        border-bottom: none;
    }


    .activity-item:hover {

        background: #FAFCFF;
    }


    .activity-top {

        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 12px;
    }


    .activity-subject {

        color: #243047;

        font-size: 11px;

        font-weight: 800;
    }


    .activity-type {

        margin-top: 4px;

        color: #0B2A6F;

        font-size: 9px;

        font-weight: 700;
    }


    .activity-status {

        padding: 5px 8px;

        border-radius: 15px;

        font-size: 9px;

        font-weight: 800;

        white-space: nowrap;
    }


    .activity-date {

        margin-top: 8px;

        color: #94A3B8;

        font-size: 9px;
    }


    .activity-detail-link {

        float: right;

        color: #0B2A6F;

        font-size: 9px;

        font-weight: 700;
    }


    .empty-state {

        padding: 35px 15px;

        text-align: center;

        color: #94A3B8;
    }


    .empty-icon {

        margin-bottom: 7px;

        color: #B5BCC7;

        font-size: 27px;
    }


    .empty-title {

        margin-bottom: 4px;

        color: #475569;

        font-size: 11px;

        font-weight: 700;
    }


    .empty-text {

        color: #94A3B8;

        font-size: 9px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1000px) {

        .opportunity-page {
            max-width: 100%;
        }


        .opportunity-grid {

            grid-template-columns: 1fr;

        }

    }


    @media (max-width: 700px) {

        .opportunity-header {

            flex-direction: column;

            align-items: flex-start;

        }


        .opportunity-actions {

            width: 100%;

        }


        .btn-opportunity {

            flex: 1;

        }


        .detail-grid {

            grid-template-columns: 1fr;

        }


        .card-header {

            flex-direction: column;

        }


        .products-card-header {

            align-items: flex-start;

            flex-direction: column;

        }


        .activity-header {

            align-items: flex-start;

            flex-direction: column;

        }

    }

</style>


@php

    $stageName =
        strtolower(
            $opportunity->stage->name ?? ''
        );


    if ($stageName === 'prospect') {

        $stageClass =
            'stage-prospect';

    } elseif ($stageName === 'qualified') {

        $stageClass =
            'stage-qualified';

    } elseif ($stageName === 'proposition') {

        $stageClass =
            'stage-proposition';

    } elseif ($stageName === 'won') {

        $stageClass =
            'stage-won';

    } elseif ($stageName === 'lost') {

        $stageClass =
            'stage-lost';

    } else {

        $stageClass =
            'stage-default';

    }


    $productItems =
        $opportunity->items ?? collect();


    $productTotal =
        $productItems->sum(
            'subtotal'
        );

@endphp

@endsection


@section('content')

<div class="opportunity-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="opportunity-header">


        <div class="opportunity-title-wrap">


            <div class="opportunity-main-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M4 17l5-5 4 3 7-8"/>

                    <path d="M15 7h5v5"/>

                </svg>

            </div>


            <div class="opportunity-title">

                <h1>
                    Opportunity Details
                </h1>

                <p>
                    Complete information about this sales opportunity.
                </p>

            </div>


        </div>


        <div class="opportunity-actions">


            <a
                href="{{ route(
                    'opportunities.edit',
                    $opportunity
                ) }}"
                class="btn-opportunity btn-edit"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M12 20h9"/>

                    <path
                        d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4 11.5-11.5Z"
                    />

                </svg>

                Edit

            </a>


            <a
                href="{{ route(
                    'opportunities.index'
                ) }}"
                class="btn-opportunity btn-back"
            >
                ← Back
            </a>


        </div>


    </div>


    {{-- =====================================================
         MAIN GRID
    ====================================================== --}}

    <div class="opportunity-grid">


        {{-- =================================================
             LEFT COLUMN
        ================================================== --}}

        <div>


            {{-- OPPORTUNITY INFORMATION --}}

            <div class="opportunity-card">


                <div class="opportunity-card-inner">


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


                        {{-- NAME --}}

                        <div class="detail-box">


                            <div class="detail-label">
                                Opportunity Name
                            </div>


                            <div class="detail-value">
                                {{ $opportunity->name }}
                            </div>


                        </div>


                        {{-- STAGE --}}

                        <div class="detail-box">


                            <div class="detail-label">
                                Stage
                            </div>


                            <div class="detail-value">
                                {{ $opportunity->stage->name ?? '-' }}
                            </div>


                        </div>


                        {{-- REVENUE --}}

                        <div class="detail-box">


                            <div class="detail-label">
                                Expected Revenue
                            </div>


                            <div class="revenue-value">

                                Rp
                                {{
    rtrim(
        rtrim(
            number_format(
                (float) $item->quantity,
                2,
                ',',
                '.'
            ),
            '0'
        ),
        ','
    )
}}

                            </div>


                        </div>


                        {{-- RATING --}}

                        <div class="detail-box">


                            <div class="detail-label">
                                Rating
                            </div>


                            <div class="stars">


                                @for(
                                    $i = 1;
                                    $i <= 5;
                                    $i++
                                )

                                    @if(
                                        $i <=
                                        $opportunity->rating
                                    )

                                        <span
                                            class="star-filled"
                                        >
                                            ★
                                        </span>

                                    @else

                                        <span
                                            class="star-empty"
                                        >
                                            ★
                                        </span>

                                    @endif

                                @endfor


                                <span class="rating-number">

                                    {{ $opportunity->rating }}/5

                                </span>


                            </div>


                        </div>


                        {{-- DATE --}}

                        <div class="detail-box">


                            <div class="detail-label">
                                Opportunity Date
                            </div>


                            <div class="detail-value">

                                @if(
                                    $opportunity->opportunity_date
                                )

                                    {{
                                        \Illuminate\Support\Carbon::parse(
                                            $opportunity->opportunity_date
                                        )->format('d/m/Y')
                                    }}

                                @else

                                    -

                                @endif


                            </div>


                        </div>


                        {{-- CUSTOMER --}}

                        <div class="detail-box">


                            <div class="detail-label">
                                Customer
                            </div>


                            <div class="detail-value">
                                {{ $opportunity->customer->name ?? '-' }}
                            </div>


                        </div>


                        {{-- SALESPERSON --}}

                        <div class="detail-box">


                            <div class="detail-label">
                                Salesperson
                            </div>


                            <div class="detail-value">
                                {{ $opportunity->salesperson->name ?? '-' }}
                            </div>


                        </div>


                    </div>


                    {{-- NOTES --}}

                    <div class="notes-section">


                        <h3 class="section-title">
                            Notes
                        </h3>


                        <p class="section-subtitle">
                            Additional information about this opportunity.
                        </p>


                        <div class="notes-box">


                            @if(
                                $opportunity->notes
                            )

                                {{ $opportunity->notes }}

                            @else

                                <span
                                    style="color:#94A3B8;"
                                >
                                    No notes have been added.
                                </span>

                            @endif


                        </div>


                    </div>


                </div>


            </div>


            {{-- =================================================
                 PRODUCTS
            ================================================== --}}

            <div class="opportunity-card products-card">


                <div class="products-card-header">


                    <div>

                        <div class="products-card-title">
                            Products
                        </div>


                        <div class="products-card-description">
                            Products included in this sales opportunity.
                        </div>

                    </div>


                    <div class="products-count">

                        {{ $productItems->count() }}

                        {{
                            $productItems->count() == 1
                                ? 'Product'
                                : 'Products'
                        }}

                    </div>


                </div>


                @if(
                    $productItems->count() > 0
                )


                    <div class="products-table-wrapper">


                        <table class="products-table">


                            <thead>

                                <tr>

                                    <th>
                                        Product
                                    </th>

                                    <th>
                                        Quantity
                                    </th>

                                    <th>
                                        Unit Price
                                    </th>

                                    <th>
                                        Subtotal
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @foreach(
                                    $productItems
                                    as $item
                                )


                                    <tr>


                                        {{-- PRODUCT --}}

                                        <td>


                                            <div class="product-identity">


                                                <div class="product-icon">

                                                    <svg
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.8"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >

                                                        <path
                                                            d="M20 7.5 12 3 4 7.5v9L12 21l8-4.5v-9Z"
                                                        />

                                                        <path
                                                            d="M4 7.5 12 12l8-4.5"
                                                        />

                                                        <path
                                                            d="M12 12v9"
                                                        />

                                                    </svg>

                                                </div>


                                                <div>


                                                    <div class="product-name">

                                                        {{
                                                            $item
                                                                ->product
                                                                ->product_name
                                                            ?? '-'
                                                        }}

                                                    </div>


                                                    <div class="product-code">

                                                        Code:
                                                        {{
                                                            $item
                                                                ->product
                                                                ->product_code
                                                            ?? '-'
                                                        }}

                                                    </div>


                                                </div>


                                            </div>


                                        </td>


                                       {{-- QUANTITY --}}

<td>

    @php

        $quantity = (float) $item->quantity;

        if ($quantity == floor($quantity)) {

            $quantityDisplay = number_format(
                $quantity,
                0,
                ',',
                '.'
            );

        } else {

            $quantityDisplay = rtrim(
                rtrim(
                    number_format(
                        $quantity,
                        2,
                        ',',
                        '.'
                    ),
                    '0'
                ),
                ','
            );

        }

    @endphp


    <span class="product-quantity">

        {{ $quantityDisplay }}

        {{ $item->product->unit ?? '' }}

    </span>

</td>
                                        {{-- UNIT PRICE --}}

                                        <td>

                                            <span class="product-price">

                                                Rp
                                                {{
                                                    number_format(
                                                        (float)
                                                        $item->unit_price,
                                                        0,
                                                        ',',
                                                        '.'
                                                    )
                                                }}

                                            </span>


                                        </td>


                                        {{-- SUBTOTAL --}}

                                        <td>

                                            <span class="product-subtotal">

                                                Rp
                                                {{
                                                    number_format(
                                                        (float)
                                                        $item->subtotal,
                                                        0,
                                                        ',',
                                                        '.'
                                                    )
                                                }}

                                            </span>


                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>


                        </table>


                    </div>


                    <div class="products-total">


                        <span class="products-total-label">
                            Product Total
                        </span>


                        <span class="products-total-value">

                            Rp
                            {{
                                number_format(
                                    (float) $productTotal,
                                    0,
                                    ',',
                                    '.'
                                )
                            }}

                        </span>


                    </div>


                @else


                    <div class="products-empty">


                        <div class="products-empty-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path
                                    d="M20 7.5 12 3 4 7.5v9L12 21l8-4.5v-9Z"
                                />

                                <path
                                    d="M4 7.5 12 12l8-4.5"
                                />

                                <path
                                    d="M12 12v9"
                                />

                            </svg>

                        </div>


                        <div class="products-empty-title">
                            No products added
                        </div>


                        <div class="products-empty-text">
                            No products are currently assigned to this opportunity.
                        </div>


                    </div>


                @endif


            </div>


            {{-- =================================================
                 ACTIVITIES
            ================================================== --}}

            <div class="opportunity-card activity-card">


                <div class="opportunity-card-inner">


                    <div class="activity-header">


                        <div>

                            <h3 class="section-title">
                                Activities
                            </h3>


                            <p class="section-subtitle">
                                Activity history for this opportunity.
                            </p>

                        </div>


                        <span class="activity-count">

                            {{ $opportunity->activities->count() }}

                            {{
                                $opportunity->activities->count()
                                == 1
                                    ? 'Activity'
                                    : 'Activities'
                            }}

                        </span>


                    </div>


                    @forelse(
                        $opportunity->activities
                        as $activity
                    )


                        @php

                            $activityStatus =
                                strtolower(
                                    $activity->status
                                    ?? ''
                                );


                            if (
                                $activityStatus
                                === 'planned'
                            ) {

                                $activityStatusBg =
                                    '#FFF3E6';

                                $activityStatusColor =
                                    '#B85A00';

                            } elseif (
                                $activityStatus
                                === 'done'
                            ) {

                                $activityStatusBg =
                                    '#EAF8F0';

                                $activityStatusColor =
                                    '#18784D';

                            } elseif (
                                $activityStatus
                                === 'cancelled'
                            ) {

                                $activityStatusBg =
                                    '#FDECEF';

                                $activityStatusColor =
                                    '#C52E3D';

                            } else {

                                $activityStatusBg =
                                    '#F1F5F9';

                                $activityStatusColor =
                                    '#64748B';

                            }

                        @endphp


                        <a
                            href="{{ route(
                                'activities.show',
                                $activity->id
                            ) }}"
                            class="activity-item"
                        >


                            <div class="activity-top">


                                <div>


                                    <div class="activity-subject">

                                        {{ $activity->subject }}

                                    </div>


                                    <div class="activity-type">

                                        {{
                                            $activity->type
                                            ?? 'Activity'
                                        }}

                                    </div>


                                </div>


                                <span
                                    class="activity-status"
                                    style="
                                        background:
                                            {{ $activityStatusBg }};

                                        color:
                                            {{ $activityStatusColor }};
                                    "
                                >

                                    {{
                                        ucfirst(
                                            $activityStatus
                                        )
                                    }}

                                </span>


                            </div>


                            <div class="activity-date">


                                📅


                                @if(
                                    $activity->activity_date
                                )

                                    {{
                                        \Illuminate\Support\Carbon::parse(
                                            $activity->activity_date
                                        )->format(
                                            'd/m/Y H:i'
                                        )
                                    }}

                                @else

                                    -

                                @endif


                                <span
                                    class="activity-detail-link"
                                >
                                    View details →
                                </span>


                            </div>


                        </a>


                    @empty


                        <div class="empty-state">


                            <div class="empty-icon">
                                ◷
                            </div>


                            <div class="empty-title">
                                No activities yet
                            </div>


                            <div class="empty-text">
                                No activities have been recorded for this opportunity.
                            </div>


                        </div>


                    @endforelse


                </div>


            </div>


        </div>


        {{-- =================================================
             RIGHT COLUMN
        ================================================== --}}

        <div>


            {{-- CUSTOMER --}}

            <div class="opportunity-card customer-card">


                <div class="side-card">


                    <div class="side-heading">


                        <div class="side-icon">

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
                                    r="4"
                                />

                                <path
                                    d="M4 21c0-4.2 3.6-7 8-7s8 2.8 8 7"
                                />

                            </svg>

                        </div>


                        <div>

                            <h2>
                                Customer
                            </h2>


                            <p>
                                Customer information
                            </p>

                        </div>


                    </div>


                    @if(
                        $opportunity->customer
                    )


                        <div class="customer-item">


                            <div class="customer-label">
                                Name
                            </div>


                            <div class="customer-value">
                                {{ $opportunity->customer->name }}
                            </div>


                        </div>


                        <div class="customer-item">


                            <div class="customer-label">
                                Company
                            </div>


                            <div class="customer-value">

                                {{
                                    $opportunity->customer->company
                                    ?? '-'
                                }}

                            </div>


                        </div>


                        @if(
                            !empty(
                                $opportunity
                                    ->customer
                                    ->email
                            )
                        )


                            <div class="customer-item">


                                <div class="customer-label">
                                    Email
                                </div>


                                <div class="customer-value">

                                    {{
                                        $opportunity
                                            ->customer
                                            ->email
                                    }}

                                </div>


                            </div>


                        @endif


                        @if(
                            !empty(
                                $opportunity
                                    ->customer
                                    ->phone
                            )
                        )


                            <div class="customer-item">


                                <div class="customer-label">
                                    Phone
                                </div>


                                <div class="customer-value">

                                    {{
                                        $opportunity
                                            ->customer
                                            ->phone
                                    }}

                                </div>


                            </div>


                        @endif


                        <a
                            href="{{ route(
                                'customers.show',
                                $opportunity->customer->id
                            ) }}"
                            class="customer-link"
                        >

                            View Customer →

                        </a>


                    @else


                        <div
                            style="
                                color:#94A3B8;
                                font-size:11px;
                            "
                        >

                            Customer not found.

                        </div>


                    @endif


                </div>


            </div>


            {{-- SUMMARY --}}

            <div class="opportunity-card summary-card">


                <div class="side-card">


                    <div class="side-heading">


                        <div class="side-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path
                                    d="M12 3v18"
                                />

                                <path
                                    d="M17 7h-5.5a3.5 3.5 0 0 0 0 7H14a3.5 3.5 0 0 1 0 7H7"
                                />

                            </svg>

                        </div>


                        <div>

                            <h2>
                                Summary
                            </h2>


                            <p>
                                Opportunity overview
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
                            Salesperson
                        </span>


                        <span class="summary-value">
                            {{ $opportunity->salesperson->name ?? '-' }}
                        </span>


                    </div>


                    <div class="summary-row">


                        <span class="summary-label">
                            Expected Revenue
                        </span>


                        <span class="summary-value">

                            Rp
                            {{
                                number_format(
                                    (float)
                                    $opportunity->expected_revenue,
                                    0,
                                    ',',
                                    '.'
                                )
                            }}

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
                            Products
                        </span>


                        <span class="summary-value">

                            {{ $productItems->count() }}

                        </span>


                    </div>


                    <div class="summary-row">


                        <span class="summary-label">
                            Activities
                        </span>


                        <span class="summary-value">

                            {{ $opportunity->activities->count() }}

                        </span>


                    </div>


                </div>


            </div>


        </div>


    </div>


</div>

@endsection