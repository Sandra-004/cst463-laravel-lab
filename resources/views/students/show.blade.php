<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    @if(session('status'))
    <div style="color: green; padding: 10px;">
        {{ session('status') }}
    </div>
@endif

    <h1>Student Details</h1>

    <p>Roll Number: {{ $student->roll_no }}</p>
    <p>Name: {{ $student->name }}</p>
    <p>Email: {{ $student->email }}</p>
    <p>Department: {{ $student->department }}</p>
    <p>Semester: {{ $student->semester }}</p>
    <p>CGPA: {{ $student->cgpa }}</p>

    <a href="{{ route('students.index') }}">Back to Students</a>

</body>
</html>