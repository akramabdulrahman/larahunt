<?php

namespace Larahunt\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	/**
	 * @var array
	 */
	protected $fillable = ['title'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function posts()
	{
		return $this->belongsToMany('Larahunt\Models\Post')->withTimestamps();
	}

}
