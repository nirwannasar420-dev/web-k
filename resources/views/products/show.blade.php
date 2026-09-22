@extends('layouts.app')

@section('title', 'Product Details')
@section('page-title', 'Product Details')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .product-detail-page {
        width: 100%;
    }


    /* =========================================================
       BACK
    ========================================================= */

    .product-back {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        color: #0B2A6F;

        font-size: 12px;

        font-weight: 700;

        text-decoration: none;
    }

    .product-back:hover {
        text-decoration: underline;
    }

    .product-back svg {
        width: 16px !important;

        height: 16px !important;

        flex-shrink: 0;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .product-detail-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        margin-top: 18px;

        margin-bottom: 22px;
    }

    .product-detail-title-wrap {
        display: flex;

        align-items: center;

        gap: 13px;
    }

    .product-detail-main-icon {
        width: 48px;

        height: 48px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        border-radius: 11px;

        background: #EEF4FF;

        color: #0B2A6F;
    }

    .product-detail-main-icon svg {
        width: 23px !important;

        height: 23px !important;
    }

    .product-detail-header h1 {
        margin: 0;

        color: #172033;

        font-size: 25px;

        font-weight: 800;

        line-height: 1.2;
    }

    .product-detail-header p {
        margin: 5px 0 0;

        color: #64748B;

        font-size: 11px;
    }


    /* =========================================================
       EDIT BUTTON
    ========================================================= */

    .product-detail-edit {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        padding: 10px 14px;

        border-radius: 9px;

        background: #0B2A6F;

        color: #FFFFFF;

        font-size: 11px;

        font-weight: 700;

        text-decoration: none;

        white-space: nowrap;

        transition: .2s ease;
    }

    .product-detail-edit:hover {
        background: #071D4D;

        color: #FFFFFF;
    }

    .product-detail-edit svg {
        width: 14px !important;

        height: 14px !important;
    }


    /* =========================================================
       SUMMARY CARDS
    ========================================================= */

    .product-detail-summary {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 15px;

        margin-bottom: 18px;
    }

    .product-summary-card {
        position: relative;

        padding: 17px;

        background: #FFFFFF;

        border: 1px solid #E2E8F0;

        border-radius: 11px;

        box-shadow:
            0 3px 12px rgba(15,23,42,.04);
    }

    .product-summary-label {
        color: #94A3B8;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .6px;
    }

    .product-summary-value {
        margin-top: 7px;

        color: #172033;

        font-size: 21px;

        font-weight: 800;

        line-height: 1.2;
    }

    .product-summary-description {
        margin-top: 4px;

        color: #94A3B8;

        font-size: 9px;
    }

    .product-summary-icon {
        position: absolute;

        top: 15px;

        right: 15px;

        width: 35px;

        height: 35px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 8px;

        background: #F1F5F9;

        color: #64748B;
    }

    .product-summary-icon svg {
        width: 17px !important;

        height: 17px !important;
    }


    /* =========================================================
       DETAIL CARD
    ========================================================= */

    .product-detail-card {
        margin-bottom: 18px;

        background: #FFFFFF;

        border: 1px solid #E2E8F0;

        border-radius: 12px;

        box-shadow:
            0 3px 12px rgba(15,23,42,.04);

        overflow: hidden;
    }

    .product-detail-card-header {
        padding: 16px 18px;

        border-bottom: 1px solid #E2E8F0;
    }

    .product-detail-card-title {
        color: #172033;

        font-size: 13px;

        font-weight: 800;
    }

    .product-detail-card-description {
        margin-top: 3px;

        color: #94A3B8;

        font-size: 9px;
    }


    /* =========================================================
       PRODUCT INFORMATION
    ========================================================= */

    .product-information {
        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));
    }

    .product-information-item {
        padding: 16px 18px;

        border-right: 1px solid #F1F5F9;
    }

    .product-information-item:last-child {
        border-right: none;
    }

    .product-information-label {
        margin-bottom: 6px;

        color: #94A3B8;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .5px;
    }

    .product-information-value {
        color: #172033;

        font-size: 12px;

        font-weight: 700;
    }

    .product-code-badge {
        display: inline-flex;

        padding: 5px 8px;

        border-radius: 6px;

        background: #EEF4FF;

        color: #0B2A6F;

        font-size: 10px;

        font-weight: 800;
    }


    /* =========================================================
       OPPORTUNITY USAGE
    ========================================================= */

    .product-opportunity-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    .product-opportunity-table {
        width: 100%;

        border-collapse: collapse;
    }

    .product-opportunity-table th {
        padding: 11px 15px;

        background: #F8FAFC;

        border-bottom: 1px solid #E2E8F0;

        color: #64748B;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .5px;

        text-align: left;

        white-space: nowrap;
    }

    .product-opportunity-table td {
        padding: 13px 15px;

        border-bottom: 1px solid #F1F5F9;

        color: #475569;

        font-size: 10px;

        white-space: nowrap;

        vertical-align: middle;
    }

    .product-opportunity-table tbody tr:hover {
        background: #FAFCFF;
    }

    .product-opportunity-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================================================
       LINKS / BADGES
    ========================================================= */

    .opportunity-link {
        color: #0B2A6F;

        font-weight: 800;

        text-decoration: none;
    }

    .opportunity-link:hover {
        text-decoration: underline;
    }

    .stage-badge {
        display: inline-flex;

        padding: 5px 8px;

        border-radius: 6px;

        background: #EEF4FF;

        color: #0B2A6F;

        font-size: 9px;

        font-weight: 800;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-opportunities {
        padding: 45px 20px;

        text-align: center;

        color: #94A3B8;

        font-size: 10px;
    }

    .empty-opportunities-icon {
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

    .empty-opportunities-icon svg {
        width: 22px !important;

        height: 22px !important;
    }


    /* =========================================================
       BOTTOM ACTION
    ========================================================= */

    .product-detail-bottom {
        display: flex;

        justify-content: flex-end;

        gap: 8px;

        margin-top: 18px;
    }

    .product-bottom-back {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 10px 15px;

        border: 1px solid #E2E8F0;

        border-radius: 9px;

        background: #FFFFFF;

        color: #64748B;

        font-size: 10px;

        font-weight: 700;

        text-decoration: none;
    }

    .product-bottom-back:hover {
        background: #F8FAFC;

        color: #475569;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 800px) {

        .product-detail-summary {
            grid-template-columns: 1fr;
        }

        .product-information {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

        .product-information-item {
            border-right: none;

            border-bottom:
                1px solid #F1F5F9;
        }

    }


    @media (max-width: 600px) {

        .product-detail-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .product-detail-edit {
            width: 100%;

            justify-content: center;
        }

        .product-information {
            grid-template-columns: 1fr;
        }

        .product-detail-bottom {
            flex-direction: column;
        }

        .product-bottom-back {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

@php

    /* =========================================================
       TOTAL QUANTITY
    ========================================================= */

    $totalQuantity =
        (float) $product
            ->opportunityItems
            ->sum('quantity');


    /* =========================================================
       QUANTITY FORMATTER
       27.00  -> 27
       2.00   -> 2
       2.50   -> 2,5
       2.25   -> 2,25
    ========================================================= */

    $formatQuantity =
        function ($value) {

            $number = (float) $value;


            if ($number == floor($number)) {

                return number_format(
                    $number,
                    0,
                    ',',
                    '.'
                );

            }


            return rtrim(
                rtrim(
                    number_format(
                        $number,
                        2,
                        ',',
                        '.'
                    ),
                    '0'
                ),
                ','
            );

        };

@endphp


<div class="product-detail-page">


    {{-- =====================================================
         BACK
    ====================================================== --}}

    <a
        href="{{ route('products.index') }}"
        class="product-back"
    >

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >

            <path d="m15 18-6-6 6-6"/>

        </svg>

        Back to Products

    </a>


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="product-detail-header">


        <div class="product-detail-title-wrap">


            <div class="product-detail-main-icon">

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

                <h1>
                    {{ $product->product_name }}
                </h1>


                <p>
                    Product information, sales activity, and opportunity usage.
                </p>

            </div>


        </div>


        <a
            href="{{ route('products.edit', $product) }}"
            class="product-detail-edit"
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

            Edit Product

        </a>


    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="product-detail-summary">


        {{-- OPPORTUNITIES --}}

        <div class="product-summary-card">


            <div class="product-summary-label">
                Opportunities
            </div>


            <div class="product-summary-value">

                {{
                    $product
                        ->opportunityItems
                        ->count()
                }}

            </div>


            <div class="product-summary-description">
                Opportunities using this product
            </div>


            <div class="product-summary-icon">

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


        </div>


        {{-- TOTAL QUANTITY --}}

        <div class="product-summary-card">


            <div class="product-summary-label">
                Total Quantity
            </div>


            <div class="product-summary-value">

                {{ $formatQuantity($totalQuantity) }}

            </div>


            <div class="product-summary-description">

                {{ $product->unit ?: 'Units' }}
                across opportunities

            </div>


            <div class="product-summary-icon">

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


        </div>


        {{-- TOTAL SALES VALUE --}}

        <div class="product-summary-card">


            <div class="product-summary-label">
                Total Sales Value
            </div>


            <div
                class="product-summary-value"
                style="font-size:17px;"
            >

                Rp
                {{
                    number_format(
                        (float)
                        $product
                            ->opportunityItems
                            ->sum('subtotal'),
                        0,
                        ',',
                        '.'
                    )
                }}

            </div>


            <div class="product-summary-description">
                Combined value across opportunities
            </div>


            <div class="product-summary-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M12 1v22"/>

                    <path
                        d="M17 5H9.5a3.5 3.5 0 0 0 0 7H15a3.5 3.5 0 0 1 0 7H7"
                    />

                </svg>

            </div>


        </div>


    </div>


    {{-- =====================================================
         PRODUCT INFORMATION
    ====================================================== --}}

    <div class="product-detail-card">


        <div class="product-detail-card-header">

            <div class="product-detail-card-title">
                Product Information
            </div>


            <div class="product-detail-card-description">
                Master data information for this product.
            </div>

        </div>


        <div class="product-information">


            {{-- PRODUCT CODE --}}

            <div class="product-information-item">


                <div class="product-information-label">
                    Product Code
                </div>


                <div class="product-information-value">


                    <span class="product-code-badge">

                        {{ $product->product_code }}

                    </span>


                </div>


            </div>


            {{-- PRODUCT NAME --}}

            <div class="product-information-item">


                <div class="product-information-label">
                    Product Name
                </div>


                <div class="product-information-value">

                    {{ $product->product_name }}

                </div>


            </div>


            {{-- UNIT --}}

            <div class="product-information-item">


                <div class="product-information-label">
                    Unit
                </div>


                <div class="product-information-value">

                    {{ $product->unit ?: 'Not specified' }}

                </div>


            </div>


            {{-- DEFAULT PRICE --}}

            <div class="product-information-item">


                <div class="product-information-label">
                    Default Price
                </div>


                <div class="product-information-value">

                    Rp
                    {{
                        number_format(
                            (float) $product->price,
                            0,
                            ',',
                            '.'
                        )
                    }}

                </div>


            </div>


        </div>


    </div>


    {{-- =====================================================
         OPPORTUNITY USAGE
    ====================================================== --}}

    <div class="product-detail-card">


        <div class="product-detail-card-header">


            <div class="product-detail-card-title">
                Opportunity Usage
            </div>


            <div class="product-detail-card-description">
                Opportunities that currently contain this product.
            </div>


        </div>


        @if(
            $product->opportunityItems->count()
        )


            <div class="product-opportunity-wrapper">


                <table class="product-opportunity-table">


                    <thead>

                        <tr>


                            <th>
                                Opportunity
                            </th>


                            <th>
                                Customer
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


                            <th>
                                Stage
                            </th>


                        </tr>

                    </thead>


                    <tbody>


                        @foreach(
                            $product->opportunityItems
                            as $item
                        )


                            <tr>


                                {{-- OPPORTUNITY --}}

                                <td>


                                    <a
                                        href="{{ route(
                                            'opportunities.show',
                                            $item->opportunity
                                        ) }}"
                                        class="opportunity-link"
                                    >

                                        {{
                                            $item
                                                ->opportunity
                                                ->name
                                        }}

                                    </a>


                                </td>


                                {{-- CUSTOMER --}}

                                <td>

                                    {{
                                        $item
                                            ->opportunity
                                            ->customer
                                            ->company
                                        ?? $item
                                            ->opportunity
                                            ->customer
                                            ->name
                                        ?? '-'
                                    }}

                                </td>


                                {{-- QUANTITY --}}

                                <td>

                                    {{ $formatQuantity(
                                        $item->quantity
                                    ) }}

                                    {{ $product->unit }}

                                </td>


                                {{-- UNIT PRICE --}}

                                <td>

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

                                </td>


                                {{-- SUBTOTAL --}}

                                <td
                                    style="
                                        font-weight:800;
                                        color:#172033;
                                    "
                                >

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

                                </td>


                                {{-- STAGE --}}

                                <td>


                                    <span class="stage-badge">

                                        {{
                                            $item
                                                ->opportunity
                                                ->stage
                                                ->name
                                            ?? '-'
                                        }}

                                    </span>


                                </td>


                            </tr>


                        @endforeach


                    </tbody>


                </table>


            </div>


        @else


            <div class="empty-opportunities">


                <div class="empty-opportunities-icon">


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


                This product has not been used
                in any opportunity yet.


            </div>


        @endif


    </div>


    {{-- =====================================================
         BOTTOM ACTION
    ====================================================== --}}

    <div class="product-detail-bottom">


        <a
            href="{{ route('products.index') }}"
            class="product-bottom-back"
        >

            Back to Products

        </a>


    </div>


</div>

@endsection