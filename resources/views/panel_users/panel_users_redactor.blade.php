@extends('layout')

@section('content')


    <div class="login__title stretch-free-width ws-nowrap" style="margin: 225px auto 0;">
        <h2>Данные профиля</h2>

        <form action="{{ route('updateUserData') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label for="surname">Фамилия</label>
                <input type="text" id="surname" name="surname" value="{{ old('surname', Auth::user()->surname) }}" placeholder="Фамилия" class="@error('surname') error @enderror">
                @error('surname')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="Имя" class="@error('name') error @enderror">
                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="patronymic">Отчество</label>
                <input type="text" id="patronymic" name="patronymic" value="{{ old('patronymic', Auth::user()->patronymic) }}" placeholder="Отчество" class="@error('patronymic') error @enderror">
                @error('patronymic')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>



            <div class="input-group">
                <label for="phone">Номер телефона</label>
                <input type="text" id="phone" name="phone" maxlength="12" minlength="12" pattern="\+?[0-9]+" required value="{{ Auth::user()->phone }}" placeholder="Номер телефона" oninput="addPlusSevenPrefix(this)" onblur="forcePlusSevenPrefix(this)">
                <div id="phoneError" class="error-message">
                    @if ($errors->has('phone'))
                        {{ $errors->first('phone') }}
                    @endif
                </div>
            </div>

            <div class="input-group">
                <label for="email">Электронная почта</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Электронная почта" required oninput="validateEmail(this)">
                <div id="emailError" class="error-message">
                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                </div>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                <script>
                    function onCaptchaSuccess(response) {
                        document.getElementById("g-recaptcha-response").value = response;
                    }
                </script>
            </div>


        @if(session('success'))
                <div id="successMessage" style="margin-top: 10px; color: green;">
                    {{ session('success') }}
                </div>
            @endif

            <button >Сохранить</button>
            <div class="g-recaptcha" data-sitekey="6LdYNTgpAAAAAIxbRp2ld8PS5EG1BazsQDsch2QO" data-callback="onCaptchaSuccess"></div>
            @error('g-recaptcha-response')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror



        </form>
    </div>

    <script>
        function validateEmail(input) {
            var email = input.value.trim();
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailRegex.test(email)) {
                displayError(input, 'Введите корректный адрес электронной почты.');
            } else {
                clearError(input);
            }
        }

        function displayError(input, message) {
            var errorDiv = document.getElementById(input.id + 'Error');
            errorDiv.innerHTML = message;
        }

        function clearError(input) {
            var errorDiv = document.getElementById(input.id + 'Error');
            errorDiv.innerHTML = '';
        }
    </script>



    <script>
        function addPlusSevenPrefix(input) {
            // Удаляем все символы, кроме цифр
            var phoneNumber = input.value.replace(/\D/g, '');

            // Добавляем префикс +7, если его нет и номер не начинается с +7
            if (phoneNumber.charAt(0) !== '+' && !phoneNumber.startsWith('7')) {
                phoneNumber = '+7' + phoneNumber;
            }

            // Ограничиваем длину номера
            if (phoneNumber.length > 11) {
                phoneNumber = phoneNumber.slice(0, 11);
            }

            // Обновляем значение в поле ввода
            input.value = phoneNumber;
        }
    </script>


    <style>
        .error-message {
            text-transform: none;
            color: red;
            margin-top: 5px;
            font-size: 14px;
        }

        /* Другие стили */

        .input-group.error input[type="text"],
        .input-group.error input[type="email"] {
            border-color: red;
        }

        /* Другие стили */




        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Пример медиа-запроса для адаптации заголовка на мобильных устройствах */
        @media screen and (max-width: 768px) {
            h2 {
                font-size: 20px;
                margin-bottom: 15px;
            }
        }
    /* Базовые стили для формы */
    .input-group label {
        display: block;
        margin-bottom: 5px;
    }
    .input-group input[type="text"],
    .input-group input[type="email"] {
        width: calc(100% - 20px); /* Учитывается отступ ширины метки */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .login__title {
        max-width: 400px; /* Ширина формы */

        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }
    .login__title button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    /* Стили для полей ввода */
    .login__title input[type="text"],
    .login__title input[type="email"] {
        width: 100%;
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    /* Стили для кнопки "Сохранить" */
    .login__title button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #ec7a09;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Анимация при наведении на форму */
    .login__title:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    /* Анимация при наведении на поля ввода */
    .login__title input[type="text"]:hover,
    .login__title input[type="email"]:hover {
        border-color: #d0c115;
    }

    /* Анимация при нажатии на кнопку "Сохранить" */
    .login__title button[type="submit"]:hover {
        background-color: rgba(24, 102, 190, 0.96);
    }

    .login__title button[type="submit"]:active {
        background-color: #33831f; /* Зеленый цвет при нажатии */
    }

</style>



@endsection
