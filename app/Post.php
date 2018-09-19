<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'titre', 'description', 'category_id', 'price', 'nb_max_personne', 'start_dt', 'end_dt'
	];

    public function category(){
    	return $this->belongsTo(Categorie::class);
    }

    public function picture(){
    	return $this->hasOne(Picture::class);
    }
}
