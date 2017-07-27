<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class DocParticular extends Model
{
    protected $table        = "doc_particular";
    protected $primaryKey   = "id_doctor";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'direccion',
        'sexo',
        'cedula',
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
