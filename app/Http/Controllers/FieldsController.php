<?php

namespace App\Http\Controllers;

use App\Enums\Field\FieldTypeEnum;
use App\Http\Requests\Field\StoreFieldRequest;
use App\Http\Requests\Field\UpdateFieldRequest;
use App\Models\EventType;
use App\Models\Field;
use App\Services\Field\FieldService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $fields = Field::all();
        return view('fields.index',[
            'fields' => $fields,
            'title' => 'Fields',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $eventTypes = EventType::query()->orderBy('name')->get();
        return view('fields.create',[
            'event_types' => $eventTypes,
            'title' => 'Add Field',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFieldRequest $request, FieldService $fieldService): RedirectResponse
    {
        $field = $fieldService->storeField($request->validated());
        if($field){
            return redirect()->route('fields.index');
        }

        return back()->withInput()->withErrors(['message' => 'Something went wrong']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field):View
    {
        return view('fields.show',[
            'field' => $field,
            'title' => 'Field',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field): View
    {
        $eventTypes = EventType::query()->orderBy('name')->get();
        $fieldTypeEnum = FieldTypeEnum::cases();
        return view('fields.edit',[
            'title' => 'Field',
            'field' => $field,
            'event_types' => $eventTypes,
            'field_type_enum' => $fieldTypeEnum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFieldRequest $request, Field $field, FieldService $fieldService): RedirectResponse
    {
        $field = $fieldService->updateField($request->validated(), $field);
        if($field){
            return redirect()->route('fields.show',[
                'field' => $field,
            ]);
        }

        return back()->withInput()->withErrors(['message' => 'Something went wrong']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
