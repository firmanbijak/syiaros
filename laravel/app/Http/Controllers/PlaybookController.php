<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaybookStoreRequest;
use App\Http\Requests\PlaybookUpdateRequest;
use App\Models\Playbook;
use App\Models\Situation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlaybookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $playbooks = Playbook::with('situation')->orderBy('sort_order', 'asc')->paginate(10);
        return view('playbooks.index', compact('playbooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $situations = Situation::orderBy('name')->get();
        return view('playbooks.create', compact('situations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaybookStoreRequest $request): RedirectResponse
    {
        Playbook::create($request->validated());

        return redirect()->route('playbooks.index')
            ->with('success', 'Playbook created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playbook $playbook): View
    {
        $playbook->load('situation');
        return view('playbooks.show', compact('playbook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playbook $playbook): View
    {
        $situations = Situation::orderBy('name')->get();
        return view('playbooks.edit', compact('playbook', 'situations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlaybookUpdateRequest $request, Playbook $playbook): RedirectResponse
    {
        $playbook->update($request->validated());

        return redirect()->route('playbooks.index')
            ->with('success', 'Playbook updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playbook $playbook): RedirectResponse
    {
        $playbook->delete();

        return redirect()->route('playbooks.index')
            ->with('success', 'Playbook deleted successfully.');
    }
}
