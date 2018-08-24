<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categorie(){
    	return $this->belongsTo(Categorie::class);
    }

    public function picture(){
    	return $this->hasOne(Picture::class);
    }
}
