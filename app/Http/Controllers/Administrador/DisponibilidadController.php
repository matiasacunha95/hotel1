<?php

namespace hotel\Http\Controllers\Administrador;

use hotel\Http\Controllers\Controller;
use hotel\Reserva;
use hotel\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DisponibilidadController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function buscador(Request $request)
    {


        // aca realizamos la busqueda de las habitacion segun los campos proporcionados por el cliente

        $habitacion = DB::table('habitacion')
                      ->join('hotel', 'hotel.id', '=', 'habitacion.id_hotel')
                      ->join('ciudad', 'ciudad.id', '=', 'hotel.id_ciudad')
                      ->join('pais', 'pais.id', '=', 'ciudad.id_pais')
                      ->select('habitacion.id', 'hotel.nombre_hotel','ciudad.nombre_ciudad', 'habitacion.tipo_habitacion', 'habitacion.capacidad', 'habitacion.precio','habitacion.cantidad')

                      ->where([
                            ['hotel.nombre_hotel', '=', $request->nombre_hotel],
                            ['ciudad.nombre_ciudad', '=', $request->nombre_ciudad],
                             ['pais.nombre_pais', '=', $request->nombre_pais],
                             ['habitacion.estado', '=', 1]
                            ])

                      ->get();

        return view('admin.disponibilidad.buscador_regi',compact('habitacion'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reserva.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {

        for ($i=0; $i < $request->cantidad; $i++) {
            $reserva = new Reserva();
            $reserva->id_users = $request->input('id_users');
            $reserva->id_habitacion = $request->input('id_habitacion');
            $reserva->num_personas = $request->input('num_personas');
            $reserva->costo = 1;
            $reserva->fecha_ingreso = $request->input('fecha_ingreso');
            $reserva->fecha_salida = $request->input('fecha_salida');
            $reserva->estado = $request->input('estado');
            $reserva->save();
        }
                                    
        return view('admin.disponibilidad.guardado');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
   {
        $habitacion = DB::table('habitacion')
                      ->where('habitacion.id', $id)->first();

        return view('admin.disponibilidad.reservar', compact('habitacion'));

    }

}
