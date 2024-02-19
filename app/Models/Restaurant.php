<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{

    protected $fillable = ['name', 'email', 'phone', 'address', 'p_iva'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meals() {
        return $this->hasMany(Meal::class);
    }
    
    use HasFactory;

    public function setNameattribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
