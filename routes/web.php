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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'JobHomeController@index');
Route::get('/load-more', 'JobHomeController@loadMore');
Route::get('/search', 'JobHomeController@search')->name('search');
Route::get('/get-job-detail/{jobID}', 'JobHomeController@getJobDetail')->name('get-job-detail');


Route::post('/insert-kandidat', 'KandidatController@insertKandidat');
Route::post('/insert-education', 'KandidatController@insertEducation');
Route::post('/insert-work-experience', 'KandidatController@insertWorkExperience');
Route::post('/insert-job-applications', 'KandidatController@insert_job_applications');
// Route::get('/test','testController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/job', 'JobController@index');
Route::post('/admin/job/insert', 'JobController@store');
Route::get('/admin/job/getAll', 'JobController@getAll');
Route::delete('/admin/job/delete/{id}', 'JobController@destroy');
Route::post('/admin/job/update/{id}', 'JobController@update');
Route::get('/admin/job/{id}', 'JobController@getOne');
