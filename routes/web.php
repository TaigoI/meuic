<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainDashboardController;
use App\Http\Controllers\ManageMonitorController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BookTimeslotController;

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

Route::get('/', [MainDashboardController::class, 'index']);
Route::get('/home', [MainDashboardController::class, 'index'])->name("home");


Route::get('/profile', [ProfileController::class, 'getView']);
Route::post('/profile/update', [ProfileController::class, 'update']);


Route::get('auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('callbacks/google', [GoogleAuthController::class, 'handleCallback']);
Route::get('logout', [GoogleAuthController::class, 'logOut']);

Route::get('/disciplinas',[ManageMonitorController::class,'index'])->name('disciplinas');
Route::post('/disciplinas',[ManageMonitorController::class, 'getMonitoresDisciplina']);
Route::post('/disciplinas/delete/{email}',[ManageMonitorController::class, 'destroy'])->name('monitor_delete');
Route::get('/disciplinas/find/{email}',[ManageMonitorController::class, 'getUserByEmail'])->name('monitor_find');
Route::get('/disciplinas/insert/{email}/{id_disciplina}',[ManageMonitorController::class, 'insert'])->name('monitor_insert');
Route::get('/disciplinas/{idDisc}',[ManageMonitorController::class, 'getMonitoresDisciplina']);


Route::get('/activities',[ActivityController::class, 'index']);
Route::post('/activities/create', [ActivityController::class, 'insert']);


Route::get('/timetable', [ClassTimetableController::class, 'notFound']);
Route::get('/timetable/{idDisciplina}', [ClassTimetableController::class, 'index']);

Route::get('/book', [BookTimeslotController::class, 'index']);
Route::post('/book', [BookTimeslotController::class, 'getMonitoresSlots']);

