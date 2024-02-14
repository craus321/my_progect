@extends('layout')

@section('content')

    <div class="registration-form">
        <h2>Регистрация</h2>
        <form method="POST" action="{{ route('registration.register') }}">
            @csrf
            <input type="text" name="name" placeholder="Имя" required value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="text" name="patronymic" placeholder="Отчество" value="{{ old('patronymic') }}">
            @error('patronymic')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="text" name="surname" placeholder="Фамилия" required value="{{ old('surname') }}">
            @error('surname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror



            <input type="email" name="email" placeholder="Email" required>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="tel" name="phone" id="phone" placeholder="Номер телефона" maxlength="11" minlength="10" pattern="[0-9]+" required oninput="filterNonNumeric(this)">
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="password-field">
                <input type="password" name="password" id="password" placeholder="Пароль" required>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Повторите пароль" required>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="button" onclick="toggleRegistrationPasswordVisibility()">Показать пароль</button>
            </div>

            <div class="g-recaptcha" data-sitekey="6LdYNTgpAAAAAIxbRp2ld8PS5EG1BazsQDsch2QO" data-callback="onCaptchaSuccess"></div>
            @error('g-recaptcha-response')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>



    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function onCaptchaSuccess(response) {
            document.getElementById("g-recaptcha-response").value = response;
        }
    </script>


    <script>
        function filterNonNumeric(input) {
            // Удаляем все символы, кроме цифр
            input.value = input.value.replace(/\D/g, '');
        }
    </script>



    <script>
        function toggleRegistrationPasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var confirmPasswordInput = document.getElementById("password_confirmation");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                confirmPasswordInput.type = "text";
            } else {
                passwordInput.type = "password";
                confirmPasswordInput.type = "password";
            }
        }



    </script>
    <script>
        // Функция для обработки ввода номера телефона
        function formatPhoneNumber() {
            var phoneNumberInput = document.getElementById("phone");
            var enteredNumber = phoneNumberInput.value;

            // Если введенная строка пустая, просто выходим из функции
            if (!enteredNumber) return;

            // Проверяем, начинается ли номер телефона с "+7"
            if (!enteredNumber.startsWith("7")) {
                // Если нет, добавляем "+7" в начало введенного номера
                phoneNumberInput.value = "7" + enteredNumber;
            }
        }

        // Функция для обработки удаления "+7" при редактировании номера телефона
        function handlePhoneDeletion(event) {
            var phoneNumberInput = document.getElementById("phone");
            var enteredNumber = phoneNumberInput.value;

            // Проверяем, был ли удален символ "+7" из начала номера
            if (enteredNumber.startsWith("7") && event.inputType === "deleteContentBackward" && enteredNumber.length === 3) {
                // Если да, удаляем "+7" из поля ввода
                phoneNumberInput.value = enteredNumber.substring(2);
            }
        }

        // Слушатель события изменения в поле ввода номера телефона
        document.getElementById("phone").addEventListener("input", formatPhoneNumber);

        // Слушатель события удаления символов в поле ввода номера телефона
        document.getElementById("phone").addEventListener("input", handlePhoneDeletion);
    </script>

@endsection
