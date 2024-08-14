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
            <h5 class="py-3 mb-0">{{$subtitle}}</h5>
            <div class="ms-auto my-auto">
                <a href="{{ route('bands.create') }}" class="btn btn-primary"> <i class="ph-plus-circle me-1"></i> New Employee</a>
            </div>
        </div>

        <div class="nav-tabs-responsive">
            <ul class="nav nav-tabs nav-tabs-underline flex-nowrap mb-0">
                <li class="nav-item">
                    <a href="#course-overview" class="nav-link active" data-bs-toggle="tab">
                        <i class="ph-list me-2"></i>
                        All Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#course-attendees" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-users-three me-2"></i>
                        Active Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#course-schedule" class="nav-link" data-bs-toggle="tab">
                        <i class="ph-calendar me-2"></i>
                        Deactivated Employees
                    </a>
                </li>
            </ul>
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

            <table class="table datatable-button-html5-columns">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Full Name</th>
                        <th>Employee Number</th>
                        <th>Email Address</th>
                        <th>Employee Contract Type</th>
                        <th>Position</th>
                        <th>Band</th>
                        <th>Grade</th>
                        <th>Department</th>
                        <th>Directorate</th>
                        <th>Joining Date</th>
                        <th>Status</th>
                        <th>Supervisor</th>
                        <th>Office Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><a href="{{route('bands.show', $user->id)}}">{{ $user->full_name }}</a></td>
                        <td>{{ $user->employee_number ?? '' }}</td>
                        <td>{{ $user->email ?? '' }}</td>
                        <td>{{ $user->employeeType->name ?? '' }}</td>
                        <td>{{ $user->position->name ?? '' }}</td>
                        <td>{{ $user->position->band->name ?? '' }}</td>
                        <td>{{ $user->position->band->grade ?? '' }}</td>
                        <td>{{$user->department->name ?? ''}}</td>
                        <td>{{$user->department->directorate->name ?? ''}}</td>
                        <td>{{ $user->joining_date ?? '' }}</td>
                        <td>@if($user->status == 0) <span class="badge badge-warning">Inactive</span>
                            @elseif($user->status ==1) <span class="badge badge-success">Active</span>
                            @endif
                        </td>
                        <td>{{ $user->line_manager->full_name ?? '' }}</td>
                        <td>{{ $user->location->name ?? '' }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{route('bands.show', $user->id)}}" class="dropdown-item">
                                            <i class="ph-file-pdf me-2"></i>
                                            View Employee
                                        </a>
                                        <a href="{{route('bands.edit', $user->id)}}" class="dropdown-item">
                                            <i class="ph-file-csv me-2"></i>
                                            Edit Employee
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-doc me-2"></i>
                                            Delete Employee
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
                    <span class="fw-semibold">No {{ $title }} added yet!!</span>
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
