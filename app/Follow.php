<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class Follow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
    ];

    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  int $fromUserId
     * @param  int $toUserId
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuildQueryByFromUserIdAndToUserId($query, int $fromUserId, int $toUserId): Builder
    {
        return $query->where('from_user_id', $fromUserId)->where('to_user_id', $toUserId);
    }

    // relation
    public function fromUser()
    {
        return $this->belongsTo('App\User', 'from_user_id', 'id');
    }

    public function toUser()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }
}
