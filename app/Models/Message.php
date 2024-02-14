<?php
namespace App\Models;

// Message.php
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id', 'receiver_id', 'message_text',
    ];

    // Здесь можно определить отношения с пользователями, если это необходимо
}










