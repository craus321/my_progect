@php
    $unreadMessagesCount = DB::table('ch_messages')
        ->where('to_id', Auth::id())
        ->where('seen', 0)
        ->count();
@endphp
    <div id="header-sticky" class="transparent-header s-transparent-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/logo/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 text-right d-none d-lg-block">
                    <div class="menu-area d-inline-block">
                        <div class="main-menu">
                            <nav id="mobile-menu">


                                <ul>

                                        @if (Auth::check())

                                        <button class="header1__btn-login js-show-login" data-toggle="modal" data-target="#personalAccountModal">Мой аккаунт</button>


                                        <style>
                                            @media (min-width: 993px) {
                                                .header1__btn-login {
                                                    display: none;
                                                }
                                            }
                                        </style>

                                        @else
                                            <div class="header-btn">
                                                <a href="/login" class="btn"><i class="fas fa-lock"></i> Авторизоваться</a>
                                            </div>
                                    @endif
                                    <li ><a href="/">Главная</a>

                                    </li>
                                    <li><a href="about">Информация</a></li>


                                    <li><a href="/blog">Блог</a>

                                    </li>
                                    <li><a href="/contact">Контакты</a></li>

                                </ul>

                            </nav>
                        </div>

                    </div>

                    @if (Auth::check())

                        <div  class="header_btn d-none d-xl-inline-block">
                            <button class="header__btn-login js-show-login" data-toggle="modal" data-target="#personalAccountModal">Мой аккаунт</button>
                        </div>
                    @else
                        <div class="header-btn d-none d-xl-inline-block">
                            <a href="/login" class="btn"><i class="fas fa-lock"></i> Авторизоваться</a>
                        </div>
                    @endif

                </div>

            </div>
            <div class="col-12">
                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>
@if (Auth::check() && Auth::user())
    <div class="modal fade" id="personalAccountModal" tabindex="-1" role="dialog" aria-labelledby="personalAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="personalAccountModalLabel">Личный кабинет</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="login__header ">
                            <form action="/update-avatar" id="avatarForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Изменение аватара -->
                                <div class="avatar-container">
                                    <img id="avatarImage" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Фото профиля" class="img-profile">
                                    <input type="file" name="avatar" accept="image/*" id="avatarInput">
                                </div>
                            </form>

                            <div class="login__title stretch-free-width ws-nowrap">
                                <p class="user-name">
                                     {{ Auth::user()->name }} {{ Auth::user()->patronymic }} {{ Auth::user()->surname }}
                                </p>
                                <p><strong>Номер телефона:</strong> <span id="phoneNumber">{{ Auth::user()->phone }}</span></p>


                                <p><strong>Электронная почта:</strong> <span style="text-transform: lowercase;">{{ Auth::user()->email }}</span></p>


                            </div>

                            </div>
                        </div>
                        <!-- Изменение аватара -->
                        <ul class="login__content login__menu d-flex jc-space-between">
                            <li>
                                <a href="/password">
                                    <img src="{{ asset('img/icon_footer/reset-password.png') }}" alt="Изменить пароль" width="32" height="32">
                                    Изменить пароль
                                </a>
                            </li>
                            <li>
                                <a href="/panel-users-editor">
                                    <img src="{{ asset('img/icon_footer/resume.png') }}" alt="Редактировать профиль" width="32" height="32">
                                    Редактировать профиль
                                </a>
                            </li>
                            <li>
                                <a href="/chat">
                                    <img src="{{ asset('img/icon_footer/message.png') }}" width="32" height="32">

                                    @if($unreadMessagesCount > 0)
                                        Сообщение: ({{ $unreadMessagesCount }})
                                    @else
                                        Нет новых сообщений
                                    @endif
                                </a>
                            </li>

                            <li>
                                <a href="/contact">
                                    <img src="{{ asset('img/icon_footer/contact.png') }}" width="32" height="32">

                                  Связаться с нами</a>
                            </li>
                            <li>
                                <a href="/about">
                                    <img src="{{ asset('img/icon_footer/list.png') }}" width="32" height="32">
                                    О нас</a>
                            </li>

                        </ul>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <script>
                        document.getElementById('avatarInput').addEventListener('change', function(e) {
                            var file = e.target.files[0];
                            var img = new Image();

                            img.onload = function() {
                                if (this.width >= 150 && this.width <= 1200 && this.height >= 150 && this.height <= 1460) {
                                    // Размер изображения соответствует требованиям
                                    // Здесь вы можете добавить логику для загрузки файла
                                    console.log('Размер изображения подходит.');
                                    uploadAvatar(); // Вызываем функцию загрузки аватара
                                } else {
                                    // Размер изображения не соответствует требованиям
                                    alert('Пожалуйста, загрузите изображение шириной от 150 до 1200 пикселей и высотой от 150 до 1460 пикселей.');
                                    // Очистка поля выбора файла
                                    document.getElementById('avatarInput').value = '';
                                }
                            };

                            if (file) {
                                img.src = URL.createObjectURL(file);
                            }
                        });

                        function uploadAvatar() {
                            var formData = new FormData($('#avatarForm')[0]);

                            $.ajax({
                                url: '/update-avatar', // Укажите URL вашего обработчика для обновления аватара
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    // Если обновление успешно выполнено, обновляем изображение аватара на странице
                                    $('#avatarImage').attr('src', URL.createObjectURL($('#avatarInput')[0].files[0]));
                                },
                                error: function(xhr, status, error) {
                                    // Обработка ошибок при обновлении аватара
                                    console.error(error);
                                }
                            });
                        }
                    </script>



                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            // Обработчик изменения файла
                            $('#avatarInput').on('change', function() {
                                var formData = new FormData($('#avatarForm')[0]);

                                $.ajax({
                                    url: '/update-avatar', // Укажите URL вашего обработчика для обновления аватара
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        // Если обновление успешно выполнено, обновляем изображение аватара на странице
                                        $('#avatarImage').attr('src', URL.createObjectURL($('#avatarInput')[0].files[0]));
                                    },
                                    error: function(xhr, status, error) {
                                        // Обработка ошибок при обновлении аватара
                                        console.error(error);
                                    }
                                });
                            });
                        });
                    </script>


                    @if (Auth::check())
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Выйти</button>
                        </form>
                    @endif
                </div>


                    @endif
                </div>



        </div>
    </div>










    <style>
        @media (max-width: 992px) {
            .header__btn-login {
                display: none; /* скрываем кнопку на разрешениях 992 и меньше */
            }
        }
    </style>



<style>










    /* Стили для номера телефона */
    p strong {
        font-weight: bold;
        color: #336699; /* Цвет текста */
    }

    /* Стили для электронной почты */
    .email {
        font-family: Arial, sans-serif; /* Выберите подходящий шрифт */
        font-size: 16px;
        color: #FFCC00; /* Цвет текста */
        text-transform: lowercase; /* Приведение текста к нижнему регистру */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Тень текста */
    }

    .avatar-container {
        text-align: center;
    }
    .user-name {
        font-family: Arial, sans-serif; /* Выберите подходящий шрифт */
        font-size: 18px;
        font-weight: bold;
        color: #336699; /* Цвет текста */
        text-transform: capitalize; /* Перевод первой буквы в верхний регистр */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Тень текста */
    }

    /* CSS для изображения профиля */
    .img-profile {
        display: block;
        width: 200px; /* Установите желаемую ширину */
        height: auto;
        border-radius: 50%; /* Делает изображение круглым */
        object-fit: cover; /* Обеспечивает масштабирование изображения */
        margin-bottom: 10px; /* Отступ снизу */
    }


    .custom-button {
        padding: 10px 20px; /* Размеры внутренних отступов */
        border: none;
        background-color: #3498db; /* Цвет фона кнопки */
        color: white; /* Цвет текста кнопки */
        border-radius: 5px; /* Скругление углов */
        font-size: 16px; /* Размер шрифта */
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Тень кнопки */
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; /* Анимация при наведении и нажатии */
    }
    .img-profile {
        border-radius: 50%;
        animation: colorCycle 5s infinite alternate;
        box-shadow: 0 0 30px rgba(255, 165, 0, 0.8), 0 0 40px rgba(255, 215, 0, 0.8); /* Изменяем параметры тени */
    }






    /* Эффект при наведении */
    .custom-button:hover {
        transform: translateY(-2px); /* Поднятие кнопки при наведении */
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15); /* Изменение тени кнопки */
    }

    /* Эффект при нажатии на кнопку */
    .custom-button:active {
        transform: translateY(1px); /* Нажатие кнопки */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Изменение тени кнопки */
    }



    .img-profile {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
        display: block;
        max-width: 100%; /* Устанавливаем максимальную ширину */
        margin-bottom: 10px; /* Отступ снизу */

    }

    .img-profile:hover {
        transform: scale(1.1);
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* Стили для изображения профиля */
    .img-profile {
        max-width: 100px; /* Максимальная ширина изображения */
        height: auto; /* Автоматическая высота */
        margin-bottom: 10px; /* Отступ снизу для разделения элементов */
        /* Дополнительные стили по желанию */
    }

    .custom-button {
        padding: 8px 16px; /* Регулирует размеры кнопки (вертикальный и горизонтальный отступы) */
        font-size: 10px; /* Размер шрифта */
        border-radius: 5px; /* Скругление углов */
        max-width: 170px;
        transition: background-color 0.3s ease, transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; /* Плавное изменение цвета фона при наведении и эффекты анимации */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Тень для кнопки */
    }

    .custom-button:hover {
        background-color: #2980b9; /* Изменение цвета фона при наведении курсора */
        transform: translateY(-1px); /* Небольшое поднятие кнопки при наведении */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15); /* Изменение тени при наведении */
    }

    .custom-button:active {
        transform: translateY(0); /* Возврат кнопки на исходное положение после нажатия */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Возврат тени на исходное значение после нажатия */
    }



    /* CSS код для ограничения размеров фото профиля */
    .img-profile {
        max-width: 100px; /* Максимальная ширина изображения */
        max-height: 100px; /* Максимальная высота изображения */
        /* Дополнительные стили по желанию */
    }


    /* Пример стилей для модального окна личного кабинета */
    .modal-content {
        border-radius: 10px; /* Округление углов */
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Тень */
    }
    /* Стили для экранов шириной менее 1200px */
    @media (max-width: 1199.98px) {
        .d-xl-inline-block {
            display: block !important; /* Изменяем display на block при узких экранах */
        }
    }

    .modal-header {
        background-color: #fd7e14; /* Цвет фона заголовка */
        border-bottom: none; /* Убрать нижнюю границу */
    }

    .modal-title {
        color: #333; /* Цвет заголовка */
    }

    .modal-body {
        padding: 20px; /* Отступы внутри модального окна */
    }

    .modal-footer {
        border-top: none; /* Убрать верхнюю границу футера */
    }

    .btn-secondary {
        background-color: #6c757d; /* Цвет кнопки "Закрыть" */
        border-color: #6c757d; /* Цвет границы кнопки "Закрыть" */
        color: #fff; /* Цвет текста кнопки "Закрыть" */
    }

    .btn-primary {
        background-color: #b9e80e; /* Цвет кнопки "Выйти" */
        border-color: #7bc50b; /* Цвет границы кнопки "Выйти" */
        color: #fff; /* Цвет текста кнопки "Выйти" */
    }

    /* Добавление анимации при наведении на кнопки */
    .btn-secondary:hover,
    .btn-primary:hover {
        transform: translateY(-2px); /* Смещение кнопки при наведении */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Тень при наведении */
        transition: all 0.3s ease; /* Плавное изменение свойств */
    }
    #header-sticky {
        text-align: center;
    }


    .modal-dialog {
        margin-top: 120px; /* Добавляем отступ сверху в 20 пикселей */
    }
    @media (min-width: 769px) {
        .main-menu .header_btn {
            display: none;
        }
    }
    @media (min-width: 769px) {
        .main-menu .header-btn {
            display: none;
        }
    }


</style>




<style>

    /* LOGIN
    ----------------------------------------------- */
    .login {position: fixed; z-index: 999; left: 50%; top: 50%; transform: translate(-50%,-50%); overflow: hidden;
        background-color: #336699; border-radius: 4px; width: 400px;
        box-shadow: 0 0 0 10px rgba(255,255,255,0.2), 0 15px 45px rgba(0,0,0,1);}
    .login__header {padding: 20px 40px; background-color: #ffffff;}
    .login__title {font-size: 18px; font-weight: 600; padding: 1px 0; text-transform: capitalize;}
    .login__close {cursor: pointer; font-size: 24px; opacity: 0.6; margin-left: 20px;}
    .login__title a {border-bottom: 1px dotted var(--tt-lighter); margin-left: 10px; font-weight: 400; color: var(--tt-lightest);}
    .login__content {padding: 20px 40px;}
    .login__row {margin-bottom: 20px; position: relative; display: block; font-size: 14px; color: var(--tt-lightest);}
    .login__caption {font-size: 14px; color: var(--tt); margin-bottom: 10px;}
    .login__caption a {text-decoration: underline; margin-left: 6px; color: var(--accent);}
    .login__input input {padding-left: 40px;}
    .login__row .fal {opacity: 0.5; position: absolute; left: 0; bottom: 0; line-height: 40px; width: 40px; text-align: center;}
    .login__row button {width: 100%;}
    .login__social {background-color: #FFCC00; padding: 20px 40px; text-align: center;}
    .login__social-caption {font-size: 11px; text-transform: uppercase; margin-bottom: 10px;}
    .login__social-btns a {display:inline-block; margin: 0 3px; vertical-align:top;}
    .login__social-btns img {display:block; width:34px; height: 34px;}
    .login__avatar {width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;}
    .login__menu {padding-left: 35px; padding-right: 35px; margin-bottom: -10px;}
    .login__menu li {flex: 1 1 0; min-width: auto; max-width: 100%; margin: 0 5px 10px 5px;}
    .login__menu a {display: block; border-radius: 6px; padding: 10px; text-align: center; white-space: nowrap;
        background-color: #dfa53b; box-shadow: inset 0 0 10px rgba(0,0,0,0.1); font-size: 13px;}
    .login__menu a:hover {
        transform: scale(1.05); /* Увеличение размера при наведении */
        transition: transform 0.3s ease; /* Плавное изменение размера */
        /* Другие стили при наведении, если необходимо */
    }.login__row button:active {
         transform: translateY(2px); /* Смещение кнопки вниз при нажатии */
         box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3); /* Изменение тени кнопки */
         /* Другие стили при нажатии, если необходимо */
     }
    .login__menu .fal {display: block; height: 30px; font-size: 24px; opacity: 0.3;}

    .login__menu a {
        display: block;
        border-radius: 6px;
        padding: 10px;
        text-align: center;
        white-space: nowrap;
        background-color: #dfa53b;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 13px;
        color: #ffffff; /* Цвет текста на белый */
        transition: background-color 0.3s, transform 0.3s;
    }

    .login__menu a:hover {
        background-color: #130570; /* Цвет при наведении */
    }

    .login__menu a:active {
        transform: scale(0.95); /* Эффект при нажатии */
    }



    {box-shadow: inset 0 0 0 1px var(--accent), inset 1px 2px 5px rgba(0,0,0,0.1);}



    /* SNIPPETS
    ----------------------------------------------- */
    .img-wide, .img-responsive, .img-fit-cover {position: relative; overflow: hidden;}
    .img-responsive {padding-top: 60%;}
    .img-responsive > img, .img-fit-cover img {width: 100%; height: 100%; object-fit: cover;}
    .img-responsive > img {position: absolute; left: 0; top: 0;}
    .img-wide img, .img-wide > a, .expand-link {width: 100%; display: block;}
    .clr {clear: both;}
    .clearfix::after {content: ""; display: table; clear: both;}
    .ws-nowrap {white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
    .line-clamp {display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;}
    .vw100 {margin:0 calc((100% - 100vw)/2); padding:0 calc((100vw - 100%)/2);}
    .img-mask::before {content: ''; position: absolute; z-index: 1; left: 0; right: 0; bottom: 0; height: 60%;
        background: linear-gradient(to top, #000 0%, transparent 100%); opacity: 0.8;}
    .expand-link::before {content: ''; position: absolute; left: 0; top: 0; right: 0; bottom: 0;}

    .d-flex, .fx-row {display: flex; flex-wrap: wrap; flex-direction: row;}
    .fd-column, .fx-col {flex-direction: column; flex-wrap: nowrap;}
    .jc-space-between, .fx-row {justify-content: space-between;}
    .jc-flex-start, .fx-start {justify-content: flex-start;}
    .jc-center, .fx-center {justify-content: center;}
    .jc-flex-end {justify-content: flex-end;}
    .ai-flex-start {align-items: flex-start;}
    .ai-center, .fx-middle {align-items: center;}
    .ai-flex-end {align-items: flex-end;}
    .order-first {order: -1;}
    .order-last {order: 10;}
    .flex-grow-1, .fx-1, .stretch-free-width {flex: 1 1 0; max-width: 100%; min-width: 50px;}
    .pi-center {display: inline-grid; place-items: center;}
    .icon-at-left [class*="fa-"] {margin-right: 0.8em;}
    .icon-at-right [class*="fa-"] {margin-left: 0.8em;}
    .hidden, #dofullsearch, .comment-item__main .quote + br, .d-none,
    #category option:empty, .ui-helper-hidden-accessible:empty, #related_news:empty,
    #result-registration:empty {display: none;}
    .anim, button, .btn, a, .popular img, .attent img, .top-item img, .nav__list-hidden
    {transition: color 0.3s, background-color 0.3s, opacity 0.3s, box-shadow 0.3s, transform 0.3s;}

    .d-grid, #dle-content {display: grid; grid-gap: 20px 20px; grid-auto-flow: row dense;
        grid-template-columns: repeat(auto-fill,minmax(187px,1fr));}
    .d-grid > *:not(.grid-item), #dle-content > *:not(.grid-item), #dle-content {grid-column: 1 / -1;}


    @media screen and (min-width: 1220px) {
        .popular:hover img, .attent:hover img, .top-item:hover img {transform: scale(1.1,1.1);}
        .popular:hover .popular__title, .int:hover .int__title, .attent:hover .attent__title, .short__title a:hover,
        .footer__text a:hover, .sect__sort a:hover, .speedbar a:hover {text-decoration: underline;}
        .pagination__pages a:hover, .pagination__btn-loader a:hover, .page__tags a:hover
        {background: var(--accent); color: #4444; border-color: var(--accent);}
        .nav__list > li:hover > a, .nav__list-hidden a:hover, .side-nav > li:hover > a {color: var(--accent);}
        .nav__list li:hover .nav__list-hidden, .side-nav li:hover .nav__list-hidden {visibility: visible; opacity: 1; transform: translateY(0);}
    }



</style>

