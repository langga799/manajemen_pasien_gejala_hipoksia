<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\MonitoringRepository\Implement\PatientMonitoringRepository;
use App\Services\MonitoringService\Implement\PatientMonitoringService;
use Illuminate\Http\Request;

class PatientMonitoringController extends Controller
{
    /**
     * *Instansiasi service
     */
    protected $monitoringRepository;
    protected $monitoringService;

    public function __construct(PatientMonitoringRepository $repo, PatientMonitoringService $serv)
    {
        $this->monitoringRepository = $repo;
        $this->monitoringService = $serv;
    }


    /**
     * * Menyimpan Data Spo2 dan Bpm
     */
    public function insert(Request $request){
        $result = $this->monitoringService->storeSensorData($request);

        if($result){
            return response()->json([
                'code' => 200,
                'status' => 'berhasil',
                'message' => 'data berhasil ditambahkan'
            ]);
        }

        return response()->json([
            'code' => 400,
            'status' => 'gagal',
            'message' => 'data gagal ditambahkan'
        ]);
    }
}
