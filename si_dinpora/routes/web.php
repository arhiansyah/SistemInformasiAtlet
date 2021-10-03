<?php

use App\Jenjang;
use Illuminate\Support\Facades\Auth;
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


// Datatable
Route::post('/atlet_data/{id}', 'AtletController@data')->name('atlet.data')->middleware('login_auth');
Route::post('/pelatih_data/{id}', 'PelatihController@data')->name('pelatih.data')->middleware('login_auth');
Route::post('/cabor_data/{id}', 'CaborController@data')->name('cabor.data')->middleware('login_auth');
// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index')->middleware('login_auth');
// Atlit Pages
Route::get('/atlet', 'AtletController@index')->name('pages.atlet.index')->middleware('login_auth');
Route::get('/pelatih', 'PelatihController@index')->name('pages.pelatih.index')->middleware('login_auth');
Route::get('/cabor', 'CaborController@index')->name('pages.cabor.index')->middleware('login_auth');
//CRUD ATLET
Route::get('/create-atlet', 'AtletController@create')->name('atlet.create')->middleware('login_auth');
Route::get('/edit-atlet/{id}', 'AtletController@edit')->name('atlet.edit')->middleware('login_auth');
Route::post('/atlet-store', 'AtletController@store')->name('atlet.store')->middleware('login_auth');
Route::patch('/update-atlet/{id}', 'AtletController@update')->name('atlet.update')->middleware('login_auth');
Route::delete('/delete-atlet/{id}', 'AtletController@delete')->name('atlet.delete')->middleware('login_auth');
Route::delete('/delete-atlet-selected/{id}', 'AtletController@deleteSelected')->name('atlet.selectedDelete')->middleware('login_auth');
//CRUD PELATIH
Route::get('/create-pelatih', 'PelatihController@create')->name('pelatih.create')->middleware('login_auth');
Route::post('/pelatih-store', 'PelatihController@store')->name('pelatih.store')->middleware('login_auth');
Route::get('/pelatih-edit/{id}', 'PelatihController@edit')->name('pelatih.edit')->middleware('login_auth');
Route::patch('/update/pelatih/{id}', 'PelatihController@update')->name('pelatih.update')->middleware('login_auth');
Route::delete('/delete-pelatih/{id}', 'PelatihController@delete')->name('pelatih.delete')->middleware('login_auth');

// CRUD CABOR
Route::get('/create-cabor', 'CaborController@create')->name('cabor.create')->middleware('login_auth');
Route::post('/cabor-store', 'CaborController@store')->name('cabor.store')->middleware('login_auth');
Route::post('/caborModal-store', 'CaborController@modalStore')->name('caborModal.store')->middleware('login_auth');
Route::get('/edit-cabor/{id}', 'CaborController@edit')->name('cabor.edit')->middleware('login_auth');
Route::patch('/update-cabor/{id}', 'CaborController@update')->name('cabor.update')->middleware('login_auth');
Route::delete('/delete-cabor/{id}', 'CaborController@delete')->name('cabor.delete')->middleware('login_auth');
Route::get('/addModal', 'CaborController@addModal')->name('pages.cabor.add')->middleware('login_auth');
// Route::get('/cabor/caborFilter/{id}', 'CaborController@caborFilter');

//USer Control
Route::get('/userSistem', 'AdminController@userSistem')->name('userSistem')->middleware('login_auth');

//Dynamic Dropdown
Route::get('/findsekolahname', 'AtletController@findSekolahName');
Route::get('/findcaborName', 'AtletController@findKelascaborName');

// Login Routing
Route::get('/login', 'AdminController@index')->name('login'); 
Route::get('/logout', 'AdminController@logout')->name('logout'); 
Route::post('/login', 'AdminController@authenticate')->name('authenticate');