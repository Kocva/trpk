<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eated extends Model
{

    protected $table = 'eated';
    protected $fillable = ['userID', 'foodName', 'calories', 'protein', 'fat', 'hydrate'];
    use HasFactory;
}
