<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['price_tot', 'customer_name', 'customer_address', 'customer_phone', 'status'];

    public function meals() {
        return $this->belongsToMany(Meal::class)->withPivot('quantity');
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y H:i');
    }
}
