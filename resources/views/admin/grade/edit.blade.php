@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Grade infomation</h3>
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
                                                <div class="text-tiny">Grade </div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Edit Grade</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('admin.grade.update')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                     <input type="hidden" name="id" value="{{ $grade->id }}">    
                                        <fieldset class="category">
                                            <div class="body-title">Student <span class="tf-color-1">*</span></div>
                                            <select id="student_id" class="flex-grow" name="student_id">
                                                <option value="">Choose Teacher</option>
                                                @foreach($students as $student)
                                                <option value="{{ $student->id }}" {{ (old('student_id') ?? $grade->student_id) == $student->id ? 'selected' : '' }}>

                                                        {{ $student->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="category">
                                            <div class="body-title">Course <span class="tf-color-1">*</span></div>
                                            <select id="course_id" class="flex-grow" name="course_id">
                                                <option value="">Choose Course</option>
                                                @foreach($courses as $course)
                                                <option value="{{ $course->id }}" {{ (old('course_id') ?? $grade->course_id) == $course->id ? 'selected' : '' }}>
                                                        {{ $course->course_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('course_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Grade<span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Grade" name="grade"
                                                tabindex="0" value="{{$grade->grade}}" aria-required="true" required="">
                                        </fieldset>
                                        @error('grade')
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

