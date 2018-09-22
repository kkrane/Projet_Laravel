<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $casts = [
		'start_dt' => 'datetime',
		'end_dt' => 'datetime'
	];

	protected $fillable = [
		'titre', 'post_type', 'description', 'category_id', 'price', 'nb_max_personne', 'start_dt', 'end_dt', 'status'
	];

    public function category(){
    	return $this->belongsTo(Categorie::class);
    }

    public function picture(){
    	return $this->hasOne(Picture::class);
    }

    public function scopePublished($query){
    	return $query->where('status', 'published');
    }
}
