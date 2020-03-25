{{-- FB share script --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v6.0&appId=698531037619095&autoLogAppEvents=1"></script>

  {{-- Tweetter share script --}}
  <script>window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
      t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);

    t._e = [];
    t.ready = function(f) {
      t._e.push(f);
    };

    return t;
  }(document, "script", "twitter-wjs"));</script>

  {{-- Share buttons --}}
<div class="uk-margin-medium-top uk-margin-medium-bottom">
    <hr>
    <h5 class="uk-heading-line"><span><span class="uk-text-muted uk-margin-right" uk-icon="icon: social; ratio: 1.1"></span>Поділіться в соцмережах</span> </h5>

    <div class="uk-flex uk-flex-middle">

        <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ffuture-bucha.club%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Поділитись</a></div>

        <span class="uk-margin-left">
            <a class="twitter-share-button" rel="nofollow"
              href="https://twitter.com/intent/tweet"
              data-size="large">
            Tweet</a>
        </span>
    </div>
</div>
