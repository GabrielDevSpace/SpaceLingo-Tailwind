<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\NewregisterController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\CourseNotesController;
use App\Http\Controllers\WeeklyTestController;
use App\Http\Livewire\Languages;
use App\Http\Controllers\ContactController;


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
Route::get('newregister', [NewregisterController::class, 'index'])->name('newregister.index')->middleware('auth');
Route::get('newregister/{id}', [NewregisterController::class, 'lang'])->name('newregister')->middleware('auth');
Route::get('newregister/create/{lang_id}', [NewregisterController::class, 'create'])->name('newregister.create')->middleware('auth');
Route::post('newregister/store/{lang_id}', [NewregisterController::class, 'store'])->name('newregister.store')->middleware('auth');
Route::put('newregister/update/{lang_id}/{register_id}', [NewregisterController::class, 'update'])->name('newregister.update')->middleware('auth');
Route::get('newregister/edit/{lang_id}/{register_id}', [NewregisterController::class, 'edit'])->name('newregister.edit')->middleware('auth');
Route::delete('newregister/destroy/{lang_id}/{destroy_id}', [NewregisterController::class, 'destroy'])->name('newregister.destroy')->middleware('auth');

Route::get('coursenotes/{id}', [CourseNotesController::class, 'index'])->name('coursenotes')->middleware('auth');
//Route::resource('newregister', \App\Http\Controllers\NewregisterController::class);
Route::get('weeklytest/{id}', [WeeklyTestController::class, 'index'])->name('weeklytest')->middleware('auth');

Route::get('/languages', Languages::class)->middleware('auth');

Route::get('/paginacao', [NewregisterController::class, 'index_page'])->middleware('auth');

Route::get('/five-thousand/update', function () {
    return view('update');
});
Route::post('/five-thousand/update', [JsonController::class, 'updateFromJson'])->name('five-thousand.update')->middleware('auth');
Route::get('/five-thousand/update', [JsonController::class, 'showAllWords'])->name('five-thousand.words')->middleware('auth');

Route::get('/movie', [MoviesController::class, 'index'])->middleware('auth');

Route::get('/movie/create', [MoviesController::class, 'create'])->name('movie.create')->middleware('auth');

Route::post('/movie', [MoviesController::class, 'store'])->name('movie.store')->middleware('auth'); 

Route::get('/exercise-registration', [ExerciseController::class, 'showForm'])->name('showForm')->middleware('auth');
Route::post('/exercise-registration', [ExerciseController::class, 'store'])->name('storeExercise');
Route::get('/exercise-registration/{topic}', [ExerciseController::class, 'showTopic'])->name('showTopic')->middleware('auth');

Route::get('/edit-question/{id}', [ExerciseController::class, 'editQuestion'])->name('editQuestion')->middleware('auth');
Route::put('/update-question/{id}', [ExerciseController::class, 'updateQuestion'])->name('updateQuestion')->middleware('auth');
Route::delete('/delete-question/{id}', [ExerciseController::class, 'deleteQuestion'])->name('deleteQuestion')->middleware('auth');

// Route to handle editing a topic
Route::post('/edit-topic', [ExerciseController::class, 'editTopic'])->name('editTopic')->middleware('auth');

// Route to handle deleting a topic and its associated exercises
Route::get('/delete-topic', [ExerciseController::class, 'deleteTopic'])->name('deleteTopic')->middleware('auth');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact/save', [ContactController::class, 'saveContact'])->name('contact.save');