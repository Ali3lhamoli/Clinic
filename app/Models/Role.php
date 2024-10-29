<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_admin',
        'is_doctor',
        'major_id',
        'is_patient',
        'is_maneger',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function major(){
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }}
