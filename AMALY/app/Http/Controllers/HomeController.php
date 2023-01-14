<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    use AuthenticatesUsers;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     */
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if (auth()->user()->profil == "Administrateur") {
            $path='/pages/dashboard';    
        }else if (auth()->user()->profil == "Demandeur"){
            $path='/homeDemandeur';
        }else if (auth()->user()->profil == "ONG"){
            $path='/homeONG';
        }
        return view($path);
    }
}
