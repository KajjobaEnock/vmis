@extends('layouts.master')
@section('content')
@component('components.breadcrumb')
@slot('title') Forms @endslot
@slot('subtitle') Wizard @endslot
@endcomponent

<!-- Content area -->
<div class="content">

    <!-- Legend -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Fieldsets with legend</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Name:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Themesbrand">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Password:</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" placeholder="Your strong password">
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>

        <div class="card-body border-top">
            <form action="#">
                <fieldset>
                    <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Mandatory fields</legend>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Name:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Themesbrand">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Password:</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" placeholder="Your strong password">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Optional fields</legend>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Your state:</label>
                        <div class="col-lg-9">
                            <select class="form-control form-control-select2">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="KY">Kentucky</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Gender:</label>
                        <div class="col-lg-9">
                            <div class="form-check-horizontal">
                                <label class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender" checked>
                                    <span class="form-check-label">Male</span>
                                </label>

                                <label class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender">
                                    <span class="form-check-label">Female</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Your avatar:</label>
                        <div class="col-lg-9">
                            <input type="file" class="form-control">
                            <div class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="fs-base fw-bold border-bottom pb-2 mb-3">Additional information</legend>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Tags:</label>
                        <div class="col-lg-9">
                            <select multiple="multiple" data-placeholder="Enter tags" class="form-control form-control-select2-icons">
                                <option value="slack" data-icon="slack-logo" selected>Slack</option>
                                <option value="instagram" data-icon="instagram-logo" selected>Instagram</option>
                                <option value="telegram" data-icon="telegram-logo">Telegram</option>
                                <option value="whatsapp" data-icon="whatsapp-logo">Whatsapp</option>
                                <option value="twitter" data-icon="twitter-logo">Twitter</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">Your message:</label>
                        <div class="col-lg-9">
                            <textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
                        </div>
                    </div>
                </fieldset>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit form <i class="ph-paper-plane-tilt ms-2"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /legend -->

</div>
<!-- /content area -->

@endsection
@section('center-scripts')
<script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/wizards/steps.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/validation/validate.min.js')}}"></script>
@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/form_wizard.js')}}"></script>
@endsection
