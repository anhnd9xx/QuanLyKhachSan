<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model {

	protected $table = 'user_info';

	public function user() {
		return $this->belongsTo(User::class);
		//return $this->belongsTo('App\User');
	}

}