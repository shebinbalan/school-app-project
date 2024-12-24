@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>TimeTables</h3>
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
                                            <div class="text-tiny">Timetables</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{route('admin.timetable.create')}}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <div class="table-responsive">
                                            @if(Session::has('status'))
                                            <p class="alert alert-success">{{Session::get('status')}}</p>
                                            @endif
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Teacher</th>
                                                        <th>Course</th>
                                                        <th>Day Of Week</th>  
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Day Of Week</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($timetables as $timetable)
                                                    <tr>
                                                        <td>{{$timetable->id}}</td>
                                                        <td>{{$timetable->teacher->name}}</td>
                                                        <td>{{$timetable->course->course_name}}</td>
                                                        <td>{{$timetable->day->name}}</td>
                                                        <td>{{$timetable->start_time}}</td>
                                                        <td>{{$timetable->end_time}}</td>
                                                        <td>{{$timetable->classroom}}</td>
                                                        <td>
                                                            <div class="list-icon-function">
                                                                <a href="{{route('admin.timetable.edit',['id'=>$timetable->id])}}">
                                                                    <div class="item edit">
                                                                        <i class="icon-edit-3"></i>
                                                                    </div>
                                                                </a>
                                                                <form action="{{route('admin.timetable.delete',['id'=>$timetable->id])}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="item text-danger delete">
                                                                        <i class="icon-trash-2"></i>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                            {{ $timetables->links('pagination::bootstrap-5') }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection
@push('scripts')
<script>
$(function(){
    $('.delete').on("click",function(e){

        e.preventDefault();
        var form = $(this).closest('form');
        swal({
            title: "Are You sure",
            text:"Once Deleted you will not able to recover this Data",
            type:"warning",
            buttons:["No","Yes"],
            confirmButtonColor:'#dc3545',
        }).then(function(result){
            if(result)
                {
                    form.submit();
                }
        });
    });
   
});



</script>
@endpush