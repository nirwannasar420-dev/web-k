@extends('layouts.app')

@section('title', 'Edit Opportunity')
@section('page-title', 'Edit Opportunity')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .opportunity-edit-page {
        max-width: 980px;
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
        margin-bottom: 25px;
    }

    .opportunity-edit-header-left h1 {
        margin: 0 0 6px;

        color: #202124;

        font-size: 28px;

        font-weight: 700;

        line-height: 1.2;
    }

    .opportunity-edit-header-left p {
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
       CURRENT OPPORTUNITY
    ========================================================= */

    .current-opportunity {
        display: flex;

        align-items: center;

        gap: 12px;

        padding: 14px;

        margin-bottom: 25px;

        background: #F8F9FA;

        border: 1px solid #E8EAED;

        border-radius: 10px;
    }


    .current-opportunity-icon {
        width: 44px;

        height: 44px;

        flex-shrink: 0;

        border-radius: 11px;

        background: #E8EEF9;

        color: #0B2A6F;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .current-opportunity-icon svg {
        width: 20px;

        height: 20px;
    }


    .current-opportunity-label {
        margin-bottom: 3px;

        color: #80868B;

        font-size: 10px;
    }


    .current-opportunity-name {
        color: #202124;

        font-size: 13px;

        font-weight: 700;
    }


    /* =========================================================
       FORM SECTION
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
       GRID
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
    }


    .revenue-input {
        padding-left: 33px;
    }


    /* =========================================================
       RATING
    ========================================================= */

    .rating-wrapper {
        display: flex;

        flex-direction: column;

        gap: 8px;
    }


    .rating-preview {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        min-height: 32px;

        width: fit-content;

        padding: 0 10px;

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
       ACTIONS
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


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="opportunity-edit-header">


        <div class="opportunity-edit-header-left">

            <h1>
                Edit Opportunity
            </h1>


            <p>
                Perbarui informasi peluang penjualan.
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


        <!-- =================================================
             CURRENT OPPORTUNITY
        ================================================== -->

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

                    Opportunity yang sedang diedit

                </div>


                <div class="current-opportunity-name">

                    {{ $opportunity->name }}

                </div>


            </div>


        </div>


        <!-- =================================================
             FORM
        ================================================== -->

        <form
            action="{{ route(
                'opportunities.update',
                $opportunity
            ) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- =================================================
                 INFORMASI OPPORTUNITY
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Informasi Opportunity
                    </h2>

                    <p>
                        Perbarui informasi utama peluang penjualan.
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
                            value="{{ old(
                                'name',
                                $opportunity->name
                            ) }}"
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


                            @foreach(
                                $customers
                                as $customer
                            )


                                <option
                                    value="{{ $customer->id }}"

                                    {{
                                        (string) old(
                                            'customer_id',
                                            $opportunity->customer_id
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


                            @foreach(
                                $stages
                                as $stage
                            )


                                <option
                                    value="{{ $stage->id }}"

                                    {{
                                        (string) old(
                                            'stage_id',
                                            $opportunity->stage_id
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
                        Perbarui nilai transaksi dan tingkat peluang.
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
                                type="number"
                                id="expected_revenue"
                                name="expected_revenue"
                                class="form-input revenue-input"
                                value="{{ old(
                                    'expected_revenue',
                                    $opportunity->expected_revenue
                                ) }}"
                                min="0"
                                step="1000"
                                required
                            >


                        </div>


                        <div class="field-help">

                            Masukkan estimasi nilai transaksi.

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
                                class="form-select"
                                required
                                onchange="updateRatingPreview()"
                            >


                                <option
                                    value="0"
                                    {{
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '0'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    0 — Tidak ada rating

                                </option>


                                <option
                                    value="1"
                                    {{
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '1'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    1 — Sangat rendah

                                </option>


                                <option
                                    value="2"
                                    {{
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '2'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    2 — Rendah

                                </option>


                                <option
                                    value="3"
                                    {{
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '3'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    3 — Sedang

                                </option>


                                <option
                                    value="4"
                                    {{
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '4'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    4 — Tinggi

                                </option>


                                <option
                                    value="5"
                                    {{
                                        (string) old(
                                            'rating',
                                            $opportunity->rating
                                        ) === '5'
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
                                'opportunity_date',
                                $opportunity->opportunity_date
                                    ? $opportunity
                                        ->opportunity_date
                                        ->format('Y-m-d')
                                    : ''
                            ) }}"
                        >


                        @error('opportunity_date')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                    <!-- STAGE INFO -->

                    <div class="form-group">


                        <label class="form-label">

                            Stage Saat Ini

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


            <!-- =================================================
                 CATATAN
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">

                    <h2>
                        Catatan
                    </h2>

                    <p>
                        Perbarui catatan mengenai peluang penjualan.
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
                        >{{ old(
                            'notes',
                            $opportunity->notes
                        ) }}</textarea>


                        @error('notes')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror


                    </div>


                </div>

            </div>


            <!-- =================================================
                 ACTION
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


                    Simpan Perubahan


                </button>


            </div>


        </form>


    </div>


</div>

@endsection


@section('scripts')

<script>

    /*
    |--------------------------------------------------------------------------
    | RATING PREVIEW
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | STAGE PREVIEW
    |--------------------------------------------------------------------------
    */

    function updateStagePreview()
    {

        const select =
            document.getElementById(
                'stage_id'
            );


        const stageText =
            select.options[
                select.selectedIndex
            ]?.text || '-';


        document.getElementById(
            'stageNamePreview'
        ).textContent = stageText;

    }


    /*
    |--------------------------------------------------------------------------
    | INITIALIZE
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'DOMContentLoaded',
        function()
        {

            updateRatingPreview();

            updateStagePreview();


            document.getElementById(
                'stage_id'
            ).addEventListener(
                'change',
                updateStagePreview
            );

        }
    );

</script>

@endsection