<?php

namespace App\Services\UserService\Implement;

use App\Repositories\UserRepository\Implement\PatientRepository;
use App\Services\UserService\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PatientService implements UserService{

    protected $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }
    
    
    // update patien data
    public function updateUser($request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
        ]);

        if($validator->fails()){
            return;
        }

        $patientUpdateData = collect($request);
        $patientHasBeenAuthenticated = Auth::guard('patientapi')->user();

        $patientUpdated = $this->patientRepository->saveUpdateUser($patientHasBeenAuthenticated, $patientUpdateData);

        return $patientUpdated;
    }


    // update patient photo profile
    public function updateUserPhoto($request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required'
        ]);

        if($validator->fails()){
            return;
        }

        $patientPhotoFile = $request->file('photo');

        $patientHasBeenAuthenticated = Auth::guard('patientapi')->user();
        
        $patientPhotoUpdated = $this->patientRepository->savePhotoProfile($patientHasBeenAuthenticated, $patientPhotoFile);

        return $patientPhotoUpdated;
    }
}
