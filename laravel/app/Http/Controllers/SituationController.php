<?php

namespace App\Http\Controllers;

use App\Http\Requests\SituationStoreRequest;
use App\Http\Requests\SituationUpdateRequest;
use App\Models\Journey;
use App\Models\Situation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SituationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $situations = Situation::with('journey')->orderBy('sort_order', 'asc')->paginate(10);
        return view('situations.index', compact('situations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $journeys = Journey::orderBy('name')->get();
        return view('situations.create', compact('journeys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SituationStoreRequest $request): RedirectResponse
    {
        Situation::create($request->validated());

        return redirect()->route('situations.index')
            ->with('success', 'Situation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Situation $situation): View
    {
        $situation->load('journey');
        return view('situations.show', compact('situation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Situation $situation): View
    {
        $journeys = Journey::orderBy('name')->get();
        return view('situations.edit', compact('situation', 'journeys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SituationUpdateRequest $request, Situation $situation): RedirectResponse
    {
        $situation->update($request->validated());

        return redirect()->route('situations.index')
            ->with('success', 'Situation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Situation $situation): RedirectResponse
    {
        $situation->delete();

        return redirect()->route('situations.index')
            ->with('success', 'Situation deleted successfully.');
    }
}
