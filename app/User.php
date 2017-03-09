<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'phone', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function lastComment(){
        $jsonLastComment = $this->comments()->latest()->first();
        $comment = json_decode($jsonLastComment, true);
        return $comment['comment'];
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) {
            $user->comments()->delete();
        });
    }
}
