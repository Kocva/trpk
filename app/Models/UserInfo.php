<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_infos'; // Название вашей таблицы в базе данных
    
    protected $fillable = ['weight', 'height', 'gender', 'age', 'activity']; // Поля, которые можно заполнять
    use HasFactory;
}
    