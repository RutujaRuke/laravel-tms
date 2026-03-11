<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormData;

class FormDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FormData::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $formData = FormData::create($validated);
        return response()->json($formData, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $form = FormData::findOrFail($id);

        if (! $form) {
            return response()->json(['message' => 'Form data not found'], 404);
        }

        return response()->json($form);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $form = FormData::findOrFail($id);

        if (! $form) {
            return response()->json(['message' => 'Form data not found'], 404);
        }

        $form->update($validated);

        return response()->json($form);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form = FormData::findOrFail($id);

        if (! $form) {
            return response()->json(['message' => 'Form data not found'], 404);
        }

        $form->delete();

        return response()->json(null, 204);
    }
}
