<?php

namespace Larahunt\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	/**
	 * @var array
	 */
	protected $fillable = [
		'title',
		'content',
		'url',
		'user_id',
		'published_at'
	];

	/**
	 * @param $query
	 */
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}

	/**
	 * @param $date
	 */
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	/**
	 * Return published_at as date object.
	 *
	 * @param $date
	 * @return static
	 */
	public function getPublishedAtAttribute($date)
	{
		return Carbon::parse($date);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags()
	{
		return $this->belongsToMany('Larahunt\Models\Tag')->withTimestamps();
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('Larahunt\Models\User');
	}

}
