<?php

namespace App\Repositories\MonitoringRepository\Implement;

use App\Models\Patient;
use App\Repositories\MonitoringRepository\MonitoringRepository;


const SUCCESS = true;


class PatientMonitoringRepository implements MonitoringRepository{
    /**
     * *Instansiasi objek pasien
     */
    protected $patient;
    
    public function __construct(Patient $model)
    {
        $this->patient = $model;
    }

    
    public function store($data, $patient_id)
    {
        // cari pasien
        $currentPatient = $this->patient::find($patient_id);

        // insert data
        $currentPatient->sensors()->create($data);

        return SUCCESS;
    }
}