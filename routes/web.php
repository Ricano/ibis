<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
Auth::routes();

Route::get('/', function () {
    return redirect('ibis');
});


Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin', 'HomeController@admin')->name('admin');

Route::prefix('ibis')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        //      CREATE CLASSES
        Route::get('',                      'GroupController@index');
        Route::get('create-class',          'GroupController@create');
        Route::get('create-class/{course}', 'GroupController@createAjax');
        Route::post('',                     'GroupController@store');
        Route::get('{group}',               'GroupController@show');
        Route::get('{group}/edit',          'GroupController@edit');
        Route::put('{group}',               'GroupController@update');
        Route::delete('{group}',            'GroupController@destroy');


        //  REMOVE TEACHERS ONLY FROM CLASS
        Route::get('{group}/users/{user}/info',      'UserController@show');
        Route::delete('{group}/users/{user}/delete', 'GroupController@detach');


        // MEETINGS ROUTES
        Route::get('{group}/choose-meeting',     'MeetingController@choose');
        Route::get('{group}/create-meeting/{meetingType}', 'MeetingController@create');
        Route::post('{group}/create-meeting',    'MeetingController@store');
        Route::put('{group}/meetings/{meeting}','MeetingController@update');
        Route::get('{group}/meetings/{meeting}', 'MeetingController@show');

        // ATAS ROUTES
        Route::get('{group}/meetings/{meeting}/ata/{meetingType}', 'AtaController@create');

        Route::post('{group}/meetings/{meeting}/save-ata-recuperacao', 'AtaController@storeRecuperacao');
        Route::post('{group}/meetings/{meeting}/save-ata-pedagogica', 'AtaController@storePedagogica');

        Route::put('{group}/meetings/{meeting}/update-ata-atividades', 'AtaController@updateAtividades');
        Route::put('{group}/meetings/{meeting}/update-ata-local', 'AtaController@updateLocal');
        Route::put('{group}/meetings/{meeting}/update-ata-anexos', 'AtaController@updateAnexos');

        Route::get('{group}/meetings/{meeting}/ata-recuperacao', 'AtaController@showRecuperacao');
        Route::get('{group}/meetings/{meeting}/ata-pedagogica', 'AtaController@showPedagogica');

        Route::get('{group}/meetings/{meeting}/get-ata', 'AtaController@getAta');
        Route::get('{group}/meetings/{meeting}/get-pdf', 'AtaController@getPdf');


        //  STUDENTS ROUTES
        Route::get('{group}/students',                  'StudentController@create');
        Route::post('{group}/students',                 'StudentController@store');
        Route::get('{group}/students/{student}/info',   'StudentController@show');
        Route::get('students/{student}/edit',           'StudentController@edit');
        Route::put('students/{student}',                'StudentController@update');
        Route::get('{group}/students/add-student',      'StudentController@createForm');
        Route::delete('students/{student}',             'StudentController@destroy');


        // IMPORT EXCEL ROUTES
        Route::get('{group}/students/import',    'StudentController@showImport');
        Route::post('{group}/students/import',   'StudentController@storeImport');


        // UPDATE TEACHERS FROM GROUPS
        Route::get('{group}/users',  'GroupController@edit');
        Route::post('{group}/users', 'GroupController@update');


        //FEEDBACKS ROUTES
        Route::get('{group}/meetings/{meeting}/student/{student}',  'FeedbackController@indexAlunos');
        Route::get('{group}/meetings/{meeting}/teacher/{user}',     'FeedbackController@indexFormadores');
        Route::get('{group}/meetings/{meeting}/student/{student}/teacher/{teacher}', 'FeedbackController@showAlunos');
        Route::get('{group}/meetings/{meeting}/teacher/{user}/student/{student}',    'FeedbackController@showFormadores');
        Route::post('{group}/meetings/{meeting}/student/{student}/teacher/{teacher}',  'FeedbackController@store');

        //PLANO DE ACCAO
        Route::post('{group}/meetings/{meeting}',  'PlanoController@store');



        Route::prefix('users')->group(function () {
            //      ADD COORDINATORS / TEACHERS
            Route::get('add-teacher',               'UserController@index');
            Route::get('add-coordinator',           'UserController@index');
            Route::get('add-teacher/register',      'UserController@create');
            Route::get('add-coordinator/register',  'UserController@create');
            Route::post('',                         'UserController@store');
            Route::post('/teacher',                 'UserController@storeTeacher');
            Route::get('{user}/edit',               'UserController@edit');
            Route::get('{user}',                    'UserController@show');
            Route::put('{user}',               'UserController@update');
//            Route::put('{user}/teacher',            'UserController@updateTeacher');
            Route::delete('{user}',                 'UserController@destroy');
        });
    });
});



