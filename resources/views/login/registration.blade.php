@extends('layout')

@section('content')

    <div class="registration-form">
        <h2>Регистрация</h2>
        <form method="POST" action="{{ route('registration.register') }}">
            @csrf
            <input type="text" name="name" placeholder="Имя" required>
            <input type="text" name="patronymic" placeholder="Отчество">
            <input type="text" name="surname" placeholder="Фамилия" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" id="phone" placeholder="Номер телефона" maxlength="11" minlength="10" pattern="[0-9]+" required>


            <div class="password-field">
                <input type="password" name="password" id="password" placeholder="Пароль" required>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Повторите пароль" required>
                <button type="button" onclick="toggleRegistrationPasswordVisibility()">Показать пароль</button>
            </div>
            <div class="captcha">
                <img src="captcha-image.jpg" alt="Капча">
                <input type="text" placeholder="Введите капчу">
            </div>
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>

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

@endsection
