@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.add-initiative') @endslot
    @slot('description') @endslot
    @slot('image') @endslot
    @slot('date') @endslot
    @slot('robots') noindex, nofollow @endslot

  @endcomponent
@endsection

@section('content')

  <section class="nav-bg bg-green">
  </section>

  @component('components.breadcrumbs', [
      'crumbs' => [
        [route('initiatives'), __('site.initiatives')],
        ['', __('site.add-initiative')],
      ]])
  @endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">

      @include('layouts.partials.auth-info')

          <h1 class="uk-heading-divider">@lang('site.add-initiative') <i class="fas fa-users uk-text-muted"></i></h1>
          @if(null !== setting('text.teaser_initiatives_add_page'))
          <p class="uk-heading-bullet uk-text-italic">{{setting('text.teaser_initiatives_add_page')}}</p>
          @endif

          <initiative-add user="{{auth()->user()}}"></initiative-add>

    </div>

  </div>

@endsection
