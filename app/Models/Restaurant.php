<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    use HasFactory;

    public function setNameattribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
