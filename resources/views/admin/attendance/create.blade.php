@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Attendance infomation</h3>
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
                                                <div class="text-tiny">Attendances </div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Attendance</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('admin.attendance.store')}}" method="POST">
                                        @csrf
                                        <fieldset class="category">
                                            <div class="body-title">Student <span class="tf-color-1">*</span></div>
                                            <select id="student_id" class="flex-grow" name="student_id">
                                                <option value="">Choose Student</option>
                                                @foreach($students as $student)
                                                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                                        {{ $student->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Date<span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="date" placeholder="Date" name="date"
                                                tabindex="0" value="{{old('date')}}" aria-required="true" required="">
                                        </fieldset>
                                        @error('date')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
           
                                        <fieldset class="name">
                                            <div class="body-title">Status <span class="tf-color-1">*</span></div>
                                            <div class="flex items-center gap20">
                                                <label class="flex items-center gap10">
                                                    <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                                    <span>Absent</span>
                                                </label>
                                                <label class="flex items-center gap10">
                                                    <input type="radio" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }} required>
                                                    <span>Present</span>
                                                </label>
                                               
                                            </div>
                                            @error('status')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                      
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

