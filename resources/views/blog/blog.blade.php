@extends('layout')

@section('content')

    <main>

        <div class="breadcrumb-area breadcrumb-bg d-flex align-items-center" data-background="{{ asset('img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap pt-100 text-center">
                            <h2>Блог</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Главная страница</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Страница блога</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog-area inner-blog-area pt-150 pb-150">
        <div class="container">
            <div class="blog-page-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach($posts as $post)
                            <div class="inner-single-blog-post mb-60">
                                <h3><a href="{{ route('blog.details', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>

                                <div class="b-post-thumb mb-30">


                                    @if($post->image)
                                        <a href="#"><img src="{{ Storage::url($post->image) }}" alt="img"></a>
                                    @endif


                                </div>
                                <div class="blog-content inner-blog-content">
                                    <div class="blog-meta mb-10">
                                        <ul>
                                            <li><i class="far fa-user"></i> <a href="#">{{ $post->author_name }}</a></li>
                                            <li><i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('LL') }}</li>
                                            <li><i class="far fa-comments"></i> <a href="{{ route('blog.details', ['id' => $post->id]) }}">Комментарии ({{ $post->comment_count }})</a></li>

                                        </ul>
                                    </div>

                                    <p>{!! Str::limit(strip_tags($post->body), 550) !!}</p>
                                    <a href="{{ route('blog.details', ['id' => $post->id]) }}" class="read-more-link">Читать дальше <i class="fas fa-plus"></i></a>



                                </div>
                            </div>
                        @endforeach

                        <div class="pagination-wrap text-center">
                            <nav>
                                <ul class="pagination">

                                        {{ $posts->onEachSide(1)->links('blog.pagination') }}


                            </nav>
                        </div>
                    </div>
                    @include('sidebar.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
    </main>

<style>
    /* Добавьте эти стили в ваш файл CSS или внутри тега <style> в HTML */

    a.read-more-link {
        display: inline-block;
        padding: 15px 20px;
        color: #f39c12;
        font-weight: bold;
        text-decoration: none;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Тень */
        transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
    }

    a.read-more-link:hover {

        transform: translateY(-2px); /* Поднимаем кнопку при наведении */
    }

    a.read-more-link i {
        margin-left: 8px;
    }



</style>




@endsection
