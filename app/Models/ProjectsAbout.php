<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsAbout extends Model
{
    use HasFactory;
    protected $table = 'projects_about'; // укажите правильное имя вашей таблицы

    protected $fillable = [
        'image_path',
        // другие поля проекта, если они у вас есть
    ];

}
