@extends('layouts.app')

@section('head')
  @component('components.meta')

    @include('layouts.partials.seohead-raw')

  @endcomponent
@endsection

@section('content')
  <section class="nav-bg bg-blue">
  </section>

  <div class="uk-height-large uk-background-cover uk-light uk-flex" uk-parallax="bgy: -200" style="background-image: url({{Voyager::image($page->image)}});">

    {{-- <h1 class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">Headline</h1> --}}

  </div>

  {{-- <div class="uk-background-fixed uk-background-center-center uk-height-medium uk-width-1-1" style="background-image: url({{Voyager::image($page->image)}});"></div> --}}
  {{-- <img src="{{Voyager::image($page->image)}}" data-srcset="{{Voyager::image($page->image)}}" alt="" data-uk-cover data-uk-img data-uk-parallax="opacity: 1,0.1; easing:0"> --}}


  {{-- <div class="uk-cover-container uk-light uk-flex uk-flex-middle top-wrap-height">

    <!-- TOP CONTAINER -->
    <div class="uk-container uk-flex-auto uk-flex-center top-container uk-position-relative uk-margin-medium-top" data-uk-parallax="y: 0,50; easing:0; opacity:0.2">
      <div class="uk-width-2-3@s" data-uk-scrollspy="cls: uk-animation-slide-right-medium; target: > *; delay: 150">
        <h1 class="uk-margin-remove-top">{{$page->title}}</h1>
        <p class="subtitle-text">{{$page->teaser}}</p>

      </div>
    </div>
    <!-- /TOP CONTAINER -->
    <!-- TOP IMAGE -->
    <!-- /TOP IMAGE -->
  </div> --}}

<section class="uk-section uk-section-xsmall uk-section-muted">
  <div class="uk-container">
    <ul class="uk-breadcrumb">
      <li><a href="/"><i class="fas fa-home uk-margin-right"></i>@lang('site.mainpage')</a></li>
      <li><a href="{{route('news')}}">@lang('site.news')</a></li>
  </ul>
  </div>
</section>

<section class="uk-section">

  <div class="uk-container">

    <article class="uk-article">

        <div class="">

          {!!$page->body!!}

        </div>


    </article>

  </div>

</section>


@endsection
