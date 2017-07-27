<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $table        = "clinica";
    protected $primaryKey   = "id_clinica";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'rfc',
        'telefono',
        'nombre_encargado',
        'apellidos_encargado',
        'sexo_encargado',
        'logitipo',
        'fundacion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [ ];
}
