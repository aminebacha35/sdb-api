<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarageEntry extends Model
{
    use HasFactory;

    //fillable = String 
    protected $fillable = [ 'appointment_id', 'date_entree', 'date_sortie', 'statut', 'commentaires'];

    //Casts = Date 
    protected $casts = ['date_entree' => 'datetime', 'date_sortie' => 'datetime'];

        
    
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}


