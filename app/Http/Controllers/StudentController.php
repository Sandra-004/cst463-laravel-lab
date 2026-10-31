<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        'roll_no' => 'nullable|unique:students,roll_no',
        'name' => 'required|string',
        'email' => 'required|email|unique:students,email',
        'department' => 'nullable|string',
        'semester' => 'nullable|integer',
        'cgpa' => 'nullable|numeric|min:0|max:10',
    ]);

    // Generate a roll number if the submitted form does not include one.
    $validated['roll_no'] = $validated['roll_no'] ?? 'AUTO' . Str::upper(Str::random(8));

    Student::create($validated);

    $student = Student::where('roll_no', $validated['roll_no'])->firstOrFail();

    return redirect()->route('students.show', $student)
        ->with('status', 'Student added successfully!');
}
        Student::create($validated);

        return redirect('/students')
            ->with('status', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}