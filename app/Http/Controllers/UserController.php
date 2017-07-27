<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Http\Requests\UserFormRequest;
use SIAM\Http\Controllers\UserController;
use SIAM\User;
use DB;
use Session;
use Redirect;

class UserController extends Controller
{
    public function __construct(){
    
    }

    public function index(){
        return view("users.registro.index");
    }

    public function create(){
        //return view("users.register");
    }

    public function store (UserFormRequest $request)
    {
        $usuario = new User;
        $usuario->nombre        = $request->get('nombre');
        $usuario->apellidos     = $request->get('apellidos');
        $usuario->correo        = $request->get('correo');
        $usuario->tipo_usuario  = "Administrador";
        $usuario->telefono      = $request->get('telefono');
        $usuario->password      = bcrypt($request->get('password'));
        $usuario->save();
        return Redirect::to('login');
    }
}
