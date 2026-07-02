<?php

namespace App\Http\Controllers;

use App\Http\Requests\JourneyStoreRequest;
use App\Http\Requests\JourneyUpdateRequest;
use App\Models\Journey;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
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
    public function store(JourneyStoreRequest $request): RedirectResponse
    {
        Journey::create($request->validated());

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
    public function update(JourneyUpdateRequest $request, Journey $journey): RedirectResponse
    {
        $journey->update($request->validated());

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
