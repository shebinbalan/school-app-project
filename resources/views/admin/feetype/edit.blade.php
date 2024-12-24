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
                                    <form class="form-new-product form-style-1" action="{{route('admin.feetype.update')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $feetype->id }}">    
                                        <fieldset class="category">
                                            <div class="body-title">Student <span class="tf-color-1">*</span></div>
                                            <select id="teacher_id" class="flex-grow" name="student_id">
                                                <option value="">Choose Student</option>
                                                @foreach($students as $student)
                                                <option value="{{ $student->id }}" {{ (old('student_id') ?? $feetype->student_id) == $student->id ? 'selected' : '' }}>
                                                        {{ $student->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="category">
                                            <div class="body-title">Free Type <span class="tf-color-1">*</span></div>
                                            <select id="teacher_id" class="flex-grow" name="fee_type_id">
                                                <option value="">Choose FreeType</option>
                                                @foreach($fees as $fee)
                                                <option value="{{ $fee->id }}" {{ (old('fee_type_id') ?? $feetype->fee_type_id) == $fee->id ? 'selected' : '' }}>
                                                        {{ $fee->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('fee_type_id')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        
                                        <fieldset class="name">
                                            <div class="body-title">Amount <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Amount" name="amount"
                                                tabindex="0" value="{{$feetype->amount}}" aria-required="true" required="">
                                        </fieldset>
                                        @error('amount')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="name">
                                            <div class="body-title">Payment Date <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="date" placeholder="Payment Date " name="payment_date"
                                                tabindex="0" value="{{ $feetype->payment_date }}" aria-required="true" required="">
                                        </fieldset>
                                        @error('payment_date')
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

