@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Course infomation</h3>
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
                                    <form class="form-new-product form-style-1" action="{{route('admin.marks.update')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{$mark->id }}">   
                                        <fieldset class="sudents">
                                            <div class="body-title">Student <span class="tf-color-1">*</span></div>
                                            <select id="student_id" class="flex-grow" name="student_id">
                                                <option value="">Choose Student</option>
                                                @foreach($students as $student)
                                                <option value="{{ $student->id }}" {{ (old('student_id') ?? $mark->student_id) == $student->id ? 'selected' : '' }}>
                                                        {{ $student->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="category">
                                            <div class="body-title">Class <span class="tf-color-1">*</span></div>
                                            <select id="student_id" class="flex-grow" name="class_id">
                                                <option value="">Choose Class</option>
                                                @foreach($classes as $class)
                                                <option value="{{ $class->id }}" {{ (old('class_id') ?? $mark->class_id) == $class->id ? 'selected' : '' }}>
                                                        {{ $class->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="subject">
                                            <div class="body-title">Subject<span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Subject" name="subject"
                                                tabindex="0" value="{{ $mark->subject }}" aria-required="true" required="">
                                        </fieldset>
                                        @error('subject')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="subject">
                                            <div class="body-title">Marks<span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Marks" name="marks"
                                                tabindex="0" value="{{ $mark->marks }}" aria-required="true" required="">
                                        </fieldset>
                                        @error('marks')
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

