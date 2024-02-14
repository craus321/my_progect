@extends('layout')

@section('content')
    <div class="password-reset-form">
        <form method="POST" action="{{ route('respassword-email', ['token' => $email_verification_token]) }}">
            @csrf
            <h2>Сброс пароля</h2>

            <div>
                <label for="password">Новый пароль:</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">Повторите пароль:</label><br>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="checkbox" id="show_password" onclick="togglePasswordVisibility()">
            <label for="show_password">Показать пароль</label><br><br>

            <button type="submit">Обновить пароль</button>
        </form>


    </div>




    <script>
        function togglePasswordVisibility() {
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
