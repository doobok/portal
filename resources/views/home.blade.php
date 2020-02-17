@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') @lang('site.user-profile') @endslot
    @slot('description') @endslot
    @slot('image')  @endslot
    @slot('date')  @endslot

  @endcomponent
@endsection

@section('content')
<section class="nav-bg bg-red">
</section>

@component('components.breadcrumbs')
  @slot('title_1') @lang('site.user-profile') @endslot
  @slot('route_1') @endslot
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
<div class="uk-container">

  <h1 class="uk-heading-divider uk-h3">@lang('site.user-profile')</h1>

@if (session('resent'))
    <div class="uk-alert-success" uk-alert>
      <a class="uk-alert-close" uk-close></a>
        На вашу адресу електронної пошти було відправлено нове посилання для підтвердження.
    </div>
@endif
@if ($user->email_verified_at)
  <form class="uk-padding-remove" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <div class="uk-alert-danger" uk-alert>
      <p class="uk-text-small">Вітаємо <b>{{$user->name}}</b>! Для завершення реєстрації Вам необхідно підтвердити вашу електронну адресу:<b>{{$user->email}}</b>.
      <br>Ми вже відправили Вам лист з інструкціями, якщо з яких небудь причин Ви його не отримали натисніть:
      <button class="uk-button uk-button-text"><i class="fas fa-envelope-square"></i> відправити повторно</button>
      <br><b>Не підтверджені аккаунти будуть автоматично видалені!</b></p>
    </div>
  </form>
@endif

  <div class="uk-card uk-card-default uk-width-1-1">
      <div class="uk-card-header">
          <a href="{{route('useredit')}}" class="uk-link-muted uk-float-right" title="Редагувати профіль"><i class="fas fa-pen"></i></a>
          <div class="uk-grid-small uk-flex-middle" uk-grid>
              <div class="uk-width-auto">
                  <img class="uk-border-circle" width="80" height="80" src="{{Voyager::image($user->avatar)}}">
              </div>
              <div class="uk-width-expand">
                  <h3 class="uk-card-title uk-margin-remove-bottom">{{$user->name}}</h3>
                  <p class="uk-text-meta uk-margin-remove-top">{{$user->email}}</p>
                  @if($messages > 0)
                    <a href="{{route('messages')}}" class="uk-text-danger"><i class="fas fa-envelope uk-margin-small-right"></i>Непрочитаних повідомлень {{$messages}}</a>
                  @endif
              </div>
              <div>
                <h5 class="uk-heading-line"><span>Про себе</span></h5>
                <p class="uk-text-meta">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
          </div>
      </div>
      <div class="uk-card-body">
        {{-- created snitiatives --}}
        @if(count($initiatives) > 0)
            <h4 class="uk-card-title"><i class="fas fa-lightbulb uk-margin-small-right uk-text-success"></i>Мої ініціативи</h4>
            <div class="uk-overflow-auto">
              <table class="uk-table uk-table-small uk-table-divider uk-table-hover">
                  <caption class="uk-margin-small-bottom"><i class="fas fa-info uk-margin-small-right"></i>Тут Ви можете бачити зведену статистику по поданих Вами ініціативах, які ще актуальні.</caption>
                  <thead class="bg-green txt-light">
                      <tr>
                          <td class="uk-text-uppercase">Назва</td>
                          <td class="uk-text-uppercase">Дата</td>
                          <td class="uk-text-uppercase">Учасників</td>
                          <td class="uk-text-uppercase">Статус</td>
                      </tr>
                  </thead>
                  <tbody>
                @foreach ($initiatives as $item)
                  <tr>
                    <td><i class="fas fa-caret-right uk-margin-small-right"></i>
                      <a class="uk-link-muted" href="{{route('initiative', $item->id)}}">{{$item->title}}<i class="fas fa-link uk-margin-small-left uk-text-small"></i></a></td>
                    <td class="uk-text-italic">{{$item->date_start}}</td>
                    <td>{{$item->vac_res}}</td>
                    <td>@lang('statuses.' . $item->status)</td>
                  </tr>
                @endforeach
                  </tbody>
            </table>
          </div>
        @endif
        {{-- initiative subscribed --}}
        @if(count($subscribe_in) > 0)
            <h4 class="uk-card-title"><i class="fas fa-stream uk-margin-small-right uk-text-success"></i>Підписки на ініціативи</h4>
            <div class="uk-overflow-auto">
              <table class="uk-table uk-table-small uk-table-divider uk-table-hover">
                  <caption class="uk-margin-small-bottom"><i class="fas fa-info uk-margin-small-right"></i>Ваші підписки на актуальні ініціативи</caption>
                  <thead class="bg-green txt-light">
                      <tr>
                          <td class="uk-text-uppercase">Назва</td>
                          <td class="uk-text-uppercase">Дата</td>
                          {{-- <td class="uk-text-uppercase">Учасників</td> --}}
                          <td class="uk-text-uppercase">Статус</td>
                      </tr>
                  </thead>
                  <tbody>
                @foreach ($subscribe_in as $item)
                  <tr>
                    <td><i class="fas fa-caret-right uk-margin-small-right"></i>
                      <a class="uk-link-muted" href="{{route('initiative', $item->id)}}">{{$item->title}}<i class="fas fa-link uk-margin-small-left uk-text-small"></i></a></td>
                    <td class="uk-text-italic">{{$item->date_start}}</td>
                    {{-- <td>{{$item->vac_res}}</td> --}}
                    <td>@lang('statuses.' . $item->status)</td>
                  </tr>
                @endforeach
                  </tbody>
            </table>
          </div>
        @endif
      </div>
      <div class="uk-card-footer">
          <a href="#" class="uk-button uk-button-text">Read more</a>
      </div>
  </div>

</div>
</div>


@endsection
