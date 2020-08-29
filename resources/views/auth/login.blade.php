@extends('layouts.empty', ['paceTop' => true])

@section('title', 'Login Page')

@section('content')
    <div class="login-cover">
        <div class="login-cover-image" style="background-image: url({{$login_background_image}})"
             data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">

                <a href="{{ url('/') }}" class="navbar-brand"><span class="navbar-logo"></span> <img
                            src="{{ $companyDetailLogo }}"
                            class="img-responsive " width="36" height="36"> <b>{{$headerNameBold}}</b> </a>

                <small>{{$headerAcronymBold}} </small>

            </div>
            <div class="icon">
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <!-- end brand -->
        <!-- begin login-content -->
        <div class="login-content">
            <form method="POST" action="{{ route('login') }}" class="margin-bottom-0">
                @csrf

                <div class="form-group m-b-20">
                    <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                           autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group m-b-20">
                    <input id="password" class="form-control input-lg" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="checkbox m-b-20">

                    <label class="form-check-label" for="remember">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                        {{ __('Remember Me') }}

                    </label>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-success btn-block btn-lg">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                </div>
                <div class="m-t-20">
                    Not a member yet? Click <a href="{{ __('register') }}">here</a> to register.
                </div>
            </form>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end login -->


@endsection

@push('scripts')
    <script src="/assets/js/demo/login-v2.demo.js"></script>
    <script>
        $(document).ready(function () {
            LoginV2.init();
        });
    </script>
@endpush
