<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\CreateStatusRequest;
use App\Http\Requests\Status\DeleteStatusRequest;
use App\Http\Requests\Status\EditStatusRequest;
use App\Http\Requests\Status\ShowStatusRequest;
use App\Http\Requests\Status\StoreStatusRequest;
use App\Http\Requests\Status\UpdateStatusRequest;
use App\Models\Status;
use App\Services\Status\StatusService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status
            ::orderBy('name')
            ->get();

        return view('statuses.index', [
            'statuses' => $statuses,
            'title' => 'Statuses',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateStatusRequest $request)
    {
        return view('statuses.create', [
            'title' => 'Create Status',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request, StatusService $statusService)
    {
        $status = $statusService->storeStatus($request->validated());

        if($status){
            return redirect()->route('statuses.index')
                ->with('message', 'Status created successfully.');
        }
        return redirect()->back()
            ->withInput()
            ->withErrors(['message'=>'status creating failed!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowStatusRequest $request ,Status $status)
    {
        return view('statuses.show', [
            'status' => $status,
            'title' => 'Show Status',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditStatusRequest $request ,Status $status)
    {
        return view('statuses.edit', [
            'status' => $status,
            'title' => 'Edit Status',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status, StatusService $statusService): RedirectResponse
    {
        $status = $statusService->updateStatus($request->validated(), $status);
        if($status){
            return redirect()
                ->route('statuses.show', ['status' => $status])
                ->with('message', 'Status updated successfully.');
        }

        return redirect()
            ->back()
            ->withErrors(['message'=>'Status updating failed!'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteStatusRequest $request, Status $status, StatusService $statusService): RedirectResponse
    {
        $result = $statusService->deleteStatus($request->validated, $status);
        if($result){
            return redirect()->route('statuses.index')->with('message', 'Status deleted successfully.');
        }
        return back()->withErrors(['message'=>'Status deleting failed!']);
    }
}
