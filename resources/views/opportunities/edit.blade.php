@extends('layouts.app')

@section('title', 'Edit Opportunity')
@section('page-title', 'Edit Opportunity')

@section('styles')
<style>
    .opportunity-edit-page {
        width: 100%;
        max-width: 1000px;
        margin: 0;
    }

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
    }

    .btn-primary {
        background: #0B2A6F;
        color: #FFFFFF;
    }

    .btn-primary:hover {
        background: #071D4D;
    }

    .btn-secondary {
        background: #F1F5F9;
        color: #475569;
    }

    .btn-secondary:hover {
        background: #E2E8F0;
    }

    .opportunity-form-card {
        width: 100%;
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 26px;
        box-shadow: 0 3px 12px rgba(15,23,42,.04);
        overflow: visible;
    }

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
    }

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
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

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

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        border: 1px solid #D9E1EC;
        border-radius: 8px;
        background: #FFFFFF;
        color: #172033;
        font-size: 11px;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
        box-sizing: border-box;
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

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #0B2A6F;
        box-shadow: 0 0 0 3px rgba(11,42,111,.07);
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #94A3B8;
    }

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
    }

    .revenue-input {
        padding-left: 33px !important;
    }

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

    .stage-info {
        display: flex;
        align-items: center;
        gap: 9px;
        min-height: 41px;
        padding: 0 11px;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        background: #F8FAFC;
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
    }

    .add-product-row-button:hover {
        background: #071D4D;
    }

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
        padding: 0 10px;
        border: 1px solid #D9E1EC;
        border-radius: 7px;
        background: #FFFFFF;
        color: #172033;
        font-size: 10px;
        outline: none;
        box-sizing: border-box;
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
    }

    .remove-product-button:hover {
        background: #FCE8E6;
    }

    .remove-product-button svg {
        width: 15px;
        height: 15px;
    }

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

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #E2E8F0;
    }

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

    <div class="opportunity-edit-header">

        <div class="opportunity-edit-header-left">
            <h1>Edit Opportunity</h1>

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


        <form
            id="opportunityEditForm"
            action="{{ route('opportunities.update', $opportunity) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            {{-- =========================================================
                 OPPORTUNITY INFORMATION
            ========================================================== --}}

            <div class="form-section">

                <div class="section-heading">

                    <h2>Opportunity Information</h2>

                    <p>
                        Update the main information for this sales opportunity.
                    </p>

                </div>


                <div class="form-grid">

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
                            required
                        >

                        @error('name')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


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


            {{-- =========================================================
                 PRODUCTS
            ========================================================== --}}

            <div class="form-section">

                <div class="section-heading">

                    <h2>Products</h2>

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
                            onclick="addProductRow()"
                        >

                            <svg
                                width="13"
                                height="13"
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


                        @if(is_array($oldProducts) && count($oldProducts) > 0)

                            @foreach($oldProducts as $index => $oldProduct)

                                <div
                                    class="product-item-row"
                                    data-product-row
                                >

                                    <div class="product-field product-field-product">

                                        <label>Product</label>

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
                                                    @selected(
                                                        (string) (
                                                            $oldProduct['product_id'] ?? ''
                                                        ) === (string) $product->id
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


                                    <div class="product-field">

                                        <label>Quantity</label>

                                        <input
                                            type="text"
                                            name="products[{{ $index }}][quantity]"
                                            class="product-quantity"
                                            value="{{ $oldProduct['quantity'] ?? '' }}"
                                            inputmode="decimal"
                                            autocomplete="off"
                                            placeholder="0"
                                            oninput="updateProductSubtotal(this)"
                                        >

                                        @error("products.$index.quantity")
                                            <div class="field-error">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>


                                    <div class="product-field">

                                        <label>Unit Price</label>

                                        <input
                                            type="text"
                                            name="products[{{ $index }}][unit_price]"
                                            class="product-unit-price"
                                            value="{{ isset($oldProduct['unit_price']) ? number_format((float) $oldProduct['unit_price'], 0, '', '') : '' }}"
                                            inputmode="numeric"
                                            autocomplete="off"
                                            placeholder="0"
                                            oninput="updateProductSubtotal(this)"
                                        >

                                        @error("products.$index.unit_price")
                                            <div class="field-error">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>


                                    <div class="product-field product-field-subtotal">

                                        <label>Subtotal</label>

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
                                            <path d="M6 7l1 13h10l1-13"/>
                                            <path d="M9 7V4h6v3"/>
                                        </svg>

                                    </button>

                                </div>

                            @endforeach


                        @elseif($opportunity->items && $opportunity->items->count() > 0)

                            @foreach($opportunity->items as $index => $item)

                                <div
                                    class="product-item-row"
                                    data-product-row
                                >

                                    <div class="product-field product-field-product">

                                        <label>Product</label>

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
                                                    @selected(
                                                        (string) $item->product_id === (string) $product->id
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


                                    <div class="product-field">

                                        <label>Quantity</label>

                                        <input
                                            type="text"
                                            name="products[{{ $index }}][quantity]"
                                            class="product-quantity"
                                            value="{{ $item->quantity }}"
                                            inputmode="decimal"
                                            autocomplete="off"
                                            placeholder="0"
                                            oninput="updateProductSubtotal(this)"
                                        >

                                        @error("products.$index.quantity")
                                            <div class="field-error">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>


                                    <div class="product-field">

                                        <label>Unit Price</label>

                                        <input
                                            type="text"
                                            name="products[{{ $index }}][unit_price]"
                                            class="product-unit-price"
                                            value="{{ number_format((float) $item->unit_price, 0, '', '') }}"
                                            inputmode="numeric"
                                            autocomplete="off"
                                            placeholder="0"
                                            oninput="updateProductSubtotal(this)"
                                        >

                                        @error("products.$index.unit_price")
                                            <div class="field-error">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>


                                    <div class="product-field product-field-subtotal">

                                        <label>Subtotal</label>

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

                                <div class="product-field product-field-product">

                                    <label>Product</label>

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


                                <div class="product-field">

                                    <label>Quantity</label>

                                    <input
                                        type="text"
                                        name="products[0][quantity]"
                                        class="product-quantity"
                                        inputmode="decimal"
                                        autocomplete="off"
                                        placeholder="0"
                                        oninput="updateProductSubtotal(this)"
                                    >

                                </div>


                                <div class="product-field">

                                    <label>Unit Price</label>

                                    <input
                                        type="text"
                                        name="products[0][unit_price]"
                                        class="product-unit-price"
                                        inputmode="numeric"
                                        autocomplete="off"
                                        placeholder="0"
                                        oninput="updateProductSubtotal(this)"
                                    >

                                </div>


                                <div class="product-field product-field-subtotal">

                                    <label>Subtotal</label>

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
                                        <path d="M6 7l1 13h10l1-13"/>
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


            {{-- =========================================================
                 SALES VALUE
            ========================================================== --}}

            <div class="form-section">

                <div class="section-heading">

                    <h2>Sales Value</h2>

                    <p>
                        Update the transaction value and opportunity rating.
                    </p>

                </div>


                <div class="form-grid">

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

                        <div class="field-help">
                            Enter numbers only.
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
                                onchange="updateRatingPreview()"
                            >

                                <option value="0" @selected((string) old('rating', $opportunity->rating) === '0')>
                                    0 — No rating
                                </option>

                                <option value="1" @selected((string) old('rating', $opportunity->rating) === '1')>
                                    1 — Very low
                                </option>

                                <option value="2" @selected((string) old('rating', $opportunity->rating) === '2')>
                                    2 — Low
                                </option>

                                <option value="3" @selected((string) old('rating', $opportunity->rating) === '3')>
                                    3 — Medium
                                </option>

                                <option value="4" @selected((string) old('rating', $opportunity->rating) === '4')>
                                    4 — High
                                </option>

                                <option value="5" @selected((string) old('rating', $opportunity->rating) === '5')>
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

                        @error('opportunity_date')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


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


            {{-- =========================================================
                 NOTES
            ========================================================== --}}

            <div class="form-section">

                <div class="section-heading">

                    <h2>Notes</h2>

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

                    Update Opportunity

                </button>

            </div>

        </form>

    </div>

</div>

@endsection


@section('scripts')

<script>

    let productRowIndex =
        document.querySelectorAll(
            '[data-product-row]'
        ).length;


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


    function cleanNumericValue(value)
    {
        return String(value)
            .replace(
                /[^0-9.]/g,
                ''
            );
    }


    function handleProductChange(select)
    {
        const row =
            select.closest(
                '[data-product-row]'
            );

        if (!row) {
            return;
        }

        const selectedOption =
            select.options[
                select.selectedIndex
            ];

        if (!selectedOption) {
            return;
        }

        const price =
            selectedOption.dataset.price
            || '';

        const unitPriceInput =
            row.querySelector(
                '.product-unit-price'
            );

        if (
            price !== ''
            &&
            (
                unitPriceInput.value === ''
                ||
                unitPriceInput.value === '0'
            )
        ) {

            unitPriceInput.value =
                Math.round(
                    Number(price)
                );

        }

        updateProductSubtotal(
            unitPriceInput
        );
    }


    function updateProductSubtotal(input)
    {
        if (!input) {
            return;
        }

        input.value =
            cleanNumericValue(
                input.value
            );

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

                    const quantity =
                        parseFloat(
                            row.querySelector(
                                '.product-quantity'
                            ).value
                        ) || 0;

                    const unitPrice =
                        parseFloat(
                            row.querySelector(
                                '.product-unit-price'
                            ).value
                        ) || 0;

                    total +=
                        quantity *
                        unitPrice;

                }
            );

        document.getElementById(
            'productsTotalValue'
        ).textContent =
            'Rp ' +
            formatRupiah(total);
    }


    function addProductRow()
    {
        const container =
            document.getElementById(
                'productItemsContainer'
            );

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
                    autocomplete="off"
                    placeholder="0"
                    oninput="updateProductSubtotal(this)"
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
                    autocomplete="off"
                    placeholder="0"
                    oninput="updateProductSubtotal(this)"
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
                    <path d="M6 7l1 13h10l1-13"/>
                    <path d="M9 7V4h6v3"/>
                </svg>

            </button>

        `;

        container.appendChild(
            row
        );

        productRowIndex++;

        updateProductsTotal();
    }


    function removeProductRow(button)
    {
        const rows =
            document.querySelectorAll(
                '[data-product-row]'
            );

        if (rows.length <= 1) {

            const row =
                button.closest(
                    '[data-product-row]'
                );

            row.querySelector(
                '.product-select'
            ).value = '';

            row.querySelector(
                '.product-quantity'
            ).value = '';

            row.querySelector(
                '.product-unit-price'
            ).value = '';

            row.querySelector(
                '.product-subtotal'
            ).value = 'Rp 0';

            updateProductsTotal();

            return;
        }

        button.closest(
            '[data-product-row]'
        ).remove();

        updateProductsTotal();
    }


    function updateRatingPreview()
    {
        const rating =
            parseInt(
                document.getElementById(
                    'rating'
                ).value
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

        document.getElementById(
            'ratingStars'
        ).textContent =
            stars;

        document.getElementById(
            'ratingText'
        ).textContent =
            rating + '/5';
    }


    function updateStagePreview()
    {
        const select =
            document.getElementById(
                'stage_id'
            );

        const option =
            select.options[
                select.selectedIndex
            ];

        document.getElementById(
            'stageNamePreview'
        ).textContent =
            option
                ? option.text
                : '-';
    }


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

        const value =
            input.value.trim();

        if (value === '') {

            input.classList.remove(
                'input-invalid'
            );

            error.classList.remove(
                'show'
            );

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

            error.classList.add(
                'show'
            );

            return false;
        }

        input.classList.remove(
            'input-invalid'
        );

        error.classList.remove(
            'show'
        );

        return true;
    }


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


    document
        .getElementById(
            'expected_revenue'
        )
        .addEventListener(
            'input',
            function()
            {

                this.value =
                    this.value.replace(
                        /[^0-9]/g,
                        ''
                    );

                validateRevenue();

            }
        );


    document
        .getElementById(
            'opportunityEditForm'
        )
        .addEventListener(
            'submit',
            function(event)
            {

                if (
                    !validateRevenue()
                ) {

                    event.preventDefault();

                    document
                        .getElementById(
                            'expected_revenue'
                        )
                        .focus();

                    return;
                }


                document
                    .querySelectorAll(
                        '[data-product-row]'
                    )
                    .forEach(
                        function(row)
                        {

                            const product =
                                row.querySelector(
                                    '.product-select'
                                ).value;

                            const quantity =
                                row.querySelector(
                                    '.product-quantity'
                                ).value;

                            const unitPrice =
                                row.querySelector(
                                    '.product-unit-price'
                                ).value;

                            if (
                                product === ''
                                &&
                                quantity === ''
                                &&
                                unitPrice === ''
                            ) {

                                row.querySelector(
                                    '.product-select'
                                ).disabled = true;

                                row.querySelector(
                                    '.product-quantity'
                                ).disabled = true;

                                row.querySelector(
                                    '.product-unit-price'
                                ).disabled = true;

                            }

                        }
                    );


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

                }

            }
        );


    document.addEventListener(
        'DOMContentLoaded',
        function()
        {

            updateRatingPreview();

            updateStagePreview();


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


            updateProductsTotal();


            document
                .getElementById(
                    'stage_id'
                )
                .addEventListener(
                    'change',
                    updateStagePreview
                );

        }
    );

</script>

@endsection