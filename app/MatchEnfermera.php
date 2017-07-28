<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class MatchEnfermera extends Model
{
    protected $table        = "match_enfermera";
    protected $primaryKey   = "id_match_enfermera";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_enfermera',
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
