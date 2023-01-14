<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RetourCas;
use Illuminate\Http\Request;

class APIRetourcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RetourCas::all();
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
     * @param  \App\Models\RetourCas  $retourCas
     * @return \Illuminate\Http\Response
     */
    public function show(RetourCas $retourCas)
    {
        return $retourCas;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RetourCas  $retourCas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RetourCas $retourCas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RetourCas  $retourCas
     * @return \Illuminate\Http\Response
     */
    public function destroy(RetourCas $retourCas)
    {
        //
    }
}
