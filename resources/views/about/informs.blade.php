
@extends('layout')

@section('content')

    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area breadcrumb-bg d-flex align-items-center" data-background="img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap pt-100 text-center">
                            <h2>Наш сервис</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Главная страница</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Информация</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        <!-- customer-service -->
        <section class="inner-customer-service position-relative padding-md gray-bg pt-150 pb-150">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">



                        <div class="inner-software-img software-img-shape">
                            <img src="{{ Voyager::image(setting('o-nas.imgs_informsir')) }}" alt="img" style="max-width: 100%; height: auto;">

                        </div>

                    </div>
                    <div class="col-lg-6 pl-80">
                        <div class="slider-content digital-slider-content mt-95">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">{{ setting('o-nas.span_text_2') }} <span> {{ setting('o-nas.span_text_1') }} </span>{{ setting('o-nas.span_text_3') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.4s">{!! setting('o-nas.span_text_4') !!}</p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="inner-c-services-shape d-none d-xl-block"><img src="img/shape/inner_c_service_shape.png" alt="img"></div>
        </section>


        @include('info.info_forms')




    </main>



@endsection
