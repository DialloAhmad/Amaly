<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   
        $this->authorize('update', $user);
        return view('profil.show',compact('user'));
    }

    public function edit(User $user)
    {   
        $this->authorize('update', $user);
        return view('profil.editInfos',compact('user'));
    }

    public function update(Request $request, $id)
    {    
        $user = User::find($id);
        $this->authorize('update', $user);
         $request->validate([
            'nom' => ['required', 'string','max:25'],
            'prenom' => ['required', 'string','max:100'],
            'compagnie' => ['required', 'string','max:100'],
            'poste' => ['required', 'string','max:100'],
            'telephone' => ['required', 'numeric'],
            'ville' => ['required', 'string','max:200'],
            'quartier' => ['required', 'string','max:200'],
            'genre' => ['required', 'string'],
            'description' => ['required', 'string'],
            'email' => ['required', 'email'],
        ]);
        
        $user = User::find($id);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->description = $request->description;
        $user->compagnie = $request->compagnie;
        $user->poste = $request->poste;
        $user->email = $request->email;
        $user->quartier = $request->quartier;
        $user->genre = $request->genre;
        $user->telephone = $request->telephone;
        $user->ville = $request->ville;
        $user->save();
    
        return redirect()->route('profil',$user->id)
                        ->with('success','Utlisateur modifié avec succès');  
    }
    public function editImage(User $user)
    {   
        // $this->authorize('update', $user);
        return view('profil.editImage',compact('user'));
    }

    public function updateImage(Request $request, $id)
    {           
        $user = User::find($id);

        if($request->hasFile('photo')){
            $request->validate([
              'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $path = $request->file('photo')->store('public/images');
            $user->photo = $path;
        }else 
        {
            $path = ('public/images/user.png');
            $user->photo = $path;
        }
        $user->save();
    
        return redirect()->route('profil',$user->id)
                        ->with('success','photo de profil modifié avec succès');  
    }

    public function editPassword(User $user)
    {   
        // $this->authorize('update', $user);
        return view('profil.editPassword',compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {           
        $request->validate([
            'password' => ['required','min:8','max:100','string'],
            'password_confirm' => ['required','same:password'],
        ]);
        $user = User::find($id);
             $user->password = Hash::make($request->password);
             $user->save();   
             return redirect()->route('profil',$user->id)
             ->with('success','Mot De Passe modifié avec succès'); 
         
    }
}
