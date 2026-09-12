<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $query = Activity::with([
            'opportunity.customer'
        ]);

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */
        if ($request->filled('search')) {

            $search = trim($request->search);

            $normalizedSearch = str_replace(
                ['.', '-', '_'],
                ' ',
                strtolower($search)
            );

            $normalizedSearch = preg_replace('/\s+/', ' ', $normalizedSearch);
            $normalizedSearch = trim($normalizedSearch);

            $keywords = explode(' ', $normalizedSearch);

            $query->where(function ($q) use ($keywords) {

                foreach ($keywords as $keyword) {

                    if ($keyword === '') {
                        continue;
                    }

                    $like = '%' . $keyword . '%';

                    $q->where(function ($sub) use ($like) {

                        /*
                        |--------------------------------------------------------------------------
                        | SEARCH ACTIVITY
                        |--------------------------------------------------------------------------
                        */
                        $sub->where('subject', 'like', $like)
                            ->orWhere('type', 'like', $like)

                            /*
                            |--------------------------------------------------------------------------
                            | SEARCH OPPORTUNITY
                            |--------------------------------------------------------------------------
                            */
                            ->orWhereHas('opportunity', function ($opp) use ($like) {

                                $opp->where('name', 'like', $like)

                                    /*
                                    |--------------------------------------------------------------------------
                                    | SEARCH CUSTOMER
                                    |--------------------------------------------------------------------------
                                    */
                                    ->orWhereHas('customer', function ($customer) use ($like) {

                                        $customer->where('name', 'like', $like)
                                            ->orWhere('company', 'like', $like)
                                            ->orWhere('email', 'like', $like);
                                    });
                            });
                    });
                }
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
        | FILTER OPPORTUNITY
        |--------------------------------------------------------------------------
        */
        if ($request->filled('opportunity_id')) {

            $query->where(
                'opportunity_id',
                $request->opportunity_id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | DATA ACTIVITY
        |--------------------------------------------------------------------------
        */
        $activities = $query
            ->latest('activity_date')
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | OPPORTUNITY UNTUK DROPDOWN
        |--------------------------------------------------------------------------
        */
        $opportunities = Opportunity::with('customer')
            ->orderBy('name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | VIEW INDEX
        |--------------------------------------------------------------------------
        */
        return view(
            'activities.index',
            compact(
                'activities',
                'opportunities'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create(Request $request)
    {
        $opportunities = Opportunity::with('customer')
            ->orderBy('name')
            ->get();

        $selectedOpportunity = $request->get('opportunity_id');

        return view(
            'activities.create',
            compact(
                'opportunities',
                'selectedOpportunity'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'opportunity_id' => 'required|exists:opportunities,id',
                'type' => 'required|string|max:50',
                'subject' => 'required|string|max:255',
                'activity_date' => 'required|date',
                'status' => 'required|in:planned,done,cancelled',
            ],
            [
                'opportunity_id.required' =>
                    'Opportunity wajib dipilih.',

                'opportunity_id.exists' =>
                    'Opportunity tidak ditemukan.',

                'type.required' =>
                    'Jenis aktivitas wajib diisi.',

                'subject.required' =>
                    'Subject aktivitas wajib diisi.',

                'activity_date.required' =>
                    'Tanggal aktivitas wajib diisi.',

                'activity_date.date' =>
                    'Format tanggal aktivitas tidak valid.',

                'status.required' =>
                    'Status wajib dipilih.',

                'status.in' =>
                    'Status aktivitas tidak valid.',
            ]
        );

        Activity::create($validated);

        return redirect()
            ->route('activities.index')
            ->with(
                'success',
                'Activity berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */
    public function show(Activity $activity)
    {
        $activity->load([
            'opportunity.customer'
        ]);

        return view(
            'activities.show',
            compact('activity')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(Activity $activity)
    {
        $opportunities = Opportunity::with('customer')
            ->orderBy('name')
            ->get();

        return view(
            'activities.edit',
            compact(
                'activity',
                'opportunities'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(
        Request $request,
        Activity $activity
    ) {
        $validated = $request->validate(
            [
                'opportunity_id' => 'required|exists:opportunities,id',
                'type' => 'required|string|max:50',
                'subject' => 'required|string|max:255',
                'activity_date' => 'required|date',
                'status' => 'required|in:planned,done,cancelled',
            ],
            [
                'opportunity_id.required' =>
                    'Opportunity wajib dipilih.',

                'opportunity_id.exists' =>
                    'Opportunity tidak ditemukan.',

                'type.required' =>
                    'Jenis aktivitas wajib diisi.',

                'subject.required' =>
                    'Subject aktivitas wajib diisi.',

                'activity_date.required' =>
                    'Tanggal aktivitas wajib diisi.',

                'activity_date.date' =>
                    'Format tanggal aktivitas tidak valid.',

                'status.required' =>
                    'Status wajib dipilih.',

                'status.in' =>
                    'Status aktivitas tidak valid.',
            ]
        );

        $activity->update($validated);

        return redirect()
            ->route('activities.index')
            ->with(
                'success',
                'Activity berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()
            ->route('activities.index')
            ->with(
                'success',
                'Activity berhasil dihapus.'
            );
    }
}