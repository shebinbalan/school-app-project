@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Create Event</h3>
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
                        <div class="text-tiny">Events</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Events</div>
                </li>
            </ul>
        </div>
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{route('admin.event.store')}}" method="POST">
                @csrf
                
                <fieldset class="name">
                    <div class="body-title">Event name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Title" name="event_name"
                        tabindex="0" value="{{old('event_name')}}" aria-required="true" required>
                </fieldset>
                @error('event_name')
                    <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                @enderror
   
                <fieldset class="name">
                    <div class="body-title">Event description <span class="tf-color-1">*</span></div>
                    <textarea class="mb-10 ht-150" name="event_description"
                        placeholder="Message" tabindex="0" aria-required="true"
                        required>{{old('event_description')}}</textarea> 
                </fieldset>
                @error('event_description')
                    <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                @enderror
                
                <fieldset class="name">
                    <div class="body-title">Event Date <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="date" placeholder="Title" name="event_date"
                        tabindex="0" value="{{old('event_date')}}" aria-required="true" required>
                </fieldset>
                @error('event_name')
                    <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                @enderror
                <fieldset class="name">
                    <div class="body-title">Event Time <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="time" placeholder="Title" name="event_time"
                        tabindex="0" value="{{old('event_time')}}" aria-required="true" required>
                </fieldset>
                @error('event_name')
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