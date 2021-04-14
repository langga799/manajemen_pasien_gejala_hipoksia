<?php

namespace App\Services\MonitoringService\Implement;

use App\Repositories\MonitoringRepository\Implement\PatientMonitoringRepository;
use App\Services\MonitoringService\MonitoringService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientMonitoringService implements MonitoringService{

    /**
     * * Instansiasi repo
     */
     protected $repositoryMonitoring;

     public function __construct(PatientMonitoringRepository $repo)
     {
         $this->repositoryMonitoring = $repo;
     }

    
     /**
      * * Simpan data sensor
      */
    public function storeSensorData(Request $data)
    {
        // ambil data pasien yang terautentikasi
        $patientHasBeenAuthenticated = Auth::guard('patientapi')->user();
        
        // ambil data sensor
        $sensorData = $data->all();

        if($sensorData != null){
            // simpan data sensor
            $result = $this->repositoryMonitoring->store($sensorData, $patientHasBeenAuthenticated->id);
            return $result;
        }
        
        return;       
    }
}