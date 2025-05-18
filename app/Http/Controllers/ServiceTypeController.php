<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
        return ServiceType::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ServiceType::create($validated);
        return response()->json(['message' => 'Type de service ajouté']);
    }

    public function destroy($id)
    {
        ServiceType::destroy($id);
        return response()->json(['message' => 'Type supprimé']);
    }
}
