@extends('layout')

@section('content')
    <div class="login-form">
        <h2>Вход</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Пароль" id="password" required><br>
            <span class="show-password"><input type="checkbox" onclick="togglePasswordVisibility()"> Показать пароль</span><br>
            <input type="submit" value="Войти">
        </form>
        <div class="links">
            <a href="/registration">Регистрация</a>|
            <a href="/password" class="forgot-password">Забыли пароль?</a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
