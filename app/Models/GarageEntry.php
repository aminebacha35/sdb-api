<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarageEntry extends Model
{
    use HasFactory;

    protected $fillable = [ 'appointment_id', 'date_entree', 'date_sortie', 'statut', 'commentaires'];

    protected $casts = ['date_entree' => 'datetime', 'date_sortie' => 'datetime'];

        
    
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    
    public function getDaysInGarageAttribute()
    {
        $endDate = $this->date_sortie ?? now(); // date de sortie ou maintenant
        return $this->date_entree->diffInDays($endDate);
    }

}


