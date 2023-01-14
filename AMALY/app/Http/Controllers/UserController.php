<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Image;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['users'] = User::withTrashed()->oldest('nom')->get();

        return view('users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'nom' => ['required', 'string','max:25'],
            'prenom' => ['required', 'string','max:100'],
            // 'statut' => ['required', 'boolean'],
            'compagnie' => ['required', 'string','max:100'],
            'poste' => ['required', 'string','max:100'],
            'telephone' => ['required', 'numeric'],
            'ville' => ['required', 'string','max:200'],
            'quartier' => ['required', 'string','max:200'],
            'genre' => ['required', 'string'],
            'profil' => ['required', 'string'],
            'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            'description' => ['required', 'string'],
            'password' => ['required','min:8','max:100','string'],
            'password_confirm' => ['required','same:password'],
            'email' => ['required', 'email'],
        ]);
        
        $user = new User;
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            ]);
            $path = $request->file('photo')->store('public/images');
            $user->photo = $path;
        }else 
        {
            $path = ('public/images/user.png');
            $user->photo = $path;
        }
        
        
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        // $user->statut = $request->statut;
        $user->description = $request->description;
        $user->compagnie = $request->compagnie;
        $user->poste = $request->poste;
        $user->email = $request->email;
        $user->profil = $request->profil;
        $user->quartier = $request->quartier;
        $user->genre = $request->genre;
        $user->telephone = $request->telephone;
        $user->ville = $request->ville;
        $user->password = Hash::make($request->password);
        
        $user->save();

        return redirect()->route('users.index')
                        ->with('success','Utilisateur enregistré avec succes.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        // $this->authorize('update', $user);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        $user = User::find($id);
        // $this->authorize('update', $user);
         $request->validate([
            'nom' => ['required', 'string','max:25'],
            'prenom' => ['required', 'string','max:100'],
            'compagnie' => ['required', 'string','max:100'],
            'poste' => ['required', 'string','max:100'],
            // 'statut' => ['required', 'boolean'],
            'telephone' => ['required', 'numeric'],
            'ville' => ['required', 'string','max:200'],
            'quartier' => ['required', 'string','max:200'],
            'genre' => ['required', 'string'],
            'profil' => ['required', 'string'],
            'description' => ['required', 'string'],
            // 'password' => ['required','min:8','max:100','string'],
            // 'password_confirm' => ['required','same:password'],
            'email' => ['required', 'email'],
        ]);
        
        $user = User::find($id);

        if($request->hasFile('photo')){
            $request->validate([
              'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $path = $request->file('photo')->store('public/images');
            $user->photo = $path;
        }

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->description = $request->description;
        $user->compagnie = $request->compagnie;
        $user->poste = $request->poste;
        $user->email = $request->email;
        $user->profil = $request->profil;
        $user->quartier = $request->quartier;
        $user->genre = $request->genre;
        $user->telephone = $request->telephone;
        $user->ville = $request->ville;
        $user->save();
    
        return redirect()->route('users.index')
                        ->with('success','Utlisateur modifié avec succès');  
    }
    public function statut($id)
    {
        $user = User::find($id);
        if($user->statut==1){
            $user->statut=0;
            $user->save();
            return redirect()->route('users.index')
                         ->with('success','Utlisateur Désactivé avec succès');
        }else{
            $user->statut=1;
            $user->save();
            return redirect()->route('users.index')
                         ->with('success','Utlisateur Activé avec succès');
        }
                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return back()->with('success','L\'utilisateur a bien été mis dans la corbeille.');
                       
        
    }
    public function forceDestroy($id)
        {
            User::withTrashed()->whereId($id)->firstOrFail()->forceDelete();

            return back()->with('success', 'L\'utilisateur a bien été supprimé définitivement dans la base de données.');
        }

        public function restore($id)
        {
            User::withTrashed()->whereId($id)->firstOrFail()->restore();

            return redirect()->route('users.index')
                         ->with('success','Utlisateur Restauré avec succès');
        }
        
}

        
