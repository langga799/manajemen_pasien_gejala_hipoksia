<?php

namespace App\Repositories\MonitoringRepository;

interface MonitoringRepository{
    public function store($data, $patient_id);
}