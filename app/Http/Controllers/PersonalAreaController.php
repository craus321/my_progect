<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Validation\ValidationException;

class PersonalAreaController extends Controller
{
    public function handle(Request $request, Closure $next)
    {
        // Проверка, авторизован ли пользователь
        if (!auth()->check()) {
            return redirect('/login'); // Перенаправление на страницу входа, если пользователь не авторизован
        }

        return $next($request);
    }

    /**
     * @throws ValidationException
     */
    public function updateUserData(Request $request)
    {
        // Валидация данных
        $this->validate($request, [
            'surname' => 'required|regex:/^[а-яА-Я]+$/u|unique:users,surname,' . auth()->id(),
            'name' => 'required|regex:/^[а-яА-Я]+$/u',
            'patronymic' => 'nullable|regex:/^[а-яА-Я]+$/u',
            'phone' => 'nullable|unique:users,phone,' . auth()->id(),
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'g-recaptcha-response' => 'required'
        ], [
            'g-recaptcha-response.required' => 'Подтвердите, что вы не робот.',
            'required' => 'Поле :attribute обязательно для заполнения.',
            'unique' => 'Данные уже существует.',
            'regex' => 'Некорректно внесены данные.',
            'email' => 'Некорректный формат электронной почты.',
            // Другие сообщения об ошибках
        ]);


        // Обновление данных пользователя
        Auth::user()->update([
            'surname' => $request->input('surname'),
            'name' => $request->input('name'),
            'patronymic' => $request->input('patronymic'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);

        // Возвращение ответа или редиректа
        return back()->with('success', strtolower('Данные успешно обновлены'));
    }







}
