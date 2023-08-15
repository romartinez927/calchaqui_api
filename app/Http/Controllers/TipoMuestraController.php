<?php

namespace App\Http\Controllers;

use App\Models\TipoMuestra;
use App\Http\Requests\StoreTipoMuestraRequest;
use App\Http\Requests\UpdateTipoMuestraRequest;

class TipoMuestraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_muestras = TipoMuestra::get();
        return $tipos_muestras;
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
     * @param  \App\Http\Requests\StoreTipoMuestraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoMuestraRequest $request)
    {
        TipoMuestra::create($request->validated());
        return "Tipo de muestra creada";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoMuestra  $tipo_muestra
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMuestra $tipo_muestra)
    {
        return $tipo_muestra;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoMuestra  $tipo_muestra
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMuestra $tipo_muestra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoMuestraRequest  $request
     * @param  \App\Models\TipoMuestra  $tipo_muestra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoMuestraRequest $request, TipoMuestra $tipo_muestra)
    {
        $tipo_muestra->update($request->validated());
        return "tipo de muestra actualizada";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMuestra  $tipo_muestra
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMuestra $tipo_muestra)
    {
        $tipo_muestra->delete();
        return "tipo de muestra eliminada";
    }
}
