
@extends('layout')

@section('content')


    <div class="login-form">
        <h2>Вход</h2>
        <form>
            <input type="email" placeholder="Email" required><br>
            <input type="password" placeholder="Пароль" id="password" required><br>
            <span class="show-password"><input type="checkbox" onclick="togglePasswordVisibility()"> Показать пароль</span><br>
            <input type="submit" value="Войти">
        </form>
        <div class="links">
            <a href="/registration">Регистрация</a> |
            <a href="/password" class="forgot-password">Забыли пароль?</a>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }




    </script>




@endsection
