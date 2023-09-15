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

// Route::get('/test', function () {
//     return redirect('/');
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
Route::get('/faq', 'landingController@faq_view');
Route::get('/contact-us', 'landingController@contact_view');
Route::get('/about-us', 'landingController@about_view');
Route::post('/apply/save', 'landingController@storeData');
Route::get('/apply/{id}', 'landingController@applyView');
Route::get('/getJurusan', 'landingController@getJurusan');
Route::get('/apply', 'landingController@apply'); // Apply pages
Route::get('/cek/{id}', 'landingController@cekIDCart'); // Apply pages


Route::post('/insert-kandidat', 'KandidatController@insertKandidat');
Route::get('/cek-kandidat/{id}', 'KandidatController@checkIdCart');
Route::post('/insert-education', 'KandidatController@insertEducation');
Route::post('/insert-work-experience', 'KandidatController@insertWorkExperience');
Route::post('/insert-job-applications', 'KandidatController@insert_job_applications');

Auth::routes(['register' => false]);
// Auth::routes();

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
Route::get('/admin/contact-us', 'ContactUsController@view');
Route::get('/admin/contact/all', 'ContactUsController@index');
Route::post('/admin/contact-us', 'ContactUsController@store');
Route::get('/admin/contact-us/{id}', 'ContactUsController@show');
Route::delete('/admin/contact-us/{id}', 'ContactUsController@destroy');
Route::post('/admin/contact-us/send-email', 'ContactUsController@sendEmail');

// cek kandidat berdasarkan id
Route::get('/admin/cek_Kandidat/{id}', 'JobController@cekKandidat');
// viewlistKandidat
Route::get('/admin/viewlistKandidat/{id}', 'JobController@viewlistKandidat');
Route::post('/admin/updateProgress/{kandidatID}/{jobID}', 'JobController@updateProgress');
Route::get('/admin/exportToExcel/{jobID}', 'JobController@downloadExcel');

