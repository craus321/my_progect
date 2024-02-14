<!DOCTYPE html>
<html>
<head>
    <title>Подтверждение регистрации</title>
</head>
<body>
<h1>Подтверждение регистрации</h1>

<p>Здравствуйте, {{ $user->name }}!</p>

<p>Пожалуйста, нажмите на кнопку ниже, чтобы подтвердить вашу регистрацию.</p>

<a href="{{ route('verify.email', ['token' => $user->email_verification_token]) }}">Подтвердить регистрацию</a>

<p>Спасибо,</p>
<p>Ваше приложение</p>
</body>
</html>
