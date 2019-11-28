@extends('layouts.app')

@section('head')
  @component('components.meta')

    @include('layouts.partials.seohead-raw')

  @endcomponent
@endsection

@section('content')
<div class="top-wrap uk-position-relative uk-light uk-background-secondary">

  <div class="uk-cover-container uk-light uk-flex uk-flex-middle top-wrap-height">

    <!-- TOP CONTAINER -->
    <div class="uk-container uk-flex-auto uk-flex-center top-container uk-position-relative uk-margin-medium-top" data-uk-parallax="y: 0,50; easing:0; opacity:0.2">
      <div class="uk-width-2-3@s" data-uk-scrollspy="cls: uk-animation-slide-right-medium; target: > *; delay: 150">
        <h1 class="uk-margin-remove-top">{{$page->title}}</h1>
        <p class="subtitle-text">{{$page->teaser}}</p>
        <p class="uk-article-meta" class="uk-margin-small-bottom"><span class="uk-label"><i class="fas fa-calendar"></i> {{$page->created_at}}</span>
          @isset($tags)
            @foreach ($tags as $tag)
              <a href="{{route('news', ['tag' => $tag->slug])}}" class="uk-margin-small-left">
                <span class="uk-label"><i class="fas fa-tag"></i> {{$tag->title}}</span>
              </a>
            @endforeach
          @endisset
        </p>
        @isset($page->gallery)
          <a href="#gallery" class="uk-button uk-button-default" data-uk-scrollspy-class="uk-animation-fade" data-uk-scroll="duration: 500">
            <i class="fas fa-photo-video"></i> @lang('site.gallery') <i class="fas fa-caret-down"></i>
          </a>
        @endisset

        @isset($page->youtube)
          <a href="#video" class="uk-button uk-button-default" data-uk-scrollspy-class="uk-animation-fade" data-uk-scroll="duration: 500">
            <i class="fas fa-video"></i> @lang('site.video') <i class="fas fa-caret-down"></i>
          </a>
        @endisset
      </div>
    </div>
    <!-- /TOP CONTAINER -->
    <!-- TOP IMAGE -->
    <img src="{{Voyager::image($page->image)}}" data-srcset="{{Voyager::image($page->image)}}" alt="" data-uk-cover data-uk-img data-uk-parallax="opacity: 1,0.1; easing:0">
    <!-- /TOP IMAGE -->
  </div>
</div>

<section class="uk-section uk-section-xsmall uk-section-muted">
  <div class="uk-container">
    <ul class="uk-breadcrumb">
      <li><a href="/"><i class="fas fa-home uk-margin-right"></i>@lang('site.mainpage')</a></li>
      <li><a href="{{route('news')}}">@lang('site.news')</a></li>
  </ul>
  </div>
</section>

<section class="uk-section">

  <div class="uk-container">

    <article class="uk-article">

        <div class="">

          {!!$page->body!!}

        </div>

        @isset($page->gallery)
          @php
          $images = json_decode($page->gallery);
          @endphp
          <div id="gallery" class="uk-container uk-section-xsmall">
            <h3 class="uk-heading-line uk-text-right"><span>@lang('site.gallery')</span></h3>
            <div class="uk-position-relative uk-visible-toggle uk-light" data-uk-slideshow="ratio: 7:3; animation: push; min-height: 270;">
              <ul class="uk-slideshow-items">
              @foreach($images as $image)
                <li>
                  <img data-src="{{ Voyager::image($image) }}" data-uk-img="target: !.uk-slideshow-items" alt="" data-uk-cover>
                  <div class="uk-position-bottom uk-position-medium uk-text-center uk-light">

                  </div>
                </li>
              @endforeach

              </ul>
              <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous="ratio: 1.5" data-uk-slideshow-item="previous"></a>
              <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next="ratio: 1.5" data-uk-slideshow-item="next"></a>
            </div>
          </div>

        @endisset

        @isset($page->youtube)
          <div id="video" class="uk-container uk-section-xsmall">
            <h3 class="uk-heading-line uk-text-right"><span>@lang('site.video')</span></h3>
            <iframe src="https://www.youtube-nocookie.com/embed/{{$page->youtube}}?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="1920" height="1080" frameborder="0" allowfullscreen uk-responsive uk-video="automute: true"></iframe>
          </div>
        @endisset

        <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div>
                <a class="uk-button uk-button-text" href="#">Read more</a>
            </div>
            <div>
                <a class="uk-button uk-button-text" href="#">5 Comments</a>
            </div>
        </div>

    </article>

  </div>

</section>


@isset($articles)

<section class="uk-section uk-section-muted">
			<div class="uk-container">
				<h2 class="uk-text-bold">@lang('site.you-be-interested')</h2>
				<div data-uk-slider="velocity: 5">
					<div class="uk-position-relative">
						<div class="uk-slider-container">
							<ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid uk-grid-medium">

                @foreach ($articles as $article)
                  <li>
  									<!-- card -->
  									<div>
  										<div class="uk-card uk-card-default uk-card-small" style="box-shadow: none;">
  											<div class="uk-card-media-top">
  												<a href="{{route('article', $article->slug)}}"><img data-src="{{ Voyager::image($article->image) }}" data-width="620" data-height="350" data-uk-img="target: !.uk-slideshow-items" alt="{{$article->slug}}"></a>
  											</div>
  											<div class="uk-card-header">
  												<div class="uk-grid-small uk-flex-middle" data-uk-grid>
  													<div class="uk-width-auto">
  														<img class="uk-border-circle" alt="" width="40" height="40" src="https://unsplash.it/60/60/?random">
  													</div>
  													<div class="uk-width-expand">
  														<h6 class="uk-margin-remove-bottom uk-text-bold">{{config('app.name')}}</h6>
  														<p class="uk-text-meta uk-margin-remove-top uk-text-small"><time>{{$article->created_at}}</time></p>
  													</div>
  												</div>
  											</div>
  											<div class="uk-card-body">
  												<h4 class="uk-margin-small-bottom uk-text-bold">{{$article->title}}</h4>
  												<p class="uk-text-small">{{$article->teaser}}</p>
  												<a class="uk-button uk-button-default uk-text-bold uk-margin-remove uk-width-1-1" href="{{route('article', $article->slug)}}">@lang('site.read-more')</a>
  											</div>
  										</div>
  									</div>
  									<!-- /card -->
  								</li>
                @endforeach

							</ul>
						</div>
						<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">

						</ul>
						<div class="uk-hidden@m uk-light">
							<a class="uk-position-center-left uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
							<a class="uk-position-center-right uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
						</div>
						<div class="uk-visible@m">
							<a class="uk-position-center-left-out uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
							<a class="uk-position-center-right-out uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
						</div>
					</div>

				</div>
			</div>
		</section>
@endisset

@endsection
