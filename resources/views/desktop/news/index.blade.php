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
          <p class="uk-heading-bullet uk-text-italic">Наш успіх в об'єднанні. Ділимося досвідом, знайомимося, підтримуємо зв'язки. Найцікавіший досвід та історії розповідаємо тут. Збираємо актуальну інформацію про місцевий бізнес, нові тренди в Україні та світі.</p>



            <news-article tag="{{request('tag')}}"></news-article>



    </div>

  </div>

@endsection
