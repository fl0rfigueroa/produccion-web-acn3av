<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;


Route::get('/', function () {
    return view('welcome');
});


//cursos
Route::get('courses',[
    CourseController::class,
    'index'
])-> name('courses.index');


Route::get('courses/create',[
    CourseController::class,
    'create'
])-> name('courses.create');

Route::post('courses',[
    CourseController::class,
    'store'
])-> name('courses.store');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Route::get('test', function () {
        
        return 'test';
           
}); */
Route::get('test', function (){
    $curso = Course::create([
        'title' => 'curso de cocina',
        'description' => 'curso de cocina avanzada',
        'price'=> '23.2',
        'is_visible' => true
    ]);
    return 'curso creado correctamente';
});


Route::get('courses/create', [CourseController::class, 'create']);


Route::get('saludo/{nombre}', function ($nombre) {
    return "hola, {$nombre}";
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('courses', [CourseController::class, 'index']);

require __DIR__.'/auth.php';
