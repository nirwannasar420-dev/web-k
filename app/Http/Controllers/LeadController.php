<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Menampilkan daftar lead.
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

            // Normalisasi kata pencarian
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

                /*
                |--------------------------------------------------------------------------
                | NAMA
                |--------------------------------------------------------------------------
                */

                $q->where(
                    'name',
                    'like',
                    '%' . $search . '%'
                );


                /*
                |--------------------------------------------------------------------------
                | NAMA TANPA SPASI / TITIK / -
                |--------------------------------------------------------------------------
                */

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


                /*
                |--------------------------------------------------------------------------
                | CONTACT NAME
                |--------------------------------------------------------------------------
                */

                $q->orWhere(
                    'contact_name',
                    'like',
                    '%' . $search . '%'
                );


                /*
                |--------------------------------------------------------------------------
                | CONTACT TANPA SPASI / TITIK / -
                |--------------------------------------------------------------------------
                */

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


                /*
                |--------------------------------------------------------------------------
                | EMAIL
                |--------------------------------------------------------------------------
                */

                $q->orWhere(
                    'email',
                    'like',
                    '%' . $search . '%'
                );
            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
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
     * Menampilkan form tambah lead.
     */
    public function create()
    {
        return view(
            'leads.create'
        );
    }


    /**
     * Menyimpan lead baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [

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
                    'regex:/^[0-9]+$/',
                    'max:30',
                ],

                'source' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'status' => [
                    'required',
                    'in:new,contacted,qualified,converted,lost',
                ],

                'notes' => [
                    'nullable',
                    'string',
                ],

            ],
            [

                'name.required' =>
                    'Nama Lead wajib diisi.',

                'name.max' =>
                    'Nama Lead maksimal 255 karakter.',

                'contact_name.max' =>
                    'Nama kontak maksimal 255 karakter.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.max' =>
                    'Email maksimal 255 karakter.',

                'phone.regex' =>
                    'Nomor telepon harus berupa angka.',

                'phone.max' =>
                    'Nomor telepon maksimal 30 angka.',

                'source.max' =>
                    'Sumber Lead maksimal 255 karakter.',

                'status.required' =>
                    'Status Lead wajib dipilih.',

                'status.in' =>
                    'Status Lead tidak valid.',

            ]
        );


        Lead::create(
            $validated
        );


        return redirect()
            ->route('leads.index')
            ->with(
                'success',
                'Lead berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan detail lead.
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
     * Menampilkan form edit lead.
     */
    public function edit(Lead $lead)
    {
        return view(
            'leads.edit',
            compact('lead')
        );
    }


    /**
     * Memperbarui lead.
     */
    public function update(
        Request $request,
        Lead $lead
    ) {
        $validated = $request->validate(
            [

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
                    'regex:/^[0-9]+$/',
                    'max:30',
                ],

                'source' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'status' => [
                    'required',
                    'in:new,contacted,qualified,converted,lost',
                ],

                'notes' => [
                    'nullable',
                    'string',
                ],

            ],
            [

                'name.required' =>
                    'Nama Lead wajib diisi.',

                'name.max' =>
                    'Nama Lead maksimal 255 karakter.',

                'contact_name.max' =>
                    'Nama kontak maksimal 255 karakter.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.max' =>
                    'Email maksimal 255 karakter.',

                'phone.regex' =>
                    'Nomor telepon harus berupa angka.',

                'phone.max' =>
                    'Nomor telepon maksimal 30 angka.',

                'source.max' =>
                    'Sumber Lead maksimal 255 karakter.',

                'status.required' =>
                    'Status Lead wajib dipilih.',

                'status.in' =>
                    'Status Lead tidak valid.',

            ]
        );


        $lead->update(
            $validated
        );


        return redirect()
            ->route('leads.index')
            ->with(
                'success',
                'Lead berhasil diperbarui.'
            );
    }


    /**
     * Menghapus lead.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();


        return redirect()
            ->route('leads.index')
            ->with(
                'success',
                'Lead berhasil dihapus.'
            );
    }


    /**
     * Menampilkan form konversi lead.
     */
    public function convertForm(
        \App\Models\Lead $lead
    ) {
        return view(
            'leads.convert',
            compact('lead')
        );
    }


    /**
     * Mengubah lead menjadi Customer dan Opportunity.
     */
    public function convert(
        \Illuminate\Http\Request $request,
        \App\Models\Lead $lead
    ) {

        /*
        |--------------------------------------------------------------------------
        | CEK LEAD SUDAH DIKONVERSI
        |--------------------------------------------------------------------------
        */

        if (
            $lead->status === 'converted'
            &&
            $lead->customer_id
        ) {

            return redirect()
                ->route(
                    'leads.show',
                    $lead
                )
                ->with(
                    'error',
                    'Lead ini sudah pernah dikonversi.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDASI CONVERT
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [

                'customer_name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'company' => [
                    'required',
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
                    'regex:/^[0-9]+$/',
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

                'notes' => [
                    'nullable',
                    'string',
                ],

            ],
            [

                'customer_name.required' =>
                    'Nama Customer wajib diisi.',

                'customer_name.max' =>
                    'Nama Customer maksimal 255 karakter.',

                'company.required' =>
                    'Perusahaan wajib diisi.',

                'company.max' =>
                    'Nama perusahaan maksimal 255 karakter.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.max' =>
                    'Email maksimal 255 karakter.',

                'phone.regex' =>
                    'Nomor telepon harus berupa angka.',

                'phone.max' =>
                    'Nomor telepon maksimal 50 angka.',

                'opportunity_name.required' =>
                    'Nama Opportunity wajib diisi.',

                'opportunity_name.max' =>
                    'Nama Opportunity maksimal 255 karakter.',

                'expected_revenue.required' =>
                    'Expected Revenue wajib diisi.',

                'expected_revenue.numeric' =>
                    'Expected Revenue harus berupa angka.',

                'expected_revenue.min' =>
                    'Expected Revenue tidak boleh kurang dari 0.',

                'rating.required' =>
                    'Rating wajib diisi.',

                'rating.integer' =>
                    'Rating harus berupa angka bulat.',

                'rating.min' =>
                    'Rating minimal 1.',

                'rating.max' =>
                    'Rating maksimal 5.',

            ]
        );


        /*
        |--------------------------------------------------------------------------
        | CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer =
            \App\Models\Customer::create([

                'name' =>
                    $validated[
                        'customer_name'
                    ],

                'company' =>
                    $validated[
                        'company'
                    ],

                'email' =>
                    $validated['email']
                    ??
                    $lead->email,

                'phone' =>
                    $validated['phone']
                    ??
                    $lead->phone,

            ]);


        /*
        |--------------------------------------------------------------------------
        | PROSPECT STAGE
        |--------------------------------------------------------------------------
        */

        $prospectStage =
            \App\Models\Stage::where(
                'name',
                'Prospect'
            )->first();


        if (! $prospectStage) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Stage Prospect tidak ditemukan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | OPPORTUNITY
        |--------------------------------------------------------------------------
        */

        $opportunity =
            \App\Models\Opportunity::create([

                'name' =>
                    $validated[
                        'opportunity_name'
                    ],

                'customer_id' =>
                    $customer->id,

                'stage_id' =>
                    $prospectStage->id,

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
        |--------------------------------------------------------------------------
        | UPDATE LEAD
        |--------------------------------------------------------------------------
        */

        $lead->update([

            'status' =>
                'converted',

            'customer_id' =>
                $customer->id,

        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'opportunities.show',
                $opportunity
            )
            ->with(
                'success',
                'Lead berhasil dikonversi menjadi Customer dan Opportunity.'
            );
    }
}