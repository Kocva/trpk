<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weightstat extends Model
{
    protected $table = 'weightstat'; // Название вашей таблицы в базе данных
    
    protected $fillable = ['userID', 'weight']; // Поля, которые можно заполнять
    use HasFactory;
}
