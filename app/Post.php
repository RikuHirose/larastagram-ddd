<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'img_url',
        'description',
    ];

     protected $appends = [
        'like_id',
        'is_like',
     ];

     public function getLikeIdAttribute()
     {
        return Like::buildQueryByUserIdAndPostId(\Auth::user()->id, $this->id)->pluck('id');
     }

     public function getIsLikeAttribute()
     {
        return Like::buildQueryByUserIdAndPostId(\Auth::user()->id, $this->id)->exists();
     }

    // relation
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id', 'id');
    }
}
