<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    protected $fillable =['name','price','description','user_id'];
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
