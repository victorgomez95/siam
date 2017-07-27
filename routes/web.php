<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',              function () {return view('index');});
Route::get('/password/reset',function () {return view('auth/passwords/reset');});
Route::get('/logout',       'LogController@logout');
Auth::routes();

/*Route::get('/employee/login',           'Auth\EmployeeLoginController@showLoginForm')->name("employee.login");
Route::POST('/employee/login',          'Auth\EmployeeLoginController@login')->name("employee.login.submit");
Route::get('/employee',                 'AdminController@index')->name("employee.dashboard");*/

Route::get('/users/confirmation/{token}',   'Auth\registerController@confirmation')->name("confirmation");
Route::POST('/register/clinica',            'Auth\ClinicaRegisterController@store');


Route::get('/register/particular'    ,function () {return view('auth/register_particular');});
Route::resource('/home'              ,'HomeController');
Route::resource('/especialidades'    ,'EspecialidesController');
Route::resource('/doctor/clinica'    ,'doc_ClinicaController');
Route::resource('/menu/enfermera'    ,'EnfermeraController');
Route::resource('/menu/asistente'    ,'AsistenteController');


Route::resource('users/menu'        ,'EmployeeController');
Route::resource('users/registro'    ,'UserController');
Route::POST('/contra'               ,'EmployeeController@update_pass');
Route::resource('pacient'           ,'PacientController');
Route::resource('users/mi_cuenta'   ,'userLogController');
Route::get('/event',                 function () {return view('events/calendar');});
Route::get('/{slug?}'               ,'LogController@notFound');


//Rutas para CRUD de Pacientes
Route::get('pacient/towns/{id}',                                                'PacientController@getTowns');
Route::get('pacient/towns/{id_estado}/localities/{id_municipio}',               'PacientController@getLocalities');
Route::get('pacient/{id_paciente}/towns/{id}',                                  'PacientController@getTowns2');
Route::get('pacient/{id_paciente}/towns/{id_estado}/localities/{id_municipio}', 'PacientController@getLocalities2');
Route::resource('pacient','PacientController');

//Rutas para CRUD de hojas de enfermería
Route::resource('nurseSheet',                   'NurseSheetController');
Route::post('nurseSheet/create/AddNurseSheet',  'NurseSheetController@addItem');
Route::get('nurseSheet/create/pdf',             'NurseSheetController@reporte');
Route::get('/nurseSheet/show/',
    [
        'uses' => 'NurseSheetController@registros_fecha', 
        'as' => 'fecha_nursesheet'
    ]);
Route::get('/nurseSheet/create/{id}',
    [
        'uses' => 'PacientController@addNurseSheet',
        'as' => 'asignar_hde'
    ]);
Route::get('nurseSheet/create/hojas', function () {
    return redirect('/nurseSheet/show');
})->name('profile');
Route::get('nurseSheet/create/pdf','NurseSheetController@reporte');