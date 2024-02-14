<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{


    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        $currentUserId = auth()->user()->id;

        // Отображаем только сообщения, где текущий пользователь - отправитель или получатель
        $messages = Message::where('sender_id', $currentUserId)
            ->orWhere('receiver_id', $currentUserId)
            ->get();

        return view('panel_users.panel_users_messenger', [
            'users' => $users,
            'messages' => $messages,
            'currentUserId' => $currentUserId,
        ]);
    }



    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->sender_id = auth()->user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->message_text = $request->message_text;
        $message->save();

        // Генерируем событие о новом сообщении для других пользователей
        broadcast(new NewMessage($message))->toOthers();

        return response()->json([
            'message_text' => $message->message_text,
            // Другие необходимые поля сообщения, которые вы хотите вернуть на фронтэнд
        ]);
    }



}
