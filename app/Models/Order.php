<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // permission Laravel 
    // enregistrer l info dans la base de données
    protected $fillable = ['full_name', 'address', 'city', 'phone', 'total_amount'];
}