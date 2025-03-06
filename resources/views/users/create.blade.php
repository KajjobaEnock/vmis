@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') {{$title}} @endslot
@slot('subtitle') {{$subtitle}} @endslot
@endcomponent

<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">User Information</h5>
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

        <div class="collapse show">

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-icon-start alert-dismissible fade show">
                        <span class="alert-icon bg-danger text-white">
                            <i class="ph-x-circle"></i>
                        </span>
                        <span class="fw-semibold">User details could not be saved, please check the errors below and try again!</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <form action="{{route('users.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="first_name" class="col-form-label text-md-right">{{ __('First Name:') }} <span style="color: red;">*</span></label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="middle_name" class="col-form-label text-md-right">{{ __('Middle Name:') }} </label>
                                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" placeholder="Middle Name">
                                        @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="last_name" class="col-form-label text-md-right">{{ __('Last Name:') }} <span style="color: red;">*</span></label>
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="mobile_number" class="col-form-label text-md-right">{{ __('Mobile Number:') }} </label>
                                        <input id="mobile_number" type="tel" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Mobile Number">
                                        @error('mobile_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="gender" class="col-form-label text-md-right">{{ __('Gender:') }} </label>
                                        {{ Form::select('gender', [''=>'', 'Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control select required', 'data-placeholder'=>'Select Gender', 'onblur' => 'saveGender("gener", $user->id)']) }}
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label text-md-right">{{ __('Email Address:') }} <span style="color: red;">*</span> </label>
                                        <input id="email" type="type" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="username" class="col-form-label text-md-right">{{ __('Username:') }} <span style="color: red;">*</span> </label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="password" class="col-form-label text-md-right">{{ __('Password:') }} <span style="color: red;">*</span> </label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="•••••••••••">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password:') }} <span style="color: red;">*</span> </label>
                                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="•••••••••••">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-lg-6">
                                    {{-- <div class="mb-3">
                                        <label for="roles" class="col-form-label text-md-right">{{ __('Assign Roles::') }} <span style="color: red;">*</span></label>
                                        <div class="checkbox">
                                            @foreach ($roles as $role)
                                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                            @endforeach
                                        </div>
                                        @error('unit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('users.index') }}" class="btn btn-light">Back to Users</a>
                            <button type="submit" class="btn btn-primary ms-3">Create User <i class="ph-paper-plane-tilt ms-2"></i></button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /content area -->

@endsection
@section('center-scripts')
<script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/selects/select2.min.js')}}"></script>
@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/form_select2.js')}}"></script>
@endsection
