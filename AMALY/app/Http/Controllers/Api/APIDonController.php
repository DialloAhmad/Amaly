<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Don;
use App\Models\Userphone;
use Illuminate\Http\Request;

class APIDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Don::all();
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
        $request->validate([
            'don' => ['required', 'string'],
            'commentaire' => ['required', 'string'],
            'telephone' => ['required', 'numeric'],
            'description' => [ 'string'],
            'quartier' => ['string'],
            'ville' => [ 'string'],
            'image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image3' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            'image4' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
        ]);
       

        $dons = new Don; 
        if($request->hasFile('image1', 'image2', 'image3', 'image4')){
            $request->validate([
                'image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image3' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
                'image4' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
            ]);
            $image1 = $request->file('image1')->getClientOriginalName();
            $image2 = $request->file('image2')->getClientOriginalName();
            $image3 = $request->file('image3')->getClientOriginalName();
            $image4 = $request->file('image4')->getClientOriginalName();
            $request->file('image1')->storeAs('public/Image_Dons', $image1);
            $request->file('image2')->storeAs('public/Image_Dons', $image2);
            $request->file('image3')->storeAs('public/Image_Dons', $image3);
            $request->file('image4')->storeAs('public/Image_Dons', $image4 );
            $dons->image1 = $image1;
            $dons->image2 = $image2;
            $dons->image3 = $image3;
            $dons->image4 = $image4;

        }else 
         {
            $dons->image1 = $request->image1;
            $dons->image2 = $request->image2;
            $dons->image3 = $request->image3;
            $dons->image4 = $request->image4;
         }
                   
        $dons->don = $request->don;
        $dons->commentaire = $request->commentaire;
        $dons->telephone = $request->telephone;
        $dons->description = $request->description;
        $dons->quartier = $request->quartier;
        $dons->ville = $request->ville;
        $dons->type = $request->type;
        $dons->cas_id = $request->cas_id;
        $dons->userphones_id = auth()->user()->id;
        $dons->save();
        return response()->json($dons);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function show(Don $don)
    {
        return Don::where('userphones_id',auth()->user()->id )->get();
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
