<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Employee;
use SIAM\Http\Requests\EmployeeFormRequest;
use SIAM\Http\Requests\EmployeeEditRequest;
use SIAM\Http\Requests\EmployeeEditPassRequest;
use SIAM\Http\Controllers\EmployeeController;
use SIAM\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Mail;


class EmployeeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {   //index -> primer metodo a llamar
        if ($request)
        {
            $user = Auth::user();
            $id = Auth::id();

            $query=trim($request->get('searchText'));

            $employees=DB::table('employees')
            ->join('users','employees.id_user','=','users.id')
            ->select('employees.id','employees.name',
                     'employees.apellidos','employees.telefono',
                     'employees.email','employees.password',
                     'employees.tipo_usuario','employees.fecha_nac',
                     'employees.fecha_reg','employees.estado',
                     'employees.fotohash','employees.sexo')
            ->where('employees.estado'      ,'=','Activo')
            ->where('employees.email'      ,'LIKE','%'.$query.'%')
            
            ->orderBy('employees.id','asc')
            ->paginate(8);
            
            return view('users.menu.index',["employees"=>$employees,"searchText"=>$query]);
        }
    }
    
    //create new catagoria -> page
    public function create(){
        return view("users.menu.create");
    }

    //method -> POST
    public function store (EmployeeFormRequest $request){

        $user = Auth::user();
        $id = Auth::id();

        $employee = new employee;
        $employee->id_user      = $id;
        $employee->name         = $request->get('name');
        $employee->apellidos    = $request->get('apellidos');
        $employee->telefono     = $request->get('telefono');
        $employee->sexo         = $request->get('sexo');
        $employee->email        = $request->get('email');
        $employee->direccion    = $request->get('direccion');
        $employee->password     = bcrypt($request->get('password'));
        $employee->tipo_usuario = $request->get('tipo_usuario');
        $employee->especialidad = $request->get('especialidad');
        $employee->cedula       = $request->get('cedula');
        $employee->fecha_nac    = $request->get('fecha_nac');


        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $employee->fotohash = $file->getClientOriginalName();
            
        }else{
            $employee->fotohash = "N/A";
        }


        $mytime = Carbon::now('America/Mexico_City');
        $employee->fecha_reg    =$mytime->toDateString();
        $employee->estado       = 'Activo';

        $employee->save();

        /*Mail::send('registro',[],function($m) use ($data){
            $m->to($data['email'])->subject('Clinica');
        })*/
        return Redirect::to('users/menu');
    }
    
    public function show($id){
        return view("users.menu.show",["employee"=>employee::findOrFail($id)]);
    }

    public function edit($id){
        return view("users.menu.edit",["employee"=>employee::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(EmployeeEditRequest $request,$id){

        $employee = employee::findOrFail($id);
        $employee->name         = $request->get('name');
        $employee->apellidos    = $request->get('apellidos');
        $employee->telefono     = $request->get('telefono');
        $employee->direccion    = $request->get('direccion');
        $employee->tipo_usuario = $request->get('tipo_usuario');
        $employee->especialidad = $request->get('especialidad');
        $employee->sexo         = $request->get('sexo');
        $employee->fecha_nac    = $request->get('fecha_nac');

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $employee->fotohash = $file->getClientOriginalName();
        }

        $employee->update();
        return Redirect::to('users/menu');
    }

    public function update_pass(Request $request){
        //Algo esta mal aqui no se que como buscas al usuario o lo que haces
        //asi obtienes los valores que envio por ajax
        //$request->pass_user
        //$request->pass_new
        //$request->pass_new1
        //a lo que entiendo buscas al admin
        //luego cambis las contraseñas

        //en los metodos ajax solo haces return pero regresas un valor numero o palabra arrerrglo o X pero nunca regresas a auna vista
        //en tu vista de modal tengo un alert(data) data lleva el valor que devolviste
        // no se que hacer aqui porque no se para que sirve el auth la verdad nunca lo ocupamos haciamos nuestro propio login haci que aqui tendriasss que ver como saber que si es el usuario que quieres o enviarte el ID
        //$pass = Auth::password();
        if($request->get('new_pass') == $request->get('new_pass1')){
            $employee           = employee::findOrFail($request->get('id_user'));
            $employee->password = bcrypt($request->get('new_pass'));
            $employee->save();
            return "Actualización correcta";
            //return Redirect::to('users/menu');
        }else{
            return "Las contraseñas no coinciden";
            //Session::flash('message-error','La contraseña es incorrecta. Verifique sus datos e inténtalo de nuevo...');
        }
        //return Redirect::to('users/menu');
        
    }

    public function destroy($id){
        $empleado=employee::findOrFail($id);
        $empleado->estado='Inactivo';
        $empleado->update();
        return Redirect::to('users/menu');
    }


}
