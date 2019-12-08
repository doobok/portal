<div class="nav uk-light" data-uk-sticky="cls-active: uk-background-primary uk-box-shadow-medium; top: 100vh; animation: uk-animation-slide-top" style="top: 0px;">
  <div class="uk-container">
    <nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar>
      <div class="uk-navbar-left">
        <div class="uk-navbar-item uk-padding-remove-horizontal">
          <a class="uk-logo" title="Logo" href="/"><img src="/logo.svg" alt="Logo" width="200px"></a>
        </div>
      </div>
      <div class="uk-navbar-right">

          <menu-main user="{{auth()->user()}}"></menu-main>

        <a class="uk-navbar-toggle uk-navbar-item uk-hidden@s" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a>
      </div>
    </nav>
  </div>
</div>
