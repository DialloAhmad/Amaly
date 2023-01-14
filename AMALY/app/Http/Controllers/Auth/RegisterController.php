<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
        {
            if (auth()->user()->profil == "Administrateur") {
                return '/';
                
            }
            return '/home';
        }
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string','max:100'],
            'compagnie' => ['required', 'string','max:100'],
            'poste' => ['required', 'string','max:100'],
            'ville' => ['required', 'string','max:200'],
            'telephone' => ['required', 'numeric'],
            'genre' => ['required', 'string'],
            'profil' => ['required', 'string'],
            'photo' => ['image','mimes:jpg,png,jpeg,gif,svg','max:10000'],
            'description' => ['required', 'string'],
            'quartier' => ['required', 'string','max:200'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
       
        $path = ('public/images/user.png');
      
       
        return User::create([
            'nom' => $data['nom'],
            'photo'=> $path,
            'prenom' => $data['prenom'],
            'poste' => $data['poste'],
            'ville' => $data['ville'],
            'description' => $data['description'],
            'quartier' => $data['quartier'],
            'telephone' => $data['telephone'],
            'genre' => $data['genre'],
            'profil' => $data['profil'],
            'compagnie' => $data['compagnie'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
