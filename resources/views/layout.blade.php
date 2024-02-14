<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    {!! SEO::generate(true) !!}
    <meta http-equiv="x-ua-compatible" content="ie=edge">


            <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href=" {{ Voyager::image(setting('site.logo')) }}">

    <!-- Place favicon.ico in the root directory -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-animation.css')}}">
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>

<body>
<div id="preloader">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
        </div>
    </div>
</div>
@include('heder.nav')
<div class="content">
    @yield('content')
</div>

{{-- Если переменная $includeFooter не установлена или установлена в true, включаем футер --}}
@if (!isset($includeFooter) || $includeFooter)
    <footer>
        @include('footer')
    </footer>
@endif

</body>

    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/element-in-view.js') }}"></script>
    <script src="{{ asset('js/paroller.js') }}"></script>
    <script src="{{ asset('js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

<style>
    .header_btn {
        margin-left: 25px; /* Отступ слева */
    }

    /* Дополнительные стили для других элементов, если необходимо */

    .header__btn-login, .js-show-login {
        box-shadow: 0 0 0 1px #3d3c3c, 2px 2px 16px #fd7e14;

    }

    .anim, button, .btn, a, .popular img, .attent img, .top-item img, .nav__list-hidden {
        transition: color 0.3s, background-color 0.3s, opacity 0.3s, box-shadow 0.3s, transform 0.3s;
    }

    button, .btn, input[type="button"], input[type="reset"], input[type="submit"], .form__btn, .qq-upload-button, .pm__links a, .usp__btn a {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        padding: 0 20px;
        height: 40px;
        white-space: nowrap;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        background-color: #DFA53B;
        color: #fff;
        border-radius: 20px;
        box-shadow: none;
    }

    button, select, textarea, input[type="text"], input[type="password"], input[type="button"], input[type="submit"] {
        appearance: none;
        -webkit-appearance: none;
        font-size: 16px;
        font-family: inherit;
    }

    * {
        margin: 0;
        padding: 0;
        outline: none;
        border: 0;
        box-sizing: border-box;
    }

    body {
        font: 15px / 1.4 'Manrope', sans-serif;
        font-weight: 400;
        letter-spacing: 0.02em;
        color: var(--tt);

        width: 100%;
        overflow-x: hidden;
    }

    @media screen and (max-width: 1220px) {
        :root {
            --indent-negative: -20px;
            --indent: 20px;
        }
    }

    :root {
        --bg: #efefef;
        --bg-lighter: #161719;
        --bg-darker: #242424;
        --tt: #CCC;
        --tt-lighter: #CCC;
        --tt-lightest: #999;
        --bdc: #f2f2f2;
        --bdc-darker: #e3e3e3;
        --bsh: 0 5px 10px #00000015;
        --bsh-2: 0 10px 20px #00000005;
        --gradient: linear-gradient(320deg,#972518 0,#3286aa 100%);
        --accent: #02aef7;
        --accent-darker: #02aef7;
        --ui-bg: #1d1c1c;
        --ui-bg-darker: #2f2f2f;
        --ui-bg-darkest: #f0f0f0;
        --ui-bg-accent: #0968a0;
        --ui-tt-on-accent: #fff;
        --ui-bdc: #e6e6e6;
        --indent-negative: -80px;
        --indent: 80px;
        --max-width: 1366px;
    }

    ::selection {
        background: #DEA63F;
        color: #fff;
    }
    .modal-backdrop.show {
    display: none; /* Прячем фон модального окна, предотвращая его отображение */
    /* Другие свойства, которые могут влиять на видимость или стиль, также можно переопределить здесь */
}

</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const surnameInput = document.getElementById('surname');
        const nameInput = document.getElementById('name');
        const patronymicInput = document.getElementById('patronymic');

        const cyrillicPattern = /[а-яА-ЯёЁ]+/;

        function validateInput(input) {
            const value = input.value.trim();
            if (!cyrillicPattern.test(value)) {
                input.setCustomValidity('Используйте только кириллические символы.');
            } else {
                input.setCustomValidity('');
            }
        }

        surnameInput.addEventListener('input', function () {
            validateInput(this);
        });

        nameInput.addEventListener('input', function () {
            validateInput(this);
        });

        patronymicInput.addEventListener('input', function () {
            validateInput(this);
        });
    });
</script>

</html>
