@extends('layouts.app')

@section('head')
  @component('components.meta')

    @include('layouts.partials.seohead-raw')

  @endcomponent
@endsection

@section('content')
  <section class="nav-bg bg-yellow">
  </section>

  <section class="uk-section uk-section-xsmall uk-section-muted">
    <div class="uk-container">
      <ul class="uk-breadcrumb">
        <li><a href="/"><i class="fas fa-home uk-margin-right"></i>@lang('site.mainpage')</a></li>
        <li><a href="{{route('news')}}">@lang('site.news')</a></li>
    </ul>
    </div>
  </section>

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">
    <div class="uk-container">
      <article class="uk-article">
        
        <h1 class="uk-heading-divider"><a class="uk-link-reset" href="">@lang('site.aboutus')</a></h1>

        <div class="uk-height-large uk-background-cover uk-light uk-flex" uk-parallax="bgy: -200" style="background-image: url({{Voyager::image($page->image)}});">
        </div>

        {!! $page->body !!}

      </article>
    </div>
  </div>



@endsection
