@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Assignments infomation</h3>
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
                                            <a href="{{route('admin.assignment.index')}}">
                                                <div class="text-tiny">Assignments </div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Assignment</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('admin.assignment.update')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $assignment->id }}">   
                                        <fieldset class="category">
                                            <div class="body-title">Course <span class="tf-color-1">*</span></div>
                                            <select id="course_id" class="flex-grow" name="course_id">
                                                <option value="">Choose Course</option>
                                                @foreach($courses as $course)
                                                <option value="{{ $course->id }}" {{ (old('course_id') ?? $assignment->course_id) == $course->id ? 'selected' : '' }}>
                                                        {{ $course->course_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Title <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Title" name="title"
                                                tabindex="0" value="{{$assignment->title}}" aria-required="true" required="">
                                        </fieldset>
                                        @error('title')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="name">
                                            <div class="body-title">Due Date <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="date" placeholder="Due Date" name="due_date"
                                                tabindex="0" value="{{ $assignment->due_date ? \Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d') : '' }}" aria-required="true" required="">
                                        </fieldset>
                                        @error('due_date')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="name">
                                            <div class="body-title">Description <span class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="description"
                                                placeholder="Description" tabindex="0" aria-required="true"
                                                required="">{{$assignment->description}}</textarea> 
                                        </fieldset>
                                        @error('description')
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

