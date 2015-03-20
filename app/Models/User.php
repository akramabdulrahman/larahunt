<?php

namespace Larahunt\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Laracasts\Presenter\PresentableTrait;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, PresentableTrait, SoftDeletes;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['access_token', 'remember_token'];

    /**
     * Add custom dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the presenter class.
     *
     * @var string
     */
    protected $presenter = 'Larahunt\Presenters\UserPresenter';

    /**
     * Appended attributes.
     *
     * @var array
     */
    protected $appends = ['gravatar'];

    /**
     * Add Gravatar attribute.
     *
     * @return mixed
     *
     * @throws \Laracasts\Presenter\Exceptions\PresenterException
     */
    public function getGravatarAttribute()
    {
        return $this->present()->gravatar;
    }

    /**
     * Hash user passwords.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * The user posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
