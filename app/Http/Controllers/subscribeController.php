<?php

namespace App\Http\Controllers;

use App\Models\SubscribeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class subscribeController extends Controller
{
    public function showForm()
    {
        return view('footer');
    }

    public function subscribeAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribe_mails,email_subscribe',
        ]);

        $emailKey = 'subscribe_' . $request->input('email');
        $ipKey = 'subscribe_' . $request->ip();

        // Проверка, был ли отправлен email или запрос от данного IP в течение последнего часа
        if (Cache::has($emailKey) || Cache::has($ipKey)) {
            return redirect()->back()->with('error', 'Вы уже подписаны');
        }

        Cache::add($emailKey, true, 10); // Хранить информацию о подписке по email в течение часа (60 минут)
        Cache::add($ipKey, true, 10); // Хранить информацию о запросе от IP в течение часа (60 минут)

        SubscribeMail::create([
            'email_subscribe' => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'Вы успешно подписались!');
    }
}
