<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use App\Http\Requests\StoreClinicaRequest;
use App\Http\Requests\UpdateClinicaRequest;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicas = Clinica::get();
        return $clinicas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $request;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClinicaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicaRequest $request)
    {
        Clinica::create($request->validated());
        
        return "Clinica creada";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function show(Clinica $clinica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinica $clinica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClinicaRequest  $request
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClinicaRequest $request, Clinica $clinica)
    {
        $clinica->update($request->validated());
        
        return "datos de clinica actualizados";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinica $clinica)
    {
        $clinica->delete();
        return "clinica eliminada de base de datos";
    }
}
