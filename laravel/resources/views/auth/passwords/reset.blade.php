@extends('auth.app')

@section('title', 'АКТИВ - Смяна На Парола')

@section('content')
    <section class="pb-0">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="main_title text-center">
                        <img src="/assets/front/img/logo.png" alt="logo" class="logo">

                        <h1 class="pt-2 my-3 font-weight-bold">Смени Парола</h1>
                    </div>
                    <div class="login-container">
                        <div class="card">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.request') }}"
                                  aria-label="{{ __('Reset Password') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="email"
                                               class="col-form-labelt">{{ __('E-Mail Address') }}</label>

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
                                               class="col-form-labelt">{{ __('Password') }}</label>

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
                                        <label for="password_confirmation"
                                               class="col-form-labelt">{{ __('Confirm Password') }}</label>

                                        <input id="password_confirmation" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password_confirmation" required placeholder="{{ __('Confirm Password') }}">
                                    </div>

                                    <div class="form-group col-12 mt-3 text-center">
                                        <button type="submit" class="btn-success text-uppercase px-5 mb-3">
                                            {{ __('Reset Password') }}
                                        </button>
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
