@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.initiatives') @endslot

    @slot('description') Опис  @endslot
    @slot('image') img  @endslot

    @slot('date') 18.11.2019 @endslot

  @endcomponent
@endsection

@section('content')

  <section class="nav-bg bg-green">
  </section>

{{-- Slider --}}
@if(sizeof($articles) > 0)
  <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="center: true; autoplay: true;">

    <ul class="uk-slider-items uk-grid uk-grid-match" uk-height-viewport="offset-top: true; offset-bottom: 30">
      @foreach ($articles as $article)
        <li class="uk-width-1-1">
            <div class="uk-cover-container">
                <img src="{{Voyager::image($article->image)}}" alt="" uk-cover>
                <div class="uk-text-center uk-position-medium uk-position-cover uk-overlay transparent-dark uk-flex uk-flex-column uk-flex-middle uk-flex-center">
                  <p class="uk-text-italic uk-margin-remove"><i class="fas fa-star uk-margin-small-right"></i>пріорітетний контент</p>
                  <h4 class="uk-heading-small uk-margin-remove-top uk-margin-small-bottom">{{$article->title}}</h4>
                  <h5 class="uk-visible@m uk-width-3-4 uk-margin-remove-top">{{$article->teaser}}</h5>
                  <a class="uk-button uk-button-default uk-button-large" href="{{route('initiative', $article->id)}}">@lang('site.read-more')</a>
                </div>
                {{-- <div class="uk-position-medium uk-position-cover uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">Overlay</div> --}}
            </div>
        </li>
      @endforeach
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

  </div>
@endif


@component('components.breadcrumbs')
  @slot('title_1') @lang('site.initiatives') @endslot
  @slot('route_1')  @endslot
@endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">


          <h1 class="uk-heading-divider">@lang('site.initiatives') <i class="fas fa-users uk-text-muted"></i></h1>
          <h4 class="uk-margin-remove">Є свіжі ідеї? Запропонуй <a href="{{route('initiative-add')}}">власну ініціативу!</a> </h4>
          <p class="uk-heading-bullet  uk-text-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          <div class="uk-margin-large">

          </div>

          <initiative-article></initiative-article>


    </div>

  </div>

@endsection
