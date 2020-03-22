@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.register') @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot
    @slot('robots') noindex, nofollow @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-red">
</section>

<div class="uk-section">
<div class="uk-container uk-flex uk-flex-center">
  <div class="uk-flex uk-flex-center uk-flex-middle">
  <div class="uk-width-large uk-padding-large">

    <form method="POST" action="{{ route('register') }}">
      <fieldset class="uk-fieldset">
        @csrf
        <legend class="uk-legend">@lang('site.register')</legend>

        <div class="uk-margin">
    				<div class="uk-inline uk-width-1-1">
    					<span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-user-tie"></i></span>
    					<input id="name" class="uk-input uk-form-large{{ $errors->has('name') ? ' uk-form-danger' : '' }}" name="name" value="{{ old('name') }}" placeholder="@lang('site.username')" type="text" required>
              @if ($errors->has('name'))
                  <span class="uk-alert-danger" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
    				</div>
  			</div>
        <div class="uk-margin">
    				<div class="uk-inline uk-width-1-1">
    					<span class="uk-form-icon uk-form-icon-flip"><i class="fas fa-at"></i></span>
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
  					<div class="uk-inline uk-width-1-1">
  						<span class="uk-form-icon uk-form-icon-flip"></span>
  						<input id="password-confirm" class="uk-input uk-form-large" placeholder="@lang('site.password-confirm')" type="password" name="password_confirmation" required>
  					</div>
  			</div>

        <div class="uk-margin">
  					<button type="submit" class="uk-button uk-button-primary uk-button-primary uk-button-large uk-width-1-1">@lang('site.register-on')</button>
  			</div>
      </fildset>
    </form>

  </div>
  </div>
</div>
</div>
@endsection
