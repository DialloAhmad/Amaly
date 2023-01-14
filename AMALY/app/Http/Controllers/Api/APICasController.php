<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cas;
use Illuminate\Http\Request;

class APICasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cas::where('statut', 1)->get();
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
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function show(Cas $cas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function edit(Cas $cas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cas $cas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cas $cas)
    {
        //
    }
}
