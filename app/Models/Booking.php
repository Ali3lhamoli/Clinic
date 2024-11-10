<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'name',
        'phone',
        'email',
        'appointment',
        
    ];

    public function user(){
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
}
