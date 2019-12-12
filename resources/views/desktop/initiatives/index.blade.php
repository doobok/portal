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

          <initiative-article></initiative-article>
          

    </div>

  </div>

@endsection
