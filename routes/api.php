<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
 * Task related APIs
 * */

Route::post('/task-store',[TaskController::class,'store'])->name('task.store');
//Route::get('/task-in-progress/{id}',[TaskController::class,'updateToInProgressGet'])->name('task.updateInProgress');
//Route::get('/task-done/{id}',[TaskController::class,'updateToDoneGet'])->name('task.updateDone');
Route::post('/task-in-progress',[TaskController::class,'updateToInProgress'])->name('task.updateInProgress');
Route::post('/task-done',[TaskController::class,'updateToDone'])->name('task.updateDone');