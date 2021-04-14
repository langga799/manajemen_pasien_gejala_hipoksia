<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'spo2', 
        'bpm'
    ];


    /**
     * many data spo2 and bpm has belongs to patient
     */
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
