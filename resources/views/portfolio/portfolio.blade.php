


@extends('layout')

@section('content')

    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area breadcrumb-bg d-flex align-items-center" data-background="img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap pt-100 text-center">
                            <h2>Портфолио</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Домашняя страница</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Портфолио</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        <!-- projrct-area -->
        <!-- Ваш HTML-код -->
        <section class="project-area pt-150 pb-120">
            <div class="container">
                <div class="inner-project-wrap">
                    <div class="row">
                        @foreach($projects as $project)
                            <div class="col-lg-4 col-md-6">
                                <div class="inner-single-project text-center mb-30">
                                    <img class="fullscreen-image bordered" src="{{ asset('storage/' . $project->image_path) }}" alt="img">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="pagination-wrap text-center">
                {{ $projects->onEachSide(1)->links('blog.pagination') }}
            </div>

        </section>

        <main>
            <!-- projrct-area-end -->
        </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var fullscreenImages = document.querySelectorAll('.fullscreen-image');

            fullscreenImages.forEach(function (fullscreenImage) {
                fullscreenImage.addEventListener('click', function () {
                    toggleFullscreen(fullscreenImage);
                });
            });
        });

        function toggleFullscreen(element) {
            if (!document.fullscreenElement) {
                element.requestFullscreen().catch(err => {
                    console.error(`Error attempting to enable full-screen mode: ${err.message}`);
                });
            } else {
                document.exitFullscreen();
            }
        }

        document.addEventListener('fullscreenchange', function () {
            var fullscreenImage = document.querySelector('.fullscreen-image');
            fullscreenImage.classList.toggle('fullscreen', document.fullscreenElement !== null);
        });
    </script>

    <style>
        .inner-single-project {
            position: relative;
            overflow: hidden;
            width: 351px; /* Ширина блока */
            height: 300px; /* Высота блока */
        }

        .inner-single-project img {
            width: 100%;
            height: 100%;
            display: block;
            transition: transform 0.3s ease;
            object-fit: cover;
            cursor: pointer;
        }

        .fullscreen-image {
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .fullscreen-image.fullscreen {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 90%;
            z-index: 1000;
        }

        .fullscreen-image.fullscreen img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transform: scale(1.1);
        }

        .fullscreen-image.bordered {
            border: 5px solid #1c1111;
            box-sizing: border-box;
        }

        .fullscreen-image.fullscreen.bordered {
            border: none;
        }

        .round-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>


@endsection
