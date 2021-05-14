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

  @component('components.breadcrumbs', [
      'crumbs' => [
        ['', __('site.news')],
      ]])
  @endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">


          <h1 class="uk-heading-divider">@lang('site.news') <i class="far fa-newspaper uk-text-muted"></i></h1>
          @if(null !== setting('text.teaser_news_page'))
            <div class="uk-text-italic">{!!setting('text.teaser_news_page')!!}</div>
          @endif



            <news-article tag="{{request('tag')}}" uid="{{request('u')}}"></news-article>



    </div>

  </div>

@endsection
