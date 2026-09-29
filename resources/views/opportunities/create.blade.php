@extends('layouts.app')

@section('title', 'Add Opportunity')
@section('page-title', 'Add Opportunity')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .opportunity-create-page {
        max-width: 1050px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .opportunity-create-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .opportunity-create-header-left h1 {
        margin: 0 0 6px;
        color: #172033;
        font-size: 28px;
        font-weight: 800;
        line-height: 1.2;
    }

    .opportunity-create-header-left p {
        margin: 0;
        color: #64748B;
        font-size: 13px;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .btn {
        min-height: 40px;
        padding: 0 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border: none;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: .2s ease;
        box-sizing: border-box;
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
        background: #F1F5F9;
        color: #475569;
    }

    .btn-secondary:hover {
        background: #E2E8F0;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .opportunity-form-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 26px;
        box-shadow: 0 3px 12px rgba(15,23,42,.04);
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .form-section {
        margin-bottom: 30px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .section-heading {
        margin-bottom: 18px;
        padding-bottom: 11px;
        border-bottom: 1px solid #F1F5F9;
    }

    .section-heading h2 {
        margin: 0 0 4px;
        color: #172033;
        font-size: 15px;
        font-weight: 800;
    }

    .section-heading p {
        margin: 0;
        color: #94A3B8;
        font-size: 10px;
        line-height: 1.5;
    }


    /* =========================================================
       FORM GRID
    ========================================================= */

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .form-label {
        display: block;
        margin-bottom: 7px;
        color: #334155;
        font-size: 11px;
        font-weight: 800;
    }

    .required {
        color: #E30613;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #D9E1EC;
        border-radius: 8px;
        background: #FFFFFF;
        color: #172033;
        font-size: 11px;
        outline: none;
        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .form-input,
    .form-select {
        height: 41px;
        padding: 0 11px;
    }

    .form-textarea {
        min-height: 110px;
        padding: 10px 11px;
        resize: vertical;
        line-height: 1.6;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #94A3B8;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #0B2A6F;
        box-shadow: 0 0 0 3px rgba(11,42,111,.07);
    }

    .form-input[readonly] {
        background: #F8FAFC;
    }

    .form-input.input-invalid {
        border-color: #E30613;
        box-shadow: 0 0 0 3px rgba(227,6,19,.07);
    }


    /* =========================================================
       HELP & ERROR
    ========================================================= */

    .field-help {
        margin-top: 6px;
        color: #94A3B8;
        font-size: 9px;
        line-height: 1.5;
    }

    .field-error {
        margin-top: 5px;
        color: #D93025;
        font-size: 10px;
        line-height: 1.5;
    }

    .field-error.dynamic-error {
        display: none;
    }

    .field-error.dynamic-error.show {
        display: block;
    }


    /* =========================================================
       REVENUE
    ========================================================= */

    .input-prefix-wrapper {
        position: relative;
    }

    .input-prefix {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #64748B;
        font-size: 11px;
        font-weight: 700;
        pointer-events: none;
        z-index: 2;
    }

    .revenue-input {
        padding-left: 33px !important;
    }

    .revenue-input[readonly] {
        background: #F8FAFC;
        cursor: not-allowed;
    }


    /* =========================================================
       RATING
    ========================================================= */

    .rating-wrapper {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .rating-preview {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        min-height: 31px;
        width: fit-content;
        padding: 0 9px;
        border-radius: 7px;
        background: #FFFAEB;
        color: #F9AB00;
        font-size: 13px;
        letter-spacing: 1px;
    }

    .rating-preview-text {
        margin-left: 2px;
        color: #94A3B8;
        font-size: 9px;
        letter-spacing: 0;
    }


    /* =========================================================
       PRODUCT SECTION
    ========================================================= */

    .products-section-card {
        border: 1px solid #E2E8F0;
        border-radius: 10px;
        overflow: hidden;
        background: #FFFFFF;
    }

    .products-section-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 15px;
        background: #F8FAFC;
        border-bottom: 1px solid #E2E8F0;
    }

    .products-section-title {
        color: #172033;
        font-size: 12px;
        font-weight: 800;
    }

    .products-section-description {
        margin-top: 3px;
        color: #94A3B8;
        font-size: 9px;
    }

    .add-product-row-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-height: 32px;
        padding: 0 11px;
        border: none;
        border-radius: 7px;
        background: #0B2A6F;
        color: #FFFFFF;
        font-size: 10px;
        font-weight: 800;
        cursor: pointer;
        transition: .2s ease;
    }

    .add-product-row-button:hover {
        background: #071D4D;
    }

    .add-product-row-button svg {
        width: 13px;
        height: 13px;
    }


    /* =========================================================
       PRODUCT ROW
    ========================================================= */

    .product-items-container {
        padding: 15px;
    }

    .product-item-row {
        display: grid;
        grid-template-columns:
            minmax(210px, 1.6fr)
            minmax(100px, .7fr)
            minmax(130px, .9fr)
            minmax(130px, .9fr)
            36px;
        gap: 9px;
        align-items: end;
        padding: 13px;
        margin-bottom: 10px;
        border: 1px solid #E2E8F0;
        border-radius: 9px;
        background: #FFFFFF;
    }

    .product-item-row:last-child {
        margin-bottom: 0;
    }

    .product-field {
        min-width: 0;
    }

    .product-field label {
        display: block;
        margin-bottom: 6px;
        color: #64748B;
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .product-field input,
    .product-field select {
        width: 100%;
        box-sizing: border-box;
        height: 38px;
        padding: 0 10px;
        border: 1px solid #D9E1EC;
        border-radius: 7px;
        background: #FFFFFF;
        color: #172033;
        font-size: 10px;
        outline: none;
    }

    .product-field input:focus,
    .product-field select:focus {
        border-color: #0B2A6F;
        box-shadow: 0 0 0 3px rgba(11,42,111,.07);
    }

    .product-subtotal {
        font-weight: 800 !important;
        background: #F8FAFC !important;
        color: #172033 !important;
    }

    .remove-product-button {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border: none;
        border-radius: 7px;
        background: #FFF6F6;
        color: #D93025;
        cursor: pointer;
        transition: .2s ease;
    }

    .remove-product-button:hover {
        background: #FCE8E6;
    }

    .remove-product-button svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       PRODUCT TOTAL
    ========================================================= */

    .products-total-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 13px 15px;
        border-top: 1px solid #E2E8F0;
        background: #FAFCFF;
    }

    .products-total-label {
        color: #64748B;
        font-size: 10px;
        font-weight: 700;
    }

    .products-total-value {
        color: #0B2A6F;
        font-size: 15px;
        font-weight: 800;
    }


    /* =========================================================
       FORM ACTIONS
    ========================================================= */

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #E2E8F0;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 850px) {

        .product-item-row {
            grid-template-columns:
                1fr 1fr;
        }

        .product-field.product-field-product {
            grid-column: 1 / -1;
        }

        .product-field.product-field-subtotal {
            grid-column: 1 / 2;
        }

        .remove-product-button {
            align-self: end;
        }

    }


    @media (max-width: 700px) {

        .opportunity-create-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .opportunity-form-card {
            padding: 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .products-section-top {
            align-items: flex-start;
            flex-direction: column;
        }

        .add-product-row-button {
            width: 100%;
        }

        .product-item-row {
            grid-template-columns: 1fr;
        }

        .product-field.product-field-product,
        .product-field.product-field-subtotal {
            grid-column: auto;
        }

        .remove-product-button {
            width: 100%;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="opportunity-create-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="opportunity-create-header">

        <div class="opportunity-create-header-left">

            <h1>
                Add Opportunity
            </h1>

            <p>
                Create a new sales opportunity and assign one or more products.
            </p>

        </div>


        <a
            href="{{ route('opportunities.index') }}"
            class="btn btn-secondary"
        >
            ← Back
        </a>

    </div>


    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="opportunity-form-card">


        <form
            id="opportunityForm"
            action="{{ route('opportunities.store') }}"
            method="POST"
            novalidate
        >

            @csrf


            {{-- =================================================
                 OPPORTUNITY INFORMATION
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Opportunity Information
                    </h2>

                    <p>
                        Enter the main information for this sales opportunity.
                    </p>

                </div>


                <div class="form-grid">


                    {{-- OPPORTUNITY NAME --}}

                    <div class="form-group full">

                        <label
                            for="name"
                            class="form-label"
                        >

                            Opportunity Name

                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            value="{{ old('name') }}"
                            placeholder="Example: Yarn Order from PT ABC"
                            maxlength="255"
                            required
                        >


                        @error('name')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- CUSTOMER --}}

                    <div class="form-group">

                        <label
                            for="customer_id"
                            class="form-label"
                        >

                            Customer

                            <span class="required">*</span>

                        </label>


                        <select
                            id="customer_id"
                            name="customer_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Customer
                            </option>


                            @foreach($customers as $customer)

                                <option
                                    value="{{ $customer->id }}"
                                    {{ (string) old('customer_id') === (string) $customer->id ? 'selected' : '' }}
                                >

                                    {{ $customer->name }}

                                    @if($customer->company)
                                        — {{ $customer->company }}
                                    @endif

                                </option>

                            @endforeach

                        </select>


                        @error('customer_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- SALESPERSON --}}

                    <div class="form-group">

                        <label
                            for="salesperson_id"
                            class="form-label"
                        >

                            Salesperson

                            <span class="required">*</span>

                        </label>


                        <select
                            id="salesperson_id"
                            name="salesperson_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Salesperson
                            </option>


                            @foreach($salespeople as $salesperson)

                                <option
                                    value="{{ $salesperson->id }}"
                                    {{ (string) old('salesperson_id') === (string) $salesperson->id ? 'selected' : '' }}
                                >

                                    {{ $salesperson->name }}

                                    @if($salesperson->email)
                                        — {{ $salesperson->email }}
                                    @endif

                                </option>

                            @endforeach

                        </select>


                        @error('salesperson_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- STAGE --}}

                    <div class="form-group">

                        <label
                            for="stage_id"
                            class="form-label"
                        >

                            Stage

                            <span class="required">*</span>

                        </label>


                        <select
                            id="stage_id"
                            name="stage_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Stage
                            </option>


                            @foreach($stages as $stage)

                                <option
                                    value="{{ $stage->id }}"
                                    {{ (string) old('stage_id') === (string) $stage->id ? 'selected' : '' }}
                                >

                                    {{ $stage->name }}

                                </option>

                            @endforeach

                        </select>


                        @error('stage_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>

            </div>


            {{-- =================================================
                 PRODUCTS
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Products
                    </h2>

                    <p>
                        Add the products included in this opportunity.
                        One opportunity can contain multiple products.
                    </p>

                </div>


                <div class="products-section-card">


                    <div class="products-section-top">

                        <div>

                            <div class="products-section-title">
                                Opportunity Products
                            </div>

                            <div class="products-section-description">
                                Select a product, enter quantity and unit price.
                            </div>

                        </div>


                        <button
                            type="button"
                            class="add-product-row-button"
                            onclick="addProductRow()"
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

                        </button>

                    </div>


                    <div
                        id="productItemsContainer"
                        class="product-items-container"
                    >

                        @php

                            $oldProducts =
                                old('products');

                        @endphp


                        @if(
                            is_array($oldProducts)
                            &&
                            count($oldProducts) > 0
                        )


                            @foreach(
                                $oldProducts
                                as $index => $oldProduct
                            )

                                <div
                                    class="product-item-row"
                                    data-product-row
                                >


                                    {{-- PRODUCT --}}

                                    <div class="product-field product-field-product">

                                        <label>
                                            Product
                                        </label>


                                        <select
                                            name="products[{{ $index }}][product_id]"
                                            class="product-select"
                                            onchange="handleProductChange(this)"
                                        >

                                            <option value="">
                                                Select Product
                                            </option>


                                            @foreach($products as $product)

                                                <option
                                                    value="{{ $product->id }}"
                                                    data-price="{{ $product->price }}"
                                                    data-unit="{{ $product->unit }}"
                                                    {{ (string) ($oldProduct['product_id'] ?? '') === (string) $product->id ? 'selected' : '' }}
                                                >

                                                    {{ $product->product_name }}
                                                    —
                                                    {{ $product->product_code }}

                                                </option>

                                            @endforeach

                                        </select>


                                        @error(
                                            'products.' . $index . '.product_id'
                                        )

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- QUANTITY --}}

                                    <div class="product-field">

                                        <label>
                                            Quantity
                                        </label>


                                        <input
                                            type="text"
                                            name="products[{{ $index }}][quantity]"
                                            value="{{ $oldProduct['quantity'] ?? '' }}"
                                            class="product-quantity"
                                            inputmode="decimal"
                                            placeholder="0"
                                            autocomplete="off"
                                        >


                                        @error(
                                            'products.' . $index . '.quantity'
                                        )

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- UNIT PRICE --}}

                                    <div class="product-field">

                                        <label>
                                            Unit Price
                                        </label>


                                        <input
                                            type="text"
                                            name="products[{{ $index }}][unit_price]"
                                            value="{{ $oldProduct['unit_price'] ?? '' }}"
                                            class="product-unit-price"
                                            inputmode="numeric"
                                            placeholder="0"
                                            autocomplete="off"
                                        >


                                        @error(
                                            'products.' . $index . '.unit_price'
                                        )

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- SUBTOTAL --}}

                                    <div class="product-field product-field-subtotal">

                                        <label>
                                            Subtotal
                                        </label>


                                        <input
                                            type="text"
                                            class="product-subtotal"
                                            value="Rp 0"
                                            readonly
                                        >

                                    </div>


                                    {{-- REMOVE --}}

                                    <button
                                        type="button"
                                        class="remove-product-button"
                                        onclick="removeProductRow(this)"
                                        title="Remove Product"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >

                                            <path d="M4 7h16"/>

                                            <path d="M10 11v6"/>

                                            <path d="M14 11v6"/>

                                            <path d="M6 7l1 13h10l-1-13"/>

                                            <path d="M9 7V4h6v3"/>

                                        </svg>

                                    </button>


                                </div>

                            @endforeach


                        @else


                            <div
                                class="product-item-row"
                                data-product-row
                            >


                                {{-- PRODUCT --}}

                                <div class="product-field product-field-product">

                                    <label>
                                        Product
                                    </label>


                                    <select
                                        name="products[0][product_id]"
                                        class="product-select"
                                        onchange="handleProductChange(this)"
                                    >

                                        <option value="">
                                            Select Product
                                        </option>


                                        @foreach($products as $product)

                                            <option
                                                value="{{ $product->id }}"
                                                data-price="{{ $product->price }}"
                                                data-unit="{{ $product->unit }}"
                                            >

                                                {{ $product->product_name }}
                                                —
                                                {{ $product->product_code }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- QUANTITY --}}

                                <div class="product-field">

                                    <label>
                                        Quantity
                                    </label>


                                    <input
                                        type="text"
                                        name="products[0][quantity]"
                                        class="product-quantity"
                                        inputmode="decimal"
                                        placeholder="0"
                                        autocomplete="off"
                                    >

                                </div>


                                {{-- UNIT PRICE --}}

                                <div class="product-field">

                                    <label>
                                        Unit Price
                                    </label>


                                    <input
                                        type="text"
                                        name="products[0][unit_price]"
                                        class="product-unit-price"
                                        inputmode="numeric"
                                        placeholder="0"
                                        autocomplete="off"
                                    >

                                </div>


                                {{-- SUBTOTAL --}}

                                <div class="product-field product-field-subtotal">

                                    <label>
                                        Subtotal
                                    </label>


                                    <input
                                        type="text"
                                        class="product-subtotal"
                                        value="Rp 0"
                                        readonly
                                    >

                                </div>


                                {{-- REMOVE --}}

                                <button
                                    type="button"
                                    class="remove-product-button"
                                    onclick="removeProductRow(this)"
                                    title="Remove Product"
                                >

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <path d="M4 7h16"/>

                                        <path d="M10 11v6"/>

                                        <path d="M14 11v6"/>

                                        <path d="M6 7l1 13h10l-1-13"/>

                                        <path d="M9 7V4h6v3"/>

                                    </svg>

                                </button>


                            </div>


                        @endif


                    </div>


                    <div class="products-total-bar">

                        <span class="products-total-label">
                            Product Total
                        </span>


                        <span
                            id="productsTotalValue"
                            class="products-total-value"
                        >
                            Rp 0
                        </span>

                    </div>


                </div>


                @error('products')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror


            </div>


            {{-- =================================================
                 SALES VALUE
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Sales Value
                    </h2>

                    <p>
                        Set the transaction value and opportunity rating.
                    </p>

                </div>


                <div class="form-grid">


                    {{-- EXPECTED REVENUE --}}

                    <div class="form-group">

                        <label
                            for="expected_revenue"
                            class="form-label"
                        >

                            Expected Revenue

                            <span class="required">*</span>

                        </label>


                        <div class="input-prefix-wrapper">

                            <span class="input-prefix">
                                Rp
                            </span>


                            <input
                                type="text"
                                id="expected_revenue"
                                name="expected_revenue"
                                class="form-input revenue-input"
                                value="{{ old('expected_revenue') }}"
                                inputmode="numeric"
                                autocomplete="off"
                                placeholder="Example: 100000000"
                                required
                            >

                        </div>


                        <div
                            id="revenueHelp"
                            class="field-help"
                        >
                            Expected Revenue automatically follows Product Total when products are added.
                        </div>


                        <div
                            id="revenueError"
                            class="field-error dynamic-error"
                        >
                            Expected Revenue must contain numbers only.
                        </div>


                        @error('expected_revenue')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- RATING --}}

                    <div class="form-group">

                        <label
                            for="rating"
                            class="form-label"
                        >

                            Rating

                            <span class="required">*</span>

                        </label>


                        <div class="rating-wrapper">


                            <select
                                id="rating"
                                name="rating"
                                class="form-select"
                                required
                            >

                                <option
                                    value="0"
                                    {{ old('rating', 0) == 0 ? 'selected' : '' }}
                                >
                                    0 — No rating
                                </option>


                                <option
                                    value="1"
                                    {{ old('rating') == 1 ? 'selected' : '' }}
                                >
                                    1 — Very low
                                </option>


                                <option
                                    value="2"
                                    {{ old('rating') == 2 ? 'selected' : '' }}
                                >
                                    2 — Low
                                </option>


                                <option
                                    value="3"
                                    {{ old('rating') == 3 ? 'selected' : '' }}
                                >
                                    3 — Medium
                                </option>


                                <option
                                    value="4"
                                    {{ old('rating') == 4 ? 'selected' : '' }}
                                >
                                    4 — High
                                </option>


                                <option
                                    value="5"
                                    {{ old('rating') == 5 ? 'selected' : '' }}
                                >
                                    5 — Very high
                                </option>

                            </select>


                            <div
                                id="ratingPreview"
                                class="rating-preview"
                            >

                                <span id="ratingStars">
                                    ☆☆☆☆☆
                                </span>


                                <span
                                    id="ratingText"
                                    class="rating-preview-text"
                                >
                                    0/5
                                </span>

                            </div>


                        </div>


                        @error('rating')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- DATE --}}

                    <div class="form-group">

                        <label
                            for="opportunity_date"
                            class="form-label"
                        >
                            Opportunity Date
                        </label>


                        <input
                            type="date"
                            id="opportunity_date"
                            name="opportunity_date"
                            class="form-input"
                            value="{{ old('opportunity_date', now()->format('Y-m-d')) }}"
                        >


                        <div class="field-help">
                            Leave empty if the date will be decided later.
                        </div>


                        @error('opportunity_date')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>

            </div>


            {{-- =================================================
                 NOTES
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Notes
                    </h2>

                    <p>
                        Add additional information about this sales opportunity.
                    </p>

                </div>


                <div class="form-grid">


                    <div class="form-group full">

                        <label
                            for="notes"
                            class="form-label"
                        >
                            Notes
                        </label>


                        <textarea
                            id="notes"
                            name="notes"
                            class="form-textarea"
                            placeholder="Example: Customer requested a quotation for 5 tons of yarn."
                        >{{ old('notes') }}</textarea>


                        @error('notes')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>

            </div>


            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="form-actions">


                <a
                    href="{{ route('opportunities.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <svg
                        width="14"
                        height="14"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M5 12h14"/>

                        <path d="M12 5v14"/>

                    </svg>

                    Save Opportunity

                </button>


            </div>


        </form>


    </div>


</div>

@endsection


@section('scripts')

<script>

    /* =========================================================
       PRODUCT ROW INDEX
    ========================================================= */

    let productRowIndex =
        document.querySelectorAll(
            '[data-product-row]'
        ).length;


    /* =========================================================
       FORMAT RUPIAH
    ========================================================= */

    function formatRupiah(value)
    {
        const number =
            Number(value) || 0;

        return String(
            Math.round(number)
        ).replace(
            /\B(?=(\d{3})+(?!\d))/g,
            '.'
        );
    }


    /* =========================================================
       CLEAN NUMBER
    ========================================================= */

    function cleanNumericValue(value)
    {
        return String(value)
            .replace(
                /[^0-9.]/g,
                ''
            );
    }


    /* =========================================================
       GET SELECTED PRODUCT PRICE
    ========================================================= */

    function getSelectedProductPrice(select)
    {
        if (!select) {
            return 0;
        }

        const selectedOption =
            select.options[
                select.selectedIndex
            ];

        if (!selectedOption) {
            return 0;
        }

        const price =
            selectedOption.dataset.price
            || '';

        return Number(price) || 0;
    }


    /* =========================================================
       PRODUCT CHANGE
    ========================================================= */

    function handleProductChange(select)
    {
        const row =
            select.closest(
                '[data-product-row]'
            );

        if (!row) {
            return;
        }


        const unitPriceInput =
            row.querySelector(
                '.product-unit-price'
            );

        if (!unitPriceInput) {
            return;
        }


        const price =
            getSelectedProductPrice(
                select
            );


        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        | Always replace Unit Price when Product changes.
        |
        | This fixes:
        | Benang -> Kain
        | 550000 -> 1000000
        |
        */

        if (price > 0) {

            unitPriceInput.value =
                String(price);

        } else {

            unitPriceInput.value =
                '';

        }


        updateProductSubtotal(
            unitPriceInput
        );
    }


    /* =========================================================
       UPDATE SUBTOTAL
    ========================================================= */

    function updateProductSubtotal(input)
    {
        if (!input) {
            return;
        }


        const row =
            input.closest(
                '[data-product-row]'
            );

        if (!row) {
            return;
        }


        const quantityInput =
            row.querySelector(
                '.product-quantity'
            );

        const unitPriceInput =
            row.querySelector(
                '.product-unit-price'
            );

        const subtotalInput =
            row.querySelector(
                '.product-subtotal'
            );


        if (
            !quantityInput
            ||
            !unitPriceInput
            ||
            !subtotalInput
        ) {
            return;
        }


        quantityInput.value =
            cleanNumericValue(
                quantityInput.value
            );

        unitPriceInput.value =
            cleanNumericValue(
                unitPriceInput.value
            );


        const quantity =
            parseFloat(
                quantityInput.value
            ) || 0;

        const unitPrice =
            parseFloat(
                unitPriceInput.value
            ) || 0;


        const subtotal =
            quantity *
            unitPrice;


        subtotalInput.value =
            'Rp ' +
            formatRupiah(
                subtotal
            );


        updateProductsTotal();
    }


    /* =========================================================
       UPDATE PRODUCT TOTAL
    ========================================================= */

    function updateProductsTotal()
    {
        let total = 0;


        document
            .querySelectorAll(
                '[data-product-row]'
            )
            .forEach(
                function(row)
                {

                    const quantityInput =
                        row.querySelector(
                            '.product-quantity'
                        );

                    const unitPriceInput =
                        row.querySelector(
                            '.product-unit-price'
                        );


                    if (
                        !quantityInput
                        ||
                        !unitPriceInput
                    ) {
                        return;
                    }


                    const quantity =
                        parseFloat(
                            quantityInput.value
                        ) || 0;


                    const unitPrice =
                        parseFloat(
                            unitPriceInput.value
                        ) || 0;


                    total +=
                        quantity *
                        unitPrice;

                }
            );


        const totalElement =
            document.getElementById(
                'productsTotalValue'
            );


        if (totalElement) {

            totalElement.textContent =
                'Rp ' +
                formatRupiah(
                    total
                );

        }


        /*
        |--------------------------------------------------------------------------
        | EXPECTED REVENUE
        |--------------------------------------------------------------------------
        |
        | When Product Total > 0:
        | Expected Revenue follows Product Total.
        |
        | When Product Total = 0:
        | Expected Revenue becomes editable again.
        |
        */

        const revenueInput =
            document.getElementById(
                'expected_revenue'
            );

        const revenueHelp =
            document.getElementById(
                'revenueHelp'
            );


        if (!revenueInput) {
            return;
        }


        if (total > 0) {

            revenueInput.value =
                String(
                    Math.round(total)
                );

            revenueInput.readOnly =
                true;


            if (revenueHelp) {

                revenueHelp.textContent =
                    'Expected Revenue is automatically calculated from Product Total.';

            }

        } else {

            revenueInput.readOnly =
                false;


            if (revenueHelp) {

                revenueHelp.textContent =
                    'Enter Expected Revenue manually when no product has been added.';

            }

        }

    }


    /* =========================================================
       ADD PRODUCT ROW
    ========================================================= */

    function addProductRow()
    {
        const container =
            document.getElementById(
                'productItemsContainer'
            );


        if (!container) {
            return;
        }


        const row =
            document.createElement(
                'div'
            );


        row.className =
            'product-item-row';

        row.setAttribute(
            'data-product-row',
            ''
        );


        row.innerHTML = `

            <div class="product-field product-field-product">

                <label>
                    Product
                </label>

                <select
                    name="products[${productRowIndex}][product_id]"
                    class="product-select"
                >

                    <option value="">
                        Select Product
                    </option>

                    @foreach($products as $product)

                        <option
                            value="{{ $product->id }}"
                            data-price="{{ $product->price }}"
                            data-unit="{{ $product->unit }}"
                        >
                            {{ addslashes($product->product_name) }}
                            —
                            {{ addslashes($product->product_code) }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="product-field">

                <label>
                    Quantity
                </label>

                <input
                    type="text"
                    name="products[${productRowIndex}][quantity]"
                    class="product-quantity"
                    inputmode="decimal"
                    placeholder="0"
                    autocomplete="off"
                >

            </div>


            <div class="product-field">

                <label>
                    Unit Price
                </label>

                <input
                    type="text"
                    name="products[${productRowIndex}][unit_price]"
                    class="product-unit-price"
                    inputmode="numeric"
                    placeholder="0"
                    autocomplete="off"
                >

            </div>


            <div class="product-field product-field-subtotal">

                <label>
                    Subtotal
                </label>

                <input
                    type="text"
                    class="product-subtotal"
                    value="Rp 0"
                    readonly
                >

            </div>


            <button
                type="button"
                class="remove-product-button"
                title="Remove Product"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M4 7h16"/>

                    <path d="M10 11v6"/>

                    <path d="M14 11v6"/>

                    <path d="M6 7l1 13h10l-1-13"/>

                    <path d="M9 7V4h6v3"/>

                </svg>

            </button>

        `;


        container.appendChild(
            row
        );


        productRowIndex++;


        bindProductRowEvents(
            row
        );


        updateProductsTotal();
    }


    /* =========================================================
       REMOVE PRODUCT ROW
    ========================================================= */

    function removeProductRow(button)
    {
        if (!button) {
            return;
        }


        const rows =
            document.querySelectorAll(
                '[data-product-row]'
            );


        const row =
            button.closest(
                '[data-product-row]'
            );


        if (!row) {
            return;
        }


        if (rows.length <= 1) {

            const productSelect =
                row.querySelector(
                    '.product-select'
                );

            const quantityInput =
                row.querySelector(
                    '.product-quantity'
                );

            const unitPriceInput =
                row.querySelector(
                    '.product-unit-price'
                );

            const subtotalInput =
                row.querySelector(
                    '.product-subtotal'
                );


            if (productSelect) {
                productSelect.value = '';
            }


            if (quantityInput) {
                quantityInput.value = '';
            }


            if (unitPriceInput) {
                unitPriceInput.value = '';
            }


            if (subtotalInput) {
                subtotalInput.value =
                    'Rp 0';
            }


            updateProductsTotal();

            return;
        }


        row.remove();


        updateProductsTotal();
    }


    /* =========================================================
       RATING PREVIEW
    ========================================================= */

    function updateRatingPreview()
    {
        const ratingInput =
            document.getElementById(
                'rating'
            );

        const starsElement =
            document.getElementById(
                'ratingStars'
            );

        const textElement =
            document.getElementById(
                'ratingText'
            );


        if (
            !ratingInput
            ||
            !starsElement
            ||
            !textElement
        ) {
            return;
        }


        const rating =
            parseInt(
                ratingInput.value
            ) || 0;


        let stars = '';


        for (
            let i = 1;
            i <= 5;
            i++
        ) {

            stars +=
                i <= rating
                    ? '★'
                    : '☆';

        }


        starsElement.textContent =
            stars;

        textElement.textContent =
            rating + '/5';
    }


    /* =========================================================
       EXPECTED REVENUE VALIDATION
    ========================================================= */

    function validateRevenue()
    {
        const input =
            document.getElementById(
                'expected_revenue'
            );

        const error =
            document.getElementById(
                'revenueError'
            );


        if (!input) {
            return false;
        }


        /*
        |--------------------------------------------------------------------------
        | If products exist, Product Total controls Expected Revenue.
        |--------------------------------------------------------------------------
        */

        const rows =
            document.querySelectorAll(
                '[data-product-row]'
            );


        let hasProduct =
            false;


        rows.forEach(
            function(row)
            {

                const productSelect =
                    row.querySelector(
                        '.product-select'
                    );

                if (
                    productSelect
                    &&
                    productSelect.value !== ''
                ) {

                    hasProduct = true;

                }

            }
        );


        const value =
            input.value.trim();


        if (hasProduct) {

            return true;
        }


        if (value === '') {

            input.classList.add(
                'input-invalid'
            );

            if (error) {

                error.classList.add(
                    'show'
                );

            }

            return false;
        }


        const isNumber =
            /^[0-9]+$/.test(
                value
            );


        if (!isNumber) {

            input.classList.add(
                'input-invalid'
            );

            if (error) {

                error.classList.add(
                    'show'
                );

            }

            return false;
        }


        input.classList.remove(
            'input-invalid'
        );


        if (error) {

            error.classList.remove(
                'show'
            );

        }


        return true;
    }


    /* =========================================================
       PRODUCT ROW EVENTS
    ========================================================= */

    function bindProductRowEvents(row)
    {
        if (!row) {
            return;
        }


        const productSelect =
            row.querySelector(
                '.product-select'
            );

        const quantityInput =
            row.querySelector(
                '.product-quantity'
            );

        const unitPriceInput =
            row.querySelector(
                '.product-unit-price'
            );

        const removeButton =
            row.querySelector(
                '.remove-product-button'
            );


        if (productSelect) {

            productSelect.addEventListener(
                'change',
                function () {

                    handleProductChange(
                        this
                    );

                }
            );

        }


        if (quantityInput) {

            quantityInput.addEventListener(
                'input',
                function () {

                    this.value =
                        cleanNumericValue(
                            this.value
                        );

                    updateProductSubtotal(
                        this
                    );

                }
            );

        }


        if (unitPriceInput) {

            unitPriceInput.addEventListener(
                'input',
                function () {

                    this.value =
                        cleanNumericValue(
                            this.value
                        );

                    updateProductSubtotal(
                        this
                    );

                }
            );

        }


        if (removeButton) {

            removeButton.addEventListener(
                'click',
                function () {

                    removeProductRow(
                        this
                    );

                }
            );

        }

    }


    /* =========================================================
       FORM SUBMIT
    ========================================================= */

    function handleOpportunitySubmit(event)
    {
        const form =
            document.getElementById(
                'opportunityForm'
            );


        if (!form) {
            return;
        }


        if (
            !validateRevenue()
        ) {

            event.preventDefault();


            const revenueInput =
                document.getElementById(
                    'expected_revenue'
                );


            if (revenueInput) {

                revenueInput.focus();

            }


            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Remove completely empty product rows from submission.
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '[data-product-row]'
            )
            .forEach(
                function(row)
                {

                    const productSelect =
                        row.querySelector(
                            '.product-select'
                        );

                    const quantityInput =
                        row.querySelector(
                            '.product-quantity'
                        );

                    const unitPriceInput =
                        row.querySelector(
                            '.product-unit-price'
                        );


                    if (
                        !productSelect
                        ||
                        !quantityInput
                        ||
                        !unitPriceInput
                    ) {
                        return;
                    }


                    const product =
                        productSelect.value;

                    const quantity =
                        quantityInput.value.trim();

                    const unitPrice =
                        unitPriceInput.value.trim();


                    if (
                        product === ''
                        &&
                        quantity === ''
                        &&
                        unitPrice === ''
                    ) {

                        productSelect.disabled =
                            true;

                        quantityInput.disabled =
                            true;

                        unitPriceInput.disabled =
                            true;

                    }

                }
            );

    }


    /* =========================================================
       INITIALIZE
    ========================================================= */

    document.addEventListener(
        'DOMContentLoaded',
        function ()
        {

            /*
            |--------------------------------------------------------------------------
            | Bind all existing rows
            |--------------------------------------------------------------------------
            */

            document
                .querySelectorAll(
                    '[data-product-row]'
                )
                .forEach(
                    function(row)
                    {

                        bindProductRowEvents(
                            row
                        );


                        const productSelect =
                            row.querySelector(
                                '.product-select'
                            );


                        const quantityInput =
                            row.querySelector(
                                '.product-quantity'
                            );


                        /*
                        | If an existing/old product is selected,
                        | make sure its current master price is loaded.
                        */

                        if (
                            productSelect
                            &&
                            productSelect.value !== ''
                        ) {

                            const price =
                                getSelectedProductPrice(
                                    productSelect
                                );


                            const unitPriceInput =
                                row.querySelector(
                                    '.product-unit-price'
                                );


                            /*
                            | Only initialize empty Unit Price.
                            | This preserves old submitted transaction
                            | values after validation errors.
                            */

                            if (
                                unitPriceInput
                                &&
                                unitPriceInput.value.trim() === ''
                                &&
                                price > 0
                            ) {

                                unitPriceInput.value =
                                    String(price);

                            }

                        }


                        if (
                            quantityInput
                            &&
                            (
                                quantityInput.value.trim() !== ''
                                ||
                                (
                                    productSelect
                                    &&
                                    productSelect.value !== ''
                                )
                            )
                        ) {

                            updateProductSubtotal(
                                quantityInput
                            );

                        }

                    }
                );


            /*
            |--------------------------------------------------------------------------
            | Rating
            |--------------------------------------------------------------------------
            */

            const ratingInput =
                document.getElementById(
                    'rating'
                );


            if (ratingInput) {

                ratingInput.addEventListener(
                    'change',
                    updateRatingPreview
                );

            }


            updateRatingPreview();


            /*
            |--------------------------------------------------------------------------
            | Expected Revenue
            |--------------------------------------------------------------------------
            */

            const revenueInput =
                document.getElementById(
                    'expected_revenue'
                );


            if (revenueInput) {

                revenueInput.addEventListener(
                    'input',
                    function ()
                    {

                        /*
                        | Do not allow manual editing
                        | while Product Total controls it.
                        */

                        if (
                            this.readOnly
                        ) {

                            return;

                        }


                        this.value =
                            this.value.replace(
                                /[^0-9]/g,
                                ''
                            );


                        validateRevenue();

                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | Form submit
            |--------------------------------------------------------------------------
            */

            const opportunityForm =
                document.getElementById(
                    'opportunityForm'
                );


            if (opportunityForm) {

                opportunityForm.addEventListener(
                    'submit',
                    handleOpportunitySubmit
                );

            }


            /*
            |--------------------------------------------------------------------------
            | Final calculation
            |--------------------------------------------------------------------------
            */

            updateProductsTotal();

        }
    );

</script>

@endsection