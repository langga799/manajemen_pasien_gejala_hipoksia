<?php

namespace App\Models;

use App\Models\Device\PulseOximetry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;

    protected $table = 'user_devices';

    protected $fillable = [
        'serial_number',
        'api_token'
    ];


    public function device(){
        return $this->hasOne(Device::class);
    }

    /**
     * * Device belongs to one patient
     */
    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    /**
     * * Device has pulse oximetry
     */
    public function pulseOximetry(){
        return $this->hasMany(PulseOximetry::class);
    }
}
