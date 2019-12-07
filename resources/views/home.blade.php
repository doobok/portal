@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.user-profile') @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-red">
</section>

@component('components.breadcrumbs')
  @slot('title_1') @lang('site.user-profile') @endslot
  @slot('route_1') @endslot
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
<div class="uk-container">

  <h1 class="uk-heading-divider uk-h3">@lang('site.user-profile')</h1>

  <div class="uk-card uk-card-default uk-width-1-1">
      <div class="uk-card-header">
          <div class="uk-grid-small uk-flex-middle" uk-grid>
              <div class="uk-width-auto">
                  <img class="uk-border-circle" width="80" height="80" src="{{Voyager::image(auth()->user()->avatar)}}">
              </div>
              <div class="uk-width-expand">
                  <h3 class="uk-card-title uk-margin-remove-bottom">{{auth()->user()->name}}</h3>
                  <p class="uk-text-meta uk-margin-remove-top">{{auth()->user()->email}}</p>
              </div>
          </div>
      </div>
      <div class="uk-card-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
      </div>
      <div class="uk-card-footer">
          <a href="#" class="uk-button uk-button-text">Read more</a>
      </div>
  </div>



{{--
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}


</div>
</div>


@endsection
