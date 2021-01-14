<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'products'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
