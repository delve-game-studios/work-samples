@extends('auth.app')

@section('title', 'АКТИВ - Забравена Парола')

@section('content')
    <section class="pb-0">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="main_title text-center">
                        <img src="/assets/front/img/logo.png" alt="logo" class="logo">

                        <h2 class="pt-2 my-3 font-weight-bold">Забравена Парола</h2>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="password-reset-container">
                        <div class="card">
                            <form method="POST" action="{{ route('password.email') }}"
                                  aria-label="{{ __('Reset Password') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="email"
                                               class="col-form-label">{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email"
                                               value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}с">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-12 mt-3 text-center">
                                        <button type="submit" class="btn-success text-uppercase px-5 mb-3">
                                            {{ __('Send') }}
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
