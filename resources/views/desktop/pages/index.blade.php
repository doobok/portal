@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @isset ($page->meta_title) {{$page->meta_title}}  @else  {{$page->title}}  @endisset  @endslot
    @slot('description') {{$page->meta_desc}} @endslot
    @slot('image') {{$page->image}} @endslot
    @slot('date') {{$page->created_at}} @endslot

  @endcomponent
@endsection

@section('content')
  <section class="nav-bg bg-yellow">
  </section>

@component('components.breadcrumbs')
  @slot('title_1') {{$page->title}} @endslot
  @slot('route_1') @endslot
@endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">
    <div class="uk-container">
      <article class="uk-article">

        <h1 class="uk-heading-divider"><a class="uk-link-reset" href="">{{$page->title}}</a></h1>

        <div class="uk-height-large uk-background-cover uk-light uk-flex" uk-parallax="bgy: -200" style="background-image: url({{Voyager::image($page->image)}});">
        </div>

        {!! $page->body !!}

      </article>
    </div>
  </div>



@endsection
