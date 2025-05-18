<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'vehicle',
        'appointment_time',
        'status',
        'service_type_id',
    ];

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
