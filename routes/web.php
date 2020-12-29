<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Support\Facades\Http;
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

Route::get('/', [EmployeeController::class, 'index']);
// Route CRUD Pegawai
Route::prefix('/employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/create-employee', [EmployeeController::class, 'create']);
    Route::post('/store-employee', [EmployeeController::class, 'store']);
    Route::get('/edit-employee/{employee}', [EmployeeController::class, 'edit']);
    Route::put('/update-employee/{employee}', [EmployeeController::class, 'update']);
    Route::delete('/delete-employee', [EmployeeController::class, 'destroy']);
});
Route::get('tes', function () {
    return Http::get('https://jsonplaceholder.typicode.com/todos/1');
});
