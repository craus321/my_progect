<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContactForm extends Model
{
    protected $fillable = [
        'id',
        'full_name',
        'email',
        'phone',
        'website',
        'message',
        'created_at',
        'updated_at',
    ];



}



