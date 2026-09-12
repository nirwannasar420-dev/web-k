@extends('layouts.app')

@section('title', 'Sales Resume')
@section('page-title', 'Sales Resume')

@section('styles')
<style>
    .resume-page {
        width: 100%;
        padding-bottom: 35px;
    }

    .resume-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 20px;
    }

    .resume-header-left {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .resume-header-icon {
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

    .resume-header-icon svg {
        width: 23px;
        height: 23px;
    }

    .resume-heading h1 {
        margin: 0;
        color: #172033;
        font-size: 27px;
        font-weight: 800;
        line-height: 1.2;
    }

    .resume-heading p {
        margin: 5px 0 0;
        color: #64748B;
        font-size: 12px;
    }

    .resume-summary {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 10px;
        margin-bottom: 18px;
    }

    .resume-summary-card {
        padding: 13px;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
        background: #FFFFFF;
        box-shadow: 0 3px 12px rgba(15,23,42,.04);
    }

    .resume-summary-label {
        color: #94A3B8;
        font-size: 8px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .55px;
    }

    .resume-summary-value {
        margin-top: 6px;
        color: #172033;
        font-size: 15px;
        font-weight: 800;
        line-height: 1.25;
    }

    .resume-summary-card.prospect .resume-summary-value {
        color: #0B2A6F;
    }

    .resume-summary-card.qualified .resume-summary-value {
        color: #1769AA;
    }

    .resume-summary-card.proposition .resume-summary-value {
        color: #B85A00;
    }

    .resume-summary-card.won .resume-summary-value {
        color: #18784D;
    }

    .resume-summary-card.lost .resume-summary-value {
        color: #C52E3D;
    }

    .resume-filter-card,
    .resume-mode-card,
    .resume-card {
        border: 1px solid #E2E8F0;
        border-radius: 12px;
        background: #FFFFFF;
        box-shadow: 0 3px 12px rgba(15,23,42,.04);
    }

    .resume-filter-card {
        margin-bottom: 18px;
        padding: 17px;
    }

    .resume-filter-heading {
        margin-bottom: 13px;
        color: #172033;
        font-size: 13px;
        font-weight: 800;
    }

    .resume-filter-form {
        display: grid;
        grid-template-columns: repeat(7, minmax(0, 1fr));
        gap: 9px;
        align-items: end;
    }

    .resume-field label {
        display: block;
        margin-bottom: 6px;
        color: #64748B;
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .resume-field select,
    .resume-field input {
        width: 100%;
        height: 38px;
        padding: 0 10px;
        border: 1px solid #D9E1EC;
        border-radius: 8px;
        background: #FFFFFF;
        color: #172033;
        font-size: 10px;
        outline: none;
        box-sizing: border-box;
    }

    .resume-field select:focus,
    .resume-field input:focus {
        border-color: #0B2A6F;
        box-shadow: 0 0 0 3px rgba(11,42,111,.07);
    }

    .resume-filter-button {
        width: 100%;
        height: 38px;
        padding: 0 15px;
        border: none;
        border-radius: 8px;
        background: #0B2A6F;
        color: #FFFFFF;
        font-size: 10px;
        font-weight: 800;
        cursor: pointer;
    }

    .resume-filter-button:hover {
        background: #071D4D;
    }

    .resume-reset-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 38px;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        background: #F8FAFC;
        color: #64748B;
        font-size: 10px;
        font-weight: 800;
        text-decoration: none;
    }

    .resume-mode-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 18px;
        padding: 12px 14px;
    }

    .resume-mode-info {
        min-width: 0;
    }

    .resume-mode-title {
        color: #172033;
        font-size: 12px;
        font-weight: 800;
    }

    .resume-mode-description {
        margin-top: 3px;
        color: #94A3B8;
        font-size: 9px;
    }

    .resume-mode-tabs {
        display: inline-flex;
        padding: 3px;
        border-radius: 8px;
        background: #F1F5F9;
    }

    .resume-mode-tab {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 105px;
        height: 31px;
        padding: 0 10px;
        border-radius: 6px;
        color: #64748B;
        font-size: 9px;
        font-weight: 800;
        text-decoration: none;
    }

    .resume-mode-tab.active {
        background: #FFFFFF;
        color: #0B2A6F;
        box-shadow: 0 2px 6px rgba(15,23,42,.08);
    }

    .resume-card {
        overflow: hidden;
        margin-bottom: 18px;
    }

    .resume-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 15px 17px;
        border-bottom: 1px solid #E2E8F0;
    }

    .resume-card-title {
        color: #172033;
        font-size: 13px;
        font-weight: 800;
    }

    .resume-card-subtitle {
        margin-top: 4px;
        color: #94A3B8;
        font-size: 9px;
    }

    .resume-record-count {
        padding: 6px 9px;
        border-radius: 7px;
        background: #F1F5F9;
        color: #64748B;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
    }

    .resume-table-wrapper {
        overflow-x: auto;
    }

    .resume-table {
        width: 100%;
        border-collapse: collapse;
    }

    .resume-table th {
        padding: 11px 12px;
        background: #F8FAFC;
        border-bottom: 1px solid #E2E8F0;
        color: #64748B;
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .35px;
        text-align: left;
        white-space: nowrap;
    }

    .resume-table td {
        padding: 12px;
        border-bottom: 1px solid #F1F5F9;
        color: #475569;
        font-size: 10px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .resume-table tbody tr:hover {
        background: #FAFCFF;
    }

    .resume-table tbody tr:last-child td {
        border-bottom: none;
    }

    .resume-primary {
        color: #172033;
        font-size: 10px;
        font-weight: 800;
    }

    .resume-secondary {
        margin-top: 3px;
        color: #94A3B8;
        font-size: 8px;
    }

    .resume-money {
        font-weight: 800;
        white-space: nowrap;
    }

    .resume-money.zero {
        color: #CBD5E1;
        font-weight: 600;
    }

    .resume-total-cell {
        color: #172033;
        font-weight: 800;
        white-space: nowrap;
    }

    .resume-stage-head.prospect {
        color: #0B2A6F;
    }

    .resume-stage-head.qualified {
        color: #1769AA;
    }

    .resume-stage-head.proposition {
        color: #B85A00;
    }

    .resume-stage-head.won {
        color: #18784D;
    }

    .resume-stage-head.lost {
        color: #C52E3D;
    }

    .transaction-stage {
        display: inline-flex;
        padding: 5px 8px;
        border-radius: 6px;
        font-size: 9px;
        font-weight: 800;
    }

    .transaction-stage.prospect {
        background: #EEF4FF;
        color: #0B2A6F;
    }

    .transaction-stage.qualified {
        background: #E8F2FF;
        color: #1769AA;
    }

    .transaction-stage.proposition {
        background: #FFF3E6;
        color: #B85A00;
    }

    .transaction-stage.won {
        background: #EAF8F0;
        color: #18784D;
    }

    .transaction-stage.lost {
        background: #FDECEF;
        color: #C52E3D;
    }

    .resume-empty {
        padding: 55px 20px;
        text-align: center;
        color: #94A3B8;
    }

    .resume-empty-icon {
        width: 52px;
        height: 52px;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #F1F5F9;
        color: #94A3B8;
    }

    .resume-empty-icon svg {
        width: 24px;
        height: 24px;
    }

    .resume-empty-title {
        color: #475569;
        font-size: 12px;
        font-weight: 800;
    }

    .resume-empty-text {
        max-width: 400px;
        margin: 5px auto 0;
        color: #94A3B8;
        font-size: 9px;
        line-height: 1.5;
    }

    @media (max-width: 1200px) {
        .resume-summary {
            grid-template-columns: repeat(3, 1fr);
        }

        .resume-filter-form {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }

    @media (max-width: 800px) {
        .resume-summary {
            grid-template-columns: repeat(2, 1fr);
        }

        .resume-filter-form {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .resume-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .resume-summary {
            grid-template-columns: 1fr;
        }

        .resume-filter-form {
            grid-template-columns: 1fr;
        }

        .resume-mode-card {
            align-items: flex-start;
            flex-direction: column;
        }

        .resume-mode-tabs {
            width: 100%;
        }

        .resume-mode-tab {
            flex: 1;
        }
    }
</style>
@endsection

@section('content')

<div class="resume-page">

    <div class="resume-header">
        <div class="resume-header-left">

            <div class="resume-header-icon">
                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M4 19V5"/>
                    <path d="M4 19h16"/>
                    <path d="M8 16v-5"/>
                    <path d="M12 16V8"/>
                    <path d="M16 16v-3"/>
                    <path d="M20 16v-7"/>
                </svg>
            </div>

            <div class="resume-heading">
                <h1>Sales Resume / PIPO</h1>
                <p>
                    Sales transaction summary by Customer, Product, Salesperson, and Stage.
                </p>
            </div>

        </div>
    </div>


    {{-- SUMMARY --}}

    <div class="resume-summary">

        @foreach([
            'prospect' => 'Prospect',
            'qualified' => 'Qualified',
            'proposition' => 'Proposition',
            'won' => 'Won',
            'lost' => 'Lost'
        ] as $key => $label)

            <div class="resume-summary-card {{ $key }}">

                <div class="resume-summary-label">
                    {{ $label }}
                </div>

                <div class="resume-summary-value">
                    Rp
                    {{
                        number_format(
                            (float) ($totals[$key] ?? 0),
                            0,
                            ',',
                            '.'
                        )
                    }}
                </div>

            </div>

        @endforeach

        <div class="resume-summary-card">

            <div class="resume-summary-label">
                Grand Total
            </div>

            <div class="resume-summary-value">
                Rp
                {{
                    number_format(
                        (float) ($totals['grand'] ?? 0),
                        0,
                        ',',
                        '.'
                    )
                }}
            </div>

        </div>

    </div>


    {{-- FILTERS --}}

    <div class="resume-filter-card">

        <div class="resume-filter-heading">
            PIPO Filters
        </div>

        <form
            action="{{ route('sales_resume.index') }}"
            method="GET"
            class="resume-filter-form"
        >

            <input
                type="hidden"
                name="mode"
                value="{{ $mode }}"
            >

            <div class="resume-field">

                <label>Stage</label>

                <select name="stage_id">

                    <option value="">
                        All Stages
                    </option>

                    @foreach($stages as $stage)

                        <option
                            value="{{ $stage->id }}"
                            {{ (string) $stageFilter === (string) $stage->id ? 'selected' : '' }}
                        >
                            {{ $stage->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="resume-field">

                <label>Customer</label>

                <select name="customer_id">

                    <option value="">
                        All Customers
                    </option>

                    @foreach($customers as $customer)

                        <option
                            value="{{ $customer->id }}"
                            {{ (string) $customerFilter === (string) $customer->id ? 'selected' : '' }}
                        >
                            {{ $customer->company ?: $customer->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="resume-field">

                <label>Product</label>

                <select name="product_id">

                    <option value="">
                        All Products
                    </option>

                    @foreach($products as $product)

                        <option
                            value="{{ $product->id }}"
                            {{ (string) $productFilter === (string) $product->id ? 'selected' : '' }}
                        >
                            {{ $product->product_name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="resume-field">

                <label>Salesperson</label>

                <select name="salesperson_id">

                    <option value="">
                        All Salespeople
                    </option>

                    @foreach($salespeople as $salesperson)

                        <option
                            value="{{ $salesperson->id }}"
                            {{ (string) ($salespersonFilter ?? '') === (string) $salesperson->id ? 'selected' : '' }}
                        >
                            {{ $salesperson->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="resume-field">

                <label>Month</label>

                <select name="month">

                    <option value="">
                        All Months
                    </option>

                    @for($month = 1; $month <= 12; $month++)

                        <option
                            value="{{ $month }}"
                            {{ (string) ($monthFilter ?? '') === (string) $month ? 'selected' : '' }}
                        >
                            {{
                                \Illuminate\Support\Carbon::create()
                                    ->month($month)
                                    ->format('F')
                            }}
                        </option>

                    @endfor

                </select>

            </div>


            <div class="resume-field">

                <label>Year</label>

                <select name="year">

                    <option value="">
                        All Years
                    </option>

                    @foreach($years as $year)

                        <option
                            value="{{ $year }}"
                            {{ (string) ($yearFilter ?? '') === (string) $year ? 'selected' : '' }}
                        >
                            {{ $year }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="resume-field">

                <label>&nbsp;</label>

                <button
                    type="submit"
                    class="resume-filter-button"
                >
                    Apply Filter
                </button>

            </div>

        </form>


        <form
            action="{{ route('sales_resume.index') }}"
            method="GET"
            style="
                display:grid;
                grid-template-columns:1fr 1fr auto;
                gap:9px;
                margin-top:12px;
                align-items:end;
            "
        >

            <input type="hidden" name="mode" value="{{ $mode }}">
            <input type="hidden" name="stage_id" value="{{ $stageFilter }}">
            <input type="hidden" name="customer_id" value="{{ $customerFilter }}">
            <input type="hidden" name="product_id" value="{{ $productFilter }}">
            <input type="hidden" name="salesperson_id" value="{{ $salespersonFilter ?? '' }}">
            <input type="hidden" name="month" value="{{ $monthFilter ?? '' }}">
            <input type="hidden" name="year" value="{{ $yearFilter ?? '' }}">

            <div class="resume-field">

                <label>Date From</label>

                <input
                    type="date"
                    name="date_from"
                    value="{{ $dateFrom }}"
                >

            </div>


            <div class="resume-field">

                <label>Date To</label>

                <input
                    type="date"
                    name="date_to"
                    value="{{ $dateTo }}"
                >

            </div>


            <div class="resume-field">

                <label>&nbsp;</label>

                <button
                    type="submit"
                    class="resume-filter-button"
                >
                    Apply Date Range
                </button>

            </div>

        </form>


        <div
            style="
                display:flex;
                justify-content:flex-end;
                margin-top:10px;
            "
        >

            <a
                href="{{ route(
                    'sales_resume.index',
                    ['mode' => $mode]
                ) }}"
                class="resume-reset-link"
                style="width:auto;padding:0 15px;"
            >
                Reset Filters
            </a>

        </div>

    </div>


    {{-- MODE --}}

    <div class="resume-mode-card">

        <div class="resume-mode-info">

            <div class="resume-mode-title">
                Resume View
            </div>

            <div class="resume-mode-description">

                {{
                    $mode === 'customer'
                        ? 'Grouped by Customer, then Product. Sorted by highest transaction value.'
                        : 'Grouped by Product, then Customer. Sorted by highest transaction value.'
                }}

            </div>

        </div>


        <div class="resume-mode-tabs">

            <a
                href="{{ route(
                    'sales_resume.index',
                    array_merge(
                        request()->query(),
                        ['mode' => 'customer']
                    )
                ) }}"
                class="resume-mode-tab {{
                    $mode === 'customer'
                        ? 'active'
                        : ''
                }}"
            >
                By Customer
            </a>

            <a
                href="{{ route(
                    'sales_resume.index',
                    array_merge(
                        request()->query(),
                        ['mode' => 'product']
                    )
                ) }}"
                class="resume-mode-tab {{
                    $mode === 'product'
                        ? 'active'
                        : ''
                }}"
            >
                By Product
            </a>

        </div>

    </div>


    {{-- PIPO SUMMARY --}}

    <div class="resume-card">

        <div class="resume-card-header">

            <div>

                <div class="resume-card-title">
                    PIPO Summary
                </div>

                <div class="resume-card-subtitle">

                    {{
                        $mode === 'customer'
                            ? 'Customer and Product sales position by stage.'
                            : 'Product and Customer sales position by stage.'
                    }}

                    Values are based on product transaction subtotal.

                </div>

            </div>

            <div class="resume-record-count">
                {{ $summary->count() }} rows
            </div>

        </div>


        @if($summary->count())

            <div class="resume-table-wrapper">

                <table class="resume-table">

                    <thead>

                        <tr>

                            @if($mode === 'customer')

                                <th>Customer</th>
                                <th>Product</th>

                            @else

                                <th>Product</th>
                                <th>Customer</th>

                            @endif

                            <th class="resume-stage-head prospect">
                                Prospect
                            </th>

                            <th class="resume-stage-head qualified">
                                Qualified
                            </th>

                            <th class="resume-stage-head proposition">
                                Proposition
                            </th>

                            <th class="resume-stage-head won">
                                Won
                            </th>

                            <th class="resume-stage-head lost">
                                Lost
                            </th>

                            <th>Total</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($summary as $row)

                            <tr>

                                <td>

                                    <div class="resume-primary">
                                        {{ $row['group_name'] }}
                                    </div>

                                    <div class="resume-secondary">
                                        {{
                                            $mode === 'customer'
                                                ? 'Customer'
                                                : 'Product'
                                        }}
                                    </div>

                                </td>


                                <td>

                                    <div class="resume-primary">
                                        {{ $row['detail_name'] }}
                                    </div>

                                    <div class="resume-secondary">
                                        {{
                                            $mode === 'customer'
                                                ? 'Product'
                                                : 'Customer'
                                        }}
                                    </div>

                                </td>


                                @foreach([
                                    'prospect',
                                    'qualified',
                                    'proposition',
                                    'won',
                                    'lost'
                                ] as $stageKey)

                                    <td>

                                        <span class="resume-money {{
                                            $row[$stageKey] <= 0
                                                ? 'zero'
                                                : ''
                                        }}">

                                            Rp
                                            {{
                                                number_format(
                                                    (float) $row[$stageKey],
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}

                                        </span>

                                    </td>

                                @endforeach


                                <td>

                                    <span class="resume-total-cell">

                                        Rp
                                        {{
                                            number_format(
                                                (float) $row['total'],
                                                0,
                                                ',',
                                                '.'
                                            )
                                        }}

                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="resume-empty">

                <div class="resume-empty-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M4 19V5"/>
                        <path d="M4 19h16"/>
                        <path d="M8 16v-5"/>
                        <path d="M12 16V8"/>
                        <path d="M16 16v-3"/>
                        <path d="M20 16v-7"/>
                    </svg>

                </div>

                <div class="resume-empty-title">
                    No PIPO data found.
                </div>

                <div class="resume-empty-text">
                    No opportunity items match the selected filters.
                </div>

            </div>

        @endif

    </div>


    {{-- GROUP SUMMARY --}}

    @if($groupSummary->count())

        <div class="resume-card">

            <div class="resume-card-header">

                <div>

                    <div class="resume-card-title">
                        {{ $mode === 'customer' ? 'Customer' : 'Product' }} Total
                    </div>

                    <div class="resume-card-subtitle">
                        Total transaction value for each main group.
                    </div>

                </div>

                <div class="resume-record-count">
                    {{ $groupSummary->count() }} groups
                </div>

            </div>


            <div class="resume-table-wrapper">

                <table class="resume-table">

                    <thead>

                        <tr>

                            <th>
                                {{ $mode === 'customer' ? 'Customer' : 'Product' }}
                            </th>

                            <th class="resume-stage-head prospect">
                                Prospect
                            </th>

                            <th class="resume-stage-head qualified">
                                Qualified
                            </th>

                            <th class="resume-stage-head proposition">
                                Proposition
                            </th>

                            <th class="resume-stage-head won">
                                Won
                            </th>

                            <th class="resume-stage-head lost">
                                Lost
                            </th>

                            <th>Total</th>
                            <th>Transactions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($groupSummary as $group)

                            <tr>

                                <td>

                                    <span class="resume-primary">
                                        {{ $group['group_name'] }}
                                    </span>

                                </td>


                                @foreach([
                                    'prospect',
                                    'qualified',
                                    'proposition',
                                    'won',
                                    'lost'
                                ] as $stageKey)

                                    <td>

                                        <span class="resume-money {{
                                            $group[$stageKey] <= 0
                                                ? 'zero'
                                                : ''
                                        }}">

                                            Rp
                                            {{
                                                number_format(
                                                    (float) $group[$stageKey],
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}

                                        </span>

                                    </td>

                                @endforeach


                                <td>

                                    <span class="resume-total-cell">

                                        Rp
                                        {{
                                            number_format(
                                                (float) $group['total'],
                                                0,
                                                ',',
                                                '.'
                                            )
                                        }}

                                    </span>

                                </td>


                                <td>
                                    {{ $group['transactions'] }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @endif


    {{-- TRANSACTION DETAIL --}}

    <div class="resume-card">

        <div class="resume-card-header">

            <div>

                <div class="resume-card-title">
                    Transaction Detail
                </div>

                <div class="resume-card-subtitle">
                    Individual product sales records behind the PIPO summary.
                </div>

            </div>

            <div class="resume-record-count">
                {{ $transactions->count() }} records
            </div>

        </div>


        @if($transactions->count())

            <div class="resume-table-wrapper">

                <table class="resume-table">

                    <thead>

                        <tr>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Salesperson</th>
                            <th>Product</th>
                            <th>Opportunity</th>
                            <th>Stage</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Value</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach($transactions as $item)

                            @php

                                $transactionStage =
                                    strtolower(
                                        trim(
                                            $item
                                                ->opportunity
                                                ?->stage
                                                ?->name
                                            ?? ''
                                        )
                                    );

                            @endphp


                            <tr>

                                {{-- DATE --}}

                                <td>

                                    {{
                                        $item
                                            ->opportunity
                                            ?->opportunity_date

                                            ?

                                            \Illuminate\Support\Carbon::parse(
                                                $item
                                                    ->opportunity
                                                    ->opportunity_date
                                            )->format('d/m/Y')

                                            : '-'
                                    }}

                                </td>


                                {{-- CUSTOMER --}}

                                <td>

                                    <div class="resume-primary">

                                        {{
                                            $item
                                                ->opportunity
                                                ?->customer
                                                ?->company
                                            ?:
                                            (
                                                $item
                                                    ->opportunity
                                                    ?->customer
                                                    ?->name
                                                ?? '-'
                                            )
                                        }}

                                    </div>

                                </td>


                                {{-- SALESPERSON --}}

                                <td>

                                    <div class="resume-primary">

                                        {{
                                            $item
                                                ->opportunity
                                                ?->salesperson
                                                ?->name
                                            ?? '-'
                                        }}

                                    </div>

                                </td>


                                {{-- PRODUCT --}}

                                <td>

                                    <div class="resume-primary">

                                        {{
                                            $item
                                                ->product
                                                ?->product_name
                                            ?? '-'
                                        }}

                                    </div>

                                    <div class="resume-secondary">

                                        Code:
                                        {{
                                            $item
                                                ->product
                                                ?->product_code
                                            ?? '-'
                                        }}

                                    </div>

                                </td>


                                {{-- OPPORTUNITY --}}

                                <td>

                                    @if($item->opportunity)

                                        <a
                                            href="{{ route(
                                                'opportunities.show',
                                                $item->opportunity
                                            ) }}"
                                            style="
                                                color:#0B2A6F;
                                                font-weight:800;
                                                text-decoration:none;
                                            "
                                        >
                                            {{ $item->opportunity->name }}
                                        </a>

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- STAGE --}}

                                <td>

                                    <span
                                        class="transaction-stage {{
                                            in_array(
                                                $transactionStage,
                                                [
                                                    'prospect',
                                                    'qualified',
                                                    'proposition',
                                                    'won',
                                                    'lost'
                                                ]
                                            )
                                                ? $transactionStage
                                                : ''
                                        }}"
                                    >
                                        {{
                                            $item
                                                ->opportunity
                                                ?->stage
                                                ?->name
                                            ?? '-'
                                        }}
                                    </span>

                                </td>


                                {{-- QUANTITY --}}

                                <td>

                                    {{ rtrim(
                                        rtrim(
                                            number_format(
                                                (float) $item->quantity,
                                                2,
                                                ',',
                                                '.'
                                            ),
                                            '0'
                                        ),
                                        ','
                                    ) }}

                                    ×

                                    {{ $item->product?->unit ?? '' }}

                                </td>


                                {{-- UNIT PRICE --}}

                                <td>

                                    Rp
                                    {{
                                        number_format(
                                            (float) $item->unit_price,
                                            0,
                                            ',',
                                            '.'
                                        )
                                    }}

                                </td>


                                {{-- VALUE --}}

                                <td>

                                    <span class="resume-money">

                                        Rp
                                        {{
                                            number_format(
                                                (float) $item->subtotal,
                                                0,
                                                ',',
                                                '.'
                                            )
                                        }}

                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="resume-empty">

                <div class="resume-empty-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M4 19V5"/>
                        <path d="M4 19h16"/>
                        <path d="M8 16v-5"/>
                        <path d="M12 16V8"/>
                        <path d="M16 16v-3"/>
                        <path d="M20 16v-7"/>
                    </svg>

                </div>

                <div class="resume-empty-title">
                    No transaction records.
                </div>

                <div class="resume-empty-text">
                    Add products to opportunities to populate the PIPO report.
                </div>

            </div>

        @endif

    </div>

</div>

@endsection