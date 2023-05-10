<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model
{
    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'ordered_pizzas', 'order_id', 'pizza_id')->withPivot('quantity');
    }
}
