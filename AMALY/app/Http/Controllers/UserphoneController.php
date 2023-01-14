<?php

namespace App\Http\Controllers;
use App\Models\Userphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return Userphone::withTrashed()->oldest('id')->get();
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     Userphone::create($request->all());
    //     $request->validate([
    //         'nom' => ['required', 'string','max:25'],
    //         'prenom' => ['required', 'string','max:100'],
    //         'telephone' => ['required', 'numeric'],
    //         'genre' => ['required', 'string'],
    //         'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
    //         'password' => ['required','min:8','max:100','string'],
    //         'password_confirm' => ['required','same:password'],
    //         'email' => ['required', 'email'],
    //     ]);
        
    //     $userphone = new Userphone;
    //     if($request->hasFile('photo')){
    //         $request->validate([
    //             'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
    //         ]);
    //         $path = $request->file('photo')->store('public/images');
    //         $userphone->photo = $path;
    //     }else 
    //     {
    //         $path = ('public/images/user.png');
    //         $userphone->photo = $path;
    //     }
                       
    //     $userphone->nom = $request->nom;
    //     $userphone->prenom = $request->prenom;
    //     $userphone->email = $request->email;
    //     $userphone->genre = $request->genre;
    //     $userphone->telephone = $request->telephone;
    //     $userphone->password = Hash::make($request->password);
    //     $userphone->save();
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userphone  $userphone
     * @return \Illuminate\Http\Response
     */
    public function show(Userphone $userphone)
    {   
        return $userphone;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userphone  $userphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $userphone = Userphone::find($id);
        $request->validate([
            'nom' => ['required', 'string','max:25'],
            'genre' => ['required', 'string'],
            'prenom' => ['required', 'string','max:100'],           
            'telephone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
        ]);
        $userphone->update($request->toArray());
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:4000',
            ]);
            $path = $request->file('photo')->store('public/images');
            $userphone->photo = $path;
        }else 
        {
            $path = ('public/images/user.png');
            $userphone->photo = $path;
        }
        return response()->json($userphone);
    }
    public function UpdateImage(Request $request, $id)
    {           
        $userphone = Userphone::find($id);
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
        ]);
        if($request->hasFile('photo')){
            $request->validate([
              'photo' => '|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $path = $request->file('photo')->store('public/images');
            $userphone->photo = $path;
        }else 
        {       
            $path = ('public/images/user.png');
            $userphone->photo = $path;
        }
        $userphone->save();
        $response = ['message' => 'You have been added picture!'];
        return response($response, 200);
    }
    public function updatePassword(Request $request, $id)
    {           
        $request->validate([
            'password' => ['required','min:8','max:100','string'],
            'password_confirmation' => ['required','same:password'],
        ]);
        $userphone = Userphone::find($id);
             $userphone->password = Hash::make($request->password);
             $userphone->save();  
             $response = ['message' => 'You have been updated your password!'];
        return response($response, 200); 
             
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
       $response = ['message' => 'You have been deleted!'];
        return response($response, 200);
    }
}
