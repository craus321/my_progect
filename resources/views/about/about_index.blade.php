@extends('layout')

@section('content')

    <main>
        <!-- slider-area -->
        <section class="slider-area slider-bg fix digital-slider-bg" data-background="img/slider/slider_bg04.jpg">
            <div class="container">
                <div class="digital-slider-overflow">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-11">
                            <div class="slider-content digital-slider-content mt-95">
                                <h2 class="wow fadeInUp" data-wow-delay="0.2s">{{ setting('o-nas.span_text_2') }} <span> {{ setting('o-nas.span_text_1') }} </span>{{ setting('o-nas.span_text_3') }}</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.4s">{!! Str::limit(setting('o-nas.span_text_4'), 250, $end='...') !!} </p>


                                <a href="/about_informs" class="btn wow fadeInUp" data-wow-delay="0.6s">Перейти</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                            <div class="slider-img digital-animate-slider-img position-relative">



                                <img src="{{ asset('img/slider/digital_slider_img.png') }}" alt="img" class="digital-slider-main-img">
                                <img src="{{ asset('img/slider/digi_phone.png') }}" alt="img" class="digital-slider-phone wow slideInDown" data-wow-delay="0.6s">
                                <div class="wow slideInLeftDigi digital-slider-man" data-wow-delay="0.8s"><img src="{{ asset('img/slider/digi_man.png') }}" alt="img" class="alltuchtopdown wow" data-wow-delay="1.2s"></div>
                                <div class="wow slideInRightDigi digital-slider-cog" data-wow-delay="1s"><img src="{{ asset('img/slider/digi_cog.png') }}" alt="img" class="rotateme"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider-area-end -->
        <!-- brand-area -->
        <div class="brand-area">
            <div class="container">
                <div class="digital-brand-wrap">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="brand-active">
                                <div class="single-brand">
                                    <img src="img/brand/t_brand_logo01.png" alt="img">
                                </div>
                                <div class="single-brand">
                                    <img src="img/brand/t_brand_logo02.png" alt="img">
                                </div>
                                <div class="single-brand">
                                    <img src="img/brand/t_brand_logo03.png" alt="img">
                                </div>
                                <div class="single-brand">
                                    <img src="img/brand/t_brand_logo04.png" alt="img">
                                </div>
                                <div class="single-brand">
                                    <img src="img/brand/t_brand_logo05.png" alt="img">
                                </div>
                                <div class="single-brand">
                                    <img src="img/brand/t_brand_logo02.png" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->
        <!-- features-area -->
        <section class="features-area pb-120 pt-145">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-7 col-md-10">
                        <div class="section-title text-center mb-70">
                            <span>{{ setting('o-nas.span_text_5') }}</span>
                            <h2>{{setting('o-nas.span_text_6')}}</h2>
                        </div>
                    </div>
                </div>
                @include('info.info_forms')
            </div>
        </section>
        <!-- features-area-end -->
        <!-- market-analysis -->
        <section class="market-analysis position-relative pt-95 pb-100 mb-150">

            <div class="container">
                <div class="row justify-content-lg-end">
                    <div class="inner-software-img software-img-shape">
                        <img src="{{ Voyager::image(setting('o-nas.span_text_14_img')) }}" alt="img">
                    </div>
                    <div class="col-lg-6 col-md-10 pl-100">
                        <div class="section-title mb-30">
                            <span>{{setting('o-nas.span_text_13')}}</span>
                            <h2>{{setting('o-nas.span_text_14')}}</h2>
                        </div>
                        <div class="analysis-content digital-analysis-content">
                            <p style="word-break: break-all;">{!! Str::limit(setting('o-nas.span_text_15'), 650, $end='...') !!}</p>



                            <a href="/about_informats" class="btn">Перейти</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customer-services-shape"><img src="img/shape/customer_services_shape.png" alt="img"></div>
        </section>
        <!-- market-analysis-end -->
        <!-- counter-area -->
        <section class="counter-area counter-bg pt-150 pb-100" data-background="img/bg/counter_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-counter text-center mb-50">
                            <div class="counter-icon">
                                <img src="{{ Voyager::image(setting('o-nas.span_text_18')) }}" alt="img">

                            </div>
                            <div class="counter-content">
                                <h2 class="count">{{setting('o-nas.span_text_16')}}</h2>
                                <span>{{setting('o-nas.span_text_17')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-counter text-center mb-50">
                            <div class="counter-icon">
                                <img src="{{ Voyager::image(setting('o-nas.span_text_19')) }}" alt="img">
                            </div>
                            <div class="counter-content">
                                <h2 class="count">{{setting('o-nas.span_text_20')}}</h2>
                                <span>{{setting('o-nas.span_text_21')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-counter text-center mb-50">
                            <div class="counter-icon">
                                <img src="{{ Voyager::image(setting('o-nas.span_text_22')) }}" alt="img">
                            </div>
                            <div class="counter-content">
                                <h2 class="count">{{setting('o-nas.span_text_23')}}</h2>
                                <span>{{setting('o-nas.span_text_24')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-counter text-center mb-50">
                            <div class="counter-icon">
                                <img src="{{ Voyager::image(setting('o-nas.span_text_25')) }}" alt="img">
                            </div>
                            <div class="counter-content">
                                <h2><span class="count">{{setting('o-nas.span_text_26')}}</span></h2>
                                <span>{{setting('o-nas.span_text_27')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="project-area primary-bg pt-145 pb-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section-title text-center mb-60">
                            <span> {{setting('o-nas.span_text_28')}}</span>
                            <h2>{{setting('o-nas.span_text_29')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0 fix">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="project-active">
                            @foreach($projects as $project)
                                @if($project->image_path && is_array(json_decode($project->image_path)))
                                    @php
                                        $folderName = trim($project->folder_name, '/');
                                    @endphp

                                    @foreach(json_decode($project->image_path) as $image)
                                        <div class="single-project text-center">
                                            <img src="{{ asset('storage/' . $image) }}" alt="img">

                                        </div>
                                    @endforeach
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>







        <!-- project-area-end -->
        <!-- services-area -->

        <!-- services-area-end -->
        <!-- testimonail-area -->
        <!-- testimonail-area-end -->
        <!-- pricing-area -->
        <section class="pricing-area position-relative pt-145 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-7 col-md-9">
                        <div class="section-title text-center mb-70">
                            <span>{{setting('o-nas.span_text_30')}}</span>
                            <h2>{{setting('o-nas.span_text_31')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="pricing-wrap">
                    <div class="row">

                        @foreach($prices as $price)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-pricing s-single-pricing text-center mb-30">
                                    <div class="pricing-head mb-35">
                                        <span>{{ $price->title }}</span>
                                        <p>{{ $price->description }}</p>
                                        <h2 class="price-count">От {{ $price->price }} Руб.<span></span></h2>
                                    </div>
                                    <div class="pricing-list mb-35">
                                        <ul>

                                                <li>{{ $price->description_1 }}</li>
                                                <li>{{ $price->description_2 }}</li>
                                                <li>{{ $price->description_3 }}</li>
                                                <li>{{ $price->description_4 }}</li>

                                        </ul>
                                    </div>
                                    <div class="s-pricing-btn">
                                        <a href="/contact" class="btn">Узнать цену</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
            <div class="digi-pricing-shape"><img src="img/shape/pricing_shape.png" alt="img"></div>
        </section>
        <!-- pricing-area-end -->
        <!-- blog-area -->

        <!-- blog-area-end -->
    </main>


@endsection
