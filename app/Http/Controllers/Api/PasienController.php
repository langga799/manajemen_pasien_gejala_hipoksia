<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\TokenRepository;
use Spatie\Permission\Models\Role;

class PasienController extends Controller
{
        

    public function register(Request $request){

        // ambil parameter request
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:25',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'Cek email dan password'
            ]);
        }
       
        try {
             
            // buat pasien
            $user = new User([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            // menambahkan role pasien
            $pasien_role = Role::findById(4);
            $user->assignRole($pasien_role);

            $user->save();

            // membuat akses token pasien
            $tokenResult = $user->createToken('AccessToken');
            $token = $tokenResult->token;
            $token->save();
            

            return response()->json([
                'code' => 200,
                'status' => 'berhasil',
                'token_type' => 'Bearer',
                'access_token' => $tokenResult->accessToken,
                'token_id' => $token->id,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ]
            ]);

        } catch(Exception $e){
            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'Cek email dan password'
            ]);
        }
    }




    public function login(Request $request){
        
        // ambil parameter request
        Validator::make($request->all(),[
            'email' =>'email|required',
            'password' => 'required'
        ]);

        
        try{
            $login_detail = request(['email', 'password']);

            if(!Auth::attempt($login_detail)){
                return response()->json([
                    'code' => 400,
                    'status' => 'gagal',
                    'message' => 'Gagal login, cek email dan password anda'
                ]);
            }
        }catch(Exception $e){
            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'Gagal login, cek email dan password anda'
            ]);
        }

        $user = $request->user();
        
        
        // membuat akses token pasien
        $tokenResult = $user->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'code' => 200,
            'status' => 'berhasil',
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,
            'token_id' => $token->id,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]
        ]);

    }



    public function update(Request $request){

        $validator = Validator::make($request->all(),[
            'jenis_kelamin' =>'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'phone' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'Lengkapi data anda'
            ]);
        }

        try{
            $pasien = Auth::user();

            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->alamat = $request->alamat;
            $pasien->tanggal_lahir = $request->tanggal_lahir;
            $pasien->phone = $request->phone;

            $pasien->save();

            return response()->json([
                'code' => 200,
                'status' => 'berhasil',
                'message' => 'data pasien telah di update',
                'user' => [
                    'id' => $pasien->id,
                    'name' => $pasien->name,
                    'email' => $pasien->email,
                    'jenis_kelamin' => $pasien->jenis_kelamin,
                    'alamat' => $pasien->alamat,
                    'tangggal_lahir' => $pasien->tanggal_lahir,
                    'phone' => $pasien->phone,
                    'created_at' => $pasien->created_at,
                    'updated_at' => $pasien->updated_at,
                ]
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'data gagal diupdate'
            ]);
        }
    }



    public function logout(Request $request){
        
        try{

            $token_id = $request->token_id;
        
            $token_repository = app(TokenRepository::class);

            $token_repository->revokeAccessToken($token_id);

            
            return response()->json([
                'code' => 200,
                'status' => 'berhasil',
                'message' => 'logout berhasil'
            ]);
            
        }catch(Exception $e){
            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'logout gagal'
            ]);
        }
    }




    public function saveUserProfile(Request $request){


        $pasien = Auth::user();

        $validator = Validator::make($request->all(),[
            'gambar' =>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'gambar tidak boleh kosong'
            ]);
        }

        try{
            $path = Storage::putFile('public/profiles', $request->file('gambar'));

            $pasien->photo = $path;
            $pasien->save();

            return response()->json([
                'code' => 200,
                'status' => 'berhasil',
                'message' => 'foto profil berhasil ditambahkan',
                'user' => [
                    'id' => $pasien->id,
                    'name' => $pasien->name,
                    'photo' => $pasien->photo,
                    'created_at' => $pasien->created_at,
                    'updated_at' => $pasien->updated_at
                ]
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 400,
                'status' => 'gagal',
                'message' => 'foto profil gagal ditambahkan'
            ]);
        }

    }



    public function getAllAccessToken(Request $request){
            $token_repository = app(TokenRepository::class);
            $tokens = $token_repository->forUser($request->user_id);
            

            return response()->json([
                'token' => $tokens
            ]);
    }



}
