<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    protected $fillable =['name','price','description','user_id'];

    //relation between perfumes and images one to many.
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
