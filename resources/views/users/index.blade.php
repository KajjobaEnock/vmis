@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') {{$title}} @endslot
@slot('subtitle') {{$subtitle}} @endslot
@endcomponent

<!-- Content area -->
<div class="content">

    <!-- Column selectors -->
    <div class="card">
        <div class="card-header d-flex align-items-center py-0">
            <h3 class="py-3 mb-0">{{$subtitle}}</h3>
            <div class="ms-auto my-auto">
                <a href="{{ route('users.create') }}" class="btn btn-primary"> <i class="ph-plus-circle me-1"></i> Create New User</a>
            </div>
        </div>

        @if(Session::has('success'))
            <div class="card-body">
                <div class="alert alert-success alert-icon-start alert-dismissible fade show">
                    <span class="alert-icon bg-success text-white">
                        <i class="ph-check-circle"></i>
                    </span>
                     {!! session('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if($users->count() > 0)
            @php
                $i = 1;
            @endphp

            <table class="table datatable-button-html5-columns enock-table2">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><a href="{{route('users.edit', $user->id)}}">{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name }}</a></td>
                        <td>{{ $user->username ?? '' }}</td>
                        <td>{{ $user->email ?? '' }}</td>
                        <td>
                            @if($user->status == 0) <span class="badge bg-warning">Inactive</span>
                                @elseif($user->status == 1) <span class="badge bg-success">Active</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{route('users.show', $user->id)}}" class="dropdown-item">
                                            <i class="ph-file-pdf me-2"></i>
                                            View User
                                        </a>
                                        <a href="{{route('users.edit', $user->id)}}" class="dropdown-item">
                                            <i class="ph-file-csv me-2"></i>
                                            Edit User
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-doc me-2"></i>
                                            Delete User
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        @else
            <div class="card-body">
                <div class="alert alert-warning alert-icon-start alert-dismissible fade show">
                    <span class="alert-icon bg-warning text-white">
                        <i class="ph-warning-circle"></i>
                    </span>
                    <span class="fw-semibold">No {{ $title }} in the system added yet!!</span>
                </div>
            </div>
        @endif
    </div>
    <!-- /column selectors -->

</div>
<!-- /content area -->

@endsection
@section('center-scripts')
<script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/datatables.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/buttons.min.js')}}"></script>
@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/datatables_extension_buttons_html5.js')}}"></script>
@endsection
