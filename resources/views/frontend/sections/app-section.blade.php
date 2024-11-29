<!-- app section -->
<section class="app-section ptb-80">
    <div class="container">
        @if(@isset($app->value))
       <div class="app-section-title pb-40">
          <div class="row">
             <div class="col-lg-7">
                <div class="app-title">
                    <h2 class="titl">{{@$app->value->language->$lang->title ?? @$app->value->language->$default->title }}</h2>
                </div>
                <p>{!!@$app->value->language->$lang->description ?? @$app->value->language->$default->description !!}</p>
             </div>
          </div>
       </div>
        <div class="row">
            <div class="col-lg-5 pb-30">
                <div class="app-btn-wrapper">
                    <a href="{{ $app_settings->android_url ?? '' }}" class="app-btn" target="_blank">
                        <div class="app-icon">
                            <img src="{{ asset('frontend/assets/images/icon/play-store.webp') }}" alt="icon">
                        </div>
                        <div class="content">
                            <span>{{ __("Get It On") }}</span>
                            <h5 class="title">{{ __("Google Play") }}</h5>
                        </div>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/images/element/qr-icon.webp') }}" alt="element">
                        </div>
                        <div class="app-qr">
                            <img src="{{ asset('frontend/assets/images/element/play-qr.webp') }}" alt="element">
                        </div>
                    </a>
                    <a href="{{ $app_settings->iso_url ?? '' }}" class="app-btn" target="_blank">
                        <div class="app-icon">
                            <img src="{{ asset('frontend/assets/images/icon/apple-store.webp') }}" alt="icon">
                        </div>
                        <div class="content">
                            <span>{{ __("Download On The") }}</span>
                            <h5 class="title">{{ __("Apple Store") }}</h5>
                        </div>
                        <div class="icon">
                            <img src="{{ asset('frontend/assets/images/element/qr-icon.webp') }}" alt="element">
                        </div>
                        <div class="app-qr">
                            <img src="{{ asset('frontend/assets/images/element/app-qr.webp') }}" alt="element">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="app-img">
                    <img src="{{ get_image(@$app->value->image, 'site-section') }}" alt="app">
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
