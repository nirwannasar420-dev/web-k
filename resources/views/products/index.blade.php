@extends('layouts.app')

@section('title', 'Products')

@section('page-title', 'Products')

@section('styles')

<style>

    /* =====================================================
       PRODUCTS PAGE
    ===================================================== */

    .products-page {
        width: 100%;
    }


    /* =====================================================
       PAGE HEADER
    ===================================================== */

    .products-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }


    .products-header-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }


    .products-header-icon {
        width: 48px;
        height: 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 11px;

        background: #EAF0FF;
        color: #0B2A6F;
    }


    .products-header-icon svg {
        width: 23px;
        height: 23px;
    }


    .products-heading h1 {
        color: #172033;
        font-size: 28px;
        font-weight: 800;
        line-height: 1.2;
    }


    .products-heading p {
        margin-top: 6px;

        color: #64748B;

        font-size: 13px;
        line-height: 1.5;
    }


    .product-add-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        min-width: 126px;

        padding: 11px 17px;

        border: none;
        border-radius: 9px;

        background: #0B2A6F;
        color: #FFFFFF;

        font-size: 12px;
        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;

        box-shadow:
            0 5px 14px rgba(11,42,111,.15);
    }


    .product-add-button:hover {
        background: #071D4D;
        transform: translateY(-1px);
    }


    .product-add-button svg {
        width: 16px;
        height: 16px;
    }


    /* =====================================================
       SUMMARY
    ===================================================== */

    .products-summary {
        display: grid;

        grid-template-columns:
            minmax(0, 1.45fr)
            minmax(220px, .55fr);

        gap: 15px;

        margin-bottom: 18px;
    }


    /* =====================================================
       MAIN SUMMARY CARD
    ===================================================== */

    .products-summary-main {
        position: relative;

        min-height: 135px;

        overflow: hidden;

        padding: 20px 22px;

        border-radius: 12px;

        background:
            linear-gradient(
                135deg,
                #0B2A6F 0%,
                #174397 100%
            );

        color: #FFFFFF;

        box-shadow:
            0 8px 20px rgba(11,42,111,.12);
    }


    /* Smaller decorative circle */

    .products-summary-main::before {

        content: '';

        position: absolute;

        width: 120px;
        height: 120px;

        right: -35px;
        top: -60px;

        border-radius: 50%;

        border:
            14px solid
            rgba(255,255,255,.07);

    }


    .products-summary-main::after {

        content: '';

        position: absolute;

        width: 50px;
        height: 50px;

        right: 72px;
        bottom: -25px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.045);

    }


    .products-summary-label {

        position: relative;
        z-index: 2;

        color:
            rgba(255,255,255,.62);

        font-size: 10px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .8px;
    }


    .products-summary-title {

        position: relative;
        z-index: 2;

        margin-top: 5px;

        color: #FFFFFF;

        font-size: 19px;

        font-weight: 800;
    }


    .products-summary-description {

        position: relative;
        z-index: 2;

        margin-top: 5px;

        max-width: 560px;

        color:
            rgba(255,255,255,.78);

        font-size: 11px;

        line-height: 1.5;
    }


    .products-summary-total {

        position: relative;
        z-index: 2;

        display: inline-flex;

        align-items: center;

        gap: 7px;

        margin-top: 12px;

        padding: 6px 9px;

        border:
            1px solid
            rgba(255,255,255,.13);

        border-radius: 7px;

        background:
            rgba(255,255,255,.08);

        color: #FFFFFF;

        font-size: 10px;

        font-weight: 700;
    }


    .products-summary-total svg {
        width: 13px;
        height: 13px;
    }


    /* =====================================================
       TOTAL PRODUCTS CARD
    ===================================================== */

    .products-count-card {

        display: flex;

        align-items: center;

        justify-content: space-between;

        min-height: 135px;

        padding: 20px;

        background: #FFFFFF;

        border:
            1px solid #E2E8F0;

        border-radius: 12px;

        box-shadow:
            0 3px 12px rgba(15,23,42,.04);
    }


    .products-count-label {

        color: #94A3B8;

        font-size: 10px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .7px;
    }


    .products-count-number {

        margin-top: 7px;

        color: #172033;

        font-size: 30px;

        font-weight: 800;

        line-height: 1;
    }


    .products-count-description {

        margin-top: 7px;

        color: #64748B;

        font-size: 10px;
    }


    .products-count-icon {

        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #EEF4FF;

        color: #0B2A6F;
    }


    .products-count-icon svg {
        width: 21px;
        height: 21px;
    }


    /* =====================================================
       SEARCH
    ===================================================== */

    .products-search-card {

        padding: 16px 17px;

        margin-bottom: 16px;

        background: #FFFFFF;

        border:
            1px solid #E2E8F0;

        border-radius: 12px;

        box-shadow:
            0 3px 12px rgba(15,23,42,.04);
    }


    .products-search-top {

        margin-bottom: 10px;
    }


    .products-search-title {

        color: #172033;

        font-size: 13px;

        font-weight: 800;
    }


    .products-search-description {

        margin-top: 3px;

        color: #94A3B8;

        font-size: 10px;
    }


    .products-search-form {

        display: flex;

        align-items: center;

        gap: 9px;
    }


    .product-search-input-wrapper {

        position: relative;

        flex: 1;
    }


    .product-search-icon {

        position: absolute;

        left: 13px;
        top: 50%;

        width: 17px;
        height: 17px;

        transform:
            translateY(-50%);

        color: #94A3B8;

        pointer-events: none;
    }


    .product-search-input {

        width: 100%;

        padding: 11px 13px 11px 39px;

        border:
            1px solid #D9E1EC;

        border-radius: 9px;

        background: #FAFBFD;

        color: #172033;

        font-size: 12px;

        outline: none;

        transition: .2s ease;
    }


    .product-search-input::placeholder {
        color: #94A3B8;
    }


    .product-search-input:focus {

        border-color: #0B2A6F;

        background: #FFFFFF;

        box-shadow:
            0 0 0 3px
            rgba(11,42,111,.07);
    }


    .product-search-button {

        min-width: 86px;

        padding: 11px 17px;

        border: none;

        border-radius: 9px;

        background: #0B2A6F;

        color: #FFFFFF;

        font-size: 11px;

        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;
    }


    .product-search-button:hover {
        background: #071D4D;
    }


    /* =====================================================
       TABLE CARD
    ===================================================== */

    .products-table-card {

        overflow: hidden;

        background: #FFFFFF;

        border:
            1px solid #E2E8F0;

        border-radius: 12px;

        box-shadow:
            0 3px 12px rgba(15,23,42,.04);
    }


    .products-table-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 16px 18px;

        border-bottom:
            1px solid #E2E8F0;
    }


    .products-table-title {

        color: #172033;

        font-size: 14px;

        font-weight: 800;
    }


    .products-table-subtitle {

        margin-top: 4px;

        color: #94A3B8;

        font-size: 10px;
    }


    .products-table-count {

        display: inline-flex;

        padding: 6px 10px;

        border-radius: 7px;

        background: #F1F5F9;

        color: #64748B;

        font-size: 10px;

        font-weight: 800;
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

        padding: 12px 18px;

        border-bottom:
            1px solid #E2E8F0;

        color: #64748B;

        font-size: 10px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .65px;

        text-align: left;

        white-space: nowrap;
    }


    .products-table td {

        padding: 16px 18px;

        border-bottom:
            1px solid #F1F5F9;

        color: #475569;

        font-size: 12px;

        vertical-align: middle;
    }


    .products-table tbody tr {

        transition: .2s ease;
    }


    .products-table tbody tr:hover {

        background:
            #FAFCFF;
    }


    .products-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =====================================================
       NUMBER
    ===================================================== */

    .product-number {

        display: flex;

        align-items: center;
        justify-content: center;

        width: 30px;
        height: 30px;

        border-radius: 7px;

        background: #F1F5F9;

        color: #64748B;

        font-size: 11px;

        font-weight: 800;
    }


    /* =====================================================
       PRODUCT IDENTITY
    ===================================================== */

    .product-identity {

        display: flex;

        align-items: center;

        gap: 11px;
    }


    .product-avatar {

        width: 40px;
        height: 40px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 9px;

        background:
            linear-gradient(
                135deg,
                #EEF4FF,
                #E5ECFB
            );

        color: #0B2A6F;
    }


    .product-avatar svg {

        width: 19px;
        height: 19px;
    }


    .product-name {

        display: block;

        color: #172033;

        font-size: 13px;

        font-weight: 800;

        line-height: 1.35;
    }


    .product-code-small {

        display: block;

        margin-top: 3px;

        color: #94A3B8;

        font-size: 10px;
    }


    /* =====================================================
       CODE
    ===================================================== */

    .product-code-badge {

        display: inline-flex;

        padding: 6px 10px;

        border-radius: 7px;

        background: #EEF4FF;

        color: #0B2A6F;

        font-size: 11px;

        font-weight: 800;

        white-space: nowrap;
    }


    /* =====================================================
       UNIT
    ===================================================== */

    .product-unit-badge {

        display: inline-flex;

        padding: 6px 9px;

        border:
            1px solid #E2E8F0;

        border-radius: 7px;

        background: #F8FAFC;

        color: #64748B;

        font-size: 11px;

        font-weight: 700;

        white-space: nowrap;
    }


    /* =====================================================
       PRICE
    ===================================================== */

    .product-price {

        color: #172033;

        font-size: 12px;

        font-weight: 800;

        white-space: nowrap;
    }


    .product-price-label {

        margin-top: 3px;

        color: #94A3B8;

        font-size: 9px;
    }


    /* =====================================================
       STATUS
    ===================================================== */

    .product-status {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 6px 9px;

        border-radius: 7px;

        background: #ECFDF5;

        color: #15803D;

        font-size: 10px;

        font-weight: 800;
    }


    .product-status-dot {

        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #16A34A;
    }


    /* =====================================================
       ACTIONS
    ===================================================== */

    .product-actions {

        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 6px;

        white-space: nowrap;
    }


    .product-action {

        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 5px;

        min-height: 31px;

        padding: 7px 10px;

        border-radius: 7px;

        font-size: 10px;

        font-weight: 800;

        transition: .2s ease;
    }


    .product-action svg {

        width: 13px;
        height: 13px;
    }


    .product-action.details {

        background: #F1F5FF;

        color: #0B2A6F;
    }


    .product-action.details:hover {
        background: #E5EDFF;
    }


    .product-action.edit {

        background: #F8FAFC;

        color: #64748B;
    }


    .product-action.edit:hover {
        background: #F1F5F9;
    }


    .product-action.delete {

        border: none;

        background: #FFF6F6;

        color: #D93025;

        cursor: pointer;
    }


    .product-action.delete:hover {
        background: #FCE8E6;
    }


    /* =====================================================
       EMPTY
    ===================================================== */

    .products-empty {

        padding: 65px 20px !important;

        text-align: center;

        border-bottom: none !important;
    }


    .products-empty-icon {

        width: 58px;
        height: 58px;

        margin: 0 auto 14px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background: #F1F5F9;

        color: #94A3B8;
    }


    .products-empty-icon svg {

        width: 27px;
        height: 27px;
    }


    .products-empty h3 {

        color: #172033;

        font-size: 14px;

        font-weight: 800;
    }


    .products-empty p {

        max-width: 390px;

        margin: 7px auto 0;

        color: #94A3B8;

        font-size: 11px;

        line-height: 1.55;
    }


    .products-empty a {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        margin-top: 17px;

        padding: 10px 14px;

        border-radius: 8px;

        background: #0B2A6F;

        color: #FFFFFF;

        font-size: 10px;

        font-weight: 800;
    }


    .products-empty a svg {

        width: 13px;
        height: 13px;
    }


    /* =====================================================
       PAGINATION
    ===================================================== */

    .products-pagination {

        padding: 15px 18px;

        border-top:
            1px solid #E2E8F0;
    }


    .products-pagination nav {
        display: flex;
        justify-content: center;
    }


    /* =====================================================
       DELETE MODAL
    ===================================================== */

    .product-modal-overlay {

        position: fixed;

        inset: 0;

        display: none;

        align-items: center;
        justify-content: center;

        padding: 20px;

        background:
            rgba(15,23,42,.45);

        z-index: 99999;
    }


    .product-modal-overlay.show {
        display: flex;
    }


    .product-modal {

        width: 100%;

        max-width: 430px;

        border-radius: 14px;

        background: #FFFFFF;

        box-shadow:
            0 20px 55px
            rgba(15,23,42,.20);
    }


    .product-modal-body {
        padding: 22px;
    }


    .product-modal-top {

        display: flex;

        align-items: flex-start;

        gap: 13px;
    }


    .product-modal-icon {

        width: 40px;
        height: 40px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 10px;

        background: #FCE8E6;

        color: #D93025;
    }


    .product-modal-icon svg {

        width: 20px;
        height: 20px;
    }


    .product-modal-title {

        color: #172033;

        font-size: 15px;

        font-weight: 800;
    }


    .product-modal-text {

        margin-top: 6px;

        color: #64748B;

        font-size: 11px;

        line-height: 1.6;
    }


    .product-modal-warning {

        margin-top: 7px;

        color: #D93025;

        font-size: 10px;

        line-height: 1.5;
    }


    .product-modal-actions {

        display: flex;

        justify-content: flex-end;

        gap: 8px;

        margin-top: 20px;
    }


    .product-modal-cancel {

        padding: 9px 15px;

        border:
            1px solid #E2E8F0;

        border-radius: 8px;

        background: #FFFFFF;

        color: #64748B;

        font-size: 10px;

        font-weight: 800;

        cursor: pointer;
    }


    .product-modal-delete {

        padding: 9px 15px;

        border: none;

        border-radius: 8px;

        background: #D93025;

        color: #FFFFFF;

        font-size: 10px;

        font-weight: 800;

        cursor: pointer;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 900px) {

        .products-summary {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 700px) {

        .products-header {
            align-items: flex-start;
            flex-direction: column;
        }


        .product-add-button {
            width: 100%;
        }


        .products-search-form {
            flex-direction: column;
            align-items: stretch;
        }


        .product-search-button {
            width: 100%;
        }


        .products-table-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 9px;
        }

    }

</style>

@endsection


@section('content')

<div class="products-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="products-header">


        <div class="products-header-left">


            <div class="products-header-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M3 7l9-4 9 4-9 4-9-4Z"/>

                    <path d="M3 7v10l9 4 9-4V7"/>

                    <path d="M12 11v10"/>

                </svg>

            </div>


            <div class="products-heading">

                <h1>
                    Products
                </h1>


                <p>
                    Manage product master data used in sales opportunities.
                </p>

            </div>


        </div>


        <a
            href="{{ route('products.create') }}"
            class="product-add-button"
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

            Add Product

        </a>


    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="products-summary">


        {{-- MAIN SUMMARY --}}

        <div class="products-summary-main">


            <div class="products-summary-label">
                Product Catalog
            </div>


            <div class="products-summary-title">
                Product Master Data
            </div>


            <div class="products-summary-description">
                Maintain standardized product information for opportunities,
                sales transactions, and future reporting.
            </div>


            <div class="products-summary-total">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M3 7l9-4 9 4-9 4-9-4Z"/>

                    <path d="M3 7v10l9 4 9-4V7"/>

                </svg>

                Centralized Product Management

            </div>


        </div>


        {{-- TOTAL PRODUCTS --}}

        <div class="products-count-card">


            <div>

                <div class="products-count-label">
                    Total Products
                </div>


                <div class="products-count-number">
                    {{ $products->total() }}
                </div>


                <div class="products-count-description">
                    Registered product master data
                </div>

            </div>


            <div class="products-count-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M20 7.5 12 3 4 7.5v9L12 21l8-4.5v-9Z"/>

                    <path d="M4 7.5 12 12l8-4.5"/>

                    <path d="M12 12v9"/>

                </svg>

            </div>


        </div>


    </div>


    {{-- =====================================================
         SEARCH
    ====================================================== --}}

    <div class="products-search-card">


        <div class="products-search-top">

            <div class="products-search-title">
                Search Products
            </div>

            <div class="products-search-description">
                Search by product code, name, or unit.
            </div>

        </div>


        <form
            action="{{ route('products.index') }}"
            method="GET"
            class="products-search-form"
        >


            <div class="product-search-input-wrapper">


                <svg
                    class="product-search-icon"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <circle
                        cx="11"
                        cy="11"
                        r="7"
                    />

                    <path d="m20 20-4-4"/>

                </svg>


                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search product code, name, or unit..."
                    class="product-search-input"
                >


            </div>


            <button
                type="submit"
                class="product-search-button"
            >

                Search

            </button>


        </form>


    </div>


    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <div class="products-table-card">


        <div class="products-table-header">


            <div>

                <div class="products-table-title">
                    Product List
                </div>


                <div class="products-table-subtitle">
                    All products currently registered in the CRM.
                </div>

            </div>


            <div class="products-table-count">

                {{ $products->count() }}

                shown

            </div>


        </div>


        <div class="products-table-wrapper">


            <table class="products-table">


                <thead>

                    <tr>

                        <th>
                            #
                        </th>

                        <th>
                            Product
                        </th>

                        <th>
                            Code
                        </th>

                        <th>
                            Unit
                        </th>

                        <th>
                            Default Price
                        </th>

                        <th>
                            Status
                        </th>

                        <th style="text-align:right;">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse(
                        $products
                        as $index => $product
                    )


                        <tr>


                            {{-- NUMBER --}}

                            <td>

                                <div class="product-number">

                                    {{
                                        ($products->currentPage() - 1)
                                        * $products->perPage()
                                        + $index
                                        + 1
                                    }}

                                </div>

                            </td>


                            {{-- PRODUCT --}}

                            <td>

                                <div class="product-identity">


                                    <div class="product-avatar">

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

                                        <span class="product-name">

                                            {{ $product->product_name }}

                                        </span>


                                        <span class="product-code-small">

                                            Product master data

                                        </span>

                                    </div>


                                </div>

                            </td>


                            {{-- CODE --}}

                            <td>

                                <span class="product-code-badge">

                                    {{ $product->product_code }}

                                </span>

                            </td>


                            {{-- UNIT --}}

                            <td>

                                <span class="product-unit-badge">

                                    {{ $product->unit ?: 'Not specified' }}

                                </span>

                            </td>


                            {{-- PRICE --}}

                            <td>

                                <div class="product-price">

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


                                <div class="product-price-label">
                                    Default price
                                </div>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                <span class="product-status">

                                    <span class="product-status-dot"></span>

                                    Active

                                </span>

                            </td>


                            {{-- ACTIONS --}}

                            <td>

                                <div class="product-actions">


                                    {{-- DETAILS --}}

                                    <a
                                        href="{{ route(
                                            'products.show',
                                            $product
                                        ) }}"
                                        class="product-action details"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >

                                            <path
                                                d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"
                                            />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="2.5"
                                            />

                                        </svg>

                                        Details

                                    </a>


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route(
                                            'products.edit',
                                            $product
                                        ) }}"
                                        class="product-action edit"
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


                                    {{-- DELETE --}}

                                    <button
                                        type="button"
                                        class="product-action delete"
                                        onclick="openProductDeleteModal(
                                            {{ $product->id }},
                                            @js($product->product_name)
                                        )"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >

                                            <path d="M4 7h16"/>

                                            <path d="M10 11v6"/>

                                            <path d="M14 11v6"/>

                                            <path d="M6 7l1 13h10l1-13"/>

                                            <path d="M9 7V4h6v3"/>

                                        </svg>

                                        Delete

                                    </button>


                                </div>

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="7"
                                class="products-empty"
                            >


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


                                <h3>
                                    No products yet
                                </h3>


                                <p>
                                    No product master data is available.
                                    Add your first product to start managing
                                    products in the CRM.
                                </p>


                                <a
                                    href="{{ route('products.create') }}"
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

                                    Add Product

                                </a>


                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


        {{-- PAGINATION --}}

        @if($products->hasPages())

            <div class="products-pagination">

                {{ $products->links() }}

            </div>

        @endif


    </div>


</div>


{{-- =====================================================
     DELETE MODAL
====================================================== --}}

<div
    id="productDeleteModal"
    class="product-modal-overlay"
>


    <div class="product-modal">


        <div class="product-modal-body">


            <div class="product-modal-top">


                <div class="product-modal-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <circle
                            cx="12"
                            cy="12"
                            r="9"
                        />

                        <path d="M12 8v4"/>

                        <path d="M12 16h.01"/>

                    </svg>

                </div>


                <div>


                    <div class="product-modal-title">
                        Delete Product?
                    </div>


                    <div class="product-modal-text">

                        Are you sure you want to delete
                        <strong id="productDeleteName"></strong>?

                    </div>


                    <div class="product-modal-warning">

                        Products already used in opportunities cannot be deleted.

                    </div>


                </div>


            </div>


            <div class="product-modal-actions">


                <button
                    type="button"
                    class="product-modal-cancel"
                    onclick="closeProductDeleteModal()"
                >

                    Cancel

                </button>


                <form
                    id="productDeleteForm"
                    method="POST"
                >

                    @csrf

                    @method('DELETE')


                    <button
                        type="submit"
                        class="product-modal-delete"
                    >

                        Delete Product

                    </button>


                </form>


            </div>


        </div>


    </div>


</div>


<script>

    function openProductDeleteModal(id, name)
    {

        const modal =
            document.getElementById(
                'productDeleteModal'
            );


        const form =
            document.getElementById(
                'productDeleteForm'
            );


        const nameElement =
            document.getElementById(
                'productDeleteName'
            );


        form.action =
            '/products/' + id;


        nameElement.textContent =
            name;


        modal.classList.add('show');

    }


    function closeProductDeleteModal()
    {

        const modal =
            document.getElementById(
                'productDeleteModal'
            );


        modal.classList.remove('show');

    }


    document
        .getElementById(
            'productDeleteModal'
        )
        .addEventListener(
            'click',
            function(event)
            {

                if (
                    event.target === this
                ) {

                    closeProductDeleteModal();

                }

            }
        );


    document.addEventListener(
        'keydown',
        function(event)
        {

            if (
                event.key === 'Escape'
            ) {

                closeProductDeleteModal();

            }

        }
    );

</script>

@endsection