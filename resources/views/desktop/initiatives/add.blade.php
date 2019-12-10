@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.add-initiative') @endslot

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
    @slot('route_1') {{route('initiatives')}} @endslot
    @slot('title_2') @lang('site.add-initiative') @endslot
  @endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">


          <h1 class="uk-heading-divider">@lang('site.add-initiative') <i class="fas fa-users uk-text-muted"></i></h1>
          <p class="uk-heading-bullet  uk-text-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


            <initiative-add user_id="{{auth()->user()->id}}"></initiative-add>


    </div>

  </div>

@endsection
