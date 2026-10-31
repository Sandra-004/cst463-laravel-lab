<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', function () {
    return view('home');
});

// PART A - MVC and Routes

Route::get('/hello/{your_name}', function ($your_name) {
    return "Hello, " . $your_name;
});

Route::get('/about', [PageController::class, 'about']);

// PART B - Resource Controller

Route::resource('students', StudentController::class);
// PART C - Explicit Route Model Binding

Route::get('/roll/{your_roll}', function (Student $your_roll) {
    return view('students.show', ['student' => $your_roll]);
});
// PART E - JSON API

Route::get('/api/students', function () {
    return response()->json(Student::all());
});