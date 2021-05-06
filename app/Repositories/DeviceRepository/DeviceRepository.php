<?php

namespace App\Repositories\DeviceRepository;

use App\Models\UserDevice;

interface DeviceRepository {
    function saveDevice($patientId, $serialNumber) : UserDevice;
    function updateDevice();
    function deleteDevice();
}