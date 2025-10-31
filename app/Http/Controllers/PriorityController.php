<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Http\Requests\PriorityRequest;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::all();
        return view('configuration.priority', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.create_priority');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PriorityRequest $request)
    {
        Priority::create($request->validated());

        return redirect()->route('admin.priorities.index')->with('success', 'Priority created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        return view('configuration.priority_show', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        return view('forms.edit_priority', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PriorityRequest $request, Priority $priority)
    {
        $priority->update($request->validated());

        return redirect()->route('admin.priorities.index')->with('success', 'Priority updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect()->route('admin.priorities.index')->with('success', 'Priority deleted successfully.');
    }
}
