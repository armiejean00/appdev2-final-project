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


      public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function claimedItems()
    {
        return $this->hasMany(ClaimedItem::class, 'item_id');
    }
}
