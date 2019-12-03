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

  <section class="uk-section uk-section-xsmall uk-section-muted">
    <div class="uk-container">
      <ul class="uk-breadcrumb">
        <li><a href="/"><i class="fas fa-home uk-margin-right"></i>@lang('site.mainpage')</a></li>
        <li><a href="{{route('news')}}">@lang('site.news')</a></li>
    </ul>
    </div>
  </section>

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">


          <h1 class="uk-heading-bullet uk-heading-divider"><a class="uk-link-reset" href="">@lang('site.news')</a></h1>
          <p class="uk-text-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



            <news-article tag="{{request('tag')}}"></news-article>



    </div>

  </div>

@endsection
