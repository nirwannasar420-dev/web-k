<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Opportunity;
use App\Models\OpportunityItem;
use App\Models\Product;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;

class SalesResumeController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VIEW MODE
        |--------------------------------------------------------------------------
        */

        $mode = $request->get('mode', 'customer');

        if (!in_array($mode, ['customer', 'product'], true)) {
            $mode = 'customer';
        }


        /*
        |--------------------------------------------------------------------------
        | FILTERS
        |--------------------------------------------------------------------------
        */

        $stageFilter =
            $request->get('stage_id');

        $customerFilter =
            $request->get('customer_id');

        $productFilter =
            $request->get('product_id');

        $salespersonFilter =
            $request->get('salesperson_id');

        $monthFilter =
            $request->get('month');

        $yearFilter =
            $request->get('year');

        $dateFrom =
            $request->get('date_from');

        $dateTo =
            $request->get('date_to');


        /*
        |--------------------------------------------------------------------------
        | BASE QUERY
        |--------------------------------------------------------------------------
        |
        | PIPO menggunakan OpportunityItem sebagai sumber nilai transaksi
        | karena item menyimpan:
        | - Product
        | - Quantity
        | - Unit Price
        | - Subtotal
        |
        */

        $query = OpportunityItem::with([
            'opportunity.customer',
            'opportunity.stage',
            'opportunity.salesperson',
            'product',
        ])
        ->whereHas('opportunity')
        ->whereHas('product');


        /*
        |--------------------------------------------------------------------------
        | FILTER STAGE
        |--------------------------------------------------------------------------
        */

        if (
            $stageFilter !== null
            &&
            $stageFilter !== ''
        ) {

            $query->whereHas(
                'opportunity',
                function ($q) use ($stageFilter) {

                    $q->where(
                        'stage_id',
                        $stageFilter
                    );

                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER CUSTOMER
        |--------------------------------------------------------------------------
        */

        if (
            $customerFilter !== null
            &&
            $customerFilter !== ''
        ) {

            $query->whereHas(
                'opportunity',
                function ($q) use ($customerFilter) {

                    $q->where(
                        'customer_id',
                        $customerFilter
                    );

                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER PRODUCT
        |--------------------------------------------------------------------------
        */

        if (
            $productFilter !== null
            &&
            $productFilter !== ''
        ) {

            $query->where(
                'product_id',
                $productFilter
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER SALESPERSON
        |--------------------------------------------------------------------------
        */

        if (
            $salespersonFilter !== null
            &&
            $salespersonFilter !== ''
        ) {

            $query->whereHas(
                'opportunity',
                function ($q) use ($salespersonFilter) {

                    $q->where(
                        'salesperson_id',
                        $salespersonFilter
                    );

                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER MONTH
        |--------------------------------------------------------------------------
        */

        if (
            $monthFilter !== null
            &&
            $monthFilter !== ''
        ) {

            $query->whereHas(
                'opportunity',
                function ($q) use ($monthFilter) {

                    $q->whereMonth(
                        'opportunity_date',
                        $monthFilter
                    );

                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER YEAR
        |--------------------------------------------------------------------------
        */

        if (
            $yearFilter !== null
            &&
            $yearFilter !== ''
        ) {

            $query->whereHas(
                'opportunity',
                function ($q) use ($yearFilter) {

                    $q->whereYear(
                        'opportunity_date',
                        $yearFilter
                    );

                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER DATE FROM
        |--------------------------------------------------------------------------
        */

        if (
            $dateFrom !== null
            &&
            $dateFrom !== ''
        ) {

            $query->whereHas(
                'opportunity',
                function ($q) use ($dateFrom) {

                    $q->whereDate(
                        'opportunity_date',
                        '>=',
                        $dateFrom
                    );

                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER DATE TO
        |--------------------------------------------------------------------------
        */

        if (
            $dateTo !== null
            &&
            $dateTo !== ''
        ) {

            $query->whereHas(
                'opportunity',
                function ($q) use ($dateTo) {

                    $q->whereDate(
                        'opportunity_date',
                        '<=',
                        $dateTo
                    );

                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | GET ALL ITEMS
        |--------------------------------------------------------------------------
        |
        | Tidak memakai limit dan tidak hanya mengambil Top Opportunity.
        | Semua transaksi yang sesuai filter dipakai untuk PIPO.
        |
        */

        $items =
            $query->get();


        /*
        |--------------------------------------------------------------------------
        | STAGE NAME NORMALIZATION
        |--------------------------------------------------------------------------
        */

        $stageMap = [

            'prospect' =>
                'prospect',

            'qualified' =>
                'qualified',

            'proposition' =>
                'proposition',

            'won' =>
                'won',

            'lost' =>
                'lost',

        ];


        /*
        |--------------------------------------------------------------------------
        | PIPO SUMMARY
        |--------------------------------------------------------------------------
        */

        $summary = [];


        foreach ($items as $item) {

            $opportunity =
                $item->opportunity;

            $customer =
                $opportunity?->customer;

            $product =
                $item->product;

            $stageName =
                strtolower(
                    trim(
                        $opportunity?->stage?->name
                        ?? ''
                    )
                );


            /*
            |--------------------------------------------------------------------------
            | ONLY USE THE 5 PIPO STAGES
            |--------------------------------------------------------------------------
            */

            if (
                !isset(
                    $stageMap[$stageName]
                )
            ) {

                continue;
            }


            /*
            |--------------------------------------------------------------------------
            | GROUPING
            |--------------------------------------------------------------------------
            |
            | Mode Customer:
            | Customer -> Product
            |
            | Mode Product:
            | Product -> Customer
            |
            */

            if ($mode === 'customer') {

                $groupId =
                    $customer?->id ?? 0;

                $detailId =
                    $product?->id ?? 0;

                $groupName =
                    $customer?->company
                    ?:
                    (
                        $customer?->name
                        ??
                        'Unknown Customer'
                    );

                $detailName =
                    $product?->product_name
                    ??
                    'Unknown Product';

            } else {

                $groupId =
                    $product?->id ?? 0;

                $detailId =
                    $customer?->id ?? 0;

                $groupName =
                    $product?->product_name
                    ??
                    'Unknown Product';

                $detailName =
                    $customer?->company
                    ?:
                    (
                        $customer?->name
                        ??
                        'Unknown Customer'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | SUMMARY KEY
            |--------------------------------------------------------------------------
            */

            $key =
                $groupId . '_' . $detailId;


            /*
            |--------------------------------------------------------------------------
            | INITIALIZE SUMMARY ROW
            |--------------------------------------------------------------------------
            */

            if (
                !isset(
                    $summary[$key]
                )
            ) {

                $summary[$key] = [

                    'group_id' =>
                        $groupId,

                    'group_name' =>
                        $groupName,

                    'detail_id' =>
                        $detailId,

                    'detail_name' =>
                        $detailName,

                    'prospect' =>
                        0,

                    'qualified' =>
                        0,

                    'proposition' =>
                        0,

                    'won' =>
                        0,

                    'lost' =>
                        0,

                    'total' =>
                        0,

                    'quantity' =>
                        0,

                    'transactions' =>
                        0,

                ];
            }


            /*
            |--------------------------------------------------------------------------
            | TRANSACTION VALUE
            |--------------------------------------------------------------------------
            |
            | PIPO value menggunakan subtotal dari OpportunityItem.
            |
            */

            $value =
                (float) (
                    $item->subtotal
                    ?? 0
                );


            $quantity =
                (float) (
                    $item->quantity
                    ?? 0
                );


            /*
            |--------------------------------------------------------------------------
            | ADD TO STAGE
            |--------------------------------------------------------------------------
            */

            $summary[$key][
                $stageMap[$stageName]
            ] +=
                $value;


            /*
            |--------------------------------------------------------------------------
            | GRAND TOTAL PER CUSTOMER-PRODUCT
            |--------------------------------------------------------------------------
            */

            $summary[$key]['total'] +=
                $value;


            /*
            |--------------------------------------------------------------------------
            | QUANTITY
            |--------------------------------------------------------------------------
            */

            $summary[$key]['quantity'] +=
                $quantity;


            /*
            |--------------------------------------------------------------------------
            | TRANSACTION COUNT
            |--------------------------------------------------------------------------
            */

            $summary[$key]['transactions'] +=
                1;
        }


        /*
        |--------------------------------------------------------------------------
        | SORT DETAIL SUMMARY
        |--------------------------------------------------------------------------
        |
        | Requirement perusahaan:
        | nilai terbesar -> nilai terkecil.
        |
        */

        $summary =
            collect(
                $summary
            )
            ->sortByDesc(
                'total'
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | GROUP SUMMARY
        |--------------------------------------------------------------------------
        |
        | Total seluruh Product dalam satu Customer
        | atau seluruh Customer dalam satu Product.
        |
        */

        $groupSummary =
            $summary
            ->groupBy(
                'group_id'
            )
            ->map(
                function ($rows) {

                    $first =
                        $rows->first();


                    return [

                        'group_name' =>
                            $first['group_name'],

                        'prospect' =>
                            $rows->sum(
                                'prospect'
                            ),

                        'qualified' =>
                            $rows->sum(
                                'qualified'
                            ),

                        'proposition' =>
                            $rows->sum(
                                'proposition'
                            ),

                        'won' =>
                            $rows->sum(
                                'won'
                            ),

                        'lost' =>
                            $rows->sum(
                                'lost'
                            ),

                        'total' =>
                            $rows->sum(
                                'total'
                            ),

                        'quantity' =>
                            $rows->sum(
                                'quantity'
                            ),

                        'transactions' =>
                            $rows->sum(
                                'transactions'
                            ),

                    ];
                }
            )
            ->sortByDesc(
                'total'
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | TOTAL PIPO
        |--------------------------------------------------------------------------
        */

        $totals = [

            'prospect' =>
                $items
                ->filter(
                    function ($item) use ($stageMap) {

                        $stage =
                            strtolower(
                                trim(
                                    $item
                                        ->opportunity
                                        ?->stage
                                        ?->name
                                    ?? ''
                                )
                            );

                        return
                            $stage ===
                            'prospect';
                    }
                )
                ->sum(
                    'subtotal'
                ),


            'qualified' =>
                $items
                ->filter(
                    function ($item) {

                        $stage =
                            strtolower(
                                trim(
                                    $item
                                        ->opportunity
                                        ?->stage
                                        ?->name
                                    ?? ''
                                )
                            );

                        return
                            $stage ===
                            'qualified';
                    }
                )
                ->sum(
                    'subtotal'
                ),


            'proposition' =>
                $items
                ->filter(
                    function ($item) {

                        $stage =
                            strtolower(
                                trim(
                                    $item
                                        ->opportunity
                                        ?->stage
                                        ?->name
                                    ?? ''
                                )
                            );

                        return
                            $stage ===
                            'proposition';
                    }
                )
                ->sum(
                    'subtotal'
                ),


            'won' =>
                $items
                ->filter(
                    function ($item) {

                        $stage =
                            strtolower(
                                trim(
                                    $item
                                        ->opportunity
                                        ?->stage
                                        ?->name
                                    ?? ''
                                )
                            );

                        return
                            $stage ===
                            'won';
                    }
                )
                ->sum(
                    'subtotal'
                ),


            'lost' =>
                $items
                ->filter(
                    function ($item) {

                        $stage =
                            strtolower(
                                trim(
                                    $item
                                        ->opportunity
                                        ?->stage
                                        ?->name
                                    ?? ''
                                )
                            );

                        return
                            $stage ===
                            'lost';
                    }
                )
                ->sum(
                    'subtotal'
                ),

        ];


        /*
        |--------------------------------------------------------------------------
        | GRAND TOTAL
        |--------------------------------------------------------------------------
        */

        $totals['grand'] =
            array_sum(
                $totals
            );


        /*
        |--------------------------------------------------------------------------
        | CUSTOMER FILTER DATA
        |--------------------------------------------------------------------------
        */

        $customers =
            Customer::orderBy(
                'name'
            )->get();


        /*
        |--------------------------------------------------------------------------
        | PRODUCT FILTER DATA
        |--------------------------------------------------------------------------
        */

        $products =
            Product::orderBy(
                'product_name'
            )->get();


        /*
        |--------------------------------------------------------------------------
        | STAGE FILTER DATA
        |--------------------------------------------------------------------------
        */

        $stages =
            Stage::orderBy(
                'sequence'
            )->get();


        /*
        |--------------------------------------------------------------------------
        | SALESPERSON FILTER DATA
        |--------------------------------------------------------------------------
        */

        $salespeople =
            User::where(
                'role',
                'sales'
            )
            ->orderBy(
                'name'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | AVAILABLE YEARS
        |--------------------------------------------------------------------------
        |
        | Digunakan untuk filter Tahun.
        |
        */

        $years =
            Opportunity::query()
            ->whereNotNull(
                'opportunity_date'
            )
            ->selectRaw(
                'YEAR(opportunity_date) as year'
            )
            ->distinct()
            ->orderByDesc(
                'year'
            )
            ->pluck(
                'year'
            );


        /*
        |--------------------------------------------------------------------------
        | TRANSACTION DETAIL
        |--------------------------------------------------------------------------
        |
        | Semua transaksi ditampilkan.
        | Diurutkan berdasarkan nilai subtotal terbesar.
        |
        */

        $transactions =
            $items
            ->sortByDesc(
                function ($item) {

                    return (float) (
                        $item->subtotal
                        ?? 0
                    );

                }
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'sales_resume.index',
            compact(
                'mode',

                'stageFilter',

                'customerFilter',

                'productFilter',

                'salespersonFilter',

                'monthFilter',

                'yearFilter',

                'dateFrom',

                'dateTo',

                'summary',

                'groupSummary',

                'totals',

                'customers',

                'products',

                'salespeople',

                'stages',

                'years',

                'transactions'
            )
        );
    }
}