<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarageEntry extends Model
{
    use HasFactory;

    protected $fillable = [ 'is_paid', 'date_entree', 'date_sortie', 'prix', 'statut', 'commentaires'];
    protected $casts = ['date_entree' => 'datetime', 'date_sortie' => 'datetime', 'prix' => 'float', 'is_paid' => 'boolean'];

        
    
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}


