<?php

namespace App\Repositories\UserRepository\Implement;

use App\Repositories\UserRepository\UserRepository;
use App\Models\Patient;
use Illuminate\Support\Facades\Storage;

class PatientRepository implements UserRepository{

    protected $patientModel;

    public function __construct(Patient $model)
    {
        $this->patientModel = $model;
    }

    // save update patien to database
    public function saveUpdateUser($userAuth, $userUpdateData): Object
    {
        $idPatient = $userAuth->id;
        $newData = $userUpdateData->all();
        
        $this->patientModel::find($idPatient)
                ->update([
                    'jenis_kelamin' => $newData['jenis_kelamin'],
                    'tanggal_lahir' => $newData['tanggal_lahir'],
                    'phone' => $newData['phone'],
                    'alamat' => $newData['alamat']
                ]);

        $patientUpdated = $this->patientModel::find($idPatient);
        
        return $patientUpdated;
    }


    // save patien photo profile to database
    public function savePhotoProfile($userAuth, $photo)
    {
        $idPatient = $userAuth->id;

        $imageName = time() . '.' . 'png';

        // $path = Storage::putFile('public/profiles', $imageName);
        $path = "public/profiles/$imageName";

        Storage::disk('public-image')->put($imageName, $photo);
        
        $this->patientModel::find($idPatient)
                ->update([
                    'photo' => $path
                ]);
        
        $patientPhotoUpdated = $this->patientModel::find($idPatient);

        return $patientPhotoUpdated;
    }


    public function getPhotoProfile($user_id)
    {
        $filePath = $this->patientModel::find($user_id)->photo;
        
        if($filePath != null){
            return $filePath;
        }

        return null;
    }
}