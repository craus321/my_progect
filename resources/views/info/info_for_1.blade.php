
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
                            <img src="{{ Voyager::image(setting('informaciia.info_23')) }}" alt="img" style="max-width: 100%; height: auto;">

                        </div>
                    </div>
                    <div class="col-lg-6 pl-80">
                        <div class="section-title mb-30">
                            <span>{{setting('glavnaia-stranica.home_13')}}</span>
                            <h2>{{setting('glavnaia-stranica.home_14')}}</h2>
                        </div>
                        <div class="software-content inner-c-services-content">
                            <p>{!! setting('glavnaia-stranica.home_15') !!}</p>



                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-c-services-shape d-none d-xl-block"><img src="img/shape/inner_c_service_shape.png" alt="img"></div>
        </section>


        @include('info.info_forms')




    </main>



@endsection
