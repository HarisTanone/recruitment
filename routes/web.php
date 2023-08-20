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
// routes/web.php

// Route::middleware(['redirect.if.home'])->get('/home', function () {
//     return redirect('/'); // Replace 'home' with the actual view or action you want to show for /home
// });
// Route::get('/home', function () {
//     return redirect('/');
// });
Route::get('/', 'JobHomeController@index');
Route::get('/load-more', 'JobHomeController@loadMore');
Route::get('/search', 'JobHomeController@search')->name('search');
Route::get('/get-job-detail/{jobID}', 'JobHomeController@getJobDetail')->name('get-job-detail');


Route::post('/insert-kandidat', 'KandidatController@insertKandidat');
Route::post('/insert-education', 'KandidatController@insertEducation');
Route::post('/insert-work-experience', 'KandidatController@insertWorkExperience');
Route::post('/insert-job-applications', 'KandidatController@insert_job_applications');

Auth::routes();

Route::get('/admin/dashboard', 'HomeController@index');
Route::get('/admin/job', 'JobController@index');
Route::post('/admin/job/insert', 'JobController@store');
Route::get('/admin/job/getAll', 'JobController@getAll');
Route::delete('/admin/job/delete/{id}', 'JobController@destroy');
Route::post('/admin/job/update/{id}', 'JobController@update');
Route::get('/admin/job/{id}', 'JobController@getOne');
