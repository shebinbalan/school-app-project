<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Statement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            padding: 20px;
        }
        .header img {
            max-width: 120px;
        }
        .header h1 {
            font-size: 24px;
            margin: 10px 0;
        }
        .student-info {
            margin: 20px 0;
            text-align: center;
        }
        .student-info p {
            margin: 5px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        .table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo/logo.png'))) }}" alt="School Logo">
        <h1>Performance Statement</h1>
    </div>
    <div class="student-info">
        <p><strong>Student Name:</strong> {{ $student->name }}</p>
        <p><strong>Roll No:</strong> {{ $student->id }}</p>
        <p><strong>School:</strong> Future Minds Public School</p>
        <p><strong>Course:</strong> {{ $student->marks->first()->class->name }}</p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student->marks as $mark)
            <tr>
                <td>{{ $mark->subject }}</td>
                <td>{{ $mark->marks }}</td>
            </tr>
            @endforeach
            <tr>
                <th>Total</th>
                <td>{{ $student->marks->sum('marks') }}</td>
            </tr>
            <tr>
                <th>Grade</th>
                <td>
                    @php
                        $totalMarks = $student->marks->sum('marks');
                        $grade = $totalMarks >= 90 ? 'A' : ($totalMarks >= 75 ? 'B' : ($totalMarks >= 50 ? 'C' : 'D'));
                    @endphp
                    {{ $grade }}
                </td>
            </tr>
            <tr>
                <th>Result</th>
                <td>{{ $grade == 'A' || $grade == 'B' || $grade == 'C' ? 'Passed' : 'Failed' }}</td>
            </tr>
           
        </tbody>
    </table>
</body>
</html>
