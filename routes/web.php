<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});



Route::get('/config-clear', function() {
	$status = Artisan::call('config:clear');
	return '<h1>Configurations cleared</h1>';
});

Route::get('/migrate-fresh', function() {
	$status = Artisan::call('migrate:refresh');
	return '<h1>Migration Complete</h1>';
});
Route::get('/migrate-only', function() {
	$status = Artisan::call('migrate');
	return '<h1>New Migration Complete</h1>';
});

//Clear cache:
Route::get('/cache-clear', function() {
	$status = Artisan::call('cache:clear');
	return '<h1>Cache cleared</h1>';
});

//Clear cache:
Route::get('/key-gen', function() {
	$status = Artisan::call('key:generate');
	return '<h1>Cache cleared</h1>';
});



//Clear configuration cache:
Route::get('/config-cache', function() {
	$status = Artisan::call('config:cache');
	return '<h1>Configurations cache cleared</h1>';
});


Auth::routes(['reset' => false, 'register' => false]);


// ============================== Public Routes =======================


				// ======== Home =======
Route::get('/home', 'HomeController@index')->name('home');

				// =========User========
Route::get('account_setting','UserController@account_setting')->name('account_setting');
Route::post('update_user/{id}','UserController@update')->name('user.update');

				// =========Visit========
Route::get('create_client_visit','VisitController@create')->name('create_client_visit');
Route::get('my_visit/{id}','VisitController@my_visit')->name('visit.mine');
Route::get('edit_my_visit/{id}','VisitController@edit_my_visit')->name('visit.editMyVisit');
Route::post('update_my_visit/{id}','VisitController@update_my_visit')->name('visit.update_my_visit');
Route::get('delete_my_visit/{id}','VisitController@delete_my_visit')->name('visit.delete_my_visit');
Route::post('storeVisit','VisitController@store')->name('storeVisit');

				// =========Client========
Route::post('storeClient','ClientController@store')->name('client.store');

				// =========Project Type========
Route::post('storeProject_type','ProjectTypeController@store')->name('project_type.store');





// ============================== Admin Routes =======================
Route::group(['middleware' => 'role:admin'], function() {
	// ================= Users ==================
	Route::get('all_users','UserController@index')->name('user.all');
	Route::get('create_user','UserController@create')->name('user.create');
	Route::post('store_user','UserController@store')->name('user.store');
	Route::get('deleted_user','UserController@deleted_user')->name('user.deleted');
	Route::get('restore_user/{id}','UserController@restore_user')->name('user.restore');
	Route::get('delete_user_per/{id}','UserController@delete_user_per')->name('user.delete_per');
	Route::get('delete_user/{id}','UserController@destroy')->name('user.delete');


	// ====================== Visit ==================

	Route::get('client_visit_list','VisitController@index')->name('visit.client_list');
	Route::post('visit_update/{id}','VisitController@update')->name('visit_update');
	Route::post('update_remarks/{id}','VisitController@update_reamrks')->name('update_remarks');
	Route::get('invoice/{id}','VisitController@invoice')->name('invoice');
	Route::post('visit_update/{id}','VisitController@update')->name('visit_update');

	
	// ===================== Report =============
	Route::get('monthy_report','ReportController@report_by_month')->name('monthy_report');	
	Route::post('report_by_month','ReportController@report_by_month')->name('report_by_month');

	// ======================= Role ================

	Route::get('all_roles','RoleController@index')->name('all_roles');
	Route::get('create_role','RoleController@create')->name('create_role');
	Route::get('edit_role/{id}','RoleController@edit')->name('edit_role');
	Route::post('update_role/{id}','RoleController@edit')->name('update_role');
	Route::post('store_role','RoleController@store')->name('store_role');
	Route::get('delete_role/{id}','RoleController@destroy')->name('delete_role');
	
	// ======================= Permission =================

	Route::post('store_permission','PermissionController@store')->name('store_permission');
	

 });