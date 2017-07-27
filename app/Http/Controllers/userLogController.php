<?php

namespace SIAM\Http\Controllers;
use SIAM\User;
use DB;
use Session;
use Mail;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SIAM\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Input;


class userLogController extends Controller
{
    public function __construct(){
    
    }

    public function index(){
        return view("users.mi_cuenta.index",["user"=>User::findOrFail(Auth::id())]);
    }

    public function edit($id){
        return view("users.mi_cuenta.edit",["user"=>User::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(UserEditRequest $request,$id){
        $User = User::findOrFail($id);
        $User->name             = $request->get('name');
        $User->apellidos        = $request->get('apellidos');
        $User->telefono         = $request->get('telefono');
        $User->direccion        = $request->get('direccion');
        $User->sexo             = $request->get('sexo');
        $User->fecha_nac        = $request->get('fecha_nac');

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $User->fotohash = $file->getClientOriginalName();
        }
        
        $User->update();
        return Redirect::to('users/mi_cuenta');
    }

    public function destroy($id){
        $user=User::findOrFail($id);
        $user->delete();
        Mail::send('registro',[],function($m) use ($data){
            $m->to($data['email'])->subject('Clinica');
        });
        Session::flash("mensaje","Gracias por usar Medical Solucions! ... En un momento mas enviaremos un Email a tu correo.");

        return Redirect::to('/logout');
    }
}
