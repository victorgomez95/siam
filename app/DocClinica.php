<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class DocClinica extends Model
{
    protected $table        = "doc_clinica";
    protected $primaryKey   = "id_doctor";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_clinica',
        'nombre',
        'apellidos',
        'telefono',
        'direccion',
        'sexo',
        'cedula',
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
