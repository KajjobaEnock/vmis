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
        <div class="card-header">
            <h5 class="mb-0">{{$subtitle}}</h5>
        </div>

        <div class="card-body">
            All of the data export buttons have a <code>exportOptions</code> option which can be used to specify information about what data should be exported and how. In this example the copy button will export column index 0 and all visible columns, the Excel button will export only the visible columns and the PDF button will export column indexes 0, 1, 2 and 5 only. Column visibility controls are also included so you can change the columns easily.
        </div>

        <table class="table datatable-button-html5-columns">
            <thead>
                <tr>
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
