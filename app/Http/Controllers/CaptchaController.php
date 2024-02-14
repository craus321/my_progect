<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class CaptchaController extends Controller
{
    public function handleForm(Request $request)
    {
        // Проверка капчи
        $captchaToken = $request->input('g-recaptcha-response');
        $captchaSecret = config('services.recaptcha.secret'); // Получите ваш секретный ключ из конфигурации

        $response = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => $captchaSecret,
            'response' => $captchaToken,
        ]);

        $captchaData = $response->json();

        if (!$captchaData['success']) {
            // Капча не прошла проверку
            return back()->withErrors(['g-recaptcha-response' => 'Капча не пройдена.']);
        }

        // Ваша логика обработки формы

        return redirect()->route('success')->with('message', 'Форма успешно отправлена!');
    }
}
