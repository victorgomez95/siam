<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table        = "especialidades";
    protected $primaryKey   = "	id_especialidades";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'nombre',
        'Descripcion',
        'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [ ];
}
