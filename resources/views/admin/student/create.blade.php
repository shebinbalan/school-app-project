@extends('layouts.admin')
@section('content')

 <div class="main-content-inner">
                            
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add Student</h3>
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
                                            <a href="{{route('admin.student.index')}}">
                                                <div class="text-tiny">Students</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Add Student</div>
                                        </li>
                                    </ul>
                                </div>
                               
                                <form class="tf-section-2 form-add-product" method="POST" action="{{route('admin.student.store')}}">
                                    @csrf
                                  
                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Student name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter student  name"
                                                name="name" tabindex="0" value="{{old('name')}}" aria-required="true" required="">
                                           
                                        </fieldset>
                                        @error('name')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Date Of Birth <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="date" placeholder="Enter Date Of Birth "
                                                name="dob" tabindex="0" value="{{old('dob')}}" aria-required="true" required="">
                                           
                                        </fieldset>
                                        @error('dob')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                                        <div class="gap22 cols">
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Course <span class="tf-color-1">*</span>
                                                </div>
                                                <div class="select">
                                                    <select class="" name="course_id">
                                                        <option>Choose Course</option>
                                                        @foreach($courses as $course)
                                                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </fieldset>
                                            @error('course_id')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                                           
                        
                                        </div>

                                        <fieldset class="address">
                                            <div class="body-title mb-10">Address <span
                                                    class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="address"
                                                placeholder="Address" tabindex="0" aria-required="true"
                                                required="">{{old('address')}}</textarea>                                           
                                        </fieldset>
                                        @error('address')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                                     </div>
                                    <div class="wg-box">                         
                                       <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Contact Info <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter Contact Info"
                                                    name="contact_info" tabindex="0" value="{{old('contact_info')}}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            @error('contact_info')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror                                           
                                        </div>


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Guardian name <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter Guardian name" name="guardian_name"
                                                    tabindex="0" value="{{old('guardian_name')}}" aria-required="true" required="">
                                            </fieldset>
                                            @error('guardian_name')
                                            <span class="alert alert-danger text-center">{{ $message }}</span>      
                                            @enderror
                                        </div>
                                        <div class="cols gap22">
                                            <fieldset class="gender">
                                                <div class="body-title mb-10">Gender</div>
                                                <div class="select mb-10">
                                                    <select class="" name="gender">
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                                                     <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            @error('stock_status')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                                        </div>
                                        <div class="cols gap22">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Enrollment date <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="date" placeholder="Enter Enrollment date"
                                            name="enrollment_date" tabindex="0" value="{{old('enrollment_date')}}" aria-required="true" required="">
                                            </fieldset>
                                            @error('stock_status')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror                                            
                                        </div>
                                        <div class="cols gap10">
                                            <button class="tf-button w-full" type="submit">Add Student</button>
                                        </div>
                                    </div>
                                </form>                               
                            </div>                          
                        </div>
                        
@endsection

@push('scripts')
<script>
$(function(){
    $('#myFile').on("change",function(){
        const photoInp = $('#myFile');
        const [file] = this.files;
        if(file)
    {
        $('#imgpreview img').attr('src',URL.createObjectURL(file));
        $('#imgpreview').show();

    }

    });
    $('#gFile').on("change", function() {
    const photoInp = $('#gFile');
    const gphotos = this.files;

    $.each(gphotos, function(key, val) {
        $("#galUpload").prepend(
            `<div class="item gitems">
                <img src="${URL.createObjectURL(val)}" />
            </div>`
        );
    });
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