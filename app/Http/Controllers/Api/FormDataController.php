<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormData;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FormDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return FormData::all();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|string',
            'address' => 'required',
        ]);

        try {
            $formData = FormData::create($validated);
            return response()->json($formData, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    
    public function show(string $id)
    {
        try {
            $form = FormData::findOrFail($id);
            return response()->json($form);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Form data not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|string',
            'address' => 'required',
        ]);

        try {
            $form = FormData::findOrFail($id);
            $form->update($validated);
            return response()->json($form);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Form data not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $form = FormData::findOrFail($id);
            $form->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Form data not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        try {
            $results = FormData::where('name', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%")
                ->orWhere('contact', 'like', "%$query%")
                ->orWhere('address', 'like', "%$query%")
                ->get();

            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }
    
}
