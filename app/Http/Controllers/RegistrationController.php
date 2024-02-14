<?php

namespace App\Http\Controllers;
use Anhskohbo\NoCaptcha\Rules\CaptchaRule;
use App\Mail\VerificationPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Mail\VerificationEmail;
use Illuminate\Validation\Rule;




class RegistrationController extends Controller
{

    // Метод для отображения формы входа
    public function showLoginForm()
    {
        return view('login.login'); // Замените 'auth.login' на имя вашего представления для формы входа
    }

    // Метод для аутентификации пользователя
    public function login(Request $request)
    {
        // Валидация данных
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Авторизация успешна
            return redirect()->intended('/'); // Перенаправление на нужную страницу
        }

        // Авторизация не удалась
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Неверный логин или пароль',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Выход пользователя из системы

        $request->session()->invalidate(); // Инвалидация сессии
        $request->session()->regenerateToken(); // Регенерация токена CSRF

        return redirect('/login'); // Перенаправление на страницу входа
    }
    public function showRegistrationForm()
    {
        return view('login.registration');
    }




    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|regex:/^[А-Яа-яЁё]+$/u|max:255',
            'patronymic' => 'nullable|regex:/^[А-Яа-яЁё]+$/u|max:255',
            'surname' => 'required|regex:/^[А-Яа-яЁё]+$/u|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required'



        ], [
            'g-recaptcha-response.required' => 'Подтвердите, что вы не робот.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'surname.unique' => 'Пользователь с такой фамилией уже существует.',
            'phone.unique' => 'Пользователь с таким номером телефона уже существует.',
            'name.required' => 'Поле "Имя" является обязательным.',
            'patronymic.regex' => 'Поле "Отчество" должно содержать только русские буквы.',
            'patronymic.max' => 'Поле "Отчество" должно быть не длиннее 255 символов.',
            'surname.required' => 'Поле "Фамилия" является обязательным.',
            'surname.regex' => 'Поле "Фамилия" должно содержать только русские буквы.',
            'surname.max' => 'Поле "Фамилия" должно быть не длиннее 255 символов.',
            'name.regex' => 'Поле "Имя" должно содержать только русские буквы.',
            'name.max' => 'Поле "Имя" должно быть не длиннее 255 символов.',
            'email.required' => 'Поле "Email" является обязательным.',
            'email.email' => 'Пожалуйста, введите корректный адрес электронной почты.',
            'phone.required' => 'Поле "Номер телефона" является обязательным.',
            'phone.max' => 'Поле "Номер телефона" слишком длинное.',
            'password.required' => 'Поле "Пароль" является обязательным.',
            'password.string' => 'Поле "Пароль" должно быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
        ]);



        $user = User::create([
            'name' => $request['name'],
            'patronymic' => $request['patronymic'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request->password),
        ]);

        // Генерируйте и устанавливайте токен для подтверждения почты
        $user->email_verification_token = md5(Str::random(40));
        $user->save();

        // Отправьте письмо с токеном
        Mail::to($user->email)->send(new VerificationEmail($user));

        return redirect('/verify-email');
    }






    public function verifyEmail($token): \Illuminate\Http\RedirectResponse
    {
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return Redirect::to('/verify-email-error')->with('error', 'Недействительный токен для подтверждения почты.');
        }

        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        Auth::login($user);

        return Redirect::to('/')->with('success', 'Ваш адрес электронной почты успешно подтвержден.');
    }




    public function showPasswordForm()
    {
        return view('login.password');
    }

    public function password(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Str::random(40);
            $user->email_verification_token = $token;
            $user->save();

            Mail::to($user->email)->send(new VerificationPassword($user));

            return redirect('/verify-email-password')->with('success', 'Ссылка для сброса пароля отправлена на ваш адрес электронной почты.');
        }

        return redirect('/user-email-error')->with('error', 'Пользователь с таким адресом электронной почты не найден.');
    }

    public function resetPasswordForm($token)
    {
        return view('login.password-reset', ['email_verification_token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ], [
            'password.required' => 'Поле "Пароль" является обязательным.',
            'password.string' => 'Поле "Пароль" должно быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
        ]);



        $token = $request->input('token');
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return view('login.verify-email-error');
        }

        // Сброс пароля и инвалидация токена
        $user->password = Hash::make($request->input('password'));
        $user->email_verification_token = null;
        $user->save();

        Auth::login($user);

        return redirect('/')->with('success', 'Ваш пароль успешно сброшен.');
    }

    public function updateAvatar(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            // Проверка размеров изображения
            $img = \Image::make($avatar);
            $width = $img->width();
            $height = $img->height();

            if ($width >= 150 && $width <= 1200 && $height >= 150 && $height <= 1460) {
                $avatarPath = $avatar->store('avatars', 'public'); // Папка avatars в папке storage

                // Обновление пути к изображению в базе данных
                $user->avatar = $avatarPath;
                $user->save();
            } else {
                // Если размеры не соответствуют требованиям, возвращаем обратно с ошибкой
                return redirect()->back()->withErrors(['avatar' => 'Пожалуйста, загрузите изображение шириной от 150 до 1200 пикселей и высотой от 150 до 1460 пикселей.']);
            }
        }

        return redirect()->back(); // Редирект обратно после обновления
    }



}
