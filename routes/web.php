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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware', 'auth'], function(){
	Route::get('profile/{id}', 'ProfileController@index');
	Route::post('profile/update/{id}', 'ProfileController@update_avatar');
});

Route::get('qsts/index/{id}', 'QuestionController@index');
Route::post('qsts/store/{id}', 'QuestionController@store');
Route::get('qsts/edit/{id}', 'QuestionController@edit');
Route::put('qsts/{id}', 'QuestionController@update');
Route::delete('qsts/{id}', 'QuestionController@destroy');



/*
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('Qcm/All','QcmController@indexAll');//afficher catalogue de Qcm partagee
    
});*/

Route::get('qcms', 'QcmController@index');
Route::get('qcms/create', 'QcmController@create');
Route::post('qcms', 'QcmController@store');



Route::post('qcms/fixerdate/{id}', 'QcmController@fixer');
Route::get('qcms/fixer/{id}', 'QcmController@fixerPeriode');


Route::get('qcms/examen/qcm_id/{qcm_id}/group_id/{group_id}', 'QcmController@examen');
Route::post('qcms/valider/qcm_id/{qcm_id}/group_id/{group_id}', 'QcmController@passerExamen');



Route::get('qcms/edit/{id}', 'QcmController@edit');
Route::put('qcms/{id}', 'QcmController@update');
Route::get('qcms/catalogue', 'QcmController@catalogue');
Route::delete('qcms/{id}', 'QcmController@destroy');
Route::get('qcms/catalogue/consulter/{id}', 'QcmController@consulter');

Route::get('qcms/partager/{id}', 'QcmController@partager');







Route::get('groups/listetudiants/{id}', 'GroupController@studentList');
Route::put('groups/{group_id}/{user_id}', 'GroupController@confirm');



Route::get('groups', 'GroupController@index');

Route::get('groups/results', 'GroupController@result');


Route::get('groups/create', 'GroupController@create');
Route::post('groups', 'GroupController@store');
Route::post('groups/inscription', 'GroupController@inscription');

Route::get('groups/edit/{id}', 'GroupController@edit');
Route::put('groups/{id}', 'GroupController@update');
Route::delete('groups/{id}', 'GroupController@destroy');


Route::post('qcms/fetch', 'GroupController@fetch')->name('GroupController.fetch');




Route::get('choix/{id}', 'ChoixController@index');
Route::post('choix/store/{id}', 'ChoixController@store');
Route::get('choix/edit/{id}', 'ChoixController@edit');
Route::put('choix/{id}', 'ChoixController@update');
Route::delete('choix/{id}', 'ChoixController@destroy');







//Route::get('/index1', 'GroupController@index1');


//Route::resource('qcms', 'QcmController');
