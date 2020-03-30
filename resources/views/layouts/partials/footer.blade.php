<footer class="uk-section uk-section-secondary uk-padding-remove-bottom">
  <div class="uk-container">
    <div class="uk-grid uk-grid-large" data-uk-grid>
      <div class="uk-width-1-2@m">
        <h5>Контактна інформація</h5>
        <ul class="uk-list">
          <li><i class="fas fa-map-marker-alt uk-margin-small-right"></i>{{setting('contacts.address')}}</li>
          <li><i class="fas fa-envelope-open uk-margin-small-right"></i><a href="mailto:{{setting('contacts.email')}}" title="">{{setting('contacts.email')}}</a></li>
          <li><i class="fas fa-phone-alt uk-margin-small-right"></i><a href="tel:{{setting('contacts.phone')}}">{{setting('contacts.phone')}}</a></li>
        </ul>

        <div>
          @if (setting('contacts.fb'))
            <a href="https://www.facebook.com/{{setting('contacts.fb')}}" class="uk-icon-button uk-link-reset" target="_blank"><i class="fab fa-facebook-f"></i></a>
          @endif
          @if (setting('contacts.telegram_canal'))
            <a href="https://t.me/{{setting('contacts.telegram_canal')}}" class="uk-icon-button uk-link-reset" target="_blank"><i class="fab fa-telegram-plane"></i></a>
          @endif
          @if (setting('contacts.twitter'))
            <a href="https://twitter.com/{{setting('contacts.twitter')}}" class="uk-icon-button uk-link-reset" target="_blank"><i class="fab fa-twitter"></i></a>
          @endif
          @if (setting('contacts.instagram'))
            <a href="https://www.instagram.com/{{setting('contacts.instagram')}}" class="uk-icon-button uk-link-reset" target="_blank"><i class="fab fa-instagram"></i></a>
          @endif
          @if (setting('contacts.youtube'))
            <a href="https://www.youtube.com/{{setting('contacts.youtube')}}" class="uk-icon-button uk-link-reset" target="_blank"><i class="fab fa-youtube"></i></a>
          @endif
        </div>
      </div>
      <div class="uk-width-1-6@m">
        <h5>Проекти</h5>
        <ul class="uk-list">
          <li>Перший елемент</li>
          <li>Другий елемент</li>
          <li>Третій елемент</li>
          <li>Четвертий елемент</li>
        </ul>
      </div>
      <div class="uk-width-1-6@m">
        <h5>Діячі</h5>
        <ul class="uk-list">
          <li>Перший елемент</li>
          <li>Другий елемент</li>
          <li>Третій елемент</li>
          <li>Четвертий елемент</li>
        </ul>
      </div>
      <div class="uk-width-1-6@m">
        <h5>Активісти</h5>
        <ul class="uk-list">
          <li>Перший елемент</li>
          <li>Другий елемент</li>
          <li>Третій елемент</li>
          <li>Четвертий елемент</li>
        </ul>
      </div>

    </div>
  </div>

  <div class="uk-text-center uk-padding uk-padding-remove-horizontal">
    <span class="uk-text-small uk-text-muted">© 2019 @if (date('Y') != '2019')- {{date('Y')}}  @endif {{config('app.name')}}, усі права захищені -
      <a href="/policy" title="Політика конфіденційності">оферта</a> | Developer - <a href="#" title="Brain" target="_blank" data-uk-tooltip> <i class="fas fa-brain"></i> </a>
    </span>
  </div>
</footer>
