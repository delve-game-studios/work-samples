@extends('auth.app')

@section('title', 'АКТИВ - Вход')

@section('content')
    <section class="pb-0">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="main_title text-center">
                    <img src="/assets/front/img/logo.png" alt="logo" class="logo">

                        <h1 class="pt-2 my-3">Вход</h1>
                    </div>
                    <div class="login-container">
                        <div class="card">
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-12">
                                        <label for="email"
                                               class="col-form-label">{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-Mail Address') }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="password"
                                               class="col-form-label">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required placeholder="{{ __('Password') }}">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="checkbox">
                                            <label class="d-flex align-items-centerf ont-weight-bold">
                                                <input class="mr-3" type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 text-center">
                                        <button type="submit" class="btn-success text-uppercase px-5 mb-3">
                                            {{ __('Log In') }}
                                        </button>

                                        <a class="btn btn-link text-success sm-fs" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password') }}?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
