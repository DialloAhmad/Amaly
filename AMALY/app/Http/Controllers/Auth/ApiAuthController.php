<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Userphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{   
    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:userphones',
            'password' => 'required|string|min:6|confirmed',
            'telephone' => ['required', 'numeric'],
            'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            'genre' => ['required', 'string'],
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $userphone = new Userphone;
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            ]);
            $path = $request->file('photo')->store('public/images');
            $userphone->photo = $path;
         }else 
         {
            $path = ('public/images/user.png');
            $userphone->photo = $path;
         }
         $userphone->nom = $request->nom;
        $userphone->prenom = $request->prenom;
        $userphone->email = $request->email;
        $userphone->genre = $request->genre;
        $userphone->telephone = $request->telephone;
        $userphone->remember_token = $request->remember_token;
        $userphone->password = Hash::make($request->password);
        $userphone->save();
        $token = $userphone->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);
    }
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = Userphone::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }
    }
    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
    public function me()
    {
        return response()->json(auth()->user());
    }
}
