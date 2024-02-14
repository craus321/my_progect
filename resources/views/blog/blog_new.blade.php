@extends('layout')

@section('content')




<main>
    <!-- breadcrumb-area -->
    <div class="breadcrumb-area breadcrumb-bg d-flex align-items-center" data-background="{{ asset('img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap pt-100 text-center">
                        <h2>Блог</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Главная страница</a></li>
                                <li class="breadcrumb-item"><a href="/blog">Страница блога</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="blog-details-area pt-150 pb-90">
        <div class="container">
            <div class="blog-page-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="inner-single-blog-post blog-details-wrap mb-60">
                            <div class="b-post-thumb mb-30">
                                @if($post && $post->image)
                                    <a href="#"><img src="{{ Storage::url($post->image) }}" alt="img"></a>
                                @endif
                            </div>
                            <div class="blog-content inner-blog-content blog-details-content">
                                <div class="blog-meta mb-10">
                                    <ul>
                                        @if ($post)
                                            <li><i class="far fa-user"></i> <a >{{ $post->author_name }}</a></li>
                                            <li><i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('LL') }}</li>
                                            <li><i class="far fa-comments"></i> <a >Комментарии ({{ $commentCount }})</a></li>
                                        @endif
                                    </ul>
                                </div>

                                @if ($post)
                                    <h3><a href="{{ route('blog.details', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                                    <p>{!! htmlspecialchars_decode($post->body) !!}</p>


                                @endif
                            </div>
                            <div class="blog-details-tag">
                                <ul>
                                    <li><i class="fas fa-tags"></i> Tags :</li>
                                    @foreach ($tags as $tag)
                                        @if ($tag)
                                            <li><a href="{{ route('blog.tag', ['tag' => $tag]) }}">{{ $tag }}</a></li>
                                        @endif

                                    @endforeach
                                </ul>
                            </div>







                            <div class="comment-reply-box pb-70">
                                <div class="blog-details-title mb-50"></div>
                                @if(auth()->check())
                                    @if ($post)
                                        <form class="comment-form" id="commentForm" data-post-id="{{ $post->id }}">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <textarea name="message" id="message" placeholder="Ваше мнение..."></textarea>
                                            <button type="submit" class="btn">Добавить комментарий</button>
                                        </form>
                                    @endif
                                @endif
                            </div>


                            <div class="comment-box" id="comment-list">
                                <div class="blog-details-title mb-50">
                                    <h4>Комментарии</h4>
                                </div>
                                <ul>
                                    @include('blog.comment')
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 pl-50">
                        <div class="widget mb-60">
                            <div class="sidebar-searc">
                                <form action="{{ route('blog.search') }}" method="GET" class="search-form">
                                    <div class="search-container">
                                        <input type="text" name="search" id="searchInput" placeholder="Поиск...">
                                        <button type="submit" id="searchButton">Поиск</button>
                                    </div>
                                </form>

                        </div>
                        <div class="widget mb-40">
                            <div class="sidebar-author text-center">
                                <div class="sidebar-title mb-25">


                                    <h4>{!! setting('blog.avtor_1') !!}</h4>
                                </div>
                                <div class="sidebar-author-info">
                                    <div class="sidebar-author-img mb-20">

                                        <img src="{{ Voyager::image(setting('blog.avtor_2')) }}" alt="img" style="max-width: 100%; height: auto;">
                                    </div>
                                    <p>{!! setting('blog.avtor') !!}</p>
                                    <ul>
                                        <li><a href=  {!! setting('kontaktnye-dannye.Contact') !!}><img src="{{ asset('img/icon_footer/vk.png') }}" alt="ВКонтакте" width="33" height="33"></a></li>
                                        <li><a href=  {!! setting('kontaktnye-dannye.Contact_1') !!}><img src="{{ asset('img/icon_footer/telegram.png') }}" alt="ВКонтакте" width="33" height="33"></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>




                        <div class="widget mb-40">
                            <div class="sidebar-title mb-25">
                                <h4>Недавные посты</h4>
                            </div>
                            <div class="rc-post">
                                <ul>
                                    @if(isset($posts) && $posts->count() > 0)
                                    @foreach ($posts as $post)
                                        <li>
                                            <div class="rc-post-thumb">
                                                <a href="#" class="custom-image"><img src="{{ asset('storage/' . $post->image) }}" alt="img"></a>

                                            </div>
                                            <div class="rc-post-content">


                                                <h6><a href="{{ route('blog.details', ['id' => $post->id]) }}">{{ $post->title }}</a></h6>
                                                <span>{{ Carbon\Carbon::parse($post->created_at)->isoFormat('LL') }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                    @else
                                        <p>Посты не найдены</p>
                                    @endif
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
</main>

<style>
    p {
        /* Для обеспечения адаптивной ширины контейнера */
        max-width: 100%;
    }

    p img {
        /* Для автоматического масштабирования изображений */
        max-width: 100%;
        height: auto;
        display: block; /* Чтобы изображения не перекрывались текстом и имели свой блочный поток */
        margin: 0 auto; /* Чтобы изображения располагались по центру */
    }
</style>
<!-- main-area-end -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function () {
        // Обработка события отправки формы
        $('#commentForm').submit(function (e) {
            e.preventDefault();

            // Получение данных из формы
            var postId = $(this).data('post-id');
            var message = $('#message').val();

            // Проверка наличия переменной $post
            @isset($post)
            // Отправка AJAX-запроса
            $.ajax({
                url: '{{ route('comments.store', $post->id) }}', // Используйте функцию route для генерации URL
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    post_id: postId, // Добавьте post_id в данные запроса
                    message: message,
                },
                success: function (response) {
                    // Обработка успешного ответа
                    console.log('Успешный ответ:', response);

                    // Можно добавить код для обновления списка комментариев без перезагрузки страницы
                    var commentList = $('#comment-list');

                    // Проверка наличия комментариев в ответе
                    if (response.success && response.comment) {
                        // Добавление нового комментария
                        var newCommentHtml = '<li>' +
                            '<div class="single-comment">' +
                            '<div class="comment-avatar">' +
                            '<img src="{{ asset('storage/') }}/' + (response.comment.user ? response.comment.user.avatar : '') + '" alt="Фото профиля" class="img-profile no-border-radius">' +
                            '</div>' +
                            '<div class="commtent-text">' +
                            '<h5>' + (response.comment.user ? response.comment.user.name : '') + ' <span>' + response.comment.created_at_formatted + '</span></h5>' +
                            '<p>' + response.comment.message + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</li>';

                        commentList.find('ul').append(newCommentHtml);
                    }

                    // Очистка поля ввода после успешного добавления комментария
                    $('#message').val('');

                    // Отключение возможности отправки комментария на 3 минуты
                    $('#commentForm button[type="submit"]').prop('disabled', true);
                    setTimeout(function () {
                        $('#commentForm button[type="submit"]').prop('disabled', false);
                    }, 18000); // 180000 миллисекунд = 3 минуты
                },
                error: function (error) {
                    // Обработка ошибки
                    console.error('Ошибка при отправке комментария:', error);
                }
            });
            @else
            console.error('Переменная $post не определена');
            @endisset
        });
    });
</script>








@endsection


