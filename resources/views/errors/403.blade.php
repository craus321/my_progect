
@extends('layout')

@section('content')

    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area breadcrumb-bg d-flex align-items-center" style="background-image: url('{{ asset('img/bg/breadcrumb_bg.jpg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <h2>403 Доступ запрещен</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Домашняя страница</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">403 Ошибка</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        <!-- 404-area -->
        <section class="error-area pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 text-center">
                        <div class="error-img mb-60">
                            <img src="{{ asset('img/images/404_img.png') }}" alt="">
                        </div>
                        <div class="error-content">
                            <h3>Что-то <span>не так</span></h3>
                            <p>У вас нет прав доступа к этой странице.</p>
                            <a href="/" class="btn">Домашняя страница</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 404-area-end -->
    </main>
@endsection
