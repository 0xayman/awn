<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('username')
            ->saveSlugsTo('slug');
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function follow(User $user)
    {
        if (!$this->isFollowing($user)) {
            Follow::create([
                'user_id' => $this->id,
                'following_id' => $user->id,
            ]);
        }
    }

    public function unFollow(User $user)
    {
        Follow::where('user_id', $this->id)
            ->where('following_id', $user->id)
            ->delete();
    }

    public function isFollowing(User $user)
    {
        return $this->following()->where('users.id', $user->id)->exists();
    }

    public function following()
    {
        return $this->hasManyThrough(
            User::class,
            Follow::class,
            'user_id',
            'id',
            'id',
            'following_id'
        );
    }

    public function followers()
    {
        return $this->hasManyThrough(
            User::class,
            Follow::class,
            'following_id',
            'id',
            'id',
            'user_id'
        );
    }
}
