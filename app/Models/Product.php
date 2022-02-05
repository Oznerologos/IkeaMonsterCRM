<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'price',
        'promotion',
        'category',
        'color'
    ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

}
