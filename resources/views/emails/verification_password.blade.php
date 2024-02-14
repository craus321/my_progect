<!DOCTYPE html>
<html>
<head>
    <title>Восстановление пароля</title>
</head>
<body>
<h1>Сброс пароля</h1>

<p>Здравствуйте, {{ $user->name }}!</p>

<p>Пожалуйста, нажмите на кнопку ниже, чтобы подтвердить ваш сброс пароля</p>

<a href="{{ route('password.email', ['token' => $user->email_verification_token]) }}">Подтвердить сброс пароля</a>

<p>Спасибо,</p>
<p>Ваше приложение</p>
</body>
</html>
