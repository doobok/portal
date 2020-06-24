@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.consalting') @endslot

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
        ['', __('site.consalting')],
      ]])
  @endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">

    <div class="uk-container">


          <h1 class="uk-heading-divider">@lang('site.consalting') <i class="far fa-comments uk-text-muted"></i></h1>
          @if(null !== setting('text.teaser_experts_page'))
            <p class="uk-heading-bullet  uk-text-italic">{{setting('text.teaser_experts_page')}}</p>
          @endif


            <experts-article></experts-article>


    </div>

  </div>

@endsection
