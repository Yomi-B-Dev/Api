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

Route::post('/auth/register', 'SessionController@register');
Route::post('/auth/login', 'SessionController@login');
Route::get('/terms', 'SessionController@getTerms');

Route::get('/questions-answers/help', 'QuestionsAndAnswersController@getQuestionsAnswersGuest');

//Route::post('/delete-token', '');

Route::middleware('jwt')->group(function () {
    Route::get('/auth/user', 'SessionController@getAuthenticatedUser');
    Route::post('/auth/update-notification-status', 'SessionController@updateNotificationStatus');

    Route::get('/questions-answers/login', 'QuestionsAndAnswersController@getQuestionsAnswersUser');

    Route::post('/post/report', 'PostController@get');
//    Route::get('/post/get-by-user-id?page={id}', ''); // 10 posts per page
//    Route::get('/post/get-by-user-id', ''); // All posts
//    Route::post('/post/update-post/', '');
//    Route::post('/post', '');
//    Route::delete('/post', '');
//
//    Route::get('/get-all/movement', '');
//
//    Route::get('/get-all/leadership/?movement_id={id}', '');
//
//    Route::get('/get-all/tribe/?leadership_id={id}', '');
//
//    Route::get('/get-user-hierarchy', '');
//    Route::get('/get-user-hierarchy', '');
});
