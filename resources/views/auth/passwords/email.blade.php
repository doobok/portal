@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.remind-pass') @endslot
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

    @if (session('status'))
        <div class="uk-alert uk-alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        <fieldset class="uk-fieldset">
          @csrf
          <legend class="uk-legend">@lang('site.remind-pass')</legend>
          <p class="uk-text-small">@lang('site.entermail-to-send-reset')</p>

          <div class="uk-margin-small">
            <div class="uk-inline uk-width-1-1">
              <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: mail"></span>
              <input id="email" type="email" class="uk-input @error('email') uk-form-danger @enderror" placeholder="@lang('site.email')" name="email" value="{{ old('email') }}" required>

              @error('email')
                  <span class="uk-alert-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="uk-margin-small">
            <button type="submit" class="uk-button uk-button-primary uk-button-primary uk-width-1-1">@lang('site.reset-pass')</button>
          </div>
        </fieldset>
      </form>

  </div>
  </div>
</div>
</div>
@endsection
