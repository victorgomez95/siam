<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class MatchEspecialidades extends Model
{
    protected $table        = "match_especialidad";
    protected $primaryKey   = "id_match";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_doctor',
        'id_especialidades',
        'tabla',
        'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [ ];
}
