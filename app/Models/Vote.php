<?php namespace Larahunt\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * A list of methods protected from mass assignment.
     *
     * @var array
     */
    protected $guarded = ['_token', '_method'];
}
