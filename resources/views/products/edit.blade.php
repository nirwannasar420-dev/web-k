@extends('layouts.app')

@section('title', 'Edit Product')

@section('page-title', 'Edit Product')

@section('styles')

<style>

    .product-form-page {
        width: 100%;
    }

    .product-back {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #0B2A6F;
        font-size: 12px;
        font-weight: 700;
    }

    .product-back:hover {
        text-decoration: underline;
    }

    .product-back svg {
        width: 16px;
        height: 16px;
    }

    .product-form-header {
        margin-top: 18px;
        margin-bottom: 22px;
    }

    .product-form-header h1 {
        color: #172033;
        font-size: 26px;
        font-weight: 700;
    }

    .product-form-header p {
        margin-top: 7px;
        color: #64748B;
        font-size: 12px;
    }

    .product-form-card {
        width: 100%;
        max-width: 760px;
        padding: 22px;
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(15,23,42,.04);
    }

    .product-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .product-form-group.full {
        grid-column: 1 / -1;
    }

    .product-form-label {
        display: block;
        margin-bottom: 7px;
        color: #172033;
        font-size: 12px;
        font-weight: 700;
    }

    .required-mark {
        color: #E30613;
    }

    .product-form-input {
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #E2E8F0;
        border-radius: 9px;
        background: #FFFFFF;
        color: #172033;
        font-size: 12px;
        outline: none;
        transition: .2s ease;
    }

    .product-form-input:focus {
        border-color: #0B2A6F;
        box-shadow: 0 0 0 3px rgba(11,42,111,.08);
    }

    .product-form-input.input-error {
        border-color: #D93025;
    }

    .product-form-hint {
        margin-top: 6px;
        color: #94A3B8;
        font-size: 10px;
        line-height: 1.5;
    }

    .product-form-error {
        margin-top: 6px;
        color: #D93025;
        font-size: 11px;
    }

    .product-form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid #E2E8F0;
    }

    .product-cancel-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        border: 1px solid #E2E8F0;
        border-radius: 9px;
        background: #FFFFFF;
        color: #64748B;
        font-size: 11px;
        font-weight: 700;
    }

    .product-cancel-button:hover {
        background: #F8FAFC;
    }

    .product-save-button {
        padding: 10px 17px;
        border: none;
        border-radius: 9px;
        background: #0B2A6F;
        color: #FFFFFF;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
    }

    .product-save-button:hover {
        background: #071D4D;
    }

    .product-save-button:disabled {
        opacity: .5;
        cursor: not-allowed;
    }

    @media (max-width: 650px) {

        .product-form-grid {
            grid-template-columns: 1fr;
        }

        .product-form-group.full {
            grid-column: auto;
        }

        .product-form-actions {
            flex-direction: column-reverse;
        }

        .product-cancel-button,
        .product-save-button {
            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="product-form-page">

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


    <div class="product-form-header">

        <h1>
            Edit Product
        </h1>

        <p>
            Update the product information below.
        </p>

    </div>


    <div class="product-form-card">

        <form
            action="{{ route('products.update', $product) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="product-form-grid">


                {{-- PRODUCT CODE --}}

                <div class="product-form-group">

                    <label
                        for="product_code"
                        class="product-form-label"
                    >
                        Product Code
                        <span class="required-mark">*</span>
                    </label>

                    <input
                        type="text"
                        id="product_code"
                        name="product_code"
                        value="{{ old('product_code', $product->product_code) }}"
                        maxlength="100"
                        required
                        class="product-form-input @error('product_code') input-error @enderror"
                    >

                    @error('product_code')
                        <div class="product-form-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- PRODUCT NAME --}}

                <div class="product-form-group">

                    <label
                        for="product_name"
                        class="product-form-label"
                    >
                        Product Name
                        <span class="required-mark">*</span>
                    </label>

                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        value="{{ old('product_name', $product->product_name) }}"
                        maxlength="255"
                        required
                        class="product-form-input @error('product_name') input-error @enderror"
                    >

                    @error('product_name')
                        <div class="product-form-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- UNIT --}}

                <div class="product-form-group">

                    <label
                        for="unit"
                        class="product-form-label"
                    >
                        Unit
                    </label>

                    <input
                        type="text"
                        id="unit"
                        name="unit"
                        value="{{ old('unit', $product->unit) }}"
                        maxlength="50"
                        placeholder="Example: Kg, Meter, Roll, Pcs"
                        class="product-form-input @error('unit') input-error @enderror"
                    >

                    @error('unit')
                        <div class="product-form-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- PRICE --}}

                <div class="product-form-group">

                    <label
                        for="price"
                        class="product-form-label"
                    >
                        Default Price
                        <span class="required-mark">*</span>
                    </label>

                    <input
                        type="text"
                        id="price"
                        name="price"
                        value="{{ old('price', (float) $product->price) }}"
                        inputmode="numeric"
                        autocomplete="off"
                        required
                        class="product-form-input @error('price') input-error @enderror"
                    >

                    <div
                        id="priceError"
                        class="product-form-error"
                        style="display:none;"
                    >
                        Price must contain numbers only.
                    </div>

                    @error('price')
                        <div class="product-form-error">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="product-form-hint">
                        Enter the default price without currency separators.
                    </div>

                </div>


            </div>


            <div class="product-form-actions">

                <a
                    href="{{ route('products.index') }}"
                    class="product-cancel-button"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    id="saveProductButton"
                    class="product-save-button"
                >
                    Update Product
                </button>

            </div>


        </form>

    </div>

</div>


<script>

    const priceInput =
        document.getElementById('price');

    const priceError =
        document.getElementById('priceError');

    const saveButton =
        document.getElementById('saveProductButton');


    function validatePrice()
    {
        const value =
            priceInput.value.trim();

        if (value === '') {

            priceError.style.display = 'none';

            priceInput.classList.remove(
                'input-error'
            );

            saveButton.disabled = false;

            return true;
        }


        const valid =
            /^[0-9]+$/.test(value);


        if (!valid) {

            priceError.style.display = 'block';

            priceInput.classList.add(
                'input-error'
            );

            saveButton.disabled = true;

            return false;
        }


        priceError.style.display = 'none';

        priceInput.classList.remove(
            'input-error'
        );

        saveButton.disabled = false;

        return true;
    }


    priceInput.addEventListener(
        'input',
        function ()
        {
            this.value =
                this.value.replace(
                    /[^0-9]/g,
                    ''
                );

            validatePrice();
        }
    );


    priceInput.closest('form')
        .addEventListener(
            'submit',
            function(event)
            {
                if (!validatePrice()) {
                    event.preventDefault();
                }
            }
        );


    validatePrice();

</script>

@endsection