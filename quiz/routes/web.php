<?php

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


//disabling register account so users cannot become an admin
Auth::routes([
    'register'=>false,
    'reset'=>false,
    'verify'=>false,
]);

Route::get('/home', 'HomeController@index')->name('home');

//set all routes inside middleware function to protect it
Route::group(['middleware'=>'isAdmin'],function(){

    Route::get('/', function () {return view('admin.index');});
    Route::get('/quiz/{id}/questions','QuizController@question')->name('quiz.question');
    Route::get('exam/assign','ExamController@create');
    Route::post('exam/assign','ExamController@assignExam')->name('exam.assign');

    Route::resource('quiz', 'QuizController');
    Route::resource('question', 'QuestionController');
    Route::resource('user', 'UserController');

    Route::get('/quiz/{id}/questions','QuizController@question')->name('quiz.question');
    Route::get('exam/user','ExamController@userExam')->name('view.exam');
    Route::get('exam/assign','ExamController@create')->name('user.exam');

});

