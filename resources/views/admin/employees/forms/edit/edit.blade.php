@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') Forms @endslot
@slot('subtitle') Wizard @endslot
@endcomponent

<script src="{{ URL::asset('assets/custom/employee_profile.js') }}"></script>

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
                    <span class="fw-semibold">Employee Bio data details could not be updated, please check the errors below and try again!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            {{ Form::model($employee, array('route' => array('employees.update', $employee->id), 'method' => 'POST')) }}
                @csrf
                <div class="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first current" aria-disabled="false" aria-selected="true">
                                <a id="steps-uid-0-t-0" href="{{ route('employees.edit', $employee->id) }}" aria-controls="steps-uid-0-p-0" class="disabled text-uppercase">
                                    <span class="current-info audible">current step: </span>
                                    <span class="number">1</span> Personal Information
                                </a>
                            </li>

                            <li role="tab" class="disabled" aria-disabled="true">
                                <a id="steps-uid-0-t-1" href="{{ route('edit.employment', $employee->id) }}" aria-controls="steps-uid-0-p-1" class="text-uppercase">
                                    <span class="number">2</span> Employment Details
                                </a>
                            </li>

                            <li role="tab" class="disabled" aria-disabled="true">
                                <a id="steps-uid-0-t-2" href="{{ route('employees.address', $employee->id) }}" aria-controls="steps-uid-0-p-2" class="disabled text-uppercase">
                                    <span class="number">3</span> Address Details
                                </a>
                            </li>

                            <li role="tab" class="disabled" aria-disabled="true">
                                <a id="steps-uid-0-t-2" href="{{ route('employees.family', $employee->id) }}" aria-controls="steps-uid-0-p-2" class="disabled text-uppercase">
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

                <fieldset>
                    <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Personal Information</legend>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="first_name" class="col-lg-3 col-form-label">{{ __('First Name:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="first_name_{{ $employee->id }}" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $employee->first_name ?? '' }}" autocomplete="first_name" autofocus placeholder="First Name" onblur="save_first_name('first_name_{{ $employee->id }}', {{ $employee->id }})">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="middle_name" class="col-lg-3 col-form-label">{{ __('Middle Name:') }}</label>
                                <div class="col-lg-9">
                                    <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ $employee->middle_name ?? '' }}" autocomplete="middle_name" autofocus placeholder="Middle Name">
                                    @error('middle_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="dob" class="col-lg-3 col-form-label">{{ __('Date of Birth:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $employee->dob ?? '' }}" required placeholder="Date of Birth">
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="marital_status" class="col-lg-3 col-form-label">{{ __('Marital Status:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <select class="form-control select {{$errors->has('marital_status') ? 'is-invalid': ''}} required" id="marital_status" name="marital_status" data-placeholder="Select Marital Status">
                                        @foreach ($marital_statuses as $marital)
                                            <option></option>
                                            <option value="{{ $marital->id }}" @if($employee->marital_status_id == $marital->id) selected='selected' @endif >{{ $marital->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('marital_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="last_name" class="col-lg-3 col-form-label">{{ __('Last Name:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $employee->last_name ?? '' }}" placeholder="Last Name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="gender" class="col-lg-3 col-form-label">{{ __('Gender:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    {{ Form::select('gender', [''=>'', 'Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control select required', 'data-placeholder'=>'Select Gender']) }}
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="nationality" class="col-lg-3 col-form-label">{{ __('Nationality:') }} <span style="color: red;">*</span></label>
                                <div class="col-lg-9">
                                    <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ $employee->nationality ?? '' }}" placeholder="Nationality">
                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="profile_picture" class="col-lg-3 col-form-label">{{ __('Profile Picture:') }} </label>
                                <div class="col-lg-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('profile_picture') is-invalid @enderror"  name="profile_picture" id="profile_picture">
                                        <label class="custom-file-label" for="profile_picture">Upload Profile Picture</label>
                                    </div>
                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                    @error('profile_picture')
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
                    <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Contact Information</legend>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="office_number" class="col-lg-3 col-form-label">{{ __('Office Number:') }}</label>
                                <div class="col-lg-9">
                                    <input id="office_number" type="text" class="form-control @error('office_number') is-invalid @enderror" name="office_number" value="{{ $employee->office_number ?? '' }}" placeholder="Office Phone Number">
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email ?? '' }}" placeholder="Work Email Address">
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
                                    <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ $employee->mobile_number ?? '' }}" placeholder="Mobile Phone Number">
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
                                    <input id="personal_email" type="email" class="form-control @error('personal_email') is-invalid @enderror" name="personal_email" value="{{ $employee->personal_email ?? '' }}" placeholder="Personal Email Address">
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
                                    <input id="nin" type="text" class="form-control @error('nin') is-invalid @enderror" name="nin" value="{{ $employee->nin ?? '' }}" placeholder="National ID Number">
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
                                    <input id="nssf_number" type="text" class="form-control @error('nssf_number') is-invalid @enderror" name="nssf_number" value="{{ $employee->nssf_number ?? '' }}" placeholder="NSSF Number">
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
                                    <input id="insurance_number" type="text" class="form-control @error('insurance_number') is-invalid @enderror" name="insurance_number" value="{{ $employee->insurance_number ?? '' }}" placeholder="Insurance Number">
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
                                    <input id="tin" type="text" class="form-control @error('tin') is-invalid @enderror" name="tin" value="{{ $employee->tin ?? '' }}" placeholder="TIN Number">
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
                                    <input id="passport_number" type="text" class="form-control @error('passport_number') is-invalid @enderror" name="passport_number" value="{{ $employee->passport_number ?? '' }}" placeholder="Passport Number">
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

                <fieldset>
                    <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Languages & Skills</legend>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="sills" class="col-lg-3 col-form-label">{{ __('Skills:') }} </label>
                                <div class="col-lg-9">
                                    <select multiple="multiple" name="skills" data-placeholder="Select Skills..." class="form-control form-control-lg select" data-container-css-class="select-lg" data-fouc>
                                        @foreach ($skills as $skill)
                                            <option></option>
                                            <option value="{{ $skill->id }}" @if($employee->skills == $skill->id) selected='selected' @endif >{{ $skill->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('skills')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="form-group row mb-3">
                                <label for="languages" class="col-lg-3 col-form-label">{{ __('Languages:') }} </label>
                                <div class="col-lg-9">
                                    <select multiple="multiple" name="languages" data-placeholder="Select Languages..." class="form-control form-control-lg select" data-container-css-class="select-lg" data-fouc>
                                        @foreach ($languages as $language)
                                            <option></option>
                                            <option value="{{ $language->id }}" @if($employee->languages == $language->id) selected='selected' @endif >{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('languages')
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
                    <button type="submit" class="btn btn-primary ms-3">Continue <i class="ph-paper-plane-tilt ms-2"></i></button>
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
