@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Events</h3>
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
                                            <div class="text-tiny">Events</div>
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
                                        <a class="tf-button style-1 w208" href="{{route('admin.event.create')}}"><i
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
                                                        <th>Title</th>
                                                        <th>Message</th>
                                                        <th>Posted by</th>                                                       
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($events as $event)
                                                  
                                                    <tr>
                                                        <td>{{$event->id}}</td>
                                                        <td>{{$event->event_name}}</td>
                                                        <td>{{$event->event_description}}</td>
                                                        <td>{{ $event->event_date}}</td>
                                                        <td>{{ $event->event_time}}</td>
                                                        
                                                        <td>
                                                            <div class="list-icon-function">
                                                                <a href="{{route('admin.event.edit',['id'=>$event->id])}}">
                                                                    <div class="item edit">
                                                                        <i class="icon-edit-3"></i>
                                                                    </div>
                                                                </a>
                                                                <form action="{{ route('admin.event.delete', ['id' => $event->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="item text-danger delete">
                                                                        <i class="icon-trash-2"></i>
                                                                    </button>
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
                                            {{ $events->links('pagination::bootstrap-5') }}

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