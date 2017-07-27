<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class MatchAsistente extends Model
{
    protected $table        = "match_asistente";
    protected $primaryKey   = "id_match_asistente";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_asistente',
        'id_doctor',
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
