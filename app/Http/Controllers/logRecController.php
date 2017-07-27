<?php

namespace SIAM\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
Use Auth;
Use Session;
Use Redirect;
Use SIAM\State;
use SIAM\Http\Requests\LoginRecRequest;
Use Mail;

class logRecController extends Controller
{
    public function index(){
        return view("rec_pass");
    }
    public function store(LoginRecRequest $request)
    {
        
        Mail::send('otros.rec_pass',$request->all(),function($msj){
            $msj->subject("Recuperacion de contraseña - Mont&Go Sofware");
            $msj->to("gmvo139626@upemor.edu.mx");
        });

        Session::flash("mensaje","Mensaje enviado correctamente");
        return Redirect::to('/login');
    }
}
