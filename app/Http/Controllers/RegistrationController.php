<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('login.registration');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'patronymic' => 'nullable|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            // Добавьте валидацию для капчи, если используется
        ], [
            'email.unique' => 'Пользователь с таким email уже существует.',
            'surname.unique' => 'Пользователь с такой фамилией уже существует.',
            'phone.unique' => 'Пользователь с таким номером телефона уже существует.',
            // Другие пользовательские сообщения об ошибках
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'patronymic' => $validatedData['patronymic'],
            'surname' => $validatedData['surname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Другие необходимые действия, например, авторизация пользователя и редирект
        // Например:
        // auth()->login($user);
        // return redirect('/dashboard');
    }

}
