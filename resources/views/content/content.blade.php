
@extends('layout')

@section('content')


    <main>
        <!-- slider-area 1-->
        <section class="slider-area slider-bg" data-background="img/slider/slider_bg.jpg">
            <div class="container">
                <div class="slider-overflow">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="slider-content mt-15">
                                <h2 class="wow slideInLeft" data-wow-delay="0.2s">{{setting('glavnaia-stranica.home')}} <span>{{setting('glavnaia-stranica.home_1')}}</span>{{setting('glavnaia-stranica.home_2')}}</h2>
                                <p class="wow slideInLeft" data-wow-delay="0.4s">{!!Str::limit(setting('glavnaia-stranica.home_4'), 250, $end='...') !!}</p>
                                <a href="/information_forums" class="btn wow slideInLeft" data-wow-delay="0.6s">Перейти</a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 d-none d-lg-block">
                            <div class="slider-img animate-slider-img position-relative ml-50">
                                <img src="img/slider/slider_img01.png" alt="img" class="slider-main-img">
                                <img src="img/slider/board_img.png" alt="img" class="wow slideInDown" data-wow-delay="0.6s">
                                <img src="img/slider/man_img.png" alt="img" class="wow slideInLeftS" data-wow-delay="1s">
                                <div class="img-nth-four wow slideInLeftS" data-wow-delay="1.4s"><img src="img/slider/cog_img1.png" alt="img" class="rotateme"></div>
                                <div class="img-nth-five wow slideInRight" data-wow-delay="1.8s"><img src="img/slider/cog_img2.png" alt="img" class="rotateme"></div>
                                <img src="img/slider/cog_img3.png" alt="img" class="wow slideInLeftS" data-wow-delay="2.2s">
                                <img src="img/slider/cog_img4.png" alt="img" class="wow fadeInUp" data-wow-delay="2.6s">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-shape s-shape-one"><img src="img/shape/slider_shape01.png" alt="img"></div>
            <div class="slider-shape s-shape-two"><img src="img/shape/slider_shape03.png" alt="img"></div>
            <div class="slider-shape s-shape-three"><img src="img/shape/slider_shape02.png" alt="img"></div>
            <div class="slider-shape s-shape-four"><img src="img/shape/slider_shape04.png" alt="img"></div>
            <div class="slider-shape s-shape-five"><img src="img/shape/slider_shape05.png" alt="img"></div>
            <div class="slider-shape s-shape-six"><img src="img/shape/slider_shape06.png" alt="img"></div>
        </section>
        <!-- slider-area-end -->
        <!-- brand-area -->

        <!-- brand-area-end -->
        <!-- features-area -->

        <!-- features-area-end -->
        <!-- market-analysis -->
        <section class="market-analysis fix analysis-shape position-relative pt-150 pb-150">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="m-analysis-img text-center">
                            <img src="{{ Voyager::image(setting('informaciia.info_23')) }}" alt="img" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-100 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="section-title mb-30">
                            <span>{{setting('glavnaia-stranica.home_13')}}</span>
                            <h2>{{setting('glavnaia-stranica.home_14')}}</h2>
                        </div>
                        <div class="analysis-content">
                            <p>    {!!  Str::limit(setting('glavnaia-stranica.home_15'), 250, $end='...') !!}</p>



                            <a href="/information_form" class="btn">Перейти</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- market-analysis-end -->
        <!-- download-area -->
        <section class="download-area download-bg" data-background="">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title white-title text-center mb-40">
                            <span>{{setting('glavnaia-stranica.home_16')}}</span>
                            <h2>{{setting('glavnaia-stranica.home_17')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                        <div class="download-img text-center">
                            <img src="img/images/download_img.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- download-area-end -->
        <!-- services-area -->
        <section class="services-area services-bg-shape pt-145">
            <div class="container">
                <div class="row justify-content-between mb-95">
                    <div class="col-xl-5 col-lg-6 col-md-9">
                        <div class="section-title">
                            <span>{{setting('glavnaia-stranica.home_17')}}</span>
                            <h2>{!!  setting('glavnaia-stranica.home_18')!!}</h2>

                            <div class="software-img software-img-shape">
                                <img src="<?php echo e(Voyager::image(setting('informaciia.info_24'))); ?>"alt="img" class="paroller" data-paroller-factor="-0.08" data-paroller-factor-lg="-0.08" data-paroller-factor-md="-0.08" data-paroller-factor-sm="-0.08" data-paroller-type="foreground" data-paroller-direction="horizontal">
                                <img src="<?php echo e(Voyager::image(setting('informaciia.info_25'))); ?>" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-10">
                        <div class="services-title-content">

                            <p>{!!  Str::limit(setting('informaciia.info_3'), 547, $end='...') !!}</p>
                            <a href="/information">Перейти <i class="fas fa-arrow-right"></i></a>

                        </div>
                    </div>
                </div>
                @include('info.info_forms')
            </div>
        </section>
        <!-- services-area-end -->
        <!-- software-area -->
        <section class="software-area pt-100 pb-150">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="software-img software-img-shape">
                            <img src="<?php echo e(Voyager::image(setting('glavnaia-stranica.info_125'))); ?>"alt="img" class="paroller" data-paroller-factor="-0.08" data-paroller-factor-lg="-0.08" data-paroller-factor-md="-0.08" data-paroller-factor-sm="-0.08" data-paroller-type="foreground" data-paroller-direction="horizontal">
                            <img src="<?php echo e(Voyager::image(setting('glavnaia-stranica.info_126'))); ?>" alt="img">
                        </div>


                    </div>
                    <div class="col-lg-6 pl-80">
                        <div class="section-title mb-30">
                            <span>{{setting('glavnaia-stranica.home_26')}}</span>
                            <h2>{{setting('glavnaia-stranica.home_27')}}</h2>
                        </div>
                        <div class="software-content">
                            <p>{{setting('glavnaia-stranica.home_28')}}</p>
                            <div class="software-list mb-40">
                                <ul>
                                    <li><i class="fas fa-check"></i> {{setting('glavnaia-stranica.home_29')}}</li>
                                    <li><i class="fas fa-check"></i> {{setting('glavnaia-stranica.home_30')}}</li>
                                    <li><i class="fas fa-check"></i> {{setting('glavnaia-stranica.home_31')}}</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- software-area-end -->
        <!-- pricing-area -->
        <section class="pricing-area gray-bg pt-145 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="section-title text-center mb-70">
                            <span>{{setting('glavnaia-stranica.home_32')}}</span>
                            <h2>{{setting('glavnaia-stranica.home_33')}}</h2>
                        </div>
                    </div>
                </div>

                <div class="pricing-wrap">
                    <div class="row">
                        @foreach($prices as $price)
                        <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="single-pricing text-center mb-30">
                                <div class="pricing-head mb-30">
                                    <span>{{ $price->title }}</span>
                                    <p>{{ $price->description }}</p>
                                </div>
                                <div class="pricing-list mb-35">
                                    <ul>
                                        <li>{{ $price->description_1 }}</li>
                                        <li>{{ $price->description_2 }}</li>
                                        <li>{{ $price->description_3 }}</li>
                                        <li>{{ $price->description_4 }}</li>
                                    </ul>

                                </div>
                                <div class="pricing-head mb-30">
                                    <h2 class="price-count">От {{ $price->price }} Руб.<span></span></h2>
                                </div>
                                <div class="pricing-btn">
                                    <a href="/contact" class="btn">Узнать точную цену</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
        <!-- pricing-area-end -->
        <!-- blog-area -->
        <section class="blog-area pt-145 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6">
                        <div class="section-title text-center mb-70">
                            <span>{{setting('glavnaia-stranica.home_34')}}</span>
                            <h2>{!!  setting('glavnaia-stranica.home_35')!!}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog-post mb-30">
                                <div class="b-post-thumb">
                                    <a href="#"><img src="{{ Storage::url($post->image) }}" alt="img"></a>
                                </div>
                                <div class="blog-content">
                                    <span>{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('LL') }}</span>
                                    <h3><a href="{{ route('blog.details', $post->id) }}">{{ $post->title }}</a></h3>
                                    <p>{!!  Str::limit(strip_tags($post->body), 550) !!}</p>
                                    <a href="{{ route('blog.details', ['id' => $post->id]) }}">Читать далее <i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!-- blog-area-end -->
    </main>





@endsection
