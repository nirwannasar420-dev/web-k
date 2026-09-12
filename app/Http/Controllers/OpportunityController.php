<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Opportunity;
use App\Models\OpportunityItem;
use App\Models\Product;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class OpportunityController extends Controller
{
    // =========================================================
    // LIST OPPORTUNITIES
    // =========================================================
    public function index(Request $request)
    {
        $query = Opportunity::with([
            'customer',
            'stage',
            'salesperson',
        ]);

        // =====================================================
        // SEARCH
        // =====================================================
        if ($request->filled('search')) {

            $search = trim(
                $request->search
            );

            $normalizedSearch = strtolower(
                str_replace(
                    [' ', '.', '-'],
                    '',
                    $search
                )
            );

            $query->where(function ($q) use (
                $search,
                $normalizedSearch
            ) {

                // =================================================
                // OPPORTUNITY NAME
                // =================================================
                $q->where(
                    'name',
                    'like',
                    '%' . $search . '%'
                );

                $q->orWhereRaw(
                    "
                    LOWER(
                        REPLACE(
                            REPLACE(
                                REPLACE(
                                    name,
                                    '.',
                                    ''
                                ),
                                ' ',
                                ''
                            ),
                            '-',
                            ''
                        )
                    ) LIKE ?
                    ",
                    [
                        '%' .
                        $normalizedSearch .
                        '%'
                    ]
                );


                // =================================================
                // CUSTOMER
                // =================================================
                $q->orWhereHas(
                    'customer',
                    function ($customerQuery) use (
                        $search,
                        $normalizedSearch
                    ) {

                        $customerQuery->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        );

                        $customerQuery->orWhereRaw(
                            "
                            LOWER(
                                REPLACE(
                                    REPLACE(
                                        REPLACE(
                                            name,
                                            '.',
                                            ''
                                        ),
                                        ' ',
                                        ''
                                    ),
                                    '-',
                                    ''
                                )
                            ) LIKE ?
                            ",
                            [
                                '%' .
                                $normalizedSearch .
                                '%'
                            ]
                        );

                        $customerQuery->orWhere(
                            'company',
                            'like',
                            '%' . $search . '%'
                        );

                        $customerQuery->orWhereRaw(
                            "
                            LOWER(
                                REPLACE(
                                    REPLACE(
                                        REPLACE(
                                            company,
                                            '.',
                                            ''
                                        ),
                                        ' ',
                                        ''
                                    ),
                                    '-',
                                    ''
                                )
                            ) LIKE ?
                            ",
                            [
                                '%' .
                                $normalizedSearch .
                                '%'
                            ]
                        );

                        $customerQuery->orWhere(
                            'email',
                            'like',
                            '%' . $search . '%'
                        );
                    }
                );


                // =================================================
                // SALESPERSON
                // =================================================
                $q->orWhereHas(
                    'salesperson',
                    function ($salespersonQuery) use (
                        $search
                    ) {

                        $salespersonQuery->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        );

                        $salespersonQuery->orWhere(
                            'email',
                            'like',
                            '%' . $search . '%'
                        );
                    }
                );

            });
        }


        // =====================================================
        // FILTER STAGE
        // =====================================================
        if ($request->filled('stage_id')) {

            $query->where(
                'stage_id',
                $request->stage_id
            );
        }


        // =====================================================
        // FILTER SALESPERSON
        // =====================================================
        if ($request->filled('salesperson_id')) {

            $query->where(
                'salesperson_id',
                $request->salesperson_id
            );
        }


        // =====================================================
        // PAGINATION
        // =====================================================
        $opportunities = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        // =====================================================
        // STAGES
        // =====================================================
        $stages = Stage::orderBy(
            'sequence'
        )->get();


        // =====================================================
        // SALESPEOPLE
        // Only users with role = sales
        // =====================================================
        $salespeople = User::where(
            'role',
            'sales'
        )
        ->orderBy(
            'name'
        )
        ->get();


        return view(
            'opportunities.index',
            compact(
                'opportunities',
                'stages',
                'salespeople'
            )
        );
    }


    // =========================================================
    // CREATE FORM
    // =========================================================
    public function create()
    {
        $customers = Customer::orderBy(
            'name'
        )->get();


        $stages = Stage::orderBy(
            'sequence'
        )->get();


        $products = Product::orderBy(
            'product_name'
        )->get();


        $salespeople = User::where(
            'role',
            'sales'
        )
        ->orderBy(
            'name'
        )
        ->get();


        return view(
            'opportunities.create',
            compact(
                'customers',
                'stages',
                'products',
                'salespeople'
            )
        );
    }


    // =========================================================
    // STORE
    // =========================================================
    public function store(Request $request)
    {
        $validated = $request->validate(
            [

                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'customer_id' => [
                    'required',
                    'exists:customers,id',
                ],

                'salesperson_id' => [
                    'required',
                    Rule::exists(
                        'users',
                        'id'
                    )->where(
                        fn ($query) =>
                            $query->where(
                                'role',
                                'sales'
                            )
                    ),
                ],

                'stage_id' => [
                    'required',
                    'exists:stages,id',
                ],

                'expected_revenue' => [
                    'required',
                    'numeric',
                    'min:0',
                ],

                'rating' => [
                    'required',
                    'integer',
                    'min:0',
                    'max:5',
                ],

                'opportunity_date' => [
                    'nullable',
                    'date',
                ],

                'notes' => [
                    'nullable',
                    'string',
                ],

                // =================================================
                // PRODUCTS
                // =================================================
                'products' => [
                    'nullable',
                    'array',
                ],

                'products.*.product_id' => [
                    'required_with:products',
                    'exists:products,id',
                ],

                'products.*.quantity' => [
                    'required_with:products',
                    'numeric',
                    'min:0.01',
                ],

                'products.*.unit_price' => [
                    'required_with:products',
                    'numeric',
                    'min:0',
                ],

            ],
            [

                'name.required' =>
                    'Opportunity name is required.',

                'customer_id.required' =>
                    'Customer is required.',

                'customer_id.exists' =>
                    'The selected customer is invalid.',

                'salesperson_id.required' =>
                    'Salesperson is required.',

                'salesperson_id.exists' =>
                    'The selected salesperson is invalid.',

                'stage_id.required' =>
                    'Stage is required.',

                'stage_id.exists' =>
                    'The selected stage is invalid.',

                'expected_revenue.required' =>
                    'Expected Revenue is required.',

                'expected_revenue.numeric' =>
                    'Expected Revenue must be a number.',

                'expected_revenue.min' =>
                    'Expected Revenue cannot be less than 0.',

                'rating.required' =>
                    'Rating is required.',

                'rating.integer' =>
                    'Rating must be a whole number.',

                'rating.min' =>
                    'Rating must be at least 0.',

                'rating.max' =>
                    'Rating cannot be greater than 5.',

                'opportunity_date.date' =>
                    'Opportunity date is invalid.',

                'products.array' =>
                    'Product data is invalid.',

                'products.*.product_id.required_with' =>
                    'Product is required.',

                'products.*.product_id.exists' =>
                    'The selected product is invalid.',

                'products.*.quantity.required_with' =>
                    'Product quantity is required.',

                'products.*.quantity.numeric' =>
                    'Product quantity must be a number.',

                'products.*.quantity.min' =>
                    'Product quantity must be greater than 0.',

                'products.*.unit_price.required_with' =>
                    'Product unit price is required.',

                'products.*.unit_price.numeric' =>
                    'Product unit price must be a number.',

                'products.*.unit_price.min' =>
                    'Product unit price cannot be less than 0.',

            ]
        );


        DB::transaction(
            function () use (
                $validated
            ) {

                // =================================================
                // CREATE OPPORTUNITY
                // =================================================
                $opportunity = Opportunity::create([
                    'name' =>
                        $validated['name'],

                    'customer_id' =>
                        $validated['customer_id'],

                    'salesperson_id' =>
                        $validated['salesperson_id'],

                    'stage_id' =>
                        $validated['stage_id'],

                    'expected_revenue' =>
                        $validated['expected_revenue'],

                    'rating' =>
                        $validated['rating'],

                    'opportunity_date' =>
                        $validated['opportunity_date']
                        ?? null,

                    'notes' =>
                        $validated['notes']
                        ?? null,
                ]);


                // =================================================
                // CREATE OPPORTUNITY ITEMS
                // =================================================
                if (
                    !empty(
                        $validated['products']
                        ?? []
                    )
                ) {

                    foreach (
                        $validated['products']
                        as $product
                    ) {

                        $quantity =
                            (float)
                            $product['quantity'];


                        $unitPrice =
                            (float)
                            $product['unit_price'];


                        $subtotal =
                            $quantity *
                            $unitPrice;


                        OpportunityItem::create([
                            'opportunity_id' =>
                                $opportunity->id,

                            'product_id' =>
                                $product['product_id'],

                            'quantity' =>
                                $quantity,

                            'unit_price' =>
                                $unitPrice,

                            'subtotal' =>
                                $subtotal,
                        ]);
                    }
                }
            }
        );


        return redirect()
            ->route(
                'opportunities.index'
            )
            ->with(
                'success',
                'Opportunity created successfully.'
            );
    }


    // =========================================================
    // SHOW
    // =========================================================
    public function show(
        Opportunity $opportunity
    ) {

        $opportunity->load([
            'customer',
            'salesperson',
            'stage',
            'activities',
            'items.product',
        ]);


        return view(
            'opportunities.show',
            compact(
                'opportunity'
            )
        );
    }


    // =========================================================
    // EDIT FORM
    // =========================================================
    public function edit(
        Opportunity $opportunity
    ) {

        $customers = Customer::orderBy(
            'name'
        )->get();


        $stages = Stage::orderBy(
            'sequence'
        )->get();


        $products = Product::orderBy(
            'product_name'
        )->get();


        $salespeople = User::where(
            'role',
            'sales'
        )
        ->orderBy(
            'name'
        )
        ->get();


        $opportunity->load([
            'salesperson',
            'items.product',
        ]);


        return view(
            'opportunities.edit',
            compact(
                'opportunity',
                'customers',
                'stages',
                'products',
                'salespeople'
            )
        );
    }


    // =========================================================
    // UPDATE
    // =========================================================
    public function update(
        Request $request,
        Opportunity $opportunity
    ) {

        $validated = $request->validate(
            [

                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'customer_id' => [
                    'required',
                    'exists:customers,id',
                ],

                'salesperson_id' => [
                    'required',
                    Rule::exists(
                        'users',
                        'id'
                    )->where(
                        fn ($query) =>
                            $query->where(
                                'role',
                                'sales'
                            )
                    ),
                ],

                'stage_id' => [
                    'required',
                    'exists:stages,id',
                ],

                'expected_revenue' => [
                    'required',
                    'numeric',
                    'min:0',
                ],

                'rating' => [
                    'required',
                    'integer',
                    'min:0',
                    'max:5',
                ],

                'opportunity_date' => [
                    'nullable',
                    'date',
                ],

                'notes' => [
                    'nullable',
                    'string',
                ],

                // =================================================
                // PRODUCTS
                // =================================================
                'products' => [
                    'nullable',
                    'array',
                ],

                'products.*.product_id' => [
                    'required_with:products',
                    'exists:products,id',
                ],

                'products.*.quantity' => [
                    'required_with:products',
                    'numeric',
                    'min:0.01',
                ],

                'products.*.unit_price' => [
                    'required_with:products',
                    'numeric',
                    'min:0',
                ],

            ],
            [

                'name.required' =>
                    'Opportunity name is required.',

                'customer_id.required' =>
                    'Customer is required.',

                'customer_id.exists' =>
                    'The selected customer is invalid.',

                'salesperson_id.required' =>
                    'Salesperson is required.',

                'salesperson_id.exists' =>
                    'The selected salesperson is invalid.',

                'stage_id.required' =>
                    'Stage is required.',

                'stage_id.exists' =>
                    'The selected stage is invalid.',

                'expected_revenue.required' =>
                    'Expected Revenue is required.',

                'expected_revenue.numeric' =>
                    'Expected Revenue must be a number.',

                'expected_revenue.min' =>
                    'Expected Revenue cannot be less than 0.',

                'rating.required' =>
                    'Rating is required.',

                'rating.integer' =>
                    'Rating must be a whole number.',

                'rating.min' =>
                    'Rating must be at least 0.',

                'rating.max' =>
                    'Rating cannot be greater than 5.',

                'opportunity_date.date' =>
                    'Opportunity date is invalid.',

                'products.array' =>
                    'Product data is invalid.',

                'products.*.product_id.required_with' =>
                    'Product is required.',

                'products.*.product_id.exists' =>
                    'The selected product is invalid.',

                'products.*.quantity.required_with' =>
                    'Product quantity is required.',

                'products.*.quantity.numeric' =>
                    'Product quantity must be a number.',

                'products.*.quantity.min' =>
                    'Product quantity must be greater than 0.',

                'products.*.unit_price.required_with' =>
                    'Unit price is required.',

                'products.*.unit_price.numeric' =>
                    'Unit price must be a number.',

                'products.*.unit_price.min' =>
                    'Unit price cannot be less than 0.',

            ]
        );


        DB::transaction(
            function () use (
                $validated,
                $opportunity
            ) {

                // =================================================
                // UPDATE OPPORTUNITY
                // =================================================
                $opportunity->update([
                    'name' =>
                        $validated['name'],

                    'customer_id' =>
                        $validated['customer_id'],

                    'salesperson_id' =>
                        $validated['salesperson_id'],

                    'stage_id' =>
                        $validated['stage_id'],

                    'expected_revenue' =>
                        $validated['expected_revenue'],

                    'rating' =>
                        $validated['rating'],

                    'opportunity_date' =>
                        $validated['opportunity_date']
                        ?? null,

                    'notes' =>
                        $validated['notes']
                        ?? null,
                ]);


                // =================================================
                // REPLACE OPPORTUNITY ITEMS
                // =================================================
                $opportunity
                    ->items()
                    ->delete();


                if (
                    !empty(
                        $validated['products']
                        ?? []
                    )
                ) {

                    foreach (
                        $validated['products']
                        as $product
                    ) {

                        $quantity =
                            (float)
                            $product['quantity'];


                        $unitPrice =
                            (float)
                            $product['unit_price'];


                        $subtotal =
                            $quantity *
                            $unitPrice;


                        OpportunityItem::create([
                            'opportunity_id' =>
                                $opportunity->id,

                            'product_id' =>
                                $product['product_id'],

                            'quantity' =>
                                $quantity,

                            'unit_price' =>
                                $unitPrice,

                            'subtotal' =>
                                $subtotal,
                        ]);
                    }
                }
            }
        );


        return redirect()
            ->route(
                'opportunities.index'
            )
            ->with(
                'success',
                'Opportunity updated successfully.'
            );
    }


    // =========================================================
    // DELETE
    // =========================================================
    public function destroy(
        Opportunity $opportunity
    ) {

        $opportunity->delete();


        return redirect()
            ->route(
                'opportunities.index'
            )
            ->with(
                'success',
                'Opportunity deleted successfully.'
            );
    }
}