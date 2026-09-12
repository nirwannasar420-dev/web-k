<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesResumeController;


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
)->name('login');


Route::post(
    '/login',
    [AuthController::class, 'login']
)->name('login.process');


Route::post(
    '/logout',
    [AuthController::class, 'logout']
)->name('logout');


/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect()->route('crm.dashboard');

});


/*
|--------------------------------------------------------------------------
| CRM
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/crm',
        [CrmController::class, 'dashboard']
    )->name('crm.dashboard');


    /*
    |--------------------------------------------------------------------------
    | PIPELINE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/crm/pipeline',
        [CrmController::class, 'pipeline']
    )->name('crm.pipeline');


    /*
    |--------------------------------------------------------------------------
    | UPDATE STAGE OPPORTUNITY
    |--------------------------------------------------------------------------
    */

    Route::patch(
        '/crm/opportunities/{opportunity}/stage',
        [CrmController::class, 'updateOpportunityStage']
    )->name('crm.opportunities.stage');


    /*
    |--------------------------------------------------------------------------
    | LEADS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'leads',
        LeadController::class
    );


    /*
    |--------------------------------------------------------------------------
    | Convert Lead - Form
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/leads/{lead}/convert',
        [LeadController::class, 'convertForm']
    )->name('leads.convert.form');


    /*
    |--------------------------------------------------------------------------
    | Convert Lead - Proses
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/leads/{lead}/convert',
        [LeadController::class, 'convert']
    )->name('leads.convert');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMERS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'customers',
        CustomerController::class
    );


    /*
    |--------------------------------------------------------------------------
    | OPPORTUNITIES
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'opportunities',
        OpportunityController::class
    );


    /*
    |--------------------------------------------------------------------------
    | ACTIVITIES
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'activities',
        ActivityController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'products',
        ProductController::class
    );
    /*
|--------------------------------------------------------------------------
| SALES RESUME / PIPO
|--------------------------------------------------------------------------
*/

Route::get(
    '/sales-resume',
    [SalesResumeController::class, 'index']
)->name('sales_resume.index');


    /*
    |--------------------------------------------------------------------------
    | REPORTS
    |--------------------------------------------------------------------------
    |
    | Only Admin can access Reports.
    |
    */

    Route::get(
        '/reports',
        function () {

            abort_unless(
                auth()->user()->role === 'admin',
                403
            );

            return app(
                ReportController::class
            )->index();

        }
    )->name('reports.index');


    /*
    |--------------------------------------------------------------------------
    | USERS
    |--------------------------------------------------------------------------
    |
    | UserController already checks Admin permissions.
    |
    */

    Route::resource(
        'users',
        UserController::class
    );

});