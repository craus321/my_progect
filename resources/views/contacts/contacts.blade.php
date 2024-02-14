
@extends('layout')

@section('content')

    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area breadcrumb-bg d-flex align-items-center" data-background="img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <h2>
                                Связаться с нами
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Домашняя страница</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Контакты</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        <!-- contact-area -->
        <section class="contact-area pt-120 pb-120">
            <div class="container">
                <div class="contact-wrap">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-contact-box text-center mb-30">
                                <div class="contact-box-icon">
                                    <img src="img/icon/contact_icon01.png" alt="img">
                                </div>
                                <div class="contact-content">
                                    <h5>Расположение офисов</h5>
                                    <span>{!!setting('kontaktnye-dannye.Contact_2')!!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-contact-box text-center mb-30">
                                <div class="contact-box-icon">
                                    <img src="img/icon/contact_icon02.png" alt="img">
                                </div>
                                <div class="contact-content">
                                    <h5>Номер телефона</h5>
                                    <span>{!!setting('kontaktnye-dannye.Contact_3')!!}</span>
                                    <span>{!!setting('kontaktnye-dannye.Contact_4')!!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-contact-box text-center mb-30">
                                <div class="contact-box-icon">
                                    <img src="img/icon/contact_icon03.png" alt="img">
                                </div>
                                <div class="contact-content">
                                    <h5>Электронная почта</h5>
                                    <span>{!!setting('kontaktnye-dannye.Contact_5')!!}</span>
                                    <span>{!!setting('kontaktnye-dannye.Contact_6')!!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::check())

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center mb-60">
                            <span>Связаться с нами</span>
                            <h2>Заполните ваши контактные данные</h2>
                        </div>
                        <div class="contact-form text-center">
                            <form action="{{ route('contact-form.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="full_name" placeholder="Ваше полное имя">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" placeholder="Электронная почта Email*">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" placeholder="Номер телефона*">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="website" placeholder="Ваш Web сайт">
                                    </div>
                                </div>
                                <textarea name="message" id="message" placeholder="Сообщение"></textarea>
                                <div class="g-recaptcha" data-sitekey="6LdYNTgpAAAAAIxbRp2ld8PS5EG1BazsQDsch2QO" data-callback="onCaptchaSuccess"></div>
                                @error('g-recaptcha-response')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                                <script>
                                    function onCaptchaSuccess(response) {
                                        document.getElementById("g-recaptcha-response").value = response;
                                    }
                                </script>
                                <button type="submit" class="btn">Оставить заявку</button>

                            </form>
                        </div>
                    </div>
                </div>


                @endif
            </div>
        </section>
        <!-- contact-area-end -->
        <!-- contact-map -->
        <div class="contact-map" data-background="img/images/map_img.jpg"></div>
        <!-- contact-map-end -->
    </main>






@endsection
