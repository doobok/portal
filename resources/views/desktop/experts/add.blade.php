@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.add-expert') @endslot
    @slot('description') @endslot
    @slot('image') @endslot
    @slot('date') @endslot
    @slot('robots') noindex, nofollow @endslot

  @endcomponent
@endsection

@section('content')

  <section class="nav-bg bg-blue">
  </section>

  @component('components.breadcrumbs', [
      'crumbs' => [
        [route('experts'), __('site.consalting')],
        ['', __('site.add-expert')],
      ]])
  @endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">

      @include('layouts.partials.auth-info')

          <h1 class="uk-heading-divider">@lang('site.add-expert') <i class="fas fa-user-tie uk-text-muted"></i></h1>
          @if(null !== setting('text.teaser_experts_add_page'))
          <p class="uk-heading-bullet uk-text-italic">{{setting('text.teaser_experts_add_page')}}</p>
          @endif

          <experts-add user="{{auth()->user()}}"></experts-add>

    </div>

  </div>

@endsection
