<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function pizzas()
    {
        return $this->belongsToMany(Pizzas::class, 'ordered_pizzas', 'order_id', 'pizza_id')->withPivot('quantity');
    }
}
