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
                                            <a href="{{route('admin.blogs.index')}}">
                                                <div class="text-tiny">Blogs </div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Blog</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('admin.blogs.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                       
                                        <fieldset class="name">
                                            <div class="body-title">Title <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Title" name="title"
                                                tabindex="0" value="{{old('title')}}" aria-required="true" required="">
                                        </fieldset>
                                        @error('title')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
           
                                        <fieldset class="name">
                                            <div class="body-title">Content <span class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="content"
                                                placeholder="Content" tabindex="0" aria-required="true"
                                                required="">{{old('content')}}</textarea> 
                                        </fieldset>
                                        @error('content')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset>
                                            <div class="body-title">Upload images <span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">
                                            <div class="item" id="imgpreview" style="display:none">
                                                    <img src="sample.jpg" class="effect8" alt="">
                                                </div>
                                                <div class="item up-load">
                                                    <label class="uploadfile" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="body-text">Drop your images here or select <span
                                                                class="tf-color">click to browse</span></span>
                                                        <input type="file" id="myFile" name="image">
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                        @error('name')
                                        <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="name">
                                            <div class="body-title">Publish <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="checkbox" placeholder="Publish" name="publish"
                                                tabindex="0" value="{{old('publish')}}" aria-required="true" required="">
                                        </fieldset>
                                        @error('publish')
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
});


</script>
@endpush

