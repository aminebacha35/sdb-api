<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GarageEntry;
use Carbon\Carbon;

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

    public function exit($id)
    {
        $garageEntry = GarageEntry::findOrFail($id);

        $garageEntry->update([
            'statut' => 'termine',
            'date_sortie' => now(),
        ]);

        return response()->json([
            'message' => 'Sortie du véhicule enregistrée avec succès',
            'data' => $garageEntry
        ]);
    }

    public function history()
    {
        $entries = GarageEntry::with('appointment')
            ->whereNotNull('date_sortie')
            ->orderByDesc('date_sortie')
            ->get()
            ->map(function ($entry) {
                return [
                'id' => $entry->id,
                'client' => $entry->appointment->client_nom,
                'vehicule' => $entry->appointment->vehicule,
                'date_entree' => $entry->date_entree->format('Y-m-d'),
                'date_sortie' => $entry->date_sortie->format('Y-m-d'),
                'duree_presence_jours' => $entry->days_in_garage,
            ];
        });

    return response()->json($entries);
    }

    public function stats()
{
    //Véhicules actuellement au garage
    $currentCount = GarageEntry::whereNull('date_sortie')->count();

    //Durée moyenne de présence (en jours)
    $averageDuration = GarageEntry::whereNotNull('date_sortie')
        ->get()
        ->avg(function ($entry) {
            return $entry->date_entree->diffInDays($entry->date_sortie);
        });

    //Véhicules sortis ce mois
    $monthlyExits = GarageEntry::whereNotNull('date_sortie')
        ->whereMonth('date_sortie', Carbon::now()->month)
        ->whereYear('date_sortie', Carbon::now()->year)
        ->count();

    return response()->json([
        'vehicules_actuellement_au_garage' => $currentCount,
        'duree_moyenne_presence_jours' => round($averageDuration, 1),
        'vehicules_sortis_ce_mois' => $monthlyExits,
    ]);
}
}