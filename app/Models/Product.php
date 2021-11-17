<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

	public function category() {
		return $this->belongsTo('App\Models\Category');
	}

    public function images() {
        return $this->hasMany(Image::class);
    }

	public function user() {
		return $this->belongsTo('App\Models\User');
	}
}
