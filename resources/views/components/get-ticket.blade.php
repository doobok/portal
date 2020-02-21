<div class="uk-grid uk-child-width-1-2@l uk-flex-middle" data-uk-grid data-uk-scrollspy="target: > div; cls: uk-animation-slide-left-medium">
  <div class="uk-cover-container">
      <img src="/ticket.png" uk-cover>


      <div class="uk-position-cover uk-flex uk-flex-middle">
        <span class="uk-h2 uk-light uk-text-uppercase uk-text-bold uk-margin-medium-left uk-margin-medium-right uk-text-center uk-width-1-1"> {{$title}} </span>
      </div>
    <canvas width="512" height="285"></canvas>
  </div>

  <div data-uk-scrollspy-class="uk-animation-slide-right-medium">
    <h6 class="uk-text-primary">Попереднє бронювання</h6>
    <h3 class="uk-margin-small-top"><i class="fas fa-money-bill-wave"></i> Придбати онлайн*</h3>
    <div class="">
      <p class="uk-h1 uk-margin-remove uk-text-danger uk-text-right" style="text-decoration: line-through">{{number_format($price, 0, '.', ' ')}} грн.</p>
      <p class="uk-heading-medium uk-margin-remove uk-text-success">{{number_format(($price/100)*90, 0, '.', ' ')}} грн.</p>
    </div>

    <div class="uk-text-center uk-margin-top">

      <backet-add
        title="{{$title}}"
        price="{{($price/100)*90}}"
        model="{{$model}}"
        model_id="{{$model_id}}">
      </backet-add>

    </div>

    <p class="subtitle-text">
      *При оплаті через сайт ви економите 10% від вартості придбаних послуг. (Необхідна реєстрація)
    </p>

  </div>
</div>
