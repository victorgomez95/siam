<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Funcion que valida que los datos del login sean correctos
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['correo' => $request['email'],'password' => $request['password']])){
        //Se redirecciona a la página principal del sistema donde se mostrará el mensaje de confirmación
        return Redirect::to('company');
        }
        else{
          Session::flash('message-error','La contraseña es incorrecta. Verifique sus datos e inténtalo de nuevo...');
          return Redirect::to('/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        Return Redirect::to('/');
    }

    public function notFound(){
        return (Auth::guest()) ?  view('otros.404_in') : view('otros.404_out');
    }
}
