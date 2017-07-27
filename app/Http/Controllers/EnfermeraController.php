<?php

namespace SIAM\Http\Controllers;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Enfermera;
use SIAM\Http\Requests\Asis_Enf_Request;
use SIAM\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Mail;

class EnfermeraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {   //index -> primer metodo a llamar
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $enfermera = DB::table('enfermera')
                ->where('nombre','LIKE','%'.$query.'%')
                ->where('estado','=','Activo')
                ->orderBy('id_enfermera','desc')
                ->paginate(20);
            return view('personal.enfermera.index',["enfermera"=>$enfermera,"searchText"=>$query]);
        }
    }
    
    //create new catagoria -> page
    public function create(){
        return view("personal.enfermera.create");
    }

    //method -> POST
    public function store (Asis_Enf_Request $request){
        $enfermera = new Enfermera;
        $enfermera->nombre       = $request->get('nombre');
        $enfermera->apellidos    = $request->get('apellidos');
        $enfermera->telefono     = $request->get('telefono');
        $enfermera->sexo         = $request->get('sexo');
        $enfermera->direccion    = $request->get('direccion');
        $enfermera->escolaridad  = $request->get('escolaridad');
        $enfermera->hora_entrada = $request->get('hora_entrada');
        $enfermera->hora_salida  = $request->get('hora_salida');
        $enfermera->estado       = 'Activo';
        $enfermera->fecha_nac    = $request->get('fecha_nac');
        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $enfermera->fotohash = $file->getClientOriginalName();
        }else{
            $enfermera->fotohash = "N/A";
        }
        $enfermera->save();

        User::create([
            'id_persona'    => $enfermera->id_enfermera,
            'tipo'          => "enfermera",
            'email'         => $request->get('email'),
            'password'      => bcrypt($request->get('password')),
        ]);

        /*Mail::send('registro',[],function($m) use ($data){
            $m->to($data['email'])->subject('Clinica');
        })*/
        return Redirect::to('menu/enfermera');
    }
    
    public function show($id){
        return view("users.menu.show",["employee"=>employee::findOrFail($id)]);
    }

    public function edit($id){
        return view("personal.enfermera.edit",["enfermera"=>Enfermera::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(Request $request,$id){

        $enfermera = Enfermera::findOrFail($id);
        $enfermera->nombre       = $request->get('nombre');
        $enfermera->apellidos    = $request->get('apellidos');
        $enfermera->telefono     = $request->get('telefono');
        $enfermera->sexo         = $request->get('sexo');
        $enfermera->direccion    = $request->get('direccion');
        $enfermera->escolaridad  = $request->get('escolaridad');
        $enfermera->hora_entrada = $request->get('hora_entrada');
        $enfermera->hora_salida  = $request->get('hora_salida');
        $enfermera->fecha_nac    = $request->get('fecha_nac');

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $enfermera->fotohash = $file->getClientOriginalName();
        }
        $enfermera->update();
        return Redirect::to('menu/enfermera');
    }

    public function update_pass(Request $request){
        if($request->get('new_pass') == $request->get('new_pass1')){
            $enfermera = User::where('tipo', "enfermera")->where('id_persona', $request->get('id_user'))->firstOrFail();
            $enfermera->password = bcrypt($request->get('new_pass'));
            $enfermera->save();
            return "Actualización correcta";
            //return Redirect::to('users/menu');
        }else{
            return "Las contraseñas no coinciden";
            //Session::flash('message-error','La contraseña es incorrecta. Verifique sus datos e inténtalo de nuevo...');
        }
        //return Redirect::to('users/menu');
        
    }

    public function destroy($id){
        $enfermera=Enfermera::findOrFail($id);
        $enfermera->estado='Inactivo';
        $enfermera->update();
        return Redirect::to('menu/enfermera');
    }

}
