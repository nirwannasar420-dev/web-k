@extends('layouts.app')

@section('title', 'Add Activity')
@section('page-title', 'Add Activity')

@section('styles')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .activity-create-page {
        padding: 28px 30px 40px;
        width: 100%;
        box-sizing: border-box;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .activity-create-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 20px;
    }


    .activity-create-title h1 {
        margin: 0;
        color: #0B2A6F;
        font-size: 26px;
        font-weight: 700;
    }


    .activity-create-title p {
        margin: 7px 0 0;
        color: #8992a3;
        font-size: 14px;
    }


    /* =========================================================
       BACK BUTTON
    ========================================================= */

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 17px;

        border: 1px solid #dfe3ea;
        border-radius: 10px;

        background: #fff;
        color: #0B2A6F;

        text-decoration: none;

        font-size: 13px;
        font-weight: 600;
    }


    .btn-back:hover {
        background: #f7f8fa;
        color: #0B2A6F;
    }


    /* =========================================================
       FORM CARD
    ========================================================= */

    .activity-form-card {
        max-width: 900px;

        background: #fff;

        border: 1px solid #e7eaf0;
        border-radius: 16px;

        box-shadow:
            0 4px 15px rgba(0,0,0,.04);

        padding: 28px;
    }


    /* =========================================================
       FORM SECTION
    ========================================================= */

    .form-section-title {
        margin: 0 0 20px;

        color: #1d2739;

        font-size: 18px;
        font-weight: 700;
    }


    .form-grid {
        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 18px;
    }


    .form-group {
        display: flex;
        flex-direction: column;
    }


    .form-group.full {
        grid-column: 1 / -1;
    }


    .form-group label {
        margin-bottom: 7px;

        color: #475166;

        font-size: 13px;
        font-weight: 600;
    }


    .required {
        color: #E30613;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .form-control-custom,
    .form-select-custom {

        width: 100%;
        height: 44px;

        padding: 0 13px;

        border:
            1px solid #dfe3ea;

        border-radius: 9px;

        background: #fff;
        color: #263248;

        font-size: 13px;

        outline: none;

        box-sizing: border-box;
    }


    .form-control-custom:focus,
    .form-select-custom:focus {

        border-color: #0B2A6F;

        box-shadow:
            0 0 0 3px
            rgba(11,42,111,.08);
    }


    .form-help {

        margin-top: 6px;

        color: #8992a3;

        font-size: 11px;
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .error-message {

        margin-top: 6px;

        color: #E30613;

        font-size: 12px;
    }


    .alert-error {

        margin-bottom: 22px;

        padding: 14px 15px;

        border-radius: 10px;

        background: #fff0f1;

        border:
            1px solid #f4c8cc;

        color: #b4232d;

        font-size: 13px;
    }


    /* =========================================================
       OPPORTUNITY PREVIEW
    ========================================================= */

    .opportunity-preview {

        margin-top: 10px;

        padding: 12px 14px;

        border-radius: 10px;

        background: #f7f8fa;

        border:
            1px solid #edf0f4;

        display: none;
    }


    .preview-label {

        color: #8992a3;

        font-size: 11px;

        margin-bottom: 4px;
    }


    .preview-name {

        color: #0B2A6F;

        font-size: 13px;

        font-weight: 700;
    }


    .preview-customer {

        margin-top: 3px;

        color: #6b7280;

        font-size: 12px;
    }


    /* =========================================================
       STATUS OPTIONS
    ========================================================= */

    .status-options {

        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 10px;
    }


    .status-option {

        position: relative;
    }


    .status-option input {

        position: absolute;

        opacity: 0;

        pointer-events: none;
    }


    .status-option label {

        height: 44px;

        padding: 0 10px;

        border:
            1px solid #dfe3ea;

        border-radius: 9px;

        display: flex;

        align-items: center;

        justify-content: center;

        cursor: pointer;

        color: #596273;

        background: #fff;

        font-size: 12px;

        font-weight: 600;

        transition: .2s;
    }


    .status-option.planned input:checked + label {

        border-color: #d97706;

        background: #fff4e5;

        color: #b45309;
    }


    .status-option.done input:checked + label {

        border-color: #198754;

        background: #e9f8f0;

        color: #16794c;
    }


    .status-option.cancelled input:checked + label {

        border-color: #dc3545;

        background: #fff0f2;

        color: #c52e3d;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .form-actions {

        margin-top: 28px;

        padding-top: 22px;

        border-top:
            1px solid #eef0f4;

        display: flex;

        justify-content: flex-end;

        gap: 10px;
    }


    .btn-cancel {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-width: 100px;

        height: 42px;

        padding: 0 16px;

        border:
            1px solid #dfe3ea;

        border-radius: 9px;

        background: #fff;

        color: #475166;

        text-decoration: none;

        font-size: 13px;

        font-weight: 600;
    }


    .btn-cancel:hover {

        background: #f7f8fa;
    }


    .btn-save {

        min-width: 140px;

        height: 42px;

        padding: 0 18px;

        border: none;

        border-radius: 9px;

        background: #0B2A6F;

        color: #fff;

        font-size: 13px;

        font-weight: 700;

        cursor: pointer;
    }


    .btn-save:hover {

        background: #071D4D;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .activity-create-page {

            padding:
                20px 15px 30px;
        }


        .activity-create-header {

            flex-direction: column;

            align-items: flex-start;
        }


        .activity-form-card {

            padding: 20px;
        }


        .form-grid {

            grid-template-columns:
                1fr;
        }


        .form-group.full {

            grid-column: auto;
        }


        .status-options {

            grid-template-columns:
                1fr;
        }


        .form-actions {

            flex-direction:
                column-reverse;
        }


        .btn-cancel,
        .btn-save {

            width: 100%;
        }

    }

</style>

@endsection


@section('content')

<div class="activity-create-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="activity-create-header">


        <div class="activity-create-title">

            <h1>
                Add Activity
            </h1>


            <p>
                Add a new activity to the CRM.
            </p>

        </div>


        <a
            href="{{ route('activities.index') }}"
            class="btn-back"
        >
            ← Back
        </a>


    </div>


    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="activity-form-card">


        {{-- ERROR --}}

        @if($errors->any())

            <div class="alert-error">

                <strong>
                    An error occurred:
                </strong>


                <div style="margin-top:6px;">

                    @foreach($errors->all() as $error)

                        <div>
                            • {{ $error }}
                        </div>

                    @endforeach

                </div>

            </div>

        @endif


        <form
            action="{{ route('activities.store') }}"
            method="POST"
        >

            @csrf


            <!-- =================================================
                 ACTIVITY INFORMATION
            ================================================== -->

            <h2 class="form-section-title">
                Activity Information
            </h2>


            <div class="form-grid">


                {{-- =================================================
                     OPPORTUNITY
                ================================================== --}}

                <div class="form-group full">


                    <label
                        for="opportunity_id"
                    >

                        Opportunity

                        <span class="required">
                            *
                        </span>

                    </label>


                    <select
                        name="opportunity_id"
                        id="opportunity_id"
                        class="form-select-custom"
                        required
                    >


                        <option value="">
                            -- Select Opportunity --
                        </option>


                        @foreach(
                            $opportunities
                            as $opportunity
                        )


                            <option
                                value="{{ $opportunity->id }}"

                                data-customer="
                                    {{ $opportunity->customer->name ?? '-' }}
                                "

                                {{
                                    old(
                                        'opportunity_id'
                                    )
                                    == $opportunity->id
                                        ? 'selected'
                                        : ''
                                }}
                            >

                                {{ $opportunity->name }}

                            </option>


                        @endforeach


                    </select>


                    <div
                        id="opportunityPreview"
                        class="opportunity-preview"
                    >


                        <div class="preview-label">
                            RELATED CUSTOMER
                        </div>


                        <div
                            id="previewOpportunity"
                            class="preview-name"
                        >
                        </div>


                        <div
                            id="previewCustomer"
                            class="preview-customer"
                        >
                        </div>


                    </div>


                    @error('opportunity_id')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror


                </div>


                {{-- =================================================
                     ACTIVITY TYPE
                ================================================== --}}

                <div class="form-group">


                    <label
                        for="type"
                    >

                        Activity Type

                        <span class="required">
                            *
                        </span>

                    </label>


                    <select
                        name="type"
                        id="type"
                        class="form-select-custom"
                        required
                    >


                        <option value="">
                            -- Select Activity Type --
                        </option>


                        <option
                            value="Meeting"
                            {{
                                old('type') === 'Meeting'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Meeting
                        </option>


                        <option
                            value="Follow Up"
                            {{
                                old('type') === 'Follow Up'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Follow Up
                        </option>


                        <option
                            value="Telepon"
                            {{
                                old('type') === 'Telepon'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Call
                        </option>


                        <option
                            value="Email"
                            {{
                                old('type') === 'Email'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Email
                        </option>


                        <option
                            value="Pembahasan Harga"
                            {{
                                old('type') === 'Pembahasan Harga'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Price Discussion
                        </option>


                        <option
                            value="Lainnya"
                            {{
                                old('type') === 'Lainnya'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Other
                        </option>


                    </select>


                    @error('type')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror


                </div>


                {{-- =================================================
                     SUBJECT
                ================================================== --}}

                <div class="form-group">


                    <label
                        for="subject"
                    >

                        Activity Subject

                        <span class="required">
                            *
                        </span>

                    </label>


                    <input
                        type="text"
                        name="subject"
                        id="subject"
                        class="form-control-custom"
                        value="{{ old('subject') }}"
                        placeholder="Example: Price quotation"
                        maxlength="255"
                        required
                    >


                    @error('subject')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror


                </div>


                {{-- =================================================
                     DATE & TIME
                ================================================== --}}

                <div class="form-group">


                    <label
                        for="activity_date"
                    >

                        Date & Time

                        <span class="required">
                            *
                        </span>

                    </label>


                    <input
                        type="datetime-local"
                        name="activity_date"
                        id="activity_date"
                        class="form-control-custom"
                        value="{{ old('activity_date') }}"
                        required
                    >


                    @error('activity_date')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror


                </div>


                {{-- =================================================
                     STATUS
                ================================================== --}}

                <div class="form-group">


                    <label>

                        Status

                        <span class="required">
                            *
                        </span>

                    </label>


                    <div class="status-options">


                        {{-- PLANNED --}}

                        <div class="status-option planned">


                            <input
                                type="radio"
                                name="status"
                                id="status_planned"
                                value="planned"

                                {{
                                    old(
                                        'status',
                                        'planned'
                                    ) === 'planned'
                                        ? 'checked'
                                        : ''
                                }}
                            >


                            <label
                                for="status_planned"
                            >
                                Planned
                            </label>


                        </div>


                        {{-- DONE --}}

                        <div class="status-option done">


                            <input
                                type="radio"
                                name="status"
                                id="status_done"
                                value="done"

                                {{
                                    old('status')
                                    === 'done'
                                        ? 'checked'
                                        : ''
                                }}
                            >


                            <label
                                for="status_done"
                            >
                                Done
                            </label>


                        </div>


                        {{-- CANCELLED --}}

                        <div class="status-option cancelled">


                            <input
                                type="radio"
                                name="status"
                                id="status_cancelled"
                                value="cancelled"

                                {{
                                    old('status')
                                    === 'cancelled'
                                        ? 'checked'
                                        : ''
                                }}
                            >


                            <label
                                for="status_cancelled"
                            >
                                Cancelled
                            </label>


                        </div>


                    </div>


                    @error('status')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror


                </div>


            </div>


            <!-- =================================================
                 ACTION BUTTONS
            ================================================== -->

            <div class="form-actions">


                <a
                    href="{{ route('activities.index') }}"
                    class="btn-cancel"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="btn-save"
                >
                    Save Activity
                </button>


            </div>


        </form>


    </div>


</div>


<script>

    document.addEventListener(
        'DOMContentLoaded',
        function ()
        {


            /* =====================================================
               ELEMENTS
            ===================================================== */

            const opportunitySelect =
                document.getElementById(
                    'opportunity_id'
                );


            const preview =
                document.getElementById(
                    'opportunityPreview'
                );


            const previewOpportunity =
                document.getElementById(
                    'previewOpportunity'
                );


            const previewCustomer =
                document.getElementById(
                    'previewCustomer'
                );


            /* =====================================================
               OPPORTUNITY PREVIEW
            ===================================================== */

            function updateOpportunityPreview()
            {

                const selected =
                    opportunitySelect.options[
                        opportunitySelect.selectedIndex
                    ];


                if (
                    !opportunitySelect.value
                ) {

                    preview.style.display =
                        'none';

                    return;
                }


                previewOpportunity.textContent =
                    selected.textContent.trim();


                previewCustomer.textContent =
                    'Customer: ' +
                    (
                        selected.getAttribute(
                            'data-customer'
                        )
                        || '-'
                    );


                preview.style.display =
                    'block';

            }


            /* =====================================================
               CHANGE EVENT
            ===================================================== */

            opportunitySelect.addEventListener(
                'change',
                updateOpportunityPreview
            );


            /* =====================================================
               INITIAL STATE
            ===================================================== */

            updateOpportunityPreview();

        }
    );

</script>

@endsection