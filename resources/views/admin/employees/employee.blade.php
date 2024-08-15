@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') {{ $title }} @endslot
@slot('subtitle') {{ $user->full_name }} @endslot
@endcomponent

<!-- Content area -->
<div class="content">

    <!-- Inner container -->
    <div class="d-lg-flex align-items-lg-start">

        <!-- Left sidebar component -->
        <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Navigation -->
                <div class="card">
                    <div class="sidebar-section-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img class="img-fluid rounded-circle" src="{{URL::asset('assets/images/demo/users/face11.jpg')}}" width="150" height="150" alt="">
                            <div class="card-img-actions-overlay card-img rounded-circle">
                                <a href="#" class="btn btn-outline-white btn-icon rounded-pill">
                                    <i class="ph-pencil"></i>
                                </a>
                            </div>
                        </div>

                        <h6 class="mb-0">{{ $user->full_name }}</h6>
                        <span class="text-muted">{{$user->position->name ?? ''}}</span><br>
                        <span class="text-muted">{{$user->department->name ?? ''}}</span><br>
                        <span class="text-primary"><i class="ph-envelope"></i> {{$user->email ?? ''}}</span><br>
                        <span class="text-muted">Employee Number: {{$user->employee_number ?? ''}}</span><br>
                        <span class="text-muted">Joined On: {{ Carbon\Carbon::parse($user->joining_date ?? '')->format('d F, Y')}}</span><br>
                    </div>

                    <ul class="nav nav-sidebar">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                                <i class="ph-user me-2"></i>
                                My profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#address" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-calendar me-2"></i>
                                Address Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#family" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-users-three me-2"></i>
                                Family Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#job" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-briefcase me-2"></i>
                                Job History
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#salary" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-calendar me-2"></i>
                                Salary History
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#benefits" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-gift me-2"></i>
                                Benefits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#leave" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-calendar me-2"></i>
                                Leave Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#loans" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-calendar me-2"></i>
                                Loans & Advances
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#learning" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-graduation-cap me-2"></i>
                                Learning & Development
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#qualifications" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-calendar me-2"></i>
                                Qualifications & Experiences
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#documents" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-folder me-2"></i>
                                Documents
                            </a>
                        </li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item">
                            <a href="#policies" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-article me-2"></i>
                                Policies
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /left sidebar component -->


        <!-- Right content -->
        <div class="tab-content flex-fill">
            <div class="tab-pane fade active show" id="profile">

                <!-- Profile info -->
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="mb-0 text-white"><i class="ph-user me-1"></i>Profile information</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Full Name</strong></td>
                                            <td><span class="font-weight-semibold text-right">{{ $user->full_name ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender</strong></td>
                                            <td><span class="text-right">{{ $user->gender ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date of Birth</strong></td>
                                            <td><span class="text-right">{{ Carbon\Carbon::parse($user->dob ?? '')->format('d F, Y') }}</span></td>
                                        </tr>
                                        {{-- <tr>
                                            <td><strong>Marital Status</strong></td>
                                            <td><span class="text-right">{{ $user->maritalStatus->name ?? '' }}</span></td>
                                        </tr> --}}
                                        <tr>
                                            <td><strong>Nationality</strong></td>
                                            <td><span class="font-weight-semibold text-right">{{ $user->nationality ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Disability</strong></td>
                                            <td><span class="font-weight-semibold text-right">@if($user->disability == 0) Not Disabled @elseif($user->disability == 1) Disabled @endif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /profile info -->


                <!-- Contact Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="ph-phone-call me-1"></i>Contact Information</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Work Email Address:') }}</td>
                                            <td><span class="text-right text-primary">{{ $user->email ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Personal Email Address:') }}</td>
                                            <td><span class="text-right">{{ $user->personal_email ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Office Phone Number:') }}</td>
                                            <td><span class="text-right">{{ $user->office_number ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Mobile Phone Number:') }}</td>
                                            <td><span class="text-right">{{ $user->personal_number ?? '' }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Contact Information -->

                <!-- Identification Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="ph-user me-1"></i>Identification Information</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ __('National ID Number:') }}</td>
                                            <td><span class="text-right">{{ $user->nin ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('NSSF Number:') }}</td>
                                            <td><span class="text-right">{{ $user->nssf_number ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Insurance Number:') }}</td>
                                            <td><span class="text-right">{{ $user->insurance_number ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Passport Number:') }}</td>
                                            <td><span class="text-right">{{ $user->passport_number ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('TIN Number:') }}</td>
                                            <td><span class="text-right">{{ $user->tin ?? '' }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Identification Information -->

                <!-- Employement Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="ph-briefcase me-1"></i>Employment Information</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Employee Number:') }}</td>
                                            <td><span class="text-right">{{ $user->employee_number ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Position:') }}</td>
                                            <td><span class="text-right">{{ $user->position->name ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Employee Type:') }}</td>
                                            <td><span class="text-right">{{ $user->employeeType->name ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Line Manager:') }}</td>
                                            <td><span class="text-right">{{ $user->line_manager->full_name ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Department:') }}</td>
                                            <td><span class="text-right">{{ $user->department->name ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Directorate:') }}</td>
                                            <td><span class="text-right">{{ $user->department->directorate->name ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Office Location:') }}</td>
                                            <td><span class="text-right">{{ $user->location->name ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Band:') }}</td>
                                            <td><span class="text-right">{{ $user->position->band->name ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Grade:') }}</td>
                                            <td><span class="text-right">{{ $user->position->band->grade ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Project:') }}</td>
                                            {{-- <td><span class="text-right">{{ $user->project->name ?? '' }}</span></td> --}}
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Employment Information -->

                <!-- Languages Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="ph-users me-1"></i>Languages & Skills</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Languages:') }}</td>
                                            <td><span class="text-right">{{ $user->languages ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Skills:') }}</td>
                                            <td><span class="text-right">{{ $user->skills ?? '' }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Languages Information -->

            </div>

            <div class="tab-pane fade" id="address">

                <!-- Current Address -->
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="mb-0 text-white"><i class="ph-house me-1"></i>Current Address</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /Current Address -->


                <!-- Permanent Address -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="ph-house-line me-1"></i>Permanent Address</h5>
                    </div>

                    <div class="card-body">
                    </div>
                </div>
                <!-- /Permanent Address -->

            </div>

            <div class="tab-pane fade" id="family">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->


                <!-- Schedule -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">My schedule</h5>
                    </div>

                    <div class="card-body">
                        <div class="my-schedule"></div>
                    </div>
                </div>
                <!-- /schedule -->

            </div>

            <div class="tab-pane fade" id="job">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="tab-pane fade" id="salary">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="tab-pane fade" id="benefits">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="tab-pane fade" id="leave">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="tab-pane fade" id="loans">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="tab-pane fade" id="learning">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="tab-pane fade" id="qualifications">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="tab-pane fade" id="documents">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="tab-pane fade" id="policies">

                <!-- Available hours -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Available hours</h5>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
                <!-- /available hours -->

            </div>
        </div>
        <!-- /right content -->

    </div>
    <!-- /inner container -->

</div>
<!-- /content area -->

@endsection
@section('center-scripts')
<script src="{{URL::asset('assets/js/vendor/visualization/echarts/echarts.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/ui/fullcalendar/main.min.js')}}"></script>
@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/user_pages_profile.js')}}"></script>
<script src="{{URL::asset('assets/demo/charts/echarts/bars/tornado_negative_stack.js')}}"></script>
<script src="{{URL::asset('assets/demo/charts/pages/profile/balance_stats.js')}}"></script>
<script src="{{URL::asset('assets/demo/charts/pages/profile/available_hours.js')}}"></script>
@endsection
