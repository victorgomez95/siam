<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    protected $table        = "asistente";
    protected $primaryKey   = "id_asistente";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'sexo',
        'telefono',
        'direccion',
        'escolaridad',
        'hora_entrada',
        'hora_salida',
        'estado',
        'fotohash',
        'fecha_nac',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [ ];
}
