<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use Illuminate\Http\Request;

class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $codigo = Activo::latest()->first()?->codigo;
        $nuevoCodigo = $this->generarcodigo($codigo);
        Activo::create($request->all()+ ['codigo' => $nuevoCodigo]);
        return response()->json(['message' => 'Activo creado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function show(Activo $activo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function edit(Activo $activo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activo $activo)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required|unique:activos',
            'descripcion' => 'required',
            'cantidad_inicial' => 'required|numeric',
        ]);
        $activo->update($request->all());
        return response()->json(['message' => 'Activo actualizado exitosamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activo $activo)
    {
        //
    }

    public function generarcodigo( $ultimoCodigo)
    {

        if (is_null($ultimoCodigo)) {
            return "CM001";
        }
        $numero = intval(substr($ultimoCodigo, 2));
        $nuevoNumero = $numero + 1;
        $numeroFormateado = str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);
        $nuevoCodigo = "CM" . $numeroFormateado;
        return $nuevoCodigo;
    }
}
