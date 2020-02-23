<?php

use Illuminate\Http\Request;

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

Route::post('/upload', 'ImportController@upload');
Route::get('/import/list/get', 'ImportController@getList');
Route::get('/import/delete/{import}', 'ImportController@delete');
Route::post('/import/save', 'ImportController@saveCsv');
Route::get('/import/get/{id}', function(int $id) {
    return \App\Entities\Import::find($id);
});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
