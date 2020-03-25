{{-- FB share script --}}
    <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&autoLogAppEvents=1&version=v3.2&appId=1091907270930974';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

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

        <div class="fb-like" data-href="{{url()->current()}}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>

        <span class="uk-margin-left">
            <a class="twitter-share-button" rel="nofollow"
              href="https://twitter.com/intent/tweet"
              data-size="large">
            Tweet</a>
        </span>
    </div>
</div>
