<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nom', 'prenom', 'adresse', 'telephone'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
