<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Tweet;

class User extends Authenticatable
{

    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAvatar()
    {
        return asset($this->avatar ?: '/images/default-avatar.jpeg');
    }
    public function tweets()
    {
        return $this->hasMany('App\Tweet')->latest();
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()->paginate(50);
    }

    public function profile()
    {
        return route('profile', $this);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = $value->store('avatars');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}