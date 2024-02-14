<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SubscribeMail extends Model
{
    protected $fillable = [
        'id',
        'email_subscribe',
        'created_at',
        'updated_at',
    ];
}


