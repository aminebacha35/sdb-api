<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmationMail;

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::with('serviceType')->latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|email',
            'phone'             => 'required|string',
            'vehicle'           => 'required|string',
            'appointment_time'  => 'required|date|after:now',
            'service_type_id'   => 'required|exists:service_types,id',
        ]);

        $appointment = Appointment::create($validated);

        Mail::to($validated['email'])->send(new AppointmentConfirmationMail($appointment));

        $appointment->load('serviceType');
        return response()->json($appointment, 201);
    }

    public function show($id)
    {
        return Appointment::with('serviceType')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->only(['status', 'appointment_time']));
        return response()->json(['message' => 'Rendez-vous mis à jour']);
    }

    public function destroy($id)
    {
        Appointment::destroy($id);
        return response()->json(['message' => 'Rendez-vous supprimé']);
    }
}
