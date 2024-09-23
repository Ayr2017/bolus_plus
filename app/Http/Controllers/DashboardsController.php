<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\StoreDashboardRequest;
use App\Models\Dashboard;
use App\Services\Dashboard\DashboardService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dashboards = Dashboard::with('media')->get();
        return view('dashboards.index',[
            'title'=>'Dashboards',
            'dashboards'=>$dashboards,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('dashboards.create',[
            'title'=>'Create new Dashboard',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDashboardRequest $request, DashboardService $dashboardService)
    {
        $result = $dashboardService->storeDashboard($request->validated(), $request->file('picture'));
        if($result){
            return redirect()->route('dashboards.index')->with('message','Dashboard created successfully');
        }

        return redirect()->route('dashboards.create')->withErrors(['message'=>'Failed to create dashboard']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        return view('dashboards.show',[
            'dashboard'=>$dashboard,
            'title'=>$dashboard->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
