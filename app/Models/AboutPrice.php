<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPrice extends Model
{
    use HasFactory;

    protected $table = 'about_price';

    protected $fillable = [
        'title',
        'description',
        'description_1',
        'description_2',
        'description_3',
        'description_4',
        'price',
        'status',
    ];
}
