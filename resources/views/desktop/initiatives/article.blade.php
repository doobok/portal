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

        @if($countdown === 1)
          <p class="">
            <span><i class="fas fa-check-circle uk-margin-small-right"></i>@lang('site.event-finish')</span>
          </p>
        @else
          @if($countdown)
            <p class="uk-article-meta uk-margin-small-bottom"><span><i class="fas fa-hourglass-start uk-margin-small-right"></i>@lang('site.to-reg-finish'):</span>
            </p>
            @component('components.countdown')
              @slot('time') {{$countdown}} @endslot
            @endcomponent
          @else
            <p class="uk-text-danger">
              <span><i class="fas fa-times-circle uk-margin-small-right"></i>@lang('site.reg-finish')</span>
            </p>
          @endif
        @endif

        <p class="uk-h4"><i class="far fa-calendar-check uk-margin-small-right"></i>{{$date}}</p>


      </div>
    </div>
    <!-- /TOP CONTAINER -->
    <!-- TOP IMAGE -->
    <img src="{{Voyager::image($page->image)}}" data-srcset="{{Voyager::image($page->image)}}" alt="" data-uk-cover data-uk-img data-uk-parallax="opacity: 1,0.1; easing:0">
    <!-- /TOP IMAGE -->
  </div>
</div>

@component('components.breadcrumbs')
  @slot('title_1') @lang('site.initiatives') @endslot
  @slot('route_1') {{route('initiatives')}} @endslot
  @slot('title_2') {{$page->title}} @endslot
@endcomponent

<section class="uk-section-small">

  <div class="uk-container">
    <article class="uk-article">

      {!!$page->body!!}

    </article>

    {{-- @if($countdown AND $countdown != 1) --}}
      <div class="uk-text-center uk-margin-top">
            <button class="uk-button uk-button-default uk-alert-success uk-button-large" type="button"><i class="fas fa-puzzle-piece uk-margin-small-right"></i>Долучитися до ініціативи</button>
      </div>
    {{-- @endif --}}



    @can('update', $page)
    <div class="uk-card uk-card-default uk-margin-bottom uk-width-1-1 uk-margin-top">
        <div class="uk-card-header">
          <p class="uk-text-meta"><i class="fas fa-users uk-margin-small-right"></i>Зареєстровані / ліміт: <b>{{$page->vac_res . ' / ' . $page->vac_num}}</b></p>
          @isset($page->vac_num)
            <progress class="uk-progress" value="{{$page->vac_res}}" max="{{$page->vac_num}}"></progress>
          @endisset
        </div>
        <div class="uk-card-body uk-overflow-auto">
          <table class="uk-table uk-table-striped uk-table-small uk-table-hover">
            <tbody>
                <tr>
                    <td>User_name</td>
                    <td>weuwue@mail.ua</td>
                    <td>+38034839483</td>
                    <td class="uk-table-shrink">
                        <button class="uk-button uk-button-danger uk-button-small" type="button">Вилучити</button>
                    </td>
                </tr>
                <tr>
                    <td>User_name</td>
                    <td>weuwue@mail.ua</td>
                    <td>+38034839483</td>
                    <td>

                      <button class="uk-button uk-button-danger uk-button-small" type="button">Вилучити</button>
                    </td>
                </tr>
                <tr>
                    <td>User_name</td>
                    <td>weuwue@mail.ua</td>
                    <td>+38034839483</td>
                    <td>

                      <button class="uk-button uk-button-danger uk-button-small" type="button">Вилучити</button>
                    </td>
                </tr>
                <tr>
                    <td>User_name</td>
                    <td>weuwue@mail.ua</td>
                    <td>+38034839483</td>
                    <td>

                      <button class="uk-button uk-button-danger uk-button-small" type="button">Вилучити</button>
                    </td>
                </tr>
                <tr>
                    <td>User_name</td>
                    <td>weuwue@mail.ua</td>
                    <td>+38034839483</td>
                    <td>

                      <button class="uk-button uk-button-danger uk-button-small" type="button">Вилучити</button>
                    </td>
                </tr>
            </tbody>
          </table>
        </div>
    </div>
    @endcan

    <div class="uk-card uk-card-default uk-width-1-1">
        <div class="uk-card-header">
          <p class="uk-text-meta"><i class="fas fa-info uk-margin-small-right"></i>Інформація про автора ініціативи</p>
        </div>
        <div class="uk-card-body">
          <div class="uk-grid-small uk-flex-middle" uk-grid>
              <div class="uk-width-auto">
                  <img class="uk-border-circle" width="40" height="40" src="{{Voyager::image($author->avatar)}}">
              </div>
              <div class="uk-width-expand">
                  <h3 class="uk-card-title uk-margin-remove-bottom">{{$author->name}}</h3>
                  <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">На сайті з {{$author->created_at}}</time></p>
              </div>
          </div>
        </div>
    </div>

    @can('moderate', $page)

      <initiative-article-moder :id="{{$page->id}}" status="{{$page->status}}"></initiative-article-moder>

    @endcan

  </div>


</section>



@endsection
