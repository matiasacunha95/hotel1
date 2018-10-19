<?php

namespace hotel;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
     protected $table='boleta';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    'id',
    'id_reserva',
    'fecha_ingreso',
    'fecha_salida',
    'n_habitaciones',
    'p_habitacion',
    'total'
    ];
}
