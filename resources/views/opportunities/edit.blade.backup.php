@extends('layouts.app')

@section('title', 'Edit Opportunity')
@section('page-title', 'Edit Opportunity')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .opportunity-edit-page {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .opportunity-edit-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .opportunity-edit-header-left h1 {
        margin: 0 0 6px;
        color: #172033;
        font-size: 28px;
        font-weight: 800;
        line-height: 1.2;
    }

    .opportunity-edit-header-left p {
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
        color: #475569;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .opportunity-form-card {
        width: 100%;
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 26px;
        box-shadow: 0 3px 12px rgba(15,23,42,.04);
        box-sizing: border-box;
    }


    /* =========================================================
       CURRENT OPPORTUNITY
    ========================================================= */

    .current-opportunity {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        padding: 14px;
        margin-bottom: 26px;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
        box-sizing: border-box;
    }

    .current-opportunity-icon {
        width: 44px;
        height: 44px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #EEF4FF;
        color: #0B2A6F;
    }

    .current-opportunity-icon svg {
        width: 20px;
        height: 20px;
    }

    .current-opportunity-label {
        margin-bottom: 3px;
        color: #94A3B8;
        font-size: 10px;
    }

    .current-opportunity-name {
        color: #172033;
        font-size: 13px;
        font-weight: 800;
        word-break: break-word;
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .form-section {
        width: 100%;
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
        cursor: not-allowed;
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

    .dynamic-error {
        display: none;
    }

    .dynamic-error.show {
        display: block;
    }

    .input-invalid {
        border-color: #E30613 !important;
        box-shadow: 0 0 0 3px rgba(227,6,19,.07) !important;
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
        width: fit-content;
        min-height: 31px;
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
       STAGE
    ========================================================= */

    .stage-info {
        display: flex;
        align-items: center;
        gap: 9px;
        min-height: 41px;
        padding: 0 11px;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        background: #F8FAFC;
        box-sizing: border-box;
    }

    .stage-dot {
        width: 8px;
        height: 8px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #0B2A6F;
    }

    .stage-name {
        color: #334155;
        font-size: 11px;
        font-weight: 700;
    }


    /* =========================================================
       PRODUCTS
    ========================================================= */

    .products-section-card {
        width: 100%;
        overflow: hidden;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
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
        line-height: 1.5;
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
        align-items: end;
        gap: 9px;
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
        height: 38px;
        box-sizing: border-box;
        padding: 0 10px;
        border: 1px solid #D9E1EC;
        border-radius: 7px;
        background: #FFFFFF;
        color: #172033;
        font-size: 10px;
        outline: none;
        transition: .2s ease;
    }

    .product-field input:focus,
    .product-field select:focus {
        border-color: #0B2A6F;
        box-shadow: 0 0 0 3px rgba(11,42,111,.07);
    }

    .product-field input[readonly] {
        background: #F8FAFC;
        color: #172033;
        font-weight: 800;
    }

    .product-subtotal {
        font-weight: 800 !important;
        background: #F8FAFC !important;
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
            grid-template-columns: 1fr 1fr;
        }

        .product-field-product {
            grid-column: 1 / -1;
        }

        .product-field-subtotal {
            grid-column: 1 / 2;
        }

    }


    @media (max-width: 700px) {

        .opportunity-edit-header {
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
            flex-direction: column;
            align-items: flex-start;
        }

        .add-product-row-button {
            width: 100%;
        }

        .product-item-row {
            grid-template-columns: 1fr;
        }

        .product-field-product,
        .product-field-subtotal {
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

<div class="opportunity-edit-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="opportunity-edit-header">

        <div class="opportunity-edit-header-left">

            <h1>
                Edit Opportunity
            </h1>

            <p>
                Update opportunity information and manage its products.
            </p>

        </div>


        <a
            href="{{ route('opportunities.index') }}"
            class="btn btn-secondary"
        >
            ← Back
        </a>

    </div>


    <div class="opportunity-form-card">


        {{-- =================================================
             CURRENT OPPORTUNITY
        ================================================== --}}

        <div class="current-opportunity">


            <div class="current-opportunity-icon">

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


            <div>

                <div class="current-opportunity-label">
                    Opportunity being edited
                </div>


                <div class="current-opportunity-name">
                    {{ $opportunity->name }}
                </div>

            </div>


        </div>


        {{-- =================================================
             FORM
        ================================================== --}}

        <form
            id="opportunityEditForm"
            action="{{ route('opportunities.update', $opportunity) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            {{-- =================================================
                 OPPORTUNITY INFORMATION
            ================================================== --}}

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Opportunity Information
                    </h2>

                    <p>
                        Update the main information for this sales opportunity.
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
                            value="{{ old('name', $opportunity->name) }}"
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
                                    @selected(
                                        (string) old(
                                            'customer_id',
                                            $opportunity->customer_id
                                        ) === (string) $customer->id
                                    )
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
                                    @selected(
                                        (string) old(
                                            'salesperson_id',
                                            $opportunity->salesperson_id
                                        ) === (string) $salesperson->id
                                    )
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
                                    @selected(
                                        (string) old(
                                            'stage_id',
                                            $opportunity->stage_id
                                        ) === (string) $stage->id
                                    )
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
                        Manage the products included in this opportunity.
                    </p>

                </div>


                <div class="products-section-card">


                    <div class="products-section-top">

                        <div>

                            <div class="products-section-title">
                                Opportunity Products
                            </div>

                            <div class="products-section-description">
                                Add, remove, or update products, quantities, and prices.
                            </div>

                        </div>


                        <button
                            type="button"
                            class="add-product-row-button"
                            id="addProductButton"
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
                            $oldProducts = old('products');
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
                                        >

                                            <option value="">
                                                Select Product
                                            </option>


                                            @foreach($products as $product)

                                                <option
                                                    value="{{ $product->id }}"
                                                    data-price="{{ $product->price }}"
                                                    data-unit="{{ $product->unit }}"
                                                    @selected(
                                                        (string) ($oldProduct['product_id'] ?? '')
                                                        ===
                                                        (string) $product->id
                                                    )
                                                >

                                                    {{ $product->product_name }}
                                                    —
                                                    {{ $product->product_code }}

                                                </option>

                                            @endforeach

                                        </select>


                                        @error("products.$index.product_id")

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
                                            class="product-quantity"
                                            value="{{ isset($oldProduct['quantity']) ? rtrim(rtrim(number_format((float) $oldProduct['quantity'], 2, '.', ''), '0'), '.') : '' }}"
                                            inputmode="decimal"
                                            autocomplete="off"
                                            placeholder="0"
                                        >


                                        @error("products.$index.quantity")

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
                                            class="product-unit-price"
                                            value="{{ isset($oldProduct['unit_price']) ? number_format((float) $oldProduct['unit_price'], 0, '', '') : '' }}"
                                            inputmode="numeric"
                                            autocomplete="off"
                                            placeholder="0"
                                        >


                                        @error("products.$index.unit_price")

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

                                            <path d="M6 7l1 13h10l1-13"/>

                                            <path d="M9 7V4h6v3"/>

                                        </svg>

                                    </button>


                                </div>

                            @endforeach


                        @elseif(
                            $opportunity->items
                            &&
                            $opportunity->items->count() > 0
                        )


                            @foreach(
                                $opportunity->items
                                as $index => $item
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
                                        >

                                            <option value="">
                                                Select Product
                                            </option>


                                            @foreach($products as $product)

                                                <option
                                                    value="{{ $product->id }}"
                                                    data-price="{{ $product->price }}"
                                                    data-unit="{{ $product->unit }}"
                                                    @selected(
                                                        (string) $item->product_id
                                                        ===
                                                        (string) $product->id
                                                    )
                                                >

                                                    {{ $product->product_name }}
                                                    —
                                                    {{ $product->product_code }}

                                                </option>

                                            @endforeach

                                        </select>


                                        @error("products.$index.product_id")

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
                                            class="product-quantity"
                                            value="{{ rtrim(rtrim(number_format((float) $item->quantity, 2, '.', ''), '0'), '.') }}"
                                            inputmode="decimal"
                                            autocomplete="off"
                                            placeholder="0"
                                        >


                                        @error("products.$index.quantity")

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
                                            class="product-unit-price"
                                            value="{{ number_format((float) $item->unit_price, 0, '', '') }}"
                                            inputmode="numeric"
                                            autocomplete="off"
                                            placeholder="0"
                                        >


                                        @error("products.$index.unit_price")

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

                                            <path d="M6 7l1 13h10l1-13"/>

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
                                        autocomplete="off"
                                        placeholder="0"
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
                                        autocomplete="off"
                                        placeholder="0"
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

                                        <path d="M6 7l1 13h10l1-13"/>

                                        <path d="M9 7V4h6v3"/>

                                    </svg>

                                </button>


                            </div>


                        @endif


                    </div>


                    {{-- PRODUCT ROW TEMPLATE --}}

                    <template id="productRowTemplate">

                        <div
                            class="product-item-row"
                            data-product-row
                        >

                            <div class="product-field product-field-product">

                                <label>
                                    Product
                                </label>


                                <select
                                    name="products[__INDEX__][product_id]"
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

                                            {{ $product->product_name }}
                                            —
                                            {{ $product->product_code }}

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
                                    name="products[__INDEX__][quantity]"
                                    class="product-quantity"
                                    inputmode="decimal"
                                    autocomplete="off"
                                    placeholder="0"
                                >

                            </div>


                            <div class="product-field">

                                <label>
                                    Unit Price
                                </label>


                                <input
                                    type="text"
                                    name="products[__INDEX__][unit_price]"
                                    class="product-unit-price"
                                    inputmode="numeric"
                                    autocomplete="off"
                                    placeholder="0"
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

                                    <path d="M6 7l1 13h10l1-13"/>

                                    <path d="M9 7V4h6v3"/>

                                </svg>

                            </button>

                        </div>

                    </template>


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
                        Update the transaction value and opportunity rating.
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
                                value="{{ old('expected_revenue', number_format((float) $opportunity->expected_revenue, 0, '', '')) }}"
                                inputmode="numeric"
                                autocomplete="off"
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
                                    @selected(
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '0'
                                    )
                                >
                                    0 — No rating
                                </option>


                                <option
                                    value="1"
                                    @selected(
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '1'
                                    )
                                >
                                    1 — Very low
                                </option>


                                <option
                                    value="2"
                                    @selected(
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '2'
                                    )
                                >
                                    2 — Low
                                </option>


                                <option
                                    value="3"
                                    @selected(
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '3'
                                    )
                                >
                                    3 — Medium
                                </option>


                                <option
                                    value="4"
                                    @selected(
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '4'
                                    )
                                >
                                    4 — High
                                </option>


                                <option
                                    value="5"
                                    @selected(
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '5'
                                    )
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


                    {{-- OPPORTUNITY DATE --}}

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
                            value="{{ old(
                                'opportunity_date',
                                $opportunity->opportunity_date
                                    ? $opportunity->opportunity_date->format('Y-m-d')
                                    : ''
                            ) }}"
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


                    {{-- CURRENT STAGE --}}

                    <div class="form-group">

                        <label class="form-label">
                            Current Stage
                        </label>


                        <div class="stage-info">

                            <span class="stage-dot"></span>


                            <span
                                id="stageNamePreview"
                                class="stage-name"
                            >
                                {{ $opportunity->stage->name ?? '-' }}
                            </span>

                        </div>

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
                        Update additional information about this sales opportunity.
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
                        >{{ old('notes', $opportunity->notes) }}</textarea>


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
                    id="updateOpportunityButton"
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


                    <span id="updateOpportunityButtonText">
                        Update Opportunity
                    </span>

                </button>


            </div>


        </form>


    </div>


</div>

@endsection


@section('scripts')

<script>

    /* =========================================================
       STATE
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
       CLEAN NUMERIC VALUE
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
       GET PRODUCT PRICE
    ========================================================= */

    function getProductPrice(select)
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
            getProductPrice(
                select
            );


        /*
        |--------------------------------------------------------------------------
        | When Product changes, always load the selected Product's master price.
        |--------------------------------------------------------------------------
        */

        if (price > 0) {

            unitPriceInput.value =
                String(
                    Math.round(price)
                );

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


        let hasProduct =
            false;


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


                    if (
                        productSelect
                        &&
                        productSelect.value !== ''
                    ) {

                        hasProduct = true;

                    }

                }
            );


        if (
            hasProduct
            &&
            total > 0
        ) {

            /*
            | Product Total is the source of Expected Revenue.
            */

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

            /*
            | No Product:
            | Expected Revenue can be entered manually.
            */

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


        const template =
            document.getElementById(
                'productRowTemplate'
            );


        if (
            !container
            ||
            !template
        ) {
            return;
        }


        const wrapper =
            document.createElement(
                'div'
            );


        wrapper.innerHTML =
            template.innerHTML.replaceAll(
                '__INDEX__',
                String(
                    productRowIndex
                )
            );


        const row =
            wrapper.firstElementChild;


        if (!row) {
            return;
        }


        container.appendChild(
            row
        );


        productRowIndex++;


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


        /*
        |--------------------------------------------------------------------------
        | Always keep at least one row.
        |--------------------------------------------------------------------------
        */

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

                productSelect.value =
                    '';

            }


            if (quantityInput) {

                quantityInput.value =
                    '';

            }


            if (unitPriceInput) {

                unitPriceInput.value =
                    '';

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
       STAGE PREVIEW
    ========================================================= */

    function updateStagePreview()
    {
        const stageSelect =
            document.getElementById(
                'stage_id'
            );


        const stagePreview =
            document.getElementById(
                'stageNamePreview'
            );


        if (
            !stageSelect
            ||
            !stagePreview
        ) {
            return;
        }


        const option =
            stageSelect.options[
                stageSelect.selectedIndex
            ];


        stagePreview.textContent =
            option
                ? option.text
                : '-';
    }


    /* =========================================================
       REVENUE VALIDATION
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
        | If a Product exists, Expected Revenue is controlled by Product Total.
        |--------------------------------------------------------------------------
        */

        const hasProduct =
            Array.from(
                document.querySelectorAll(
                    '[data-product-row]'
                )
            ).some(
                function(row)
                {

                    const productSelect =
                        row.querySelector(
                            '.product-select'
                        );


                    return (
                        productSelect
                        &&
                        productSelect.value !== ''
                    );

                }
            );


        if (hasProduct) {

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


        const value =
            input.value.trim();


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


        const valid =
            /^[0-9]+$/.test(
                value
            );


        if (!valid) {

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
       PRODUCT INPUT EVENTS
    ========================================================= */

    document.addEventListener(
        'input',
        function(event)
        {

            if (
                event.target.classList.contains(
                    'product-quantity'
                )
                ||
                event.target.classList.contains(
                    'product-unit-price'
                )
            ) {

                event.target.value =
                    event.target.value.replace(
                        /[^0-9.]/g,
                        ''
                    );


                updateProductSubtotal(
                    event.target
                );

            }

        }
    );


    /* =========================================================
       PRODUCT SELECT EVENT
    ========================================================= */

    document.addEventListener(
        'change',
        function(event)
        {

            if (
                event.target.classList.contains(
                    'product-select'
                )
            ) {

                handleProductChange(
                    event.target
                );

            }

        }
    );


    /* =========================================================
       EXPECTED REVENUE INPUT
    ========================================================= */

    const revenueInput =
        document.getElementById(
            'expected_revenue'
        );


    if (revenueInput) {

        revenueInput.addEventListener(
            'input',
            function()
            {

                /*
                | Product Total controls the field when a Product exists.
                */

                if (this.readOnly) {
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


    /* =========================================================
       ADD PRODUCT BUTTON
    ========================================================= */

    const addProductButton =
        document.getElementById(
            'addProductButton'
        );


    if (addProductButton) {

        addProductButton.addEventListener(
            'click',
            addProductRow
        );

    }


    /* =========================================================
       REMOVE PRODUCT BUTTONS
    ========================================================= */

    document.addEventListener(
        'click',
        function(event)
        {

            const removeButton =
                event.target.closest(
                    '.remove-product-button'
                );


            if (!removeButton) {
                return;
            }


            removeProductRow(
                removeButton
            );

        }
    );


    /* =========================================================
       RATING CHANGE
    ========================================================= */

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


    /* =========================================================
       STAGE CHANGE
    ========================================================= */

    const stageInput =
        document.getElementById(
            'stage_id'
        );


    if (stageInput) {

        stageInput.addEventListener(
            'change',
            updateStagePreview
        );

    }


    /* =========================================================
       FORM SUBMIT
    ========================================================= */

    const opportunityEditForm =
        document.getElementById(
            'opportunityEditForm'
        );


    if (opportunityEditForm) {

        opportunityEditForm.addEventListener(
            'submit',
            function(event)
            {

                /*
                |--------------------------------------------------------------------------
                | Validate revenue
                |--------------------------------------------------------------------------
                */

                if (
                    !validateRevenue()
                ) {

                    event.preventDefault();


                    if (revenueInput) {

                        revenueInput.focus();

                    }


                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | Disable completely empty product rows.
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


                /*
                |--------------------------------------------------------------------------
                | Rating validation
                |--------------------------------------------------------------------------
                */

                const rating =
                    parseInt(
                        document.getElementById(
                            'rating'
                        ).value
                    );


                if (
                    Number.isNaN(rating)
                    ||
                    rating < 0
                    ||
                    rating > 5
                ) {

                    event.preventDefault();


                    alert(
                        'Rating must be between 0 and 5.'
                    );


                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | Prevent double submit
                |--------------------------------------------------------------------------
                */

                const updateButton =
                    document.getElementById(
                        'updateOpportunityButton'
                    );


                const updateButtonText =
                    document.getElementById(
                        'updateOpportunityButtonText'
                    );


                if (updateButton) {

                    updateButton.disabled =
                        true;

                }


                if (updateButtonText) {

                    updateButtonText.textContent =
                        'Updating...';

                }

            }
        );

    }


    /* =========================================================
       INITIALIZE
    ========================================================= */

    document.addEventListener(
        'DOMContentLoaded',
        function()
        {

            /*
            |--------------------------------------------------------------------------
            | Initial product calculations
            |--------------------------------------------------------------------------
            */

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


                        if (!quantityInput) {
                            return;
                        }


                        updateProductSubtotal(
                            quantityInput
                        );

                    }
                );


            /*
            |--------------------------------------------------------------------------
            | Product Total + Expected Revenue
            |--------------------------------------------------------------------------
            */

            updateProductsTotal();


            /*
            |--------------------------------------------------------------------------
            | Rating
            |--------------------------------------------------------------------------
            */

            updateRatingPreview();


            /*
            |--------------------------------------------------------------------------
            | Stage
            |--------------------------------------------------------------------------
            */

            updateStagePreview();

        }
    );

</script>

@endsection