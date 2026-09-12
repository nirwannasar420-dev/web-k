<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Customer;
use App\Models\Lead;
use App\Models\Opportunity;
use App\Models\Stage;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function dashboard()
    {
        // =========================================================
        // STATISTIK UTAMA
        // =========================================================

        $totalLeads = Lead::count();

        $totalCustomers = Customer::count();

        $totalOpportunities = Opportunity::count();

        $totalActivities = Activity::count();

        $totalRevenue = Opportunity::sum('expected_revenue');


        // =========================================================
        // OPPORTUNITY WON / LOST
        // =========================================================

        $won = Opportunity::whereHas('stage', function ($query) {
            $query->where('name', 'Won');
        })->count();

        $lost = Opportunity::whereHas('stage', function ($query) {
            $query->where('name', 'Lost');
        })->count();


        // =========================================================
        // OPPORTUNITY AKTIF
        // =========================================================

        $activeOpportunities = Opportunity::whereHas(
            'stage',
            function ($query) {
                $query->whereNotIn('name', ['Won', 'Lost']);
            }
        )->count();


        // =========================================================
        // ACTIVITY STATUS
        // =========================================================

        $plannedActivities = Activity::where(
            'status',
            'planned'
        )->count();

        $doneActivities = Activity::where(
            'status',
            'done'
        )->count();

        $cancelledActivities = Activity::where(
            'status',
            'cancelled'
        )->count();


        // =========================================================
        // LEAD STATUS
        // =========================================================

        $newLeads = Lead::where(
            'status',
            'new'
        )->count();

        $contactedLeads = Lead::where(
            'status',
            'contacted'
        )->count();

        $qualifiedLeads = Lead::where(
            'status',
            'qualified'
        )->count();

        $convertedLeads = Lead::where(
            'status',
            'converted'
        )->count();


        // =========================================================
        // PIPELINE STAGE
        // =========================================================

        $stages = Stage::withCount('opportunities')
            ->orderBy('sequence')
            ->get();


        // =========================================================
        // OPPORTUNITY TERBARU
        // =========================================================
        // Dashboard diurutkan dari revenue terbesar
        // =========================================================

        $recentOpportunities = Opportunity::with([
            'customer',
            'stage'
        ])
            ->orderByDesc('expected_revenue')
            ->take(5)
            ->get();


        // =========================================================
        // ACTIVITY TERBARU
        // =========================================================

        $recentActivities = Activity::with([
            'opportunity.customer'
        ])
            ->orderByDesc('activity_date')
            ->take(5)
            ->get();


        // =========================================================
        // ACTIVITY TERDEKAT / PENGINGAT
        // =========================================================
        // Hanya activity Planned yang akan berlangsung
        // mulai sekarang sampai 7 hari ke depan.
        // Diurutkan dari waktu yang paling dekat.
        // =========================================================

       $upcomingActivities = Activity::with([
    'opportunity.customer'
])
    ->where('status', 'planned')
    ->whereBetween('activity_date', [
        now(),
        now()->copy()->addDays(7)->endOfDay()
    ])
    ->orderBy('activity_date', 'asc')
    ->take(5)
    ->get();


        // =========================================================
        // JUMLAH ACTIVITY TERDEKAT
        // =========================================================

        $upcomingActivitiesCount = $upcomingActivities->count();


        // =========================================================
        // RETURN DASHBOARD
        // =========================================================

        return view(
            'crm.dashboard',
            compact(
                'totalLeads',
                'totalCustomers',
                'totalOpportunities',
                'totalActivities',
                'totalRevenue',

                'won',
                'lost',
                'activeOpportunities',

                'plannedActivities',
                'doneActivities',
                'cancelledActivities',

                'newLeads',
                'contactedLeads',
                'qualifiedLeads',
                'convertedLeads',

                'stages',

                'recentOpportunities',
                'recentActivities',

                'upcomingActivities',
                'upcomingActivitiesCount'
            )
        );
    }


    // =========================================================
    // PIPELINE
    // =========================================================

    public function pipeline()
    {
        $stages = Stage::with([
            'opportunities.customer'
        ])
            ->orderBy('sequence')
            ->get();

        return view(
            'crm.pipeline',
            compact('stages')
        );
    }


    // =========================================================
    // UPDATE STAGE OPPORTUNITY
    // =========================================================

    public function updateOpportunityStage(
        Request $request,
        Opportunity $opportunity
    ) {
        // =====================================================
        // VALIDASI STAGE
        // =====================================================

        $request->validate(
            [
                'stage_id' => [
                    'required',
                    'integer',
                    'exists:stages,id'
                ],
            ],
            [
                'stage_id.required' =>
                    'Stage harus dipilih.',

                'stage_id.exists' =>
                    'Stage yang dipilih tidak valid.',
            ]
        );


        // =====================================================
        // UPDATE STAGE
        // =====================================================

        $opportunity->update([
            'stage_id' => $request->stage_id,
        ]);


        // =====================================================
        // KEMBALI KE PIPELINE
        // =====================================================

        return redirect()
            ->route('crm.pipeline')
            ->with(
                'success',
                'Stage opportunity berhasil diubah.'
            );
    }
}