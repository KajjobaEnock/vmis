@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') Forms @endslot
@slot('subtitle') Select2 Selects @endslot
@endcomponent

<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-header d-flex flex-wrap">
            <h5 class="mb-0">{{ $subtitle }}</h5>
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
                        <span class="fw-semibold">Team details could not be updated, please check the errors below and try again!</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                {{ Form::model($band, array('route' => array('bands.update', $band->id), 'method' => 'PUT')) }}
                    @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Team Name:') }} <span style="color: red;">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $band->name) }}" placeholder="Team Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="grade" class="col-form-label text-md-right">{{ __('Grade:') }} <span style="color: red;">*</span></label>
                                        <input id="grade" type="text" class="form-control @error('name') is-invalid @enderror" name="grade" value="{{ old('grade', $band->grade) }}" placeholder="Grade">
                                        @error('grade')
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
                                        <label for="status" class="col-form-label text-md-right">Status: <span class="text-danger">*</span></label>
                                        {{ Form::select('status', [''=>'', '1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control select', 'data-placeholder'=>'Team Status']) }}
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
                                        <label for="details" class="col-form-label text-md-right">{{ __('Team Description') }}</label>
                                        <textarea id="details" rows="5" class="form-control summernote @error('details') is-invalid @enderror" name="details" value="{{ old('details', $band->details) }}" placeholder="Team Description">{{ old('details', $band->details) }}</textarea>
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
                            <button type="submit" class="btn btn-primary ms-3">Update Team <i class="ph-paper-plane-tilt ms-2"></i></button>
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
