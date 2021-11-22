<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('listProvider','App\Http\Controllers\ProviderController@getProvider');
Route::post('imageupload','App\Http\Controllers\ImageController@uploadImage');
Route::post('videoupload','App\Http\Controllers\VideoController@uploadVideo'); 
Route::get('listMedia','App\Http\Controllers\MediaListController@listMedia');                                    
