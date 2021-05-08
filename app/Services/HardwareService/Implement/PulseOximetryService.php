<?php

namespace App\Services\HardwareService\Implement;

use App\Models\UserDevice;
use App\Repositories\HardwareRepository\Implement\PulseOximetryRepository;
use App\Services\HardwareService\HardwareService;
use Illuminate\Http\Request;

const DEVICE_ACTIVATED = 1;

class PulseOximetryService implements HardwareService{

    /**
     * * Instansiasi repo
     */
    protected $repositoryOximeter;
    protected $userDevice;

    public function __construct(PulseOximetryRepository $repo, UserDevice $device)
    {
        $this->repositoryOximeter = $repo;
        $this->userDevice = $device;
    }

    public function storeSensorData(Request $data)
    {

         $sensorData = $data->except('serial_number');
         $serialNumberDevice = $data->serial_number;

         // cek apakah status device aktif
         $deviceStatus = $this->repositoryOximeter->getDeviceStatus($serialNumberDevice);
         
         if($sensorData != null && $deviceStatus === DEVICE_ACTIVATED){
             // simpan data sensor
             $result = $this->repositoryOximeter->store($sensorData, $serialNumberDevice);
             return $result;
         }
         
         return; 
    }

    public function getSensorData(Request $request)
    {
        // cek apakah device ada
        $isDeviceExist = $this->repositoryOximeter->getDevice($request->serial_number);
        
        if($isDeviceExist){
            $sensorData = $this->repositoryOximeter->getMeasurements($request->serial_number);   
            return $sensorData;
        }

        return $isDeviceExist;
    }
}