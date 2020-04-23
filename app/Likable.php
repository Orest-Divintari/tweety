<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use App\Tweet;

trait Likable
{

    public function scopeWithLikes($query)
    {
        return $query->withCount(['likes', 'dislikes']);
    }
    public function likes()
    {
        return $this->hasMany('App\Like')->where('liked', true);
    }

    public function dislikes()
    {
        return $this->hasMany('App\Like')->where('liked', false);
    }

    public function like($user = null, $liked = true)
    {
        $user = $user ?? current_user();
        $like = $this->likesDislikes()->where('user_id', $user->id)->first();

        if ($like && $like->liked == $liked) {
            $like->delete();
        } else {
            $this->likesDislikes()->updateOrCreate([
                'user_id' => $user->id

            ], [
                'liked' => $liked
            ]);
        }
    }

    public function likesDislikes()
    {
        return $this->hasMany('App\Like');
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isDisliked()
    {
        return (bool) $this->dislikes_count > 0;
    }
    public function isLiked()
    {
        return $this->likes_count > 0;
    }
    public function isLikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }
}