<?php

namespace SIAM\Http\Controllers\Auth;

use Illuminate\Http\Request;
use SIAM\Http\Controllers\Controller;
use SIAM\User;
use SIAM\Http\Requests\registerClinicaRequest;
use SIAM\Clinica;
use Session;
use Redirect;

class ClinicaRegisterController extends Controller
{
    public function store (registerClinicaRequest $request){

        $Clinica = new Clinica;
        $Clinica->nombre                = $request->get('name');
        $Clinica->fundacion             = $request->get('anio_fundacion');
        $Clinica->rfc                   = $request->get('rfc');
        $Clinica->nombre_encargado      = $request->get('nombre_encargado');
        $Clinica->apellidos_encargado   = $request->get('apellidos_encargado');
        $Clinica->direccion             = $request->get('ubicacion');
        $Clinica->telefono              = $request->get('telefono');
        $Clinica->logotipo              = "N/A";
        $Clinica->sexo_encargado        = "N/A";
        $Clinica->save();
        
        /*$User = new User;
        $User->id_persona   = $Clinica->id_clinica;
        $User->email        = $request->get('email');
        $User->password     = bcrypt($request->get('password'));
        $User->tipo         = "clinica";*/

        User::create([
            'id_persona'    => $Clinica->id_clinica,
            'tipo'          => "clinica",
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
        ]);



        Session::flash("message-error","Registrado Correctamente... hemos enviado un email a tu correo de para verificación");
        return Redirect::to('/register');
        //return "Registrado Correctamente... hemos enviado un email a tu correo de para verificacion";
    }
}
