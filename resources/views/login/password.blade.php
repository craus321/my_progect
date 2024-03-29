@extends('layout')

@section('content')
    <div class="password-reset-form">
        <h2>Сброс пароля</h2>
        <form method="POST" action="{{ route('password.form') }}">
            @csrf
            <p>При восстановлении пароля будет отправлено сообщение на указанный вами адрес электронной почты. В этом сообщении будет содержаться временный код доступа, который позволит сбросить пароль. После получения кода следуйте инструкциям, указанным в письме, чтобы успешно завершить процесс восстановления пароля и получить доступ к вашей учетной записи.</p>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="submit" value="Отправить письмо">

        </form>
    </div>
@endsection
