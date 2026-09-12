@extends('layouts.app')

@section('title', 'Tambah Opportunity')
@section('page-title', 'Tambah Opportunity')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .opportunity-create-page {
        max-width: 980px;
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
        margin-bottom: 25px;
    }

    .opportunity-create-header-left h1 {
        margin: 0 0 6px;
        color: #202124;
        font-size: 28px;
        font-weight: 700;
        line-height: 1.2;
    }

    .opportunity-create-header-left p {
        margin: 0;
        color: #5F6368;
        font-size: 13px;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .btn {
        height: 40px;
        padding: 0 16px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        border: none;
        border-radius: 8px;

        font-size: 12px;
        font-weight: 600;

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
        color: #FFFFFF;
    }

    .btn-secondary {
        background: #F1F3F4;
        color: #3C4043;
    }

    .btn-secondary:hover {
        background: #E8EAED;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .opportunity-form-card {
        background: #FFFFFF;

        border: 1px solid #E8EAED;

        border-radius: 16px;

        padding: 28px;

        box-shadow:
            0 2px 7px rgba(60,64,67,.06);
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

        border-bottom: 1px solid #F1F3F4;
    }

    .section-heading h2 {
        margin: 0 0 4px;

        color: #202124;

        font-size: 15px;

        font-weight: 700;
    }

    .section-heading p {
        margin: 0;

        color: #80868B;

        font-size: 11px;
    }


    /* =========================================================
       FORM GRID
    ========================================================= */

    .form-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;
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

        color: #3C4043;

        font-size: 12px;

        font-weight: 600;
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

        border: 1px solid #DADCE0;

        border-radius: 8px;

        background: #FFFFFF;

        color: #202124;

        font-size: 12px;

        outline: none;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .form-input,
    .form-select {
        height: 42px;

        padding: 0 12px;
    }

    .form-textarea {
        min-height: 115px;

        padding: 11px 12px;

        resize: vertical;

        line-height: 1.6;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #9AA0A6;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #0B2A6F;

        box-shadow:
            0 0 0 3px rgba(11,42,111,.08);
    }


    /* =========================================================
       INPUT INVALID
    ========================================================= */

    .form-input.input-invalid {
        border-color: #E30613;

        box-shadow:
            0 0 0 3px rgba(227,6,19,.08);
    }


    /* =========================================================
       SELECT OPTION
    ========================================================= */

    .form-select {
        cursor: pointer;
    }


    /* =========================================================
       HELP
    ========================================================= */

    .field-help {
        margin-top: 6px;

        color: #80868B;

        font-size: 10px;

        line-height: 1.5;
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .field-error {
        margin-top: 5px;

        color: #D93025;

        font-size: 10px;
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

        color: #80868B;

        font-size: 12px;

        pointer-events: none;

        z-index: 2;
    }


    .revenue-input {
        padding-left: 33px;
    }


    /* =========================================================
       RATING PREVIEW
    ========================================================= */

    .rating-wrapper {
        display: flex;

        flex-direction: column;

        gap: 8px;
    }


    .rating-select {
        width: 100%;
    }


    .rating-preview {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        min-height: 32px;

        padding: 0 10px;

        width: fit-content;

        border-radius: 8px;

        background: #FFFAEB;

        color: #F9AB00;

        font-size: 13px;

        letter-spacing: 1px;
    }


    .rating-preview-text {
        margin-left: 3px;

        color: #80868B;

        font-size: 10px;

        letter-spacing: 0;
    }


    /* =========================================================
       STAGE INFO
    ========================================================= */

    .stage-info {
        display: flex;

        align-items: center;

        gap: 9px;

        min-height: 42px;

        padding: 0 12px;

        border: 1px solid #E8EAED;

        border-radius: 8px;

        background: #F8F9FA;
    }


    .stage-dot {
        width: 8px;

        height: 8px;

        flex-shrink: 0;

        border-radius: 50%;

        background: #0B2A6F;
    }


    .stage-name {
        color: #3C4043;

        font-size: 12px;

        font-weight: 600;
    }


    /* =========================================================
       FORM ACTIONS
    ========================================================= */

    .form-actions {
        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 8px;

        margin-top: 30px;

        padding-top: 20px;

        border-top: 1px solid #E8EAED;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

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


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="opportunity-create-header">


        <div class="opportunity-create-header-left">

            <h1>
                Tambah Opportunity
            </h1>

            <p>
                Tambahkan peluang penjualan baru ke dalam CRM.
            </p>

        </div>


        <a
            href="{{ route('opportunities.index') }}"
            class="btn btn-secondary"
        >

            ← Kembali

        </a>


    </div>


    <!-- =====================================================
         FORM CARD
    ====================================================== -->

    <div class="opportunity-form-card">


        <form
            id="opportunityForm"
            action="{{ route('opportunities.store') }}"
            method="POST"
            novalidate
        >

            @csrf


            <!-- =================================================
                 INFORMASI OPPORTUNITY
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Informasi Opportunity
                    </h2>

                    <p>
                        Masukkan informasi utama peluang penjualan.
                    </p>

                </div>


                <div class="form-grid">


                    <!-- NAMA -->

                    <div class="form-group full">

                        <label
                            for="name"
                            class="form-label"
                        >

                            Nama Opportunity
                            <span class="required">*</span>

                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Pemesanan Benang PT ABC"
                            required
                        >


                        @error('name')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                    <!-- CUSTOMER -->

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

                                Pilih Customer

                            </option>


                            @foreach(
                                $customers
                                as $customer
                            )


                                <option
                                    value="{{ $customer->id }}"

                                    {{
                                        (string) old(
                                            'customer_id'
                                        )
                                        ===
                                        (string) $customer->id
                                            ? 'selected'
                                            : ''
                                    }}
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


                    <!-- STAGE -->

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

                                Pilih Stage

                            </option>


                            @foreach(
                                $stages
                                as $stage
                            )


                                <option
                                    value="{{ $stage->id }}"

                                    {{
                                        (string) old(
                                            'stage_id'
                                        )
                                        ===
                                        (string) $stage->id
                                            ? 'selected'
                                            : ''
                                    }}
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


            <!-- =================================================
                 NILAI PENJUALAN
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Nilai Penjualan
                    </h2>

                    <p>
                        Tentukan estimasi nilai transaksi dan tingkat peluang.
                    </p>

                </div>


                <div class="form-grid">


                    <!-- REVENUE -->

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
                                value="{{ old(
                                    'expected_revenue'
                                ) }}"
                                inputmode="numeric"
                                autocomplete="off"
                                placeholder="Contoh: 100000000"
                                required
                            >


                        </div>


                        <div class="field-help">

                            Masukkan angka saja.
                            Contoh: 100000000

                        </div>


                        <div
                            id="revenueError"
                            class="field-error dynamic-error"
                        >
                            Expected Revenue harus berupa angka.
                        </div>


                        @error('expected_revenue')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- RATING -->

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
                                class="
                                    form-select
                                    rating-select
                                "
                                required
                                onchange="updateRatingPreview()"
                            >


                                <option
                                    value="0"
                                    {{ old('rating', 0) == 0
                                        ? 'selected'
                                        : ''
                                    }}
                                >

                                    0 — Tidak ada rating

                                </option>


                                <option
                                    value="1"
                                    {{ old('rating') == 1
                                        ? 'selected'
                                        : ''
                                    }}
                                >

                                    1 — Sangat rendah

                                </option>


                                <option
                                    value="2"
                                    {{ old('rating') == 2
                                        ? 'selected'
                                        : ''
                                    }}
                                >

                                    2 — Rendah

                                </option>


                                <option
                                    value="3"
                                    {{ old('rating') == 3
                                        ? 'selected'
                                        : ''
                                    }}
                                >

                                    3 — Sedang

                                </option>


                                <option
                                    value="4"
                                    {{ old('rating') == 4
                                        ? 'selected'
                                        : ''
                                    }}
                                >

                                    4 — Tinggi

                                </option>


                                <option
                                    value="5"
                                    {{ old('rating') == 5
                                        ? 'selected'
                                        : ''
                                    }}
                                >

                                    5 — Sangat tinggi

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


                    <!-- DATE -->

                    <div class="form-group">


                        <label
                            for="opportunity_date"
                            class="form-label"
                        >

                            Tanggal Opportunity

                        </label>


                        <input
                            type="date"
                            id="opportunity_date"
                            name="opportunity_date"
                            class="form-input"
                            value="{{ old(
                                'opportunity_date'
                            ) }}"
                        >


                        <div class="field-help">

                            Kosongkan jika ingin menggunakan
                            tanggal yang ditentukan kemudian.

                        </div>


                        @error('opportunity_date')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                </div>

            </div>


            <!-- =================================================
                 CATATAN
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Catatan
                    </h2>

                    <p>
                        Tambahkan informasi tambahan mengenai peluang penjualan.
                    </p>

                </div>


                <div class="form-grid">


                    <div class="form-group full">


                        <label
                            for="notes"
                            class="form-label"
                        >

                            Catatan

                        </label>


                        <textarea
                            id="notes"
                            name="notes"
                            class="form-textarea"
                            placeholder="Contoh: Customer meminta penawaran harga untuk 5 ton benang."
                        >{{ old('notes') }}</textarea>


                        @error('notes')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                </div>

            </div>


            <!-- =================================================
                 ACTIONS
            ================================================== -->

            <div class="form-actions">


                <a
                    href="{{ route(
                        'opportunities.index'
                    ) }}"
                    class="btn btn-secondary"
                >

                    Batal

                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >


                    <svg
                        width="15"
                        height="15"
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


                    Simpan Opportunity


                </button>


            </div>


        </form>


    </div>


</div>

@endsection


@section('scripts')

<script>

    /* =========================================================
       RATING PREVIEW
    ========================================================= */

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

            if (i <= rating) {

                stars += '★';

            } else {

                stars += '☆';

            }

        }


        document.getElementById(
            'ratingStars'
        ).textContent = stars;


        document.getElementById(
            'ratingText'
        ).textContent =
            rating + '/5';

    }


    /* =========================================================
       VALIDASI EXPECTED REVENUE
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


        const value =
            input.value.trim();


        /*
        |--------------------------------------------------------------------------
        | KOSONG
        |--------------------------------------------------------------------------
        */

        if (value === '') {

            input.classList.remove(
                'input-invalid'
            );

            error.classList.remove(
                'show'
            );

            return false;

        }


        /*
        |--------------------------------------------------------------------------
        | HANYA ANGKA
        |--------------------------------------------------------------------------
        */

        const isNumber =
            /^[0-9]+$/.test(value);


        if (!isNumber) {

            input.classList.add(
                'input-invalid'
            );

            error.classList.add(
                'show'
            );

            return false;

        }


        /*
        |--------------------------------------------------------------------------
        | VALID
        |--------------------------------------------------------------------------
        */

        input.classList.remove(
            'input-invalid'
        );

        error.classList.remove(
            'show'
        );

        return true;

    }


    /* =========================================================
       CEGAH HURUF / KARAKTER ANEH
    ========================================================= */

    document
        .getElementById(
            'expected_revenue'
        )
        .addEventListener(
            'input',
            function()
            {

                validateRevenue();

            }
        );


    /* =========================================================
       VALIDASI SAAT SUBMIT
    ========================================================= */

    document
        .getElementById(
            'opportunityForm'
        )
        .addEventListener(
            'submit',
            function(event)
            {

                const revenue =
                    validateRevenue();


                if (!revenue) {

                    event.preventDefault();

                    document
                        .getElementById(
                            'expected_revenue'
                        )
                        .focus();

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | RATING
                |--------------------------------------------------------------------------
                */

                const rating =
                    parseInt(
                        document
                            .getElementById(
                                'rating'
                            )
                            .value
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
                        'Rating harus berupa angka 0 sampai 5.'
                    );

                }

            }
        );


    /* =========================================================
       INITIALIZE RATING
    ========================================================= */

    document.addEventListener(
        'DOMContentLoaded',
        function()
        {

            updateRatingPreview();

            validateRevenue();

        }
    );

</script>

@endsection