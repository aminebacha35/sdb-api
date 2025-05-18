@component('mail::message')
# Bonjour {{ $appointment->name }},

Votre rendez-vous a bien été enregistré au garage.

## 📅 Détails du rendez-vous :
- **Date & heure** : {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('d/m/Y H:i') }}
- **Véhicule** : {{ $appointment->vehicle }}
- **Type de service** : {{ $appointment->serviceType->name }}
- **Téléphone** : {{ $appointment->phone }}

Nous vous contacterons si besoin.

Merci de votre confiance,  
**Le Garage**

@endcomponent
