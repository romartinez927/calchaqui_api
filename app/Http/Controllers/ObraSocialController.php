<?php

namespace App\Http\Controllers;

use App\Models\ObraSocial;
use App\Http\Requests\StoreObraSocialRequest;
use App\Http\Requests\UpdateObraSocialRequest;

class ObraSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obra_social = ObraSocial::get();
        return $obra_social;
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
     * @param  \App\Http\Requests\StoreObraSocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObraSocialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObraSocial  $obraSocial
     * @return \Illuminate\Http\Response
     */
    public function show(ObraSocial $obraSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObraSocial  $obraSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(ObraSocial $obraSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObraSocialRequest  $request
     * @param  \App\Models\ObraSocial  $obraSocial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObraSocialRequest $request, ObraSocial $obraSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObraSocial  $obraSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObraSocial $obraSocial)
    {
        //
    }
}
