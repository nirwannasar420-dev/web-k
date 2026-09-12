<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // =========================================================
    // LIST CUSTOMER
    // =========================================================
    public function index(Request $request)
    {
        $query = Customer::query();

        // PENCARIAN CUSTOMER
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('company', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $customers = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'customers.index',
            compact('customers')
        );
    }


    // =========================================================
    // FORM TAMBAH CUSTOMER
    // =========================================================
    public function create()
    {
        return view('customers.create');
    }


    // =========================================================
    // SIMPAN CUSTOMER
    // =========================================================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);

        Customer::create($validated);

        return redirect()
            ->route('customers.index')
            ->with(
                'success',
                'Customer berhasil ditambahkan.'
            );
    }


    // =========================================================
    // DETAIL CUSTOMER
    // =========================================================
    public function show(Customer $customer)
    {
        // Ambil opportunity beserta stage
        $customer->load([
            'opportunities.stage'
        ]);

        // Ambil semua activity melalui opportunity
        $activities = Activity::whereHas(
            'opportunity',
            function ($query) use ($customer) {
                $query->where(
                    'customer_id',
                    $customer->id
                );
            }
        )
        ->with([
            'opportunity'
        ])
        ->orderByDesc('activity_date')
        ->get();

        return view(
            'customers.show',
            compact(
                'customer',
                'activities'
            )
        );
    }


    // =========================================================
    // FORM EDIT CUSTOMER
    // =========================================================
    public function edit(Customer $customer)
    {
        return view(
            'customers.edit',
            compact('customer')
        );
    }


    // =========================================================
    // UPDATE CUSTOMER
    // =========================================================
    public function update(
        Request $request,
        Customer $customer
    ) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);

        $customer->update($validated);

        return redirect()
            ->route(
                'customers.show',
                $customer
            )
            ->with(
                'success',
                'Customer berhasil diperbarui.'
            );
    }


    // =========================================================
    // HAPUS CUSTOMER
    // =========================================================
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with(
                'success',
                'Customer berhasil dihapus.'
            );
    }
}