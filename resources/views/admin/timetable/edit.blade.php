@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>TimeTable infomation</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{route('admin.index')}}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.course.index')}}">
                                                <div class="text-tiny">Courses </div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Course</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('admin.timetable.update')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $timetable->id }}">    
                                        <fieldset class="category">
                                            <div class="body-title">Teacher <span class="tf-color-1">*</span></div>
                                            <select id="teacher_id" class="flex-grow" name="teacher_id">
                                                <option value="">Choose Teacher</option>
                                                @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" {{ (old('teacher_id') ?? $timetable->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                                        {{ $teacher->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="category">
                                            <div class="body-title">Course <span class="tf-color-1">*</span></div>
                                            <select id="course_id" class="flex-grow" name="course_id">
                                                <option value="">Choose Course</option>
                                                @foreach($courses as $course)
                                                <option value="{{ $course->id }}" {{ (old('course_id') ?? $timetable->course_id) == $course->id ? 'selected' : '' }}>
                                                        {{ $course->course_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                      
                                        <fieldset class="name">
                                            <div class="body-title">Start Time <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="time" placeholder="Start time" name="start_time"
                                                tabindex="0" value="{{ $timetable->start_time }}" aria-required="true" required="">
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">End Time<span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="time" placeholder="End time" name="end_time"
                                                tabindex="0" value="{{ $timetable->end_time }}" aria-required="true" required="">
                                        </fieldset>
                                        @error('course_name')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="category">
                                            <div class="body-title">Days <span class="tf-color-1">*</span></div>
                                            <select id="day_of_week" class="flex-grow" name="days_id">
                                                <option value="">Choose Day</option>
                                                @foreach($days as $day)
                                                <option value="{{ $day->id }}" {{ (old('days_id') ?? $timetable->days_id) == $day->id ? 'selected' : '' }}>
                                                        {{ $day->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Classroom <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Classroom" name="classroom"
                                                tabindex="0" value="{{$timetable->classroom}}" aria-required="true" required="">
                                        </fieldset>
                                        @error('classroom')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                      
                                        <div class="bot">
                                            <div></div>
                                            <button class="tf-button w208" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

@endsection

@push('scripts')
<script>
$(function(){
    $('#myFile').on("change",function(){
        const photoInp = $('myFile');
        const [file] = this.files;
        if(file)
    {
        $('#imgpreview img').attr('src',URL.createObjectURL(file));
        $('#imgpreview').show();

    }

    });
    $("input[name='name']").on("change", function () {
    
    $("input[name='slug']").val(StringToSlug($(this).val()));
});
});

function StringToSlug(Text) {
    return Text.toLowerCase()
        .replace(/[^\w ]+/g, "") 
        .replace(/\s+/g, "-");   
}
</script>
@endpush

