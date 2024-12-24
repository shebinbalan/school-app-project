<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Students List</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Course</th>
                <th>Guardian Name</th>
                <th>Contact</th>
                <th>Enrollment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->course->course_name }}</td>
                <td>{{ $student->guardian_name }}</td>
                <td>{{ $student->contact_info }}</td>
                <td>{{ $student->enrollment_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
