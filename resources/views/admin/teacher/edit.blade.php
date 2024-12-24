@extends('layouts.admin')
@section('content')

 <div class="main-content-inner">
                         
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Edit Teacher</h3>
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
                                            <a href="{{route('admin.teacher.index')}}">
                                                <div class="text-tiny">Teachers</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Edit Teacher</div>
                                        </li>
                                    </ul>
                                </div>
                            
                                <form class="tf-section-2 form-add-product" method="POST"  action="{{route('admin.teacher.update')}}">
                                    @csrf   
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $teacher->id }}">                               
                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Teacher name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter teacher name"
                                                name="name" tabindex="0" value="{{$teacher->name}}" aria-required="true" required="">
                                            
                                        </fieldset>
                                        @error('name')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Qualification <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter Qualification"
                                                name="qualification" tabindex="0" value="{{$teacher->qualification}}" aria-required="true" required="">
                                           
                                        </fieldset>
                                        @error('slug')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror

                                        <fieldset class="address">
                                            <div class="body-title mb-10">Address <span
                                                    class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="address"
                                                placeholder=" Enter Address" tabindex="0" aria-required="true"
                                                required="">{{ $teacher->address }}</textarea>
                                            </fieldset>
                                        @error('address')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                                    </div>
                                    <div class="wg-box">
                                       
                                      
                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Date Of Birth <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="date" placeholder="Date Of Birth"
                                                    name="dob" tabindex="0" value="{{ $teacher->dob }}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                            @error('dob')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                                         
                                        </div>


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Contact Info <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter Contact_info" name="contact_info"
                                                    tabindex="0" value="{{ $teacher->contact_info }}" aria-required="true" required="">
                                            </fieldset>
                                            @error('contact_info')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                    
                                        </div>
                                        <div class="cols gap22">
                                            <fieldset class="gender">
                                                <div class="body-title mb-10">Gender</div>
                                                <div class="select mb-10">
                                                    <select class="" name="gender">
                                                        <option value="">Select Gender</option>
                                                        <option value="male" {{ old('gender',  $teacher->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                                        <option value="female" {{ old('gender',  $teacher->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                                        <option value="other" {{ old('gender',  $teacher->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            @error('gender')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Subjects taught <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter subjects taught"
                                                    name="subjects_taught" tabindex="0" value="{{ $teacher->subjects_taught }}" aria-required="true"
                                                    required="">
                                            </fieldset>
                                        @error('subjects_taught')
                                        <span class="alert alert-danger text-center">{{ $message }}</span>      
                                        @enderror
                                        </div>
                                        <div class="cols gap10">
                                            <button class="tf-button w-full" type="submit">Update Teacher</button>
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