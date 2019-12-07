@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.login-n') @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-red">
</section>

<div class="uk-section">
<div class="uk-container uk-flex uk-flex-center">
  <div class="uk-flex uk-flex-center uk-flex-middle">
  <div class="uk-width-large uk-padding-large">

    <form method="POST" action="{{ route('login') }}">
        <fieldset class="uk-fieldset">
          <legend class="uk-legend">@lang('site.login-n')</legend>

          <div class="uk-margin">
      				<div class="uk-inline uk-width-1-1">
      					<span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-user-tie"></i></span>
      					<input id="email" class="uk-input uk-form-large{{ $errors->has('email') ? ' uk-form-danger' : '' }}" name="email" value="{{ old('email') }}" placeholder="@lang('site.email')" type="email" required>
                @if ($errors->has('email'))
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
      				</div>
    			</div>
          <div class="uk-margin">
    					<div class="uk-inline uk-width-1-1">
    						<span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-key"></i></span>
    						<input id="password" name="password" class="uk-input uk-form-large{{ $errors->has('password') ? ' uk-form-danger' : '' }}" placeholder="@lang('site.password')" type="password" required>
                @if ($errors->has('password'))
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
    					</div>
    			</div>
            <div class="uk-margin">
                <label><input class="uk-checkbox" name="remember_token" type="checkbox" for="remember"> @lang('site.remember-me')</label>
            </div>
            @csrf
          <div class="uk-margin">
    					<button type="submit" class="uk-button uk-button-primary uk-button-primary uk-button-large uk-width-1-1">@lang('site.login')</button>
    			</div>
        </fildset>
      </form>
      <div class="uk-text-center">
  			<a class="uk-link-reset uk-text-small" href="{{ route('password.request') }}">@lang('site.password-forgot')</a>
  		</div>


            {{-- <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}


  </div>
  </div>
</div>
</div>
@endsection
