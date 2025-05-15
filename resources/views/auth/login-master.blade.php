<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Performance Management System</title>
    <link rel="icon" type="image/x-icon" href="{{URL::asset('assets/images/uetcl_logo.png')}}">
     <!-- Global stylesheets -->
    <link href="{{URL::asset('assets/fonts/inter/inter.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('assets/icons/phosphor/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('assets/css/login.min.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('assets/css/all.min.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{URL::asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- /core JS files -->

    <style>
        .lines{
            display: block !important;
            width:100%;
            display:none;
        }
    </style>

</head>

<body>

    <div id="pms-layout"></div>
    <div class="lines">
        <div class="black_line" style="display:block;width:100%;border-bottom:5px solid black"></div>
    </div>
    <div class="lines">
        <div class="black_line" style="display:block;width:100%;border-bottom:5px solid #FDB209"></div>
    </div>
    <div class="lines">
        <div class="black_line" style="display:block;width:100%;border-bottom:5px solid #D32D27"></div>
    </div>
    <div class="page-container new layout-row layout-align-start-center">
        <div class="col-lg-7 layout-column left-container flex-65 vh-100">

            <!-- Overlay Background -->
            <div class="bg-overlay-primary">
                <img src="{{ URL::asset('assets/images/backgrounds/image1.png') }}" class="img-fluid img-cover" alt="" style="min-height: 100%">
            </div>
            <!-- /overlay background -->

            <div class="body layout-column layout-align-center flex" style="margin-top: 300px;">

                <div class="card-body">
                    <div class="text-center mb-3 pt-2">
                        <img src="" alt="">
                        <h1 class="mb-3 mt-4 font-weight-bold">Veterans Information Management System</h1>
                        <h5 class="mb-0 text-white-800">Veterans Registration Management, Verification, Tracking & Reporting, Streamlines and Supports Data Driven Decision Making</h5>
                    </div>

                    <div class="form-group text-center">
                        <button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-4 p-4 mb-3 mt-1"><i class="icon-reading icon-2x"></i></button>
                        <button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2 p-4 mb-3 mt-1"><i class="icon-calendar2 icon-2x"></i></button>
                        <button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2 p-4 mb-3 mt-1"><i class="icon-graduation2 icon-2x"></i></button>
                        <button type="button" class="btn btn-outline bg-success border-success text-success btn-icon rounded-round border-2 ml-2 p-4 mb-3 mt-1"><i class="icon-collaboration icon-2x"></i></button>
                    </div>

                    <div class="text-center text-dark content-divider">
                        <span class="px-2">Directorate of Veterans Affairs</span>
                    </div>
                </div>
            </div>

            <div class="footer layout-row layout-align-start-center">
                <div class="rights">
                    &copy; {{date('Y')}} {{config('app.name')}}
                </div>
                <div>
                    <a target="_blank" href="" style="color: #f54811">Privacy Policy</a>
                </div>
            </div>
        </div>

        <div class="col-lg-5 right-container layout-column layout-align-center-center flex-35 vh-100" id="login-form">
            <div class="content-container form-container new">
                <!-- Login form -->
                <form class="" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-0">
                        <div class="card-body">
                            <div class="text-center mb-2">
                                <div class="d-inline-flex align-items-center justify-content-center">
                                    <img src="{{URL::asset('assets/images/vmis.png')}}" alt="" style="height: 10rem !important;">
                                </div>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Enter your credentials below</span>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger alert-icon-start alert-dismissible fade show">
                                    <span class="alert-icon bg-danger text-white">
                                        <i class="ph-x-circle"></i>
                                    </span>
                                    <span class="fw-semibold">{{__('Login Failed, Please try again!!')}}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="username" class="col-form-label text-md-right">{{ __('Username') }}</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input id="text" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Enter your Username">
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-user-circle text-muted"></i>
                                    </div>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input id="password" type="password" value="123456" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="•••••••••••">
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-lock text-muted"></i>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100"> {{ __('Login') }}</button>
                            </div>

                            <div class="text-center">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login form -->
            </div>
        </div>
    </div>
</body>
</html>
