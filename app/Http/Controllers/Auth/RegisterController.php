<?php

namespace SIAM\Http\Controllers\Auth;

use SIAM\User;
use SIAM\DocParticular;
use SIAM\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/logout';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|max:255',
            'apellidos' => 'required|max:255',
            'telefono'  => 'required|max:10',
            'cedula'    => 'required|max:20',
            'ubicacion' => 'required|max:50',
            'sexo' => '',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $doc_particular = new DocParticular;
        $doc_particular->nombre          = $data['name'];
        $doc_particular->apellidos       = $data['apellidos'];
        $doc_particular->telefono        = $data['telefono'];
        $doc_particular->direccion       = $data['ubicacion'];
        $doc_particular->sexo            = "N/A";//$data['sexo'];
        $doc_particular->cedula          = $data['cedula'];
        $doc_particular->save();

        Session::flash("message-error","Registrado Correctamente... hemos enviado un email a tu correo de para verificación");

        return User::create([
            'id_persona'    => $doc_particular->id_doctor,
            'tipo'          => "doc_particular",
            'email'         => $data['email'],
            'password'      => bcrypt($data['password']),
        ]);

    }

    /*protected function register(Request $request){
        $input = $request->all();
        $validator = $this->validator($input);

        if($validator->passes()){
            $data = $this->create($input)->toArray();
            $data['token'] = str_random(25);
            $user = User::find($data['id']);
            $user->token = $data['token'];
            $user->save();

            Mail::send('otros.validate_email',[],function($m) use ($data){
                $m->to($data['email'])->subject('Clinica');
            });
            Session::flash('message','Hemos enviado un email de confirmacion...');
            return Redirect::to('/login');
        }

        Session::flash('message-error',$validator->errors);
        return Redirect::to('/login');
    }

    public function confirmation($token){
        $user = User::where('token',$token)->first();
        if(!is_null($user)){
            $user->confirmed = 1;
            $user->token= "";
            $$user->save();
            Session::flash('message','Activación completada...');
            return Redirect::to('/login');
        }

        Session::flash('message-error',"Algo salio mal");
        return Redirect::to('/login');
    }*/

}
