<?php

namespace hotel\Http\Controllers\Secretaria;

use hotel\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class S_reporteventaController extends Controller
{
  public function index()
	{
			return view('');
	}



  public function busqueda (Request $request)//Funcion que genera un reporte de ventas asociado  las reservas de cierto hotel  dentro de cierta fecha.
  {

          $reserva=DB::table('reserva')//Consulta que obtiene los anuncios que cumple con las condiciones (región y fecha) dadas por la secretaria
          ->join('habitacion', 'habitacion.id', '=', 'reserva.id_habitacion')
          ->join('users', 'users.id', '=', 'reserva.id_users')
          ->select('reserva.id','habitacion.tipo_habitacion','users.name','reserva.costo','reserva.fecha_ingreso','reserva.fecha_salida')
          ->where([                                                           //condicionamos si la fecha de ingreso consultada esta entre medio de la fecha de ingreso con la de salida de las ya reservaa
                      ['reserva.estado', '=', 1],
                      ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                      ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                      ])
          ->orwhere([                                                         //condicionamos si la fecha de salida consultada esta entre medio de la fecha de ingreso con la de salida de las ya reservada
                      ['reserva.estado', '=', 1],
                      ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                      ['reserva.fecha_salida', '>', $request->fecha_salida],
                      ])
          ->orwhere([                                                         //condicionamos si la fecha de ingreso y salida de la consulta coincide con la de las reservadas
                      ['reserva.estado', '=', 1],
                      ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                      ['reserva.fecha_salida', '=', $request->fecha_salida],
                      ])
          ->orwhere([   
                      ['reserva.estado', '=', 1],                                                      //condicionamos si solo reserva un dia
                      ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                      ])
          ->orwhere([
                      ['reserva.estado', '=', 1],
                      ['reserva.fecha_salida', '=', $request->fecha_salida],
                      ])
          ->orwhere([ 
                      ['reserva.estado', '=', 1],                                                       //condicionamos si la fecha consultada contiene a una fecha ya reservada
                      ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                      ['reserva.fecha_salida', '<', $request->fecha_salida],
                      ])

          ->get();

          $costo=DB::table('reserva')//Consulta que obtiene los anuncios que cumple con las condiciones (región y fecha) dadas por la secretaria
          ->select('reserva.costo')
          ->where([                                                           //condicionamos si la fecha de ingreso consultada esta entre medio de la fecha de ingreso con la de salida de las ya reservaa
                      ['reserva.estado', '=', 1],
                      ['reserva.fecha_ingreso', '<', $request->fecha_ingreso],
                      ['reserva.fecha_salida', '>', $request->fecha_ingreso],
                      ])
          ->orwhere([                                                         //condicionamos si la fecha de salida consultada esta entre medio de la fecha de ingreso con la de salida de las ya reservada
                      ['reserva.estado', '=', 1],
                      ['reserva.fecha_ingreso', '<', $request->fecha_salida],
                      ['reserva.fecha_salida', '>', $request->fecha_salida],
                      ])
          ->orwhere([                                                         //condicionamos si la fecha de ingreso y salida de la consulta coincide con la de las reservadas
                      ['reserva.estado', '=', 1],
                      ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                      ['reserva.fecha_salida', '=', $request->fecha_salida],
                      ])
          ->orwhere([    
                      ['reserva.estado', '=', 1],                                                     //condicionamos si solo reserva un dia
                      ['reserva.fecha_ingreso', '=', $request->fecha_ingreso],
                      ])
          ->orwhere([
                      ['reserva.estado', '=', 1],
                      ['reserva.fecha_salida', '=', $request->fecha_salida],
                      ])
          ->orwhere([  
                      ['reserva.estado', '=', 1],                                                      //condicionamos si la fecha consultada contiene a una fecha ya reservada
                      ['reserva.fecha_ingreso', '>', $request->fecha_ingreso],
                      ['reserva.fecha_salida', '<', $request->fecha_salida],
                      ])
          ->get();
          $i =count($costo);
          $a= 0;
          $total=0;
          while ($a < $i){
           $total += $costo[$a]->costo;
           $a++;
        }
        //dd($total);



          //return view('admin.fechas')->with('reserva', $reserva)->with('total', $total);

          $pdf = PDF::loadView('secretaria.fechas', compact('reserva','total'));
          return $pdf->download('reserva.pdf');


  }


}
