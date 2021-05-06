<?php

namespace App\Repositories\HardwareRepository\Implement;

use App\Models\UserDevice;
use App\Repositories\HardwareRepository\HardwareRepository;


class PulseOximetryRepository implements HardwareRepository{

    protected $userDevice;
    
    public function __construct(UserDevice $userDevice)
    {
        $this->userDevice = $userDevice;
    }

    public function store($data, $serial_number)
    {
        // cari device pasien
        $patientDevice = $this->userDevice::where('serial_number', $serial_number)->first();

        // insert data
        $patientDevice->pulseOximetry()->create($data);

        return $patientDevice;
    }

    public function getDeviceStatus($serial_number)
    {
        $deviceStatus = $this->userDevice::where('serial_number', $serial_number)->first()->status;
        
        return $deviceStatus;
    }
}