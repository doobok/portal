@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.events') @endslot

    @slot('description') Опис  @endslot
    @slot('image') img  @endslot

    @slot('date') 18.11.2019 @endslot

  @endcomponent
@endsection

@section('content')

  <section class="nav-bg bg-green">
  </section>

@component('components.breadcrumbs')
  @slot('title_1') @lang('site.events') @endslot
  @slot('route_1')  @endslot
@endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">

          <h1 class="uk-heading-divider">@lang('site.events') <i class="fas fa-bullhorn uk-text-muted"></i></h1>

          <p class="uk-heading-bullet  uk-text-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          @foreach ($articles as $article)
            <div class="uk-box-shadow-bottom uk-margin-large-bottom">
            <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-box-shadow-medium">
                <div class="uk-cover-container">
                  <a class="uk-link-reset" href="{{route('event', $article->id)}}">
                    <img src="{{Voyager::image($article->image)}}" uk-cover>
                    <div class="uk-position-cover uk-flex uk-flex-middle">
                      <span class="uk-margin-remove uk-tile-secondary uk-text-center uk-width-1-1" style="opacity: 0.7">
                        <span class="uk-heading-small">{{$article->title}}</span>
                        <p class="uk-width-2-3@s uk-align-center">{{$article->teaser}}</p>
                      </span>
                    </div>
                    <div class="uk-position-cover uk-flex uk-flex-bottom">
                      <span class="uk-heading-medium uk-margin-remove uk-tile-primary uk-text-center uk-width-1-1" >
                        <i class="fas fa-calendar-day"></i> {{substr($article->date_start, 0, 10)}} <i class="fas fa-forward tada"></i></span>
                    </div>
                  </a>
                    <canvas width="1200" height="650"></canvas>
                </div>
              </div>
            </div>
          @endforeach



    </div>

  </div>

@endsection
