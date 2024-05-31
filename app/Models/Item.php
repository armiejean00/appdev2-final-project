<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
       protected $fillable = [
     
        'image',
         'name',
        'description',
        'category_id',
         'location_id',
        'datefound',
        // 'status',
        'users_id'
    ];
}
