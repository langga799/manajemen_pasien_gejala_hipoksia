<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDevice;

class PulseOximetry extends Model
{
    use HasFactory;

    protected $table = 'pulse_oximetries';

    protected $fillable = [
        'spo2',
        'bpm'
    ];

    /**
     * * Measurement belongs to device
     */
    public function userDevice(){
        return $this->belongsTo(UserDevice::class);
    }
}
