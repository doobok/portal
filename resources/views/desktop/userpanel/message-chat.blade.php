@extends('layouts.app')

@section('head')
  @component('components.meta')

    @slot('title') {{$message->subject}} @endslot
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
  @slot('title_1') @lang('site.you-messages') @endslot
  @slot('route_1') {{route('messages')}} @endslot
@endcomponent

<div class="uk-section uk-padding-remove-top uk-margin-medium-top">
  <div class="uk-container">

    <h1 class="uk-heading-divider uk-h3"><i class="far fa-comment-alt"></i> {{$message->subject}}</h1>

    <div class="uk-child-width-expand uk-text-center" uk-grid>
        <div>
          @if ($active === 1)
            <a href="{{route('user', $sender)}}">
              <span class="uk-label uk-label-success"><i class="fas fa-user"></i> {{$sender}}</span>
            </a>
          @else
            <span class="uk-label uk-label-danger"><i class="fas fa-user"></i> @lang('notify.' . $sender)</span>
          @endif

        </div>

        <div>
          <span class="uk-label uk-label-warning">Ви <i class="fas fa-user"></i></span>
          @if ($active === 1)
            <span class="uk-label uk-label-default" uk-toggle="target: #modal-msg-send" title="Написати відповідь"><i class="fas fa-envelope"></i></span>
          @endif
        </div>
    </div>


    <table class="uk-table uk-table-striped">
      <tbody>
        @foreach ($messages as $item)
          <tr>
            <td @if ($item->to != $message->to) class="uk-float-right" @endif >
              <p class="uk-margin-remove-bottom">
                <i class="far fa-comment"></i>
                {{$item->message}}</p>
              <p class="uk-text-small uk-text-meta uk-margin-remove-top">{{$item->created_at}}</p>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="uk-text-center uk-margin-medium-top">

      <a  class="uk-button uk-button-large uk-button-default uk-margin-small-right" href="{{route('messages')}}">
        <i class="fas fa-chevron-left uk-margin-small-right"></i> До усіх повідомлень
      </a>


      @if ($active === 1)
        <msg-send :to="{{$message->from}}"></msg-send>
      @endif

    </div>

  </div>
</div>


@endsection
