@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Marks</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Marks</div>
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
                <a class="tf-button style-1 w208" href="{{ route('admin.marks.create') }}">
                    <i class="icon-plus"></i>Add new
                </a>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    @if(Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Class</th>
                            <th>Marks</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($marks as $mark)
                            <tr>
                                <td>{{ $mark->id }}</td>
                                <td>{{ $mark->student->name }}</td>
                                <td>{{ $mark->class_id }}</td>
                                <td>{{ $mark->marks }}</td>
                                <td>{{ $mark->subject}}</td>

                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.marks.edit', ['id' => $mark->id]) }}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('admin.marks.delete', ['id' => $mark->id]) }}"
                                              method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="item text-danger delete" style="background: none; border: none; cursor: pointer;">
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
                    {{ $marks->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
