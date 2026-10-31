@extends('layouts.app')

@section('content')

<h2>Student List</h2>

@if(session('status'))
    <div style="color: green; padding: 10px;">
        {{ session('status') }}
    </div>
@endif

<a href="{{ route('students.create') }}">Add Student</a>

<ul>
    @foreach($students as $student)
        <li>
            <a href="{{ route('students.show', $student->id) }}">
                {{ $student->name }}
            </a>
            - {{ $student->roll_no }}
        </li>
    @endforeach
</ul>

@endsection