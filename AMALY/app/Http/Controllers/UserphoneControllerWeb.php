<?php

namespace App\Http\Controllers;

use App\Models\Userphone;
use Illuminate\Http\Request;

class UserphoneControllerWeb extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $data['userphones'] = Userphone::withTrashed()->oldest('nom')->get();

        return view('userphones.index',$data);
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
     * @param  \App\Models\Userphone  $userphone
     * @return \Illuminate\Http\Response
     */
    public function show(Userphone $userphone)
    {
        return view('userphones.show',compact('userphone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userphone  $userphone
     * @return \Illuminate\Http\Response
     */
    public function edit(Userphone $userphone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userphone  $userphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userphone $userphone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userphone  $userphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userphone $userphone)
    {
        $userphone->delete();
    
        return back()->with('success','L\'utilisateur a bien été mis dans la corbeille.');
                       
        
    }
    public function restore($id)
    {
        Userphone::withTrashed()->whereId($id)->firstOrFail()->restore();

        return redirect()->route('userphones.index')
                     ->with('success','Utlisateur Restauré avec succès');
    }
}
