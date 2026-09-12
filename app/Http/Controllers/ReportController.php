<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Customer;
use App\Models\Lead;
use App\Models\Opportunity;

class ReportController extends Controller
{
    public function index()
    {
        // ==========================================
        // TOTAL DATA
        // ==========================================

        $totalLeads = Lead::count();

        $totalCustomers = Customer::count();

        $totalOpportunities = Opportunity::count();

        $totalActivities = Activity::count();


        // ==========================================
        // LEAD STATUS
        // ==========================================

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


        // ==========================================
        // OPPORTUNITY STAGE
        // ==========================================

        $prospectOpportunities = Opportunity::whereHas(
            'stage',
            function ($query) {
                $query->where(
                    'name',
                    'Prospect'
                );
            }
        )->count();


        $qualifiedOpportunities = Opportunity::whereHas(
            'stage',
            function ($query) {
                $query->where(
                    'name',
                    'Qualified'
                );
            }
        )->count();


        $propositionOpportunities = Opportunity::whereHas(
            'stage',
            function ($query) {
                $query->where(
                    'name',
                    'Proposition'
                );
            }
        )->count();


        $wonOpportunities = Opportunity::whereHas(
            'stage',
            function ($query) {
                $query->where(
                    'name',
                    'Won'
                );
            }
        )->count();


        $lostOpportunities = Opportunity::whereHas(
            'stage',
            function ($query) {
                $query->where(
                    'name',
                    'Lost'
                );
            }
        )->count();


        // ==========================================
        // REVENUE
        // ==========================================

        $totalExpectedRevenue = Opportunity::sum(
            'expected_revenue'
        );


        $wonRevenue = Opportunity::whereHas(
            'stage',
            function ($query) {
                $query->where(
                    'name',
                    'Won'
                );
            }
        )->sum(
            'expected_revenue'
        );


        $lostRevenue = Opportunity::whereHas(
            'stage',
            function ($query) {
                $query->where(
                    'name',
                    'Lost'
                );
            }
        )->sum(
            'expected_revenue'
        );


        // ==========================================
        // ACTIVITY STATUS
        // ==========================================

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


        // ==========================================
        // PERSENTASE LEAD
        // ==========================================

        $leadTotalForPercentage =
            max($totalLeads, 1);


        $newLeadsPercent = round(
            ($newLeads / $leadTotalForPercentage) * 100
        );


        $contactedLeadsPercent = round(
            ($contactedLeads / $leadTotalForPercentage) * 100
        );


        $qualifiedLeadsPercent = round(
            ($qualifiedLeads / $leadTotalForPercentage) * 100
        );


        $convertedLeadsPercent = round(
            ($convertedLeads / $leadTotalForPercentage) * 100
        );


        // ==========================================
        // PERSENTASE OPPORTUNITY
        // ==========================================

        $opportunityTotalForPercentage =
            max($totalOpportunities, 1);


        $prospectOpportunitiesPercent = round(
            ($prospectOpportunities / $opportunityTotalForPercentage) * 100
        );


        $qualifiedOpportunitiesPercent = round(
            ($qualifiedOpportunities / $opportunityTotalForPercentage) * 100
        );


        $propositionOpportunitiesPercent = round(
            ($propositionOpportunities / $opportunityTotalForPercentage) * 100
        );


        $wonOpportunitiesPercent = round(
            ($wonOpportunities / $opportunityTotalForPercentage) * 100
        );


        $lostOpportunitiesPercent = round(
            ($lostOpportunities / $opportunityTotalForPercentage) * 100
        );


        // ==========================================
        // PERSENTASE ACTIVITY
        // ==========================================

        $activityTotalForPercentage =
            max($totalActivities, 1);


        $plannedActivitiesPercent = round(
            ($plannedActivities / $activityTotalForPercentage) * 100
        );


        $doneActivitiesPercent = round(
            ($doneActivities / $activityTotalForPercentage) * 100
        );


        $cancelledActivitiesPercent = round(
            ($cancelledActivities / $activityTotalForPercentage) * 100
        );


        // ==========================================
        // OPPORTUNITY TERBARU
        // ==========================================

        $recentOpportunities = Opportunity::with([
            'customer',
            'stage'
        ])
            ->latest()
            ->take(5)
            ->get();


        // ==========================================
        // ACTIVITY TERBARU
        // ==========================================

        $recentActivities = Activity::with([
            'opportunity.customer'
        ])
            ->orderByDesc(
                'activity_date'
            )
            ->take(5)
            ->get();


        // ==========================================
        // RETURN REPORTS
        // ==========================================

        return view(
            'reports.index',
            compact(

                // TOTAL

                'totalLeads',

                'totalCustomers',

                'totalOpportunities',

                'totalActivities',


                // LEAD

                'newLeads',

                'contactedLeads',

                'qualifiedLeads',

                'convertedLeads',


                // OPPORTUNITY

                'prospectOpportunities',

                'qualifiedOpportunities',

                'propositionOpportunities',

                'wonOpportunities',

                'lostOpportunities',


                // REVENUE

                'totalExpectedRevenue',

                'wonRevenue',

                'lostRevenue',


                // ACTIVITY

                'plannedActivities',

                'doneActivities',

                'cancelledActivities',


                // PERSENTASE LEAD

                'newLeadsPercent',

                'contactedLeadsPercent',

                'qualifiedLeadsPercent',

                'convertedLeadsPercent',


                // PERSENTASE OPPORTUNITY

                'prospectOpportunitiesPercent',

                'qualifiedOpportunitiesPercent',

                'propositionOpportunitiesPercent',

                'wonOpportunitiesPercent',

                'lostOpportunitiesPercent',


                // PERSENTASE ACTIVITY

                'plannedActivitiesPercent',

                'doneActivitiesPercent',

                'cancelledActivitiesPercent',


                // DATA TERBARU

                'recentOpportunities',

                'recentActivities'

            )
        );
    }
}