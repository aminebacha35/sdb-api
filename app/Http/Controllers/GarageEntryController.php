<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GarageEntryController extends Controller
{
    

    public function storeEntry(Request $request)
    {
        $data = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'statut' => 'required|in:en_attente,en_reparation',
            'commentaires' => 'nullable|string',
        ]);

        $garageEntry = GarageEntry::create([
            'appointment_id' => $data['appointment_id'],
            'date_entree' => now(),
            'statut' => $data['statut'],
            'commentaires' => $data['commentaires'] ?? null,
        ]);

        return response()->json([
            'message' => 'Entrée du véhicule enregistrée avec succès',
            'data' => $garageEntry,
        ], 201);
    }
}
