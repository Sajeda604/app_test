<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SanctumAuthController extends Controller
{
       
    public function register( Request $request){
        $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:8'
        ]);
       $user=User::create([
        'name'=>$request->name,
         'email'=>$request->email,
         'password'=>Hash::make($request->password)
       ]);
       return response()->json([
         'message' => 'User Created ',
     ]);
     
       
    }
    public function login( Request $request){
      $loginUserData = $request->validate([
         'email'=>'required|string|email',
         'password'=>'required|min:8'
     ]);
     $user = User::where('email',$loginUserData['email'])->first();
     if(!$user || !Hash::check($loginUserData['password'],$user->password)){
         return response()->json([
             'message' => 'Invalid Credentials'
         ],401);
     }
     $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
     return response()->json([
         'access_token' => $token,
     ]);
       
       
    }

    public function logout(){
      auth()->user()->tokens()->delete();
  
      return response()->json([
        "message"=>"logged out"
      ]);
  }


}
