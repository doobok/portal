@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.you-messages') @endslot
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
      ['', __('site.you-messages')],
    ]])
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
<div class="uk-container">

  <h1 class="uk-heading-divider uk-h3"><i class="far fa-comment-alt"></i> @lang('site.you-messages')</h1>

  <msg-article></msg-article>

</div>
</div>


@endsection
