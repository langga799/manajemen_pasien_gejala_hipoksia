<?php

namespace App\Repositories\HardwareRepository;

interface HardwareRepository{
    function store($data, $serial_number);
    function getDeviceStatus($serial_number);
}