@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') {{ $title }} @endslot
@slot('subtitle') {{ $subtitle }} @endslot
@endcomponent

<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">Update Position Information</h5>
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
                        <span class="fw-semibold">Position details could not be updated, please check the errors below and try again!</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                {{ Form::model($position, array('route' => array('positions.update', $position->id), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Position Name:') }} <span style="color: red;">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $position->name ?? '') }}" placeholder="Position Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="loan_type" class="col-form-label text-md-right">{{ __('Band:') }} <span style="color: red;">*</span></label>
                                    <select class="form-control select {{$errors->has('band') ? 'is-invalid': ''}} required" id="band" name="band" data-placeholder="Select Position Band">
                                        @foreach ($bands as $band)
                                            <option></option>
                                            <option value="{{ $band->id }}" @if($position->band_id == $band->id) selected='selected' @endif >{{ $band->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('band')
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
                                <div class="mb-3">
                                    <label for="category1" class="col-form-label text-md-right">{{ __('Categorization One:') }} <span style="color: red;">*</span></label>
                                    <select class="form-control select {{$errors->has('category1') ? 'is-invalid': ''}} required" id="category1" name="category1" data-placeholder="Select Categorization">
                                        @foreach ($categories1  as $category1)
                                            <option></option>
                                            <option value="{{ $category1->id }}" @if($position->categorization_one_id == $category1->id) selected='selected' @endif >{{ $category1->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="category2" class="col-form-label text-md-right">{{ __('Categorization Two:') }} <span style="color: red;">*</span></label>
                                    <select class="form-control select {{$errors->has('category2') ? 'is-invalid': ''}} required" id="category2" name="category2" data-placeholder="Select Categorization">
                                        @foreach ($categories2  as $category2)
                                            <option></option>
                                            <option value="{{ $category1->id }}" @if($position->categorization_two_id == $category2->id) selected='selected' @endif >{{ $category2->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category2')
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
                                <div class="mb-3">
                                    <label for="team" class="col-form-label text-md-right">{{ __('Team:') }} <span style="color: red;">*</span></label>
                                    <select class="form-control select {{$errors->has('team') ? 'is-invalid': ''}} required" id="team" name="team" data-placeholder="Select Team">
                                        @foreach ($teams  as $team)
                                            <option></option>
                                            <option value="{{ $team->id }}" @if($position->team_id == $team->id) selected='selected' @endif >{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('team')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="loan_type" class="col-form-label text-md-right">{{ __('Supervisor:') }} <span style="color: red;">*</span></label>
                                    <select class="form-control select {{$errors->has('supervisor') ? 'is-invalid': ''}} required" id="supervisor" name="supervisor" data-placeholder="Select Supervisor">
                                        @foreach ($positions  as $position)
                                            <option></option>
                                            <option value="{{ $position->id }}" @if($position->supervisor == $position->id) selected='selected' @endif >{{ $position->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supervisor')
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
                                    <div class="mb-3">
                                        <label for="status">Status: <span class="text-danger">*</span></label>
                                        {{ Form::select('status', [''=>'', '1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control select', 'data-placeholder'=>'Directorate Status']) }}
                                        @error('status')
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
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="details" class="col-form-label text-md-right">{{ __('Directorate Description') }}</label>
                                        <textarea id="details" rows="5" class="form-control summernote @error('details') is-invalid @enderror" name="details" value="{{ old('details', $position->details) }}" placeholder="Directorate Description">{{ old('details', $position->details) }}</textarea>
                                        @error('details')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <button type="reset" class="btn btn-light">Cancel</button>
                            <button type="submit" class="btn btn-primary ms-3">Update Position <i class="ph-paper-plane-tilt ms-2"></i></button>
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
