@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Create Announcement</h3>
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
                    <a href="{{route('admin.announcement.index')}}">
                        <div class="text-tiny">Announcements</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Announcement</div>
                </li>
            </ul>
        </div>
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{route('admin.announcement.store')}}" method="POST">
                @csrf
                
                <fieldset class="name">
                    <div class="body-title">Title <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Title" name="title"
                        tabindex="0" value="{{old('title')}}" aria-required="true" required>
                </fieldset>
                @error('title')
                    <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                @enderror
   
                <fieldset class="name">
                    <div class="body-title">Message <span class="tf-color-1">*</span></div>
                    <textarea class="mb-10 ht-150" name="message"
                        placeholder="Message" tabindex="0" aria-required="true"
                        required>{{old('message')}}</textarea> 
                </fieldset>
                @error('message')
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