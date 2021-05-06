<?php

namespace App\Http\Controllers\Api\Device;

use App\Http\Controllers\Controller;
use App\Services\HardwareService\Implement\PulseOximetryService;
use Illuminate\Http\Request;

class PulseOximetryController extends Controller
{
    protected $oximetryService;

    public function __construct(PulseOximetryService $service)
    {
        $this->oximetryService = $service;
    }


    
    public function storeDataSensor(Request $request){
        $this->oximetryService->storeSensorData($request);
    }
}
