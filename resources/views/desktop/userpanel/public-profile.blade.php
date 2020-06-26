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

@component('components.breadcrumbs', [
    'crumbs' => [
      ['', 'F&B ' . $page->name],
    ]])
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
<div class="uk-container">

  <div class="uk-flex uk-flex-center uk-margin-top">
      <div class="uk-width-2-3@m">

        <div class="uk-flex uk-flex-center flip uk-margin-bottom">
          <img class="uk-border-circle" width="300" height="300" src="{{Voyager::image($page->avatar)}}">
        </div>

          <h6 class="uk-text-muted uk-float-right">На сайті із {{substr($page->created_at, 0, 10)}} </h6>

          {{-- awards --}}
          @include('layouts.partials.awards-public-profile')          

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

              @auth
                @if (auth()->id() != $page->id)

                <div class="uk-text-center uk-margin-medium-top">

                  <button class="uk-button uk-button-large uk-button-primary uk-margin-small-right" type="button" uk-toggle="target: #modal-msg-send">
                    <i class="fas fa-paper-plane uk-margin-small-right"></i> Надіслати повідомлення
                  </button>

                  <msg-send :to="{{$page->id}}"></msg-send>

                </div>

                @endif
              @endauth

          </div>

      </div>
  </div>

</div>
</div>


@endsection
