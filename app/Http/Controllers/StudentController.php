<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'roll_no' => 'required|unique:students,roll_no',
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'department' => 'nullable|string',
            'semester' => 'nullable|integer',
            'cgpa' => 'nullable|numeric|min:0|max:10',
        ]);

        Student::create($validated);

        return redirect('/students')
            ->with('status', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}