<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ForgotPasswordService\Implement\PatientForgotPasswordService;
use Illuminate\Http\Request;

class ApiForgotPasswordController extends Controller
{

    protected $forgotPasswordService;

    
    public function __construct(PatientForgotPasswordService $forgotPassword)
    {
        $this->forgotPasswordService = $forgotPassword;
    }


    public function forgotPassword(Request $request){
        $email = $request->input('email');

        $token = $this->forgotPasswordService->forgotPassword($email);
        
            if($token != null){
                return response()->json([
                    'code' => 200,
                    'status' => 'berhasil',
                    'token' => $token
                ]);
            }

            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'email doesnt exist'
            ]); 
    }


    public function resetPassword(Request $request){
        
        $isResetFailed = $this->forgotPasswordService->reset($request);
        
        if($isResetFailed){
            return response()->json([
                'code' => 400,
                'status' => 'failed',
                'message' => 'check your param or invalid token'
            ]);
        }
    
        return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'password reset successful'
        ]);  
        
    }
}
