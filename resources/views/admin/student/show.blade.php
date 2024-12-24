@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Student Details</h2>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4><strong>Name:</strong></h4>
                    <p class="text-muted">{{ $student->name }}</p>
                </div>
                <div class="col-md-6">
                    <h4><strong>Date of Birth:</strong></h4>
                    <p class="text-muted">{{ $student->dob }}</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4><strong>Gender:</strong></h4>
                    <p class="text-muted">{{ ucfirst($student->gender) }}</p>
                </div>
                <div class="col-md-6">
                    <h4><strong>Guardian's Name:</strong></h4>
                    <p class="text-muted">{{ $student->guardian_name }}</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4><strong>Course:</strong></h4>
                    <p class="text-muted">{{ $courses->firstWhere('id', $student->course_id)->course_name ?? 'Not Assigned' }}</p>
                </div>
                <div class="col-md-6">
                    <h4><strong>Contact Information:</strong></h4>
                    <p class="text-muted">{{ $student->contact_info }}</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4><strong>Address:</strong></h4>
                    <p class="text-muted">{{ $student->address }}</p>
                </div>
                <div class="col-md-6">
                    <h4><strong>Enrollment Date:</strong></h4>
                    <p class="text-muted">{{ $student->enrollment_date }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.student.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Students
            </a>
        </div>
    </div>
</div>
@endsection
