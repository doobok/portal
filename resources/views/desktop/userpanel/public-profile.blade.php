@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') F&B - {{$page->name}} @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot
    @slot('robots') noindex, nofollow @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-red">
</section>

@component('components.breadcrumbs')
  @slot('title_1') F&B - {{$page->name}} @endslot
  @slot('route_1') @endslot
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
<div class="uk-container">

  <div class="uk-flex uk-flex-center uk-margin-top">
      <div class="uk-width-2-3@m">

        <div class="uk-flex uk-flex-center flip uk-margin-bottom">
          <img class="uk-border-circle" width="300" height="300" src="{{Voyager::image($page->avatar)}}">
        </div>

          <h6 class="uk-text-muted uk-float-right">На сайті із {{substr($page->created_at, 0, 10)}} </h6>
          <span class="uk-h1 uk-text-primary uk-margin-right zoomIn"><i class="fas fa-award"></i></span>
          <span class="uk-h1 uk-text-warning uk-margin-right zoomIn"><i class="fab fa-jedi-order"></i></span>
          <span class="uk-h1 uk-text-danger uk-margin-right zoomIn"><i class="fas fa-gem"></i></span>

          <div class="uk-tile-muted uk-padding">
            <h1 class="uk-heading-line uk-text-center">
              <span>
                @if ($page->first_name != null)
                  {{$page->first_name}} {{$page->last_name}} 
                @else
                  {{$page->name}}
                @endif
              </span>
            </h1>
            <p class="subtitle-text">
              {{$page->salute}}
            </p>
            <div class="uk-text-center uk-margin-medium-top">
              <button class="uk-button uk-button-primary uk-button-large">Надіслати повідомлення</button>

            </div>
          </div>

      </div>
  </div>

</div>
</div>


@endsection
