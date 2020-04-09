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

        <p class="uk-h4"><i class="far fa-calendar-check uk-margin-small-right"></i>{{$date}}</p>

        @if($countdown === 1)
          <p class="">
            <span><i class="fas fa-check-circle uk-margin-small-right"></i>@lang('site.event-finish')</span>
          </p>
        @else
          <p class="uk-article-meta uk-margin-small-bottom"><span><i class="fas fa-hourglass-start uk-margin-small-right"></i>@lang('site.to-start-event'):</span>
          </p>
          @component('components.countdown')
            @slot('time') {{$countdown}} @endslot
          @endcomponent
        @endif

      </div>

      @if($countdown != 1)
        <div class="uk-margin-medium" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; target: > *; delay: 1500">
          <a href="#order" class="uk-button uk-button-default uk-button-large uk-align-center uk-width-medium" uk-scroll><i class="fas fa-bookmark uk-margin-small-right"></i>Забронювати місце</a>
        </div>
      @endif

    </div>
    <!-- /TOP CONTAINER -->
    <!-- TOP IMAGE -->
    <img src="{{Voyager::image($page->image)}}" data-srcset="{{Voyager::image($page->image)}}" alt="" data-uk-cover data-uk-img data-uk-parallax="opacity: 1,0.1; easing:0">
    <!-- /TOP IMAGE -->
  </div>
</div>

@component('components.breadcrumbs', [
    'crumbs' => [
      [route('events'), __('site.events')],
      ['', $page->title],
    ]])
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
      'model' => 'event',
      'model_id' => $page->id,
    ])
    @slot('title')Участь в заході: «{{$page->title}}»@endslot
  @endcomponent

    </div>

  </div>


</section>



@endsection
