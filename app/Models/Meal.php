<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Meal extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'is_active',
        'description',
        'restaurant_id',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

     /* public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $restaurant = Restaurant::where('user_id',Auth::user()->id)->orWhere('user_id', $this->attributes['restaurant_id'])->first();
        $this->attributes['slug'] = Str::slug($value . "-" . $restaurant->name);
    }  */

    public function orders() {
        $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
