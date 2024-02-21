<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['price_tot', 'customer_name', 'customer_address', 'customer_phone', 'status'];

    public function meals() {
        return $this->belongsToMany(Meal::class)->withPivot('quantity');
    }
}
