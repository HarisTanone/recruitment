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

Route::get('/', 'JobHomeController@index');
Route::get('/faq/all', 'landingController@faq_index');
Route::post('/contact-insert', 'landingController@store_contact');
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

// FAQ
Route::get('/admin/faq', 'faqController@view');
Route::get('/admin/faq/all', 'faqController@index');
Route::post('/admin/faq/insert', 'faqController@store');
Route::post('/admin/faq/update/{id}', 'faqController@update');
Route::delete('/admin/faq/delete/{id}', 'faqController@destroy');
Route::get('/admin/faq/{id}', 'faqController@show');

// contact us
Route::get('/admin/contact-us', 'ContactUsController@index');
Route::post('/admin/contact-us', 'ContactUsController@store');
Route::get('/admin/contact-us/{id}', 'ContactUsController@show');
Route::delete('/admin/contact-us/{id}', 'ContactUsController@destroy');

// FAQ View user
Route::get('/faq', function(){
    return view('user/pages/faq-pages');
});

// Contact View user
Route::get('/contact-us', function(){
    return view('user/pages/contact-pages');
});

// Contact View user
Route::get('/about-us', function(){
    return view('user/pages/about-pages');
});