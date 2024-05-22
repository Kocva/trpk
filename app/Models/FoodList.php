<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodList extends Model
{
    protected $table = 'food_list';
    protected $fillable = ['foodName', 'calories', 'protein', 'fat', 'hydrate'];
    use HasFactory;
}
