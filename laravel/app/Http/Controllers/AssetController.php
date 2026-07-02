<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetStoreRequest;
use App\Http\Requests\AssetUpdateRequest;
use App\Models\Asset;
use App\Models\Playbook;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $assets = Asset::with(['playbook', 'category'])->orderBy('sort_order', 'asc')->paginate(10);
        return view('assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $playbooks = Playbook::orderBy('title')->get();
        $categories = class_exists(\App\Models\Category::class) ? \App\Models\Category::orderBy('name')->get() : collect();
        return view('assets.create', compact('playbooks', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetStoreRequest $request): RedirectResponse
    {
        Asset::create($request->validated());

        return redirect()->route('assets.index')
            ->with('success', 'Asset created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset): View
    {
        $asset->load(['playbook', 'category']);
        return view('assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset): View
    {
        $playbooks = Playbook::orderBy('title')->get();
        $categories = class_exists(\App\Models\Category::class) ? \App\Models\Category::orderBy('name')->get() : collect();
        return view('assets.edit', compact('asset', 'playbooks', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssetUpdateRequest $request, Asset $asset): RedirectResponse
    {
        $asset->update($request->validated());

        return redirect()->route('assets.index')
            ->with('success', 'Asset updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset): RedirectResponse
    {
        $asset->delete();

        return redirect()->route('assets.index')
            ->with('success', 'Asset deleted successfully.');
    }
}
