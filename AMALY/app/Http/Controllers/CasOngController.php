<?php

namespace App\Http\Controllers;

use App\Models\Cas;
use App\Models\Category;
use Illuminate\Http\Request;

class CasOngController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cas'] =Cas::where([
            ['users_id', auth()->user()->id],
            ])->get();
        return view('casONG.indexCas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('cas.create', compact('categories'));
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
            'numero' => 'required|min:9',
            'montant' => 'required',
        ]);
        $image1 = $request->file('image1')->getClientOriginalName();
        $image2 = $request->file('image2')->getClientOriginalName();
        $image3 = $request->file('image3')->getClientOriginalName();
        $image4 = $request->file('image4')->getClientOriginalName();

        $request->file('image1')->storeAs('public/Image_Cas', $image1);
        $request->file('image2')->storeAs('public/Image_Cas', $image2);
        $request->file('image3')->storeAs('public/Image_Cas', $image3);
        $request->file('image4')->storeAs('public/Image_Cas', $image4);

        $cas = new Cas;
        $cas->titre = $request->titre;
        $cas->categories_id = $request->categories_id;
        $cas->description = $request->description;
        $cas->image1 = $image1;
        $cas->image2 = $image2;
        $cas->image3 = $image3;
        $cas->image4 = $image4;
        $cas->ville = $request->ville;
        $cas->quartier = $request->quartier;
        $cas->numero = $request->numero;
        $cas->montant = $request->montant;
        $cas->users_id = auth()->user()->id;
        $cas->save();
            
        
        return redirect()->route('Mescas.index')
                        ->with('success','Cas enregistrer avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function show(Cas $cas, $id)
    {
        $cas = Cas::findOrFail($id);

        //recuperation du nom de la catégorie
        $categories = $cas->categories->nom;  

        //recuperation des infos de l'utilisateur
        $users = $cas->users->photo;
        $users = $cas->users->nom;
        $users = $cas->users->prenom; 

        return view('cas.show',compact('cas', 'categories'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cas = Cas::findOrFail($id);

        $categories = Category::all();

        if($cas->statut==1){
            return redirect()->route('Mescas.index')
                            ->with('success', 'Impossible de modifier un cas déjà publié');
        }


        return view('cas.edit',compact('cas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cas  $cas
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
            'numero' => 'required|min:9',
            'montant' => 'required',
        ]);
        
        $image1 = $request->file('image1')->getClientOriginalName();
        $image2 = $request->file('image2')->getClientOriginalName();
        $image3 = $request->file('image3')->getClientOriginalName();
        $image4 = $request->file('image4')->getClientOriginalName();

        $cas = Cas::find($id);
        if($request->hasFile('image1', 'image2', 'image3', 'image4')){
            $request->validate([
                'image1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image4' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            ]);
            $request->file('image1')->storeAs('public/Image_Cas', $image1);
            $request->file('image2')->storeAs('public/Image_Cas', $image2);
            $request->file('image3')->storeAs('public/Image_Cas', $image3);
            $request->file('image4')->storeAs('public/Image_Cas', $image4 );
            $cas->image1 = $image1;
            $cas->image2 = $image2;
            $cas->image3 = $image3;
            $cas->image4 = $image4;

        }
        $cas->titre = $request->titre;
        $cas->description = $request->description;
        $cas->image1 = $image1;
        $cas->image2 = $image2;
        $cas->image3 = $image3;
        $cas->image4 = $image4;
        $cas->ville = $request->ville;
        $cas->quartier = $request->quartier;
        $cas->numero = $request->numero;
        $cas->montant = $request->montant;
        $cas->users_id = auth()->user()->id;
        $cas->save();
        return redirect()->route('Mescas.index')
                        ->with('success','Cas modifier avec succès');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cas = Cas::findOrFail($id);

        $cas->delete();
    
        return redirect()->route('cas.index')
                        ->with('success','Cas supprimer avec succès');
    }
}
