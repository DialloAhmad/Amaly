<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class UrlsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories']  = Category::orderBy('id', 'desc')->get();

        // $categories = Category::all();

        return view('categories.index', $data);
    
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'nom' => 'required',
        ]);
        $categories = new Category;
        $categories->nom = $request->nom;
        $categories->save();

        return redirect()->route('categories.index')
                        ->with('success','Catégorie enregistrer avec succès.');
    }
     
    /**
     * Display the specified resource.
     *
     *  @param \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $categories = Category::findOrFail($id);

        return view('categories.show');
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     *  @param \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        return view('categories.edit',compact('categories'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *  @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        $categories = new Category;
        
        $categories->nom = $request->nom;
        $categories->save();

        return redirect()->route('categories.index')
                        ->with('success','Catégorie enregistrer avec succès.');
    }

    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);

        $categories->delete();
    
        return redirect()->route('categories.index')
                        ->with('success','Catégorie supprimer avec succès');
    }
    

}
