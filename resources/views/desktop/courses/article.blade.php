@extends('layouts.app')

@section('head')
  @component('components.meta')

    @include('layouts.partials.seohead-raw')

  @endcomponent
@endsection

@section('content')
<div class="top-wrap uk-position-relative uk-light uk-background-secondary">

  <div class="uk-cover-container uk-light uk-flex uk-flex-middle top-wrap-height">

    <!-- TOP CONTAINER -->
    <div class="uk-container uk-flex-auto uk-flex-center top-container uk-position-relative uk-margin-medium-top" data-uk-parallax="y: 0,50; easing:0; opacity:0.2">
      <div class="uk-width-2-3@s" data-uk-scrollspy="cls: uk-animation-slide-right-medium; target: > *; delay: 150">
        <h1 class="uk-margin-remove-top">{{$page->title}}</h1>
        {{-- <p class="subtitle-text">{{$page->teaser}}</p> --}}

        {{-- <p class="uk-h4"><i class="far fa-calendar-check uk-margin-small-right"></i>{{$date}}</p> --}}


      </div>
      <div class="uk-margin-medium uk-margin-large-top" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; target: > *; delay: 1500">
        <a href="#order" class="uk-button uk-button-default uk-button-large uk-align-center uk-width-medium" uk-scroll><i class="fas fa-money-bill-wave tada uk-margin-small-right"></i>Придбати курс</a>
      </div>

    </div>
    <!-- /TOP CONTAINER -->
    <!-- TOP IMAGE -->
    <img src="{{Voyager::image($page->image)}}" data-srcset="{{Voyager::image($page->image)}}" alt="" data-uk-cover data-uk-img data-uk-parallax="opacity: 1,0.1; easing:0">
    <!-- /TOP IMAGE -->
  </div>
</div>

@component('components.breadcrumbs')
  @slot('title_1') @lang('site.courses') @endslot
  @slot('route_1') {{route('courses')}} @endslot
  @slot('title_2') {{$page->title}} @endslot
@endcomponent

<section class="uk-section-small">

  <div class="uk-container">
    <article class="uk-article">

       <p class="uk-text-lead">{{$page->teaser}}</p>

      {!!$page->body!!}

    </article>

    <div id="order" class="uk-margin-large">

      @component('components.get-ticket', [
          'price' => $page->price,
          'model' => 'course',
          'model_id' => $page->id,
        ])
        @slot('title')Курс: «{{$page->title}}»@endslot
      @endcomponent

    </div>

  </div>


</section>



@endsection
