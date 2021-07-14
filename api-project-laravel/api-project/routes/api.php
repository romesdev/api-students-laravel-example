<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// rota de listagem de todos estudantes
# Route::get('students', 'ApiController@getAllStudents');
Route::get('students', [ApiController::class, 'getAllStudents']);

// rota de retorno de um estudante a partir do ID
# Route::get('students/{id}', 'ApiController@getStudent');
Route::get('students/{id}', [ApiController::class, 'getStudent']);

// rota para adicionar um estudante
#Route::post('students/', 'ApiController@createStudent');
Route::post('students/', [ApiController::class, 'createStudent']);

// rota para atualiza um estudante com id
# Route::put('students/{id}',  'ApiController@updateStudent');
Route::put('students/{id}',  [ApiController::class, 'updateStudent']);

// rota para remover um estudante a partir do ID
# Route::delete('students/{id}','ApiController@deleteStudent');
Route::delete('students/{id}', [ApiController::class, 'deleteStudent']);
