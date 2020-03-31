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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('insert_to_do_api','ToDoController@insert_to_do_api');
Route::get('get_all_todos','ToDoController@get_all_todos');
Route::post('todo_done_api','ToDoController@todo_done_api');
Route::get('get_completed_todos','ToDoController@get_completed_todos');
Route::get('get_all_active_todos','ToDoController@get_all_active_todos');
Route::post('remove_todo','ToDoController@remove_todo');
Route::get('clear_all_completed_todos','ToDoController@clear_all_completed_todos');
Route::post('update_todo','ToDoController@update_todo');