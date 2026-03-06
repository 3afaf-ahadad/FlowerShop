<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nom', 'slug', 'description', 'prix', 'stock', 'image', 'categorie_id'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
