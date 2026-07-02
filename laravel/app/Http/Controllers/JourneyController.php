<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class JourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $journeys = Journey::with('product')->orderBy('sort_order', 'asc')->paginate(10);
        return view('journeys.index', compact('journeys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $products = Product::orderBy('name')->get();
        return view('journeys.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->merge([
            'status' => $request->has('status'),
            'sort_order' => $request->input('sort_order') ?? 0,
        ]);

        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'code' => ['required', 'string', 'max:255', 'unique:journeys,code'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:journeys,slug'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
            'description' => ['nullable', 'string'],
        ]);

        Journey::create($validated);

        return redirect()->route('journeys.index')
            ->with('success', 'Journey created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journey $journey): View
    {
        $journey->load('product');
        return view('journeys.show', compact('journey'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journey $journey): View
    {
        $products = Product::orderBy('name')->get();
        return view('journeys.edit', compact('journey', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journey $journey): RedirectResponse
    {
        $request->merge([
            'status' => $request->has('status'),
            'sort_order' => $request->input('sort_order') ?? 0,
        ]);

        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('journeys', 'code')->ignore($journey->id),
            ],
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('journeys', 'slug')->ignore($journey->id),
            ],
            'sort_order' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
            'description' => ['nullable', 'string'],
        ]);

        $journey->update($validated);

        return redirect()->route('journeys.index')
            ->with('success', 'Journey updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journey $journey): RedirectResponse
    {
        $journey->delete();

        return redirect()->route('journeys.index')
            ->with('success', 'Journey deleted successfully.');
    }
}
