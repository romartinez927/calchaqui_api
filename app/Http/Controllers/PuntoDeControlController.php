<?php

namespace App\Http\Controllers;

use App\Models\PuntoDeControl;
use App\Http\Requests\StorePuntoDeControlRequest;
use App\Http\Requests\UpdatePuntoDeControlRequest;

class PuntoDeControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntosdecontrol = PuntoDeControl::get();
        return $puntosdecontrol;
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
     * @param  \App\Http\Requests\StorePuntoDeControlRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePuntoDeControlRequest $request)
    {
        PuntoDeControl::create($request->validated());
        return "Punto De Control Creado";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PuntoDeControl  $puntoDeControl
     * @return \Illuminate\Http\Response
     */
    public function show(PuntoDeControl $puntoDeControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PuntoDeControl  $puntoDeControl
     * @return \Illuminate\Http\Response
     */
    public function edit(PuntoDeControl $puntoDeControl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePuntoDeControlRequest  $request
     * @param  \App\Models\PuntoDeControl  $puntoDeControl
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePuntoDeControlRequest $request, PuntoDeControl $puntoDeControl)
    {
        $puntoDeControl->update($request->validated());
        return "punto de control actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PuntoDeControl  $puntoDeControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(PuntoDeControl $puntoDeControl)
    {
        $puntoDeControl->delete();
        return "punto de control eliminado";
    }
}
