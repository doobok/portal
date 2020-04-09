@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.contacts') @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-yellow">
</section>

@component('components.breadcrumbs', [
    'crumbs' => [
      ['', __('site.contacts')],
    ]])
@endcomponent

  <div class="uk-section uk-padding-remove-top uk-margin-medium-top">
    <div class="uk-container">
      <article class="uk-article">

        <h1 class="uk-heading-divider"><a class="uk-link-reset" href="">@lang('site.contacts')</a></h1>

        <div class="uk-grid uk-child-width-1-2@l" data-uk-grid data-uk-scrollspy="target: > div; cls: uk-animation-slide-right-medium">
          <div data-uk-scrollspy-class="uk-animation-slide-left-medium">
            <h3 class="uk-margin-small-top">@lang('site.address')</h3>
            <ul class="uk-list">
              <li><i class="fas fa-map-marker-alt uk-margin-small-right"></i>{{setting('contacts.address')}}</li>
              <li><i class="fas fa-envelope-open uk-margin-small-right"></i><a href="mailto:{{setting('contacts.email')}}" title="">{{setting('contacts.email')}}</a></li>
            </ul>
            <h3 class="uk-margin-small-top">@lang('site.phones')</h3>
              <p class="uk-text-lead"><i class="fas fa-phone-alt uk-margin-small-right"></i>
                <a href="tel:{{setting('contacts.phone')}}" class="uk-link-reset">{{setting('contacts.phone')}}</a></p>
            <div class="uk-margin-medium">
              <h5 class=""><i class="fas fa-share-alt uk-margin-small-right"></i>@lang('site.follow-us')</h5>
                <div>
                  @if (setting('contacts.fb'))
                    <a href="https://www.facebook.com/{{setting('contacts.fb')}}" class="uk-icon-button uk-link-reset"><i class="fab fa-facebook-f"></i></a>
                  @endif
                  @if (setting('contacts.twitter'))
                    <a href="https://twitter.com/{{setting('contacts.twitter')}}" class="uk-icon-button uk-link-reset"><i class="fab fa-twitter"></i></a>
                  @endif
                  @if (setting('contacts.instagram'))
                    <a href="https://www.instagram.com/{{setting('contacts.instagram')}}" class="uk-icon-button uk-link-reset"><i class="fab fa-instagram"></i></a>
                  @endif
                  @if (setting('contacts.youtube'))
                    <a href="https://www.youtube.com/{{setting('contacts.youtube')}}" class="uk-icon-button uk-link-reset"><i class="fab fa-youtube"></i></a>
                  @endif
                </div>
            </div>

          </div>
          <div>
            <h3><i class="far fa-clock uk-margin-small-right"></i>@lang('site.we-opened')</h3>
            <p class="uk-text-lead">@lang('site.from') <b class="uk-heading-small">10.00</b> @lang('site.to') <b class="uk-heading-small">19.00</b></p>
            <p class="uk-text-lead">@lang('site.no-days-off')</p>
          </div>
        </div>



      </article>
    </div>
  </div>

  <div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2609.234835322323!2d30.21705559894916!3d50.55360680179348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472b31e7f1caee27%3A0xb473fc225812db95!2zUG9ydGFsINCR0YPRh9Cw!5e0!3m2!1suk!2sua!4v1575470170260!5m2!1suk!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>



@endsection
