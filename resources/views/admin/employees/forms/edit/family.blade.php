@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') Forms @endslot
@slot('subtitle') Wizard @endslot
@endcomponent

<script type="text/javascript">
    var token = '{{ csrf_token() }}';
</script>

<script src="{{asset('custom/family.js')}}"></script>

<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">{{ __('Update Employee Biodata') }} - {{ $employee->full_name}}</h5>
            <div class="d-inline-flex ms-auto">
                <a class="text-body" data-card-action="collapse">
                    <i class="ph-caret-down"></i>
                </a>
                <a class="text-body mx-2" data-card-action="reload">
                    <i class="ph-arrows-clockwise"></i>
                </a>
                <a class="text-body" data-card-action="remove">
                    <i class="ph-x"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-icon-start alert-dismissible fade show">
                    <span class="alert-icon bg-danger text-white">
                        <i class="ph-x-circle"></i>
                    </span>
                    <span class="fw-semibold">Employee Family Details could not be updated, please check the errors below and try again!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            {{ Form::model($employee, array('route' => array('update.family', $employee->id), 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}
                @csrf
                <div class="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first done" aria-disabled="false" aria-selected="true">
                                <a id="steps-uid-0-t-0" href="{{ route('employees.edit', $employee->id) }}" aria-controls="steps-uid-0-p-0" class="disabled text-uppercase">
                                    <span class="number">1</span> Personal Information
                                </a>
                            </li>

                            <li role="tab" class="done" aria-disabled="false">
                                <a id="steps-uid-0-t-1" href="{{ route('edit.employment', $employee->id) }}" aria-controls="steps-uid-0-p-1" class="text-uppercase">
                                    <span class="number">2</span> Employment Details
                                </a>
                            </li>

                            <li role="tab" class="done" aria-disabled="false">
                                <a id="steps-uid-0-t-2" href="{{ route('employees.address', $employee->id) }}" aria-controls="steps-uid-0-p-2" class="disabled text-uppercase">
                                    <span class="number">3</span> Address Details
                                </a>
                            </li>

                            <li role="tab" class="current" aria-disabled="true">
                                <a id="steps-uid-0-t-2" href="{{ route('employees.family', $employee->id) }}" aria-controls="steps-uid-0-p-2" class="disabled text-uppercase">
                                    <span class="current-info audible">current step: </span>
                                    <span class="number">3</span> Family Details
                                </a>
                            </li>

                            <li role="tab" class="disabled" aria-disabled="true">
                                <a id="steps-uid-0-t-4" href="{{ route('employees.education', $employee->id) }}" aria-controls="steps-uid-0-p-4" class="disabled text-uppercase">
                                    <span class="number">5</span> Education Background
                                </a>
                            </li>

                            <li role="tab" class="disabled" aria-disabled="true">
                                <a id="steps-uid-0-t-5" href="{{ route('employees.employment_history', $employee->id) }}" aria-controls="steps-uid-0-p-5" class="text-uppercase">
                                    <span class="number">6</span> Employment History
                                </a>
                            </li>

                            <li role="tab" class="disabled" aria-disabled="true">
                                <a id="steps-uid-0-t-6" href="#steps-uid-0-h-6" aria-controls="steps-uid-0-p-6" class="text-uppercase">
                                    <span class="number">7</span> Preview
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                @if ($employee->marital_status_id == 1)

                    <fieldset>
                        <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Spouse Details</legend>

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row mb-3">
                                    <label for="full_name" class="col-lg-3 col-form-label">{{ __('Full Name:') }} <span style="color: red;">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ $employee->spouse->full_name ?? '' }}" autocomplete="full_name" placeholder="Full Name" onblur="saveFullName('full_name', {{ $employee->id }})">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="marriage_certificate" class="col-lg-3 col-form-label">{{ __('Marriage Certificate:') }}</label>
                                    <div class="col-lg-9">
                                        <input id="marriage_certificate" type="file" class="form-control @error('marriage_certificate') is-invalid @enderror" name="marriage_certificate" value="{{ $employee->spouse->attachment ?? '' }}" autocomplete="marriage_certificate" autofocus placeholder="Upload Marriage Certicate" onblur="saveMarriageCertificate('marriage_certificate', {{ $employee->id }})">
                                        @error('marriage_certificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group row mb-3">
                                    <label for="phone_number" class="col-lg-3 col-form-label">{{ __('Phone Number:') }} </label>
                                    <div class="col-lg-9">
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $employee->spouse->phone_number ?? '' }}" placeholder="Phone Number" onblur="savePhoneNumber('phone_number', {{ $employee->id }})">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="details" class="col-lg-3 col-form-label">{{ __('Details:') }} </label>
                                    <div class="col-lg-9">
                                        <textarea id="details" class="form-control @error('details') is-invalid @enderror" name="details" value="{{ $employee->spouse->details ?? '' }}" placeholder="Description" rows="5" onblur="saveDetails('details', '{{ $employee->id }}')">{{ $employee->Spouse->details ?? '' }}</textarea>
                                        @error('details')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                    </fieldset>
                @endif

                <fieldset>
                    <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Contact Information</legend>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="office_number" class="col-lg-3 col-form-label">{{ __('Office Number:') }}</label>
                                <div class="col-lg-9">
                                    <input id="office_number" type="text" class="form-control @error('office_number') is-invalid @enderror" name="office_number" value="{{ $employee->office_number ?? '' }}" placeholder="Office Phone Number" onblur="saveOfficeNumber('office_number', {{ $employee->id }})">
                                    @error('office_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="email" class="col-lg-3 col-form-label">{{ __('Work Email:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email ?? '' }}" placeholder="Work Email Address" onblur="saveEmail('email', {{ $employee->id }})">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="mobile_number" class="col-lg-3 col-form-label">{{ __('Mobile Number:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ $employee->mobile_number ?? '' }}" placeholder="Mobile Phone Number" onblur="saveMobileNumber('mobile_number', {{ $employee->id }})">
                                    @error('mobile_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="personal_email" class="col-lg-3 col-form-label">{{ __('Personal Email:') }} </label>
                                <div class="col-lg-9">
                                    <input id="personal_email" type="email" class="form-control @error('personal_email') is-invalid @enderror" name="personal_email" value="{{ $employee->personal_email ?? '' }}" placeholder="Personal Email Address" onblur="savePersonalEmail('personal_email', {{ $employee->id }})">
                                    @error('personal_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Identification Information</legend>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="nin" class="col-lg-3 col-form-label">{{ __('National ID Number:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="nin" type="text" class="form-control @error('nin') is-invalid @enderror" name="nin" value="{{ $employee->nin ?? '' }}" placeholder="National ID Number" onblur="saveNin('nin', {{ $employee->id }})">
                                    @error('nin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="nssf_number" class="col-lg-3 col-form-label">{{ __('NSSF Number:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="nssf_number" type="text" class="form-control @error('nssf_number') is-invalid @enderror" name="nssf_number" value="{{ $employee->nssf_number ?? '' }}" placeholder="NSSF Number" onblur="saveNssfNumber('nssf_number', {{ $employee->id }})">
                                    @error('nssf_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="insurance_number" class="col-lg-3 col-form-label">{{ __('Insurance Number:') }} </label>
                                <div class="col-lg-9">
                                    <input id="insurance_number" type="text" class="form-control @error('insurance_number') is-invalid @enderror" name="insurance_number" value="{{ $employee->insurance_number ?? '' }}" placeholder="Insurance Number" onblur="saveInsuranceNumber('insurance_number', {{ $employee->id }})">
                                    @error('insurance_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="tin" class="col-lg-3 col-form-label">{{ __('TIN Number:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="tin" type="text" class="form-control @error('tin') is-invalid @enderror" name="tin" value="{{ $employee->tin ?? '' }}" placeholder="TIN Number" onblur="saveTinNumber('tin', {{ $employee->id }})">
                                    @error('tin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="passport_number" class="col-lg-3 col-form-label">{{ __('Passport Number:') }} </label>
                                <div class="col-lg-9">
                                    <input id="passport_number" type="text" class="form-control @error('passport_number') is-invalid @enderror" name="passport_number" value="{{ $employee->passport_number ?? '' }}" placeholder="Passport Number" onblur="savePassportNumber('passport_number', {{ $employee->id }})">
                                    @error('passport_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="d-flex justify-content-end align-items-center">
                    <button type="reset" class="btn btn-light">Cancel</button>
                    <button type="submit" class="btn btn-primary ms-3">Update & Continue <i class="ph-paper-plane-tilt ms-2"></i></button>
                </div>

            {{ Form::close() }}
        </div>

    </div>
</div>
<!-- /content area -->

@endsection
@section('center-scripts')
<script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/selects/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/wizards/steps.min.js')}}"></script>
@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/form_select2.js')}}"></script>
<script src="{{URL::asset('assets/demo/pages/form_wizard.js')}}"></script>
@endsection
