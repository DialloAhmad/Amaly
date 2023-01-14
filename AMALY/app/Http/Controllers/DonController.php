<?php

namespace App\Http\Controllers;

use App\Models\Don;
use App\Models\Cas;
use App\Models\Userphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['dons'] = Don::all();

        return view('dons.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function show(Don $dons, $id)
    {
        $dons = Don::findOrFail($id);

        //recuperation du titre du cas
        $cas = $dons->cas->titre;  

        //recuperation des infos de l'utilisateur
        $userphones = $dons->userphones->nom;
        // $userphones = $dons->userphones->prenom; 

        return view('dons.show',compact('dons', 'cas'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function edit(Don $don)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Don $don)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function destroy(Don $don)
    {
        //
    }
}
