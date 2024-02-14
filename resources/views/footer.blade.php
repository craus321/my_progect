<footer>
    <div class="footer-wrap pt-85 pb-40" data-background="{{ asset('img/bg/footer_bg.jpg') }}">

    <div class="container">
            <div class="footer-newsletter pb-65">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <a href="{{ asset('index.html') }}">
                                <img src="{{ asset('img/logo/w_logo.png') }}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 newsletter-flex text-left text-md-right">
                        <div class="f-newsletter-content d-inline-block">
                            <p><i class="fas fa-arrow-right"></i> ПОДПИСАТЬСЯ НА НАШУ РАССЫЛКУ</p>
                        </div>

                        <div class="f-newsletter-form d-block d-md-inline-block">
                            <form action="{{ route('subscribe.email') }}" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Введите ваш email здесь" style="width: auto; margin-bottom: 0; padding: 0; border-radius: 0; border: none; font-size: 16px;">
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </form>

                        </div>


                        @if(session('error'))
                            <p style="color: red;">{{ session('error') }}</p>
                        @endif


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-widget mb-50">
                        <div class="footer-text">
                            <p>WebBuilderPro - легкий путь к профессиональному веб-сайту.</p>
                        </div>
                        <div class="footer-social">
                            <ul>
                                <li><a href=  {!! setting('kontaktnye-dannye.Contact') !!}><img src="{{ asset('img/icon_footer/vk.png') }}" alt="ВКонтакте" width="33" height="33"></a></li>
                                <li><a href=  {!! setting('kontaktnye-dannye.Contact_1') !!}><img src="{{ asset('img/icon_footer/telegram.png') }}" alt="ВКонтакте" width="33" height="33"></a></li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-30">
                            <h5>Полезные ссылки:</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="/about"><i class="fas fa-caret-right"></i> О нас</a></li>
                                <li><a href="/contact"><i class="fas fa-caret-right"></i> Связаться с нами</a></li>
                                <li><a href="/blog"><i class="fas fa-caret-right"></i> Новости</a></li>
                                <li><a href="/chat"><i class="fas fa-caret-right"></i> Чат</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-30">
                            <h5>Ваше удобное веб-путешествие</h5>
                        </div>
                        <div class="f-support-content">
                            <p>Мы стремимся сделать ваше веб-путешествие максимально комфортным и эффективным. Доверьтесь нам, чтобы создать вместе потрясающие веб-проекты!</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <div class="copyright-text">
                        <p>Copyright© <span>WebBuilderPro </span> | Все права защищены</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="f-payment-method text-center text-md-right">


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="your-recaptcha-element-id"></div>

    <script>
        // Определите функцию onloadCallback в глобальной области видимости
        function onloadCallback() {
            grecaptcha.render('your-recaptcha-element-id', {
                'sitekey': '6Lea3mIpAAAAAHhGHE2rPw7SVyemRGICQxqvLkVa',
                'callback': onCaptchaSuccess,
                'size': 'invisible'
            });
        }

        function onCaptchaSuccess(token) {
            // Обработка успешной верификации капчи, если необходимо
            console.log('reCAPTCHA успешно пройдена. Токен:', token);
        }
    </script>


    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

</footer>

<style>
    #your-recaptcha-element-id {
        display: none;
    }
</style>


