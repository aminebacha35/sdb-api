<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GarageEntry;

class GarageEntryController extends Controller
{
    /**
     * Enregistrer l'entrée d'un véhicule au garage
     */
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

    /**
     * Liste des véhicules actuellement au garage
     */
    public function current()
    {
        $entries = GarageEntry::with([
                'appointment',
                'appointment.serviceType'
            ])
            ->whereNull('date_sortie')
            ->get();

        return response()->json($entries);
    }

        /**
     * Mise à jour du statut et des commentaires d'un véhicule au garage
     */
    public function update(Request $request, $id)
    {
        $garageEntry = GarageEntry::findOrFail($id);

        $data = $request->validate([
            'statut' => 'required|in:en_attente,en_reparation',
            'commentaires' => 'nullable|string',
        ]);

        $garageEntry->update($data);

        return response()->json([
            'message' => 'Véhicule mis à jour avec succès',
            'data' => $garageEntry
        ]);
    }

}
