@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Events infomation</h3>
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
                                                <div class="text-tiny">Events </div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Update Event</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('admin.event.update')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{$event->id}}">   
                                        <fieldset class="name">
                                            <div class="body-title">Event name <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Title" name="event_name"
                                                tabindex="0" value="{{$event->event_name}}" aria-required="true" required>
                                        </fieldset>
                                        @error('event_name')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                           
                                        <fieldset class="name">
                                            <div class="body-title">Event description <span class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="event_description"
                                                placeholder="Message" tabindex="0" aria-required="true"
                                                required>{{$event->event_description}}</textarea> 
                                        </fieldset>
                                        @error('event_description')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        
                                        <fieldset class="name">
                                            <div class="body-title">Event Date <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="date" placeholder="Title" name="event_date"
                                                tabindex="0" value="{{ $event->event_date }}" aria-required="true" required>
                                        </fieldset>
                                        @error('event_name')
                                            <span class="alert alert-danger text-center" role="alert">{{ $message }}</span>      
                                        @enderror
                                        <fieldset class="name">
                                            <div class="body-title">Event Time <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="time" placeholder="Title" name="event_time"
                                                tabindex="0" value="{{ $event->event_time }}" aria-required="true" required>
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



