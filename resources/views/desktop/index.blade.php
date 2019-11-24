@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') Головна @endslot

    @slot('description') Опис  @endslot
    @slot('keywords') Ключові слова  @endslot
    @slot('image') img  @endslot

    @slot('date') 18.11.2019 @endslot

  @endcomponent
@endsection

@section('content')

  @include('layouts.partials.main-page.first-screan')
  @include('layouts.partials.main-page.content')
  @include('layouts.partials.main-page.todo')
  @include('layouts.partials.main-page.motivation')
  @include('layouts.partials.main-page.cards')
  @include('layouts.partials.main-page.logos')

@endsection
