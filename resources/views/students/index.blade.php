@extends('layouts.app')

@section('content')

<h2>Student List</h2>

@if(session('status'))
    <p style="color: green;">
        {{ session('status') }}
    </p>
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