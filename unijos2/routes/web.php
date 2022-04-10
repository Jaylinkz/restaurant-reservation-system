<?php
use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LecturersController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResultController;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/', function () {
    return view('welcome');
});
route::get('/redirects',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware([
    'auth:sanctum','admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
route::resource('lecturers',LecturersController::class);
});
route::resource('students',StudentController::class);
Route::controller(ResultController::class)->group(function(){
    Route::get('results', 'fileexport')->middleware('student');
    Route::get('resultsview', 'fileimport')->middleware('lecturer');
    Route::get('results-export', 'export')->name('results.export');
    Route::post('results-import', 'import')->name('results.import');
});


