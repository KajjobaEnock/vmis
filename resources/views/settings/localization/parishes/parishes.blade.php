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
        @include('settings.localization.header')
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

        @if($parishes->count() > 0)
            @php
                $i = 1;
            @endphp

            <table class="table datatable-button-html5-columns">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Parish Name</th>
                        <th>Subcounty</th>
                        <th>County</th>
                        <th>District</th>
                        <th>Region</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parishes as $parish)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><a href="{{route('parishes.show', $parish->id)}}">{{ $parish->name }}</a></td>
                        <td>{{ $parish->sub_county->name ?? '' }}</td>
                        <td>{{ $parish->sub_county->county->name ?? '' }}</td>
                        <td>{{ $parish->sub_county->county->district->name ?? '' }}</td>
                        <td>{{ $parish->sub_county->county->district->region->name ?? '' }}</td>
                        <td>
                            @if($parish->status == 0) <span class="badge bg-warning">Inactive</span>
                                @elseif($parish->status == 1) <span class="badge bg-success">Active</span>
                            @endif
                        </td>
                        <td>{{ $parish->details ?? '' }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{route('parishes.show', $parish->id)}}" class="dropdown-item">
                                            <i class="ph-file-pdf me-2"></i>
                                            View Parish
                                        </a>
                                        <a href="{{route('parishes.edit', $parish->id)}}" class="dropdown-item">
                                            <i class="ph-file-csv me-2"></i>
                                            Edit Parish
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-doc me-2"></i>
                                            Delete Parish
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
                    <span class="fw-semibold">No Parishes in the system added yet!!</span>
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