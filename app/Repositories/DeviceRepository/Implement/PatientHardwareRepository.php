<?php

namespace App\Repositories\DeviceRepository\Implement;


use App\Models\Patient;
use App\Models\UserDevice;
use App\Repositories\DeviceRepository\DeviceOperationRepository;
use App\Repositories\DeviceRepository\DeviceRepository;


class PatientHardwareRepository implements DeviceRepository, DeviceOperationRepository{

    public function saveDevice($patientId, $serialNumber) : UserDevice
    {
        
        $patient = Patient::find($patientId);
        
        $patient->userDevice()->create([
            'serial_number' => $serialNumber
        ]);

        return $patient->userDevice;
    }

    public function updateDevice()
    {
        
    }

    public function deleteDevice()
    {
        
    }

    public function on($patientId, $status)
    {
        $patient = Patient::find($patientId);

        $patient->userDevice()->update([
            'status' => $status
        ]);

        return $patient->userDevice->status;
    }

    public function off($patientId, $status)
    {
        $patient = Patient::find($patientId);

        $patient->userDevice()->update([
            'status' => $status
        ]);

        return $patient->userDevice->status;
    }
}