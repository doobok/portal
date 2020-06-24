@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.courses') @endslot
    @slot('description') Опис  @endslot
    @slot('image') img  @endslot

    @slot('date') 18.11.2019 @endslot

  @endcomponent
@endsection

@section('content')

  <section class="nav-bg bg-blue">
  </section>

  @component('components.breadcrumbs', [
      'crumbs' => [
        ['', __('site.courses')],
      ]])
  @endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">


          <h1 class="uk-heading-divider">@lang('site.courses') <i class="fas fa-chalkboard-teacher uk-text-muted"></i></h1>
          @if(null !== setting('text.teaser_courses_page'))
            <p class="uk-heading-bullet  uk-text-italic">{{setting('text.teaser_courses_page')}}</p>
          @endif

          <courses-article tag="{{request('tag')}}" uid="{{request('u')}}"></courses-article>

    </div>

  </div>

@endsection
