<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Lead;
use App\Models\Opportunity;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class LeadController extends Controller
{
    /**
     * Display the lead list.
     */
    public function index(Request $request)
    {
        $query = Lead::query();

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

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

                $q->orWhere(
                    'contact_name',
                    'like',
                    '%' . $search . '%'
                );

                $q->orWhereRaw(
                    "
                    LOWER(
                        REPLACE(
                            REPLACE(
                                REPLACE(
                                    contact_name,
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

                $q->orWhere(
                    'email',
                    'like',
                    '%' . $search . '%'
                );
            });
        }


        /*
        |--------------------------------------------------------------------------
        | STATUS FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $leads = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        return view(
            'leads.index',
            compact('leads')
        );
    }


    /**
     * Show the create lead form.
     */
    public function create()
    {
        return view(
            'leads.create'
        );
    }


    /**
     * Store a new lead.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'contact_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'source' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                Rule::in([
                    'new',
                    'contacted',
                    'qualified',
                    'converted',
                    'lost',
                ]),
            ],

            'notes' => [
                'nullable',
                'string',
            ],

        ]);


        Lead::create(
            $validated
        );


        return redirect()
            ->route('leads.index')
            ->with(
                'success',
                'Lead created successfully.'
            );
    }


    /**
     * Display a lead.
     */
    public function show(Lead $lead)
    {
        $lead->load(
            'customer'
        );


        return view(
            'leads.show',
            compact('lead')
        );
    }


    /**
     * Show the edit lead form.
     */
    public function edit(Lead $lead)
    {
        return view(
            'leads.edit',
            compact('lead')
        );
    }


    /**
     * Update a lead.
     */
    public function update(
        Request $request,
        Lead $lead
    ) {

        $allowedStatuses =
            $lead->status === 'converted'
                ? [
                    'converted',
                ]
                : [
                    'new',
                    'contacted',
                    'qualified',
                    'lost',
                ];


        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'contact_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'source' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                Rule::in(
                    $allowedStatuses
                ),
            ],

            'notes' => [
                'nullable',
                'string',
            ],

        ]);


        $lead->update(
            $validated
        );


        return redirect()
            ->route('leads.index')
            ->with(
                'success',
                'Lead updated successfully.'
            );
    }


    /**
     * Delete a lead.
     */
    public function destroy(
        Lead $lead
    ) {

        $lead->delete();


        return redirect()
            ->route('leads.index')
            ->with(
                'success',
                'Lead deleted successfully.'
            );
    }


    /**
     * Show the lead conversion form.
     */
    public function convertForm(
        Lead $lead
    ) {

        if ($lead->status === 'converted') {

            return redirect()
                ->route(
                    'leads.show',
                    $lead
                )
                ->with(
                    'error',
                    'This lead has already been converted.'
                );
        }


        if ($lead->status !== 'qualified') {

            return redirect()
                ->route(
                    'leads.show',
                    $lead
                )
                ->with(
                    'error',
                    'Only qualified leads can be converted.'
                );
        }


        $customers = Customer::query()
            ->orderBy('name')
            ->get();


        $salespeople = collect();


        if (
            Auth::check() &&
            Auth::user()->role === 'admin'
        ) {

            $salespeople = User::query()
                ->where(
                    'role',
                    'sales'
                )
                ->orderBy('name')
                ->get();
        }


        return view(
            'leads.convert',
            compact(
                'lead',
                'customers',
                'salespeople'
            )
        );
    }


    /**
     * Convert a qualified lead into a Customer and Opportunity.
     */
    public function convert(
        Request $request,
        Lead $lead
    ) {

        /*
        |--------------------------------------------------------------------------
        | BASIC LEAD CHECK
        |--------------------------------------------------------------------------
        */

        if ($lead->status === 'converted') {

            return redirect()
                ->route(
                    'leads.show',
                    $lead
                )
                ->with(
                    'error',
                    'This lead has already been converted.'
                );
        }


        if ($lead->status !== 'qualified') {

            return redirect()
                ->route(
                    'leads.show',
                    $lead
                )
                ->with(
                    'error',
                    'Only qualified leads can be converted.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | SALESPERSON VALIDATION
        |--------------------------------------------------------------------------
        */

        $salespersonRules = [
            'nullable',
        ];


        if (
            Auth::check() &&
            Auth::user()->role === 'admin'
        ) {

            $salespersonRules = [
                'required',
                Rule::exists(
                    'users',
                    'id'
                )->where(
                    function ($query) {
                        $query->where(
                            'role',
                            'sales'
                        );
                    }
                ),
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'customer_mode' => [
                'required',
                Rule::in([
                    'new',
                    'existing',
                ]),
            ],

            'customer_id' => [
                'required_if:customer_mode,existing',
                'nullable',
                'integer',
                Rule::exists(
                    'customers',
                    'id'
                ),
            ],

            'customer_name' => [
                'required_if:customer_mode,new',
                'nullable',
                'string',
                'max:255',
            ],

            'company' => [
                'required_if:customer_mode,new',
                'nullable',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:50',
            ],

            'opportunity_name' => [
                'required',
                'string',
                'max:255',
            ],

            'expected_revenue' => [
                'required',
                'numeric',
                'min:0',
            ],

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],

            'salesperson_id' =>
                $salespersonRules,

            'notes' => [
                'nullable',
                'string',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | SALESPERSON
        |--------------------------------------------------------------------------
        */

        if (
            Auth::check() &&
            Auth::user()->role === 'sales'
        ) {

            $salespersonId =
                Auth::user()->id;

        } else {

            $salespersonId =
                $validated['salesperson_id'] ?? null;
        }


        if (! $salespersonId) {

            return back()
                ->withInput()
                ->withErrors([
                    'salesperson_id' =>
                        'Please select a salesperson.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | PROSPECT STAGE
        |--------------------------------------------------------------------------
        */

        $prospectStage =
            Stage::query()
                ->where(
                    'name',
                    'Prospect'
                )
                ->first();


        if (! $prospectStage) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'The Prospect stage could not be found.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | NEW CUSTOMER DUPLICATE VALIDATION
        |--------------------------------------------------------------------------
        */

        if (
            $validated['customer_mode'] === 'new'
        ) {

            $customerName =
                trim(
                    $validated['customer_name']
                );

            $company =
                trim(
                    $validated['company']
                );

            $email =
                trim(
                    $validated['email'] ?? ''
                );


            /*
            | Duplicate email
            |
            | IMPORTANT:
            | The error is attached to "email", not "customer_mode".
            | This makes the message appear only once under Email.
            */

            if ($email !== '') {

                $duplicateByEmail =
                    Customer::query()
                        ->whereNotNull(
                            'email'
                        )
                        ->whereRaw(
                            'LOWER(TRIM(email)) = ?',
                            [
                                strtolower(
                                    $email
                                ),
                            ]
                        )
                        ->exists();


                if ($duplicateByEmail) {

                    return back()
                        ->withInput()
                        ->withErrors([
                            'email' =>
                                'A customer with this email already exists. Please use Existing Customer.',
                        ]);
                }
            }


            /*
            | Duplicate customer identity
            */

            $duplicateByIdentity =
                Customer::query()
                    ->whereRaw(
                        'LOWER(TRIM(name)) = ?',
                        [
                            strtolower(
                                $customerName
                            ),
                        ]
                    )
                    ->whereRaw(
                        'LOWER(TRIM(company)) = ?',
                        [
                            strtolower(
                                $company
                            ),
                        ]
                    )
                    ->exists();


            if ($duplicateByIdentity) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'customer_name' =>
                            'A customer with the same name and company already exists. Please use Existing Customer.',
                    ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | TRANSACTION
        |--------------------------------------------------------------------------
        |
        | The Lead is locked first.
        | This prevents the same Lead from being converted twice
        | when the Convert button is clicked more than once.
        |
        */

        $opportunity =
            DB::transaction(
                function () use (
                    $validated,
                    $lead,
                    $prospectStage,
                    $salespersonId
                ) {

                    /*
                    | Lock the Lead row
                    */

                    $lockedLead =
                        Lead::query()
                            ->lockForUpdate()
                            ->findOrFail(
                                $lead->id
                            );


                    /*
                    | Double-conversion protection
                    */

                    if (
                        $lockedLead->status ===
                        'converted'
                    ) {

                        return null;
                    }


                    /*
                    | Create or reuse Customer
                    */

                    if (
                        $validated['customer_mode'] ===
                        'existing'
                    ) {

                        $customer =
                            Customer::findOrFail(
                                $validated['customer_id']
                            );

                    } else {

                        $customer =
                            Customer::create([

                                'name' =>
                                    trim(
                                        $validated[
                                            'customer_name'
                                        ]
                                    ),

                                'company' =>
                                    trim(
                                        $validated[
                                            'company'
                                        ]
                                    ),

                                'email' =>
                                    trim(
                                        $validated[
                                            'email'
                                        ] ?? ''
                                    ) !== ''
                                        ? trim(
                                            $validated[
                                                'email'
                                            ]
                                        )
                                        : $lockedLead->email,

                                'phone' =>
                                    trim(
                                        $validated[
                                            'phone'
                                        ] ?? ''
                                    ) !== ''
                                        ? trim(
                                            $validated[
                                                'phone'
                                            ]
                                        )
                                        : $lockedLead->phone,

                            ]);
                    }


                    /*
                    | Create Opportunity
                    */

                    $opportunity =
                        Opportunity::create([

                            'customer_id' =>
                                $customer->id,

                            'salesperson_id' =>
                                $salespersonId,

                            'stage_id' =>
                                $prospectStage->id,

                            'name' =>
                                $validated[
                                    'opportunity_name'
                                ],

                            'expected_revenue' =>
                                $validated[
                                    'expected_revenue'
                                ],

                            'rating' =>
                                $validated[
                                    'rating'
                                ],

                            'opportunity_date' =>
                                now(),

                            'notes' =>
                                $validated[
                                    'notes'
                                ] ?? null,

                        ]);


                    /*
                    | Mark Lead as Converted
                    */

                    $lockedLead->update([

                        'status' =>
                            'converted',

                        'customer_id' =>
                            $customer->id,

                    ]);


                    return $opportunity;
                }
            );


        /*
        |--------------------------------------------------------------------------
        | DOUBLE CONVERSION RESULT
        |--------------------------------------------------------------------------
        */

        if (! $opportunity) {

            return redirect()
                ->route(
                    'leads.show',
                    $lead
                )
                ->with(
                    'error',
                    'This lead has already been converted.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | SUCCESS
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'opportunities.show',
                $opportunity
            )
            ->with(
                'success',
                'Lead converted successfully into a Customer and Opportunity.'
            );
    }
}