<section class="uk-section uk-section-xsmall uk-section-muted">
  <div class="uk-container">
    <ol itemscope type="none" itemtype="https://schema.org/BreadcrumbList" class="bcrumb uk-text-muted">
      <li class="bcrumb--content" itemprop="itemListElement" itemscope
          itemtype="https://schema.org/ListItem">
        <a class="uk-link-reset uk-text-meta" itemprop="item" href="{{route('mainpage')}}">
            <i class="fas fa-home uk-margin-small-right"></i>
            <span itemprop="name">Головна</span></a>
        <meta itemprop="position" content="1" />
      </li>
      @foreach ($crumbs as $key => list($uri, $title))
        <li class="bcrumb--content" itemprop="itemListElement" itemscope
            itemtype="https://schema.org/ListItem">
          <a class="uk-link-reset uk-text-meta" itemprop="item" href="{{ $uri }}">
              <i class="fas fa-angle-right bcrumb-icon"></i>
              <span itemprop="name">{{ $title }}</span></a>
          <meta itemprop="position" content="{{ $key + 2 }}" />
        </li>
      @endforeach
    </ol>
  </div>
</section>
