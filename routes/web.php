<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\NewregisterController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ExerciseController;

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
  
Route::get('/', function () {
    return view('welcome');
});
  
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
  
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::resource('newregister', \App\Http\Controllers\NewregisterController::class);

Route::get('/paginacao', [NewregisterController::class, 'index_page']);

Route::get('/five-thousand/update', function () {
    return view('update');
});
Route::post('/five-thousand/update', [JsonController::class, 'updateFromJson'])->name('five-thousand.update');
Route::get('/five-thousand/update', [JsonController::class, 'showAllWords'])->name('five-thousand.words');

Route::get('/movie', [MoviesController::class, 'index']);


Route::get('/movie/create', [MoviesController::class, 'create'])->name('movie.create');

Route::post('/movie', [MoviesController::class, 'store'])->name('movie.store');



Route::get('/exercise-registration', [ExerciseController::class, 'showForm'])->name('showForm');
Route::post('/exercise-registration', [ExerciseController::class, 'store'])->name('storeExercise');
Route::get('/exercise-registration/{topic}', [ExerciseController::class, 'showTopic'])->name('showTopic');

Route::get('/edit-question/{id}', [ExerciseController::class, 'editQuestion'])->name('editQuestion');
Route::put('/update-question/{id}', [ExerciseController::class, 'updateQuestion'])->name('updateQuestion');
Route::delete('/delete-question/{id}', [ExerciseController::class, 'deleteQuestion'])->name('deleteQuestion');