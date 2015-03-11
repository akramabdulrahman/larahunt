<?php namespace Larahunt\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * All users by role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
