<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table        = "company";
    protected $primaryKey   = "id_company";
    public    $timestamps   = false;

    protected $fillable = [
        'id_company',
        'nombre',
        'anio_fundacion',
        'encargado',
        'ubicacion',
        'telefono',
        'mision',
        'vision',
        'fotohash'
    ];

    protected $guarded = [ ];
}
