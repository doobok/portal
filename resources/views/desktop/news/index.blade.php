@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.news') @endslot

    @slot('description') Опис  @endslot
    @slot('image') img  @endslot

    @slot('date') 18.11.2019 @endslot

  @endcomponent
@endsection

@section('content')

  <section class="nav-bg bg-blue">
  </section>

  @component('components.breadcrumbs')
    @slot('title_1') @lang('site.news') @endslot
    @slot('route_1') {{route('news')}} @endslot
  @endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">


          <h1 class="uk-heading-divider"><a class="uk-link-reset" href="">@lang('site.news')</a></h1>
          <p class="uk-heading-bullet  uk-text-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



            <news-article tag="{{request('tag')}}"></news-article>



    </div>

  </div>

@endsection
