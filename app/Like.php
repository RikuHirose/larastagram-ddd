<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  int $userId
     * @param  int $postId
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuildQueryByUserIdAndPostId($query, int $userId, int $postId): Builder
    {
        return $query->where('user_id', $userId)->where('post_id', $postId);
    }

    // relation
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
