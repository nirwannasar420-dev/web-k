@extends('layouts.app')

@section('title', 'Add Product')

@section('page-title', 'Add Product')

@section('styles')

<style>

    /* =====================================================
       PRODUCT CREATE PAGE
    ===================================================== */

    .product-create-page {
        width: 100%;
    }


    /* =====================================================
       BACK LINK
    ===================================================== */

    .product-create-back {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        color: #0B2A6F;

        font-size: 12px;
        font-weight: 700;

        text-decoration: none;
    }

    .product-create-back:hover {
        text-decoration: underline;
    }

    .product-create-back svg {
        width: 16px;
        height: 16px;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .product-create-header {
        margin-top: 18px;
        margin-bottom: 22px;
    }

    .product-create-header h1 {
        color: #172033;

        font-size: 26px;
        font-weight: 700;

        line-height: 1.2;
    }

    .product-create-header p {
        margin-top: 7px;

        color: #64748B;

        font-size: 12px;
        line-height: 1.5;
    }


    /* =====================================================
       FORM CARD
    ===================================================== */

    .product-create-card {

        width: 100%;
        max-width: 800px;

        padding: 24px;

        background: #FFFFFF;

        border: 1px solid #E2E8F0;
        border-radius: 12px;

        box-shadow:
            0 3px 12px rgba(15,23,42,.04);

    }


    /* =====================================================
       GRID
    ===================================================== */

    .product-create-grid {

        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 20px;

    }


    .product-create-group {
        width: 100%;
    }


    .product-create-group.full {
        grid-column: 1 / -1;
    }


    /* =====================================================
       LABEL
    ===================================================== */

    .product-create-label {

        display: block;

        margin-bottom: 7px;

        color: #172033;

        font-size: 12px;
        font-weight: 700;

    }


    .required {
        color: #E30613;
    }


    /* =====================================================
       INPUT
    ===================================================== */

    .product-create-input {

        width: 100%;

        padding: 11px 13px;

        border:
            1px solid #E2E8F0;

        border-radius: 9px;

        background: #FFFFFF;

        color: #172033;

        font-size: 12px;

        outline: none;

        transition: .2s ease;

    }


    .product-create-input::placeholder {
        color: #94A3B8;
    }


    .product-create-input:focus {

        border-color: #0B2A6F;

        box-shadow:
            0 0 0 3px
            rgba(11,42,111,.08);

    }


    .product-create-input.error {

        border-color: #D93025;

        box-shadow:
            0 0 0 3px
            rgba(217,48,37,.06);

    }


    /* =====================================================
       PRICE INPUT
    ===================================================== */

    .price-input-wrapper {
        position: relative;
    }


    .price-prefix {

        position: absolute;

        left: 13px;
        top: 50%;

        transform:
            translateY(-50%);

        color: #64748B;

        font-size: 12px;
        font-weight: 700;

        pointer-events: none;

    }


    .price-input {

        padding-left: 36px;

    }


    /* =====================================================
       HINT & ERROR
    ===================================================== */

    .product-create-hint {

        margin-top: 6px;

        color: #94A3B8;

        font-size: 10px;

        line-height: 1.5;

    }


    .product-create-error {

        margin-top: 6px;

        color: #D93025;

        font-size: 11px;

        line-height: 1.5;

    }


    /* =====================================================
       FORM ACTIONS
    ===================================================== */

    .product-create-actions {

        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 9px;

        margin-top: 25px;

        padding-top: 19px;

        border-top:
            1px solid #E2E8F0;

    }


    .product-create-cancel {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-width: 85px;

        padding: 10px 15px;

        border:
            1px solid #E2E8F0;

        border-radius: 9px;

        background: #FFFFFF;

        color: #64748B;

        font-size: 11px;

        font-weight: 700;

        text-decoration: none;

        transition: .2s ease;

    }


    .product-create-cancel:hover {
        background: #F8FAFC;
    }


    .product-create-save {

        min-width: 105px;

        padding: 10px 17px;

        border: none;

        border-radius: 9px;

        background: #0B2A6F;

        color: #FFFFFF;

        font-size: 11px;

        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;

    }


    .product-create-save:hover {
        background: #071D4D;
    }


    .product-create-save:disabled {

        opacity: .5;

        cursor: not-allowed;

    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .product-create-grid {

            grid-template-columns: 1fr;

        }


        .product-create-group.full {

            grid-column: auto;

        }


        .product-create-actions {

            flex-direction: column-reverse;

            align-items: stretch;

        }


        .product-create-cancel,
        .product-create-save {

            width: 100%;

        }

    }

</style>

@endsection


@section('content')

<div class="product-create-page">


    {{-- BACK --}}

    <a
        href="{{ route('products.index') }}"
        class="product-create-back"
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


    {{-- HEADER --}}

    <div class="product-create-header">

        <h1>
            Add Product
        </h1>

        <p>
            Add a new product to the CRM product master data.
        </p>

    </div>


    {{-- FORM CARD --}}

    <div class="product-create-card">

        <form
            action="{{ route('products.store') }}"
            method="POST"
            id="productCreateForm"
        >

            @csrf


            <div class="product-create-grid">


                {{-- PRODUCT CODE --}}

                <div class="product-create-group">

                    <label
                        for="product_code"
                        class="product-create-label"
                    >

                        Product Code

                        <span class="required">
                            *
                        </span>

                    </label>


                    <input
                        type="text"
                        id="product_code"
                        name="product_code"
                        value="{{ old('product_code') }}"
                        maxlength="100"
                        placeholder="Example: PY001"
                        required
                        class="product-create-input @error('product_code') error @enderror"
                    >


                    @error('product_code')

                        <div class="product-create-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- PRODUCT NAME --}}

                <div class="product-create-group">

                    <label
                        for="product_name"
                        class="product-create-label"
                    >

                        Product Name

                        <span class="required">
                            *
                        </span>

                    </label>


                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        value="{{ old('product_name') }}"
                        maxlength="255"
                        placeholder="Example: Polyester Yarn"
                        required
                        class="product-create-input @error('product_name') error @enderror"
                    >


                    @error('product_name')

                        <div class="product-create-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- UNIT --}}

                <div class="product-create-group">

                    <label
                        for="unit"
                        class="product-create-label"
                    >

                        Unit

                    </label>


                    <input
                        type="text"
                        id="unit"
                        name="unit"
                        value="{{ old('unit') }}"
                        maxlength="50"
                        placeholder="Example: Kg, Meter, Roll, Pcs"
                        class="product-create-input @error('unit') error @enderror"
                    >


                    @error('unit')

                        <div class="product-create-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- PRICE --}}

                <div class="product-create-group">

                    <label
                        for="price"
                        class="product-create-label"
                    >

                        Default Price

                        <span class="required">
                            *
                        </span>

                    </label>


                    <div class="price-input-wrapper">

                        <span class="price-prefix">
                            Rp
                        </span>


                        <input
                            type="text"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                            placeholder="0"
                            inputmode="numeric"
                            autocomplete="off"
                            required
                            class="product-create-input price-input @error('price') error @enderror"
                        >

                    </div>


                    <div
                        id="priceValidationError"
                        class="product-create-error"
                        style="display:none;"
                    >
                        Price must contain numbers only.
                    </div>


                    @error('price')

                        <div class="product-create-error">
                            {{ $message }}
                        </div>

                    @enderror


                    <div class="product-create-hint">
                        Enter the default price without currency separators.
                    </div>

                </div>


            </div>


            {{-- ACTION BUTTONS --}}

            <div class="product-create-actions">


                <a
                    href="{{ route('products.index') }}"
                    class="product-create-cancel"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    id="saveProductButton"
                    class="product-create-save"
                >
                    Save Product
                </button>


            </div>


        </form>

    </div>

</div>


<script>

    const productPriceInput =
        document.getElementById('price');

    const productPriceError =
        document.getElementById(
            'priceValidationError'
        );

    const saveProductButton =
        document.getElementById(
            'saveProductButton'
        );


    function validateProductPrice()
    {

        const value =
            productPriceInput.value.trim();


        if (value === '') {

            productPriceError.style.display =
                'none';

            productPriceInput.classList.remove(
                'error'
            );

            saveProductButton.disabled =
                false;

            return true;
        }


        const valid =
            /^[0-9]+$/.test(value);


        if (!valid) {

            productPriceError.style.display =
                'block';

            productPriceInput.classList.add(
                'error'
            );

            saveProductButton.disabled =
                true;

            return false;
        }


        productPriceError.style.display =
            'none';

        productPriceInput.classList.remove(
            'error'
        );

        saveProductButton.disabled =
            false;

        return true;
    }


    productPriceInput.addEventListener(
        'input',
        function()
        {

            this.value =
                this.value.replace(
                    /[^0-9]/g,
                    ''
                );

            validateProductPrice();

        }
    );


    productPriceInput.addEventListener(
        'blur',
        function()
        {
            validateProductPrice();
        }
    );


    document
        .getElementById('productCreateForm')
        .addEventListener(
            'submit',
            function(event)
            {

                if (
                    !validateProductPrice()
                ) {

                    event.preventDefault();

                }

            }
        );


    validateProductPrice();

</script>

@endsection