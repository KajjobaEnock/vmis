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
            <h6 class="py-3 mb-0">{{$subtitle}}</h6>
            <div class="ms-auto my-auto">
                <a href="{{ route('departments.create') }}" class="btn btn-primary"> <i class="ph-plus-circle"></i> New Department</a>
            </div>
        </div>

        @if(Session::has('flash_message'))
            <div class="card-body">
                <div class="alert alert-success alert-icon-start alert-dismissible fade show">
                    <span class="alert-icon bg-success text-white">
                        <i class="ph-x-circle"></i>
                    </span>
                     {!! session('flash_message') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if($departments->count() > 0)
            @php
                $i = 1;
            @endphp

            <table class="table datatable-button-html5-columns">
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th>Directorate Name</th>
                        <th>Head</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Marth</td>
                        <td><a href="#">Enright</a></td>
                        <td>Traffic Court Referee</td>
                        <td> </td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-pdf me-2"></i>
                                            Export to .pdf
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-csv me-2"></i>
                                            Export to .csv
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-doc me-2"></i>
                                            Export to .doc
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
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
