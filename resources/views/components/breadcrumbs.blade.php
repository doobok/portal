<section class="uk-section uk-section-xsmall uk-section-muted">
  <div class="uk-container">
        <ul class="uk-breadcrumb" class="overflow: visible; white-space: nowrap; flex-wrap: none">
          <li><a href="/"><i class="fas fa-home uk-margin-right"></i>@lang('site.mainpage')</a></li>
          <li><a href="{{$route_1}}">{{$title_1}}</a></li>
          @isset($title_2)
            @isset ($route_2)
              <li><a href="{{$route_2}}">{{$title_2}}</a></li>
            @else
              <li class="uk-disabled"><span>{{$title_2}}</span></li>
            @endisset
          @endisset
      </ul>
  </div>
</section>

{{--
white-space: nowrap;
    overflow: visible !important; --}}
