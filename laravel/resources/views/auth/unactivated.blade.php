@extends('auth.app')

@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12 text-left">
                <div class="main_title">
                    <h1 class="p-0 d-inline-block text-center mb-5">Unactivated account</h1>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex">

            <div class="col-md-5">

                <p>Your account is not activated. Please check your email inbox for activation email or request a new one below.</p>

                <form method="POST" action="{{ route('activate.request') }}" aria-label="{{ __('Request new activation email') }}">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-primary px-5">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</section>
@endsection
