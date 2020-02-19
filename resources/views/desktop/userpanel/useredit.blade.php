@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.profile-edit') @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot
    @slot('robots') noindex, nofollow @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-red">
</section>

@component('components.breadcrumbs')
  @slot('title_1') @lang('site.profile-edit') @endslot
  @slot('route_1') @endslot
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
<div class="uk-container">

  <h1 class="uk-heading-divider uk-h3"><i class="fas fa-user-cog"></i> @lang('site.profile-edit') </h1>

  <user-edit user="{{auth()->user()}}"></user-edit>

  <p class="uk-text-meta">Вказана Вами інформація в жодному разі не буде передана третім лицям. Вона може використовуватись для повноцінної реалізації функцій сайту, а також для безпосереднього звʼязку із Вами. Контактна інформація у незашифрованому вигляді доступна лише адміністрації ресурсу. </p>

</div>
</div>


@endsection
