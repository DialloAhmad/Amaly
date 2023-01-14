<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cas;
use App\Models\RetourCas;
use Illuminate\Http\Request;
use Image;

class UrlsRetourCasController extends Controller
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
    
    public function index()
    {
        $data['retour_cas'] = RetourCas::withTrashed()->oldest('titre')->get();

        return view('retour_cas.index', $data);
        

    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cas = Cas::all();

        return view('retour_cas.create', compact('cas'));
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
            'titre' => 'required',
            'image1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image4' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'description' => 'required',
            'ville' => 'required|string|max:30',
            'quartier' => 'required|string|max:30',
        ]);
        $image1 = $request->file('image1')->getClientOriginalName();
        $image2 = $request->file('image2')->getClientOriginalName();
        $image3 = $request->file('image3')->getClientOriginalName();
        $image4 = $request->file('image4')->getClientOriginalName();

        $request->file('image1')->storeAs('public/Image_RetourCas', $image1);
        $request->file('image2')->storeAs('public/Image_RetourCas', $image2);
        $request->file('image3')->storeAs('public/Image_RetourCas', $image3);
        $request->file('image4')->storeAs('public/Image_RetourCas', $image4);

        $retour_cas = new RetourCas;
        $retour_cas->titre = $request->titre;
        $retour_cas->image1 = $image1;
        $retour_cas->image2 = $image2;
        $retour_cas->image3 = $image3;
        $retour_cas->image4 = $image4;
        $retour_cas->ville = $request->ville;
        $retour_cas->quartier = $request->quartier;
        $retour_cas->description = $request->description;
        $retour_cas->cas_id = $request->cas_id;
        $retour_cas->users_id = auth()->user()->id;
        $retour_cas->save();

        return redirect()->route('retour_cas.index')
                        ->with('success','Retour cas enregistrer avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RetourCas $retour_cas, $id)
    {
        $retour_cas = RetourCas::findOrFail($id);

        //liaison avec les cas
        $cas = $retour_cas->cas->titre;

        //liaison avec les utilisateurs

        $users = $retour_cas->users->photo;
        $users = $retour_cas->users->nom;
        $users = $retour_cas->users->prenom; 

        return view('retour_cas.show',compact('retour_cas', 'cas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $retour_cas = RetourCas::findOrFail($id);

        if($retour_cas->statut==1){
            return redirect()->route('indexONG')
                            ->with('success', 'Impossible de modifier un cas déjà publié');
        }

        return view('retour_cas.edit',compact('retour_cas'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'image1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image4' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'description' => 'required',
            'ville' => 'required|string|max:30',
            'quartier' => 'required|string|max:30', 
        ]);

        $image1 = $request->file('image1')->getClientOriginalName();
        $image2 = $request->file('image2')->getClientOriginalName();
        $image3 = $request->file('image3')->getClientOriginalName();
        $image4 = $request->file('image4')->getClientOriginalName();

        $retour_cas = RetourCas::find($id);

        if($request->hasFile('image1', 'image2', 'image3', 'image4')){
            $request->validate([
                'image1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image4' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            ]);
            $request->file('image1')->storeAs('public/Image_RetourCas', $image1);
            $request->file('image2')->storeAs('public/Image_RetourCas', $image2);
            $request->file('image3')->storeAs('public/Image_RetourCas', $image3);
            $request->file('image4')->storeAs('public/Image_RetourCas', $image4);
            $retour_cas->image1 = $image1;
            $retour_cas->image2 = $image2;
            $retour_cas->image3 = $image3;
            $retour_cas->image4 = $image4;

        }
        $retour_cas->titre = $request->titre;
        $retour_cas->image1 = $image1;
        $retour_cas->image2 = $image2;
        $retour_cas->image3 = $image3;
        $retour_cas->image4 = $image4;
        $retour_cas->ville = $request->ville;
        $retour_cas->quartier = $request->quartier;
        $retour_cas->description = $request->description;
        $retour_cas->users_id = auth()->user()->id;
        $retour_cas->save();

        return redirect()->route('indexONG')
                        ->with('success','Retour modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function statut($id)
    {
        $retour_cas = RetourCas::findOrFail($id);

        if($retour_cas->statut==1){
            $retour_cas->statut=0;
            $retour_cas->save();
            return redirect()->route('retour_cas.index')
                            ->with('success', 'Retour cas désactiver avec succès');
        }else{
            $retour_cas->statut=1;
            $retour_cas->save();
            return redirect()->route('retour_cas.index')
                            ->with('success', 'Retour cas activer avec succès');
        }
        
        
        return redirect()->route('retour_cas.index')
                        ->with('success','Retour cas supprimer avec succès');
    }

    public function destroy($id)
    {
        $retour_cas = RetourCas::findOrFail($id);

        $retour_cas->delete();
    
        return redirect()->route('retour_cas.index')
                        ->with('success','Retour cas supprimer avec succès');
    }
    public function forceDestroy($id)
        {
            // RetourCas::withTrashed()->whereId($id)->firstOrFail()->forceDelete();

            return back()->with('success', 'Et si on décidait de ne pas définitivement supprimé les données ? On n\'a rien à perdre');
        }

    public function restore($id)
        {
            RetourCas::withTrashed()->whereId($id)->firstOrFail()->restore();

            return back()->with('success', 'Le retour de cas a bien été restauré.');
        }
    public function indexONG()
    {
        $data['retour_cas'] =RetourCas::where([
            ['users_id', auth()->user()->id],
            ])->get();
        return view('retour_cas.indexRetour', $data);      
    }
}
