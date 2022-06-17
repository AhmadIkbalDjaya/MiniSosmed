<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'username',
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSearch($query){
        $query->when(request('search') ?? false, function($query){
            return $query->where('name', 'like', '%'. request('search') .'%');
        });
    }

    public function sluggable(): array
    {
        return [
            'username' => [
                'source' => 'name'
            ]
        ];
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
    public function biodata(){
        return $this->hasOne(Biodata::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function like(){
        return $this->hasMany(Like::class);
    }
    // reslasi dgan tabel follows
    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }
    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }
    public function follow(User $user){
        return $this->follows()->save($user);
    }

}
