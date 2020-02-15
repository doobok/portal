@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.backet') @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-red">
</section>

@component('components.breadcrumbs')
  @slot('title_1') @lang('site.backet') @endslot
  @slot('route_1') @endslot
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
<div class="uk-container">

  <h1 class="uk-heading-divider uk-h3"><i class="fas fa-shopping-cart"></i> @lang('site.backet') </h1>

  <backet-main></backet-main>

</div>
</div>


@endsection
