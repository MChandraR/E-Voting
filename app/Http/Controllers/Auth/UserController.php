<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(){
        return response()->json([
            "status" => 200,
            "message" => "Berhasil mengambil data user !",
            "data" => User::all(),
        ],200);
    }

    public function store(Request $req){
        try{

            $data = $req->validate([
                "username" => 'required',
                "username" => 'required',
                "username" => 'required',
            ]);
        

            return response()->json([
                "status" => 201,
                "message" => "Berhasil menambahkan data pengguna!",
                "data" => User::create([
                    "username" => $req->username,
                    "password" => Hash::make($req->password),
                    "email" => $req->email
                ], 201)
            ]);

        }catch(ValidationException $e){
            return response()->json([
                "status" => 400,
                "message" => "Gagal menambahkan data pengguna ! Field tidak lengkap !",
                "data" => NULL
            ], 400 );
        }
    }

    public function login(Request $req){
        try{
            $body = $req->validate([
                "username" => 'required',
                "password" => 'required'
            ]);

            if(Auth::attempt($req->only('username', 'password'))){
                $token = $req->user()->createToken("api-token")->plainTextToken;
            
                return response()->json([
                    "status" => 200,
                    "message" => "Berhasil login !",
                    "data" => [
                        "token" => $token,
                        "user" => Auth::user(),
                        "loggedin" => Auth::check()
                    ]
                ], 200 );
               
                
            }else{
                return response()->json([
                    "status" => 401,
                    "message" => "Username atau password salah !",
                    "data" => NULL
                ], 401 );
            }

        }catch(ValidationException $e){
            return response()->json([
                "status" => 400,
                "message" => "Username atau password kosong !",
                "data" => NULL
            ], 400 );
        }
    }

    public function ses(){
        return response()->json([
            "data" => Auth::check()
        ],200);
    }
}
