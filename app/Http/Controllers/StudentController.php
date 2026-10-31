<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // Display student creation form
    public function create()
    {
        return view('students.create');
    }

    // Store a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'roll_no' => 'required|unique:students,roll_no',
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'department' => 'required',
            'semester' => 'required|integer',
            'cgpa' => 'nullable|numeric|min:0|max:10',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('status', 'Student added successfully!');
    }

    // Display an individual student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}