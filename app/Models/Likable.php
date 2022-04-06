<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    
    public function scopeWithVotes(Builder $query)
    {
        $query->leftJoinSub(
            'select review_id, sum(upvoted) upvotes, sum(!upvoted) downvotes from votes group by review_id',
            'votes',
            'votes.review_id',
            'reviews.id'
        );
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function upvote($user = null)
    {
        $this->votes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'upvoted' => true
        ]);
    }
    
    public function downvote($user = null)
    {
        $this->votes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'upvoted' => false
        ]);
    }

    public function isUpvotedBy(User $user)
    {
        return (bool) $user->votes->where('review_id', $this->id)->where('upvoted', true)->count();
    }

    public function isDownvotedBy(User $user)
    {
        return (bool) $user->votes->where('review_id', $this->id)->where('upvoted', false)->count();
    }

}