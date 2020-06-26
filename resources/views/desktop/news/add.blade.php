@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.add-news') @endslot
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
        [route('news'), __('site.news')],
        ['', __('site.add-news')],
      ]])
  @endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">

      @include('layouts.partials.auth-info')

          <h1 class="uk-heading-divider">@lang('site.add-news') <i class="fas fa-bullhorn uk-text-muted"></i></h1>
          @if(null !== setting('text.teaser_news_add_page'))
          <p class="uk-heading-bullet uk-text-italic">{{setting('text.teaser_news_add_page')}}</p>
          @endif

          <news-add user="{{auth()->user()}}"></news-add>

    </div>

  </div>

@endsection
