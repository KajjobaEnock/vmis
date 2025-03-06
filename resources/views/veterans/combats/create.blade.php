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
            <h5 class="mb-0">Ex-Combatant Information</h5>
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
                        <span class="fw-semibold">Ex-Combatant details could not be saved, please check the errors below and try again!</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <form action="{{route('ex-combatants.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Full Name:') }} <span style="color: red;">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ex-Combatant FUll Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="claimant_name" class="col-form-label text-md-right">{{ __('Name of Claimant:') }} <span style="color: red;">*</span></label>
                                        <input id="claimant_name" type="text" class="form-control @error('claimant_name') is-invalid @enderror" name="claimant_name" value="{{ old('claimant_name') }}" placeholder="Name of Claimant">
                                        @error('claimant_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="nin" class="col-form-label text-md-right">{{ __('NIN:') }} <span style="color: red;">*</span></label>
                                        <input id="nin" type="text" class="form-control @error('nin') is-invalid @enderror" name="nin" value="{{ old('nin') }}" placeholder="Enter NIN">
                                        @error('nin')
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
                                        <label for="rank" class="col-form-label text-md-right">{{ __('Rank:') }} <span style="color: red;">*</span></label>
                                        <select class="form-control select {{$errors->has('rank') ? 'is-invalid': ''}} required" id="rank" name="rank" data-placeholder="Select Rank">
                                            @foreach ($ranks as $rank)
                                                <option></option>
                                                <option value="{{ $rank->id }}" @if(old('rank')&&old('rank')== $rank->id) selected='selected' @endif >{{ $rank->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                        @error('rank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="village" class="col-form-label text-md-right">{{ __('Village:') }} <span style="color: red;">*</span></label>
                                        <input id="village" type="text" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village') }}" placeholder="Village">
                                        @error('village')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="parish" class="col-form-label text-md-right">{{ __('Parish:') }} <span style="color: red;">*</span></label>
                                        <select class="form-control select {{$errors->has('parish') ? 'is-invalid': ''}} required" id="parish" name="parish" data-placeholder="Select Parish">
                                            @foreach ($parishes as $parish)
                                                <option></option>
                                                <option value="{{ $parish->id }}" @if(old('parish')&&old('parish')== $parish->id) selected='selected' @endif >{{ $parish->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                        @error('parish')
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
                                        <label for="amount" class="col-form-label text-md-right">{{ __('Amount:') }} <span style="color: red;">*</span></label>
                                        <input id="amount" type="nummber" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="Amount">
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="account_name" class="col-form-label text-md-right">{{ __('Account Name:') }} <span style="color: red;">*</span></label>
                                        <input id="account_name" type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name') }}" placeholder="Account Name">
                                        @error('account_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="account_number" class="col-form-label text-md-right">{{ __('Account Number:') }} <span style="color: red;">*</span></label>
                                        <input id="account_number" type="number" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" placeholder="Account Number">
                                        @error('account_number')
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
                                        <label for="bank" class="col-form-label text-md-right">{{ __('Bank Name:') }} <span style="color: red;">*</span> </label>
                                        <input id="bank" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" value="{{ old('bank') }}" placeholder="Bank Name">
                                        @error('bank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="telephone" class="col-form-label text-md-right">{{ __('Telephone:') }} <span style="color: red;">*</span> </label>
                                        <input id="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" placeholder="Telephone">
                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="living_status" class="col-form-label text-md-right">{{ __('Living Status:') }} <span style="color: red;">*</span> </label>
                                        {{ Form::select('living_status', [''=>'', '1' => 'Living', '2' => 'Deceased'], null, ['class' => 'form-control select required', 'data-placeholder'=>'Select Living Status']) }}
                                        @error('living_status')
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
                                        <label for="file_status" class="col-form-label text-md-right">{{ __('File Status:') }} <span style="color: red;">*</span> </label>
                                        {{ Form::select('file_status', [''=>'', '1' => 'Complete', '0' => 'Incomplete'], null, ['class' => 'form-control select required', 'data-placeholder'=>'Select File Status']) }}
                                        @error('file_status')
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
                                        <label for="remarks" class="col-form-label text-md-right">{{ __('Remarks:') }} </label>
                                        
                                        <textarea rows="4" class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks"> {{ old('remarks') }}</textarea>
                                        @error('remarks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('ex-combatants.index') }}" class="btn btn-light">Back to List</a>
                            <button type="submit" class="btn btn-primary ms-3">Save Details <i class="ph-paper-plane-tilt ms-2"></i></button>
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
