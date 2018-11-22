<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group([
    'namespace' => 'Session',
    'prefix' => 'auth/'
], function () {
    Route::post('register', 'SessionController@register');
    Route::post('login', 'SessionController@login');

    Route::middleware('jwt')->group(function () {
        Route::get('user', 'SessionController@getAuthenticatedUser');
        Route::post('update-notification-status', 'SessionController@updateNotificationStatus');
    });
});

Route::group(['namespace' => 'GeneralData'], function () {
    Route::group(['prefix' => 'questions-answers'], function () {
        Route::get('help', 'GeneralDataController@getQuestionsAnswersUser')
            ->middleware('jwt');
        Route::get('login', 'GeneralDataController@getQuestionsAnswersGuest');
    });
    Route::get('terms', 'GeneralDataController@getTerms');
});

Route::group([
    'namespace' => 'Post',
    'prefix' => 'post/',
    'middleware' => 'jwt'
], function () {

     Route::post('report', 'PostController@report');
     Route::get('get-by-user-id', 'PostController@getByPage'); // 10 posts per page
//     Route::get('get-by-user-id', 'PostController@get'); // All posts
//     Route::post('update-post', 'PostController@get');
//     Route::post('', 'PostController@get');
//     Route::delete('', 'PostController@get');
});





//Route::post('/delete-token', '');
//
//
//    Route::get('/get-all/movement', '');
//
//    Route::get('/get-all/leadership/?movement_id={id}', '');
//
//    Route::get('/get-all/tribe/?leadership_id={id}', '');
//
//    Route::get('/get-user-hierarchy', '');

