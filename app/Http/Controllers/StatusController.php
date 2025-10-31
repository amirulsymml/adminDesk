<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::all();
        return view('configuration.status', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.create_status');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request)
    {
        Status::create($request->validated());

        return redirect()->route('admin.statuses.index')->with('success', 'Status created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        return view('configuration.status_show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('forms.edit_status', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusRequest $request, Status $status)
    {
        $status->update($request->validated());

        return redirect()->route('admin.statuses.index')->with('success', 'Status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('admin.statuses.index')->with('success', 'Status deleted successfully.');
    }
}
