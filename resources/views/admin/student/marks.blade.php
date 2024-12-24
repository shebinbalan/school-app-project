@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center justify-between gap-10 flex-wrap">
            <div class="wg-filter flex-grow">
                
            </div>

            <!-- Button to download Marks List as PDF -->

    

    <a href="{{ route('admin.student.performance.pdf', $student->id) }}" class="tf-button style-1 w208">  <i class="icon-download"></i>Download</a>
        </div>
<br><br>
        <div class="card">
            <div class="card-header text-center">
                <div class="header-content">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="Uomo" class="logo__image" />

                    <div class="student-info">
                        <h1>Performance Statement</h1>
                        <p>Student Name: <strong>{{ $student->name }}</strong></p>
                        <p>Roll No: <strong>{{ $student->id }}</strong></p>
                        <p>School: <strong>Future Minds Public School</strong></p>
                        <p>Course: <strong>{{ $student->marks->first()->class->name }}</strong></p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student->marks as $mark)
                            <tr>
                                <td style="text-align: center;">{{ $mark->subject }}</td>
                                <td style="text-align: center;">{{ $mark->marks }}</td>
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
                            <td>
                                @php
                                    $result = in_array($grade, ['A', 'B', 'C']) ? 'Passed' : 'Failed';
                                @endphp
                                {{ $result }}
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        overflow: hidden;
    }
    .card-header {
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: 1px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .logo__image {
        max-width: 150px;
        margin: 0 auto;
    }
    .table thead th {
        text-align: center;
        font-weight: bold;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
    .student-info {
        text-align: center;
        font-size: 1.2rem;
        margin-top: 20px;
    }
    .student-info p {
        margin: 5px 0;
    }
</style>
@endsection
