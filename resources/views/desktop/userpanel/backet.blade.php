@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.backet') @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot
    @slot('robots') noindex, nofollow @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-red">
</section>

@component('components.breadcrumbs', [
    'crumbs' => [
      [route('home'), __('site.user-profile')],
      ['', __('site.backet')],
    ]])
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
<div class="uk-container">

  <h1 class="uk-heading-divider uk-h3"><i class="fas fa-shopping-cart"></i> @lang('site.backet') </h1>

  <backet-main></backet-main>

</div>
</div>


@endsection
