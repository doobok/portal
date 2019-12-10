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

          <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
              <div class="uk-card-media-left uk-cover-container">
                  <img src="/dum.jpg" alt="" uk-cover>
                  <canvas width="600" height="400"></canvas>
              </div>
              <div>
                  <div class="uk-card-body">
                      <h3 class="uk-card-title">Media Left</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                  </div>
                  <div class="bg-green uk-light">
                    <div class="uk-text-center">
                      <h4>До завершення / початку</h4>
                    </div>
                    <div class="uk-flex uk-flex-center">
                      <div class="uk-grid-small uk-child-width-auto" uk-grid uk-countdown="date: 2019-12-15T10:51:11+00:00">
                          <div>
                              <div class="uk-heading-small uk-countdown-days"></div>
                              <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Днів</div>
                          </div>
                          <div class="uk-heading-small">:</div>
                          <div>
                              <div class="uk-heading-small uk-countdown-hours"></div>
                              <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Годин</div>
                          </div>
                          <div class="uk-heading-small">:</div>
                          <div>
                              <div class="uk-heading-small uk-countdown-minutes"></div>
                              <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Хвилин</div>
                          </div>
                          <div class="uk-heading-small">:</div>
                          <div>
                              <div class="uk-heading-small uk-countdown-seconds"></div>
                              <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Секунд</div>
                          </div>
                      </div>
                    </div>
                  </div>

              </div>
          </div>

          <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
              <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                  <img src="/dum.jpg" alt="" uk-cover>
                  <canvas width="600" height="400"></canvas>
              </div>
              <div>
                  <div class="uk-card-body">
                      <h3 class="uk-card-title">Media Right</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                  </div>
              </div>
          </div>






    </div>

  </div>

@endsection
