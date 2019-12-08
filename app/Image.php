<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable =['path','perfume_id'];

    public function Perfumes(){
        return $this->belongsTo(Perfume::class);
    }

}
