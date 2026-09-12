<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $search = trim($request->search ?? '');

        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('product_code', 'like', "%{$search}%")
                        ->orWhere('product_name', 'like', "%{$search}%")
                        ->orWhere('unit', 'like', "%{$search}%");
                });
            })
            ->orderBy('product_name')
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact(
            'products',
            'search'
        ));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code' => [
                'required',
                'string',
                'max:100',
                'unique:products,product_code',
            ],
            'product_name' => [
                'required',
                'string',
                'max:255',
            ],
            'unit' => [
                'nullable',
                'string',
                'max:50',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $product->load([
            'opportunityItems.opportunity.customer',
            'opportunityItems.opportunity.stage',
        ]);

        return view('products.show', compact(
            'product'
        ));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact(
            'product'
        ));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_code' => [
                'required',
                'string',
                'max:100',
                'unique:products,product_code,' . $product->id,
            ],
            'product_name' => [
                'required',
                'string',
                'max:255',
            ],
            'unit' => [
                'nullable',
                'string',
                'max:50',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->opportunityItems()->exists()) {
            return redirect()
                ->route('products.index')
                ->with('error', 'This product cannot be deleted because it is already used in an opportunity.');
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}