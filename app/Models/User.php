<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
        'password' => 'hashed',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class, Task::class);
    }

    public function largesttask()
    {
        return $this->tasks()->one()->ofMany();
        // return $this->hasOne(Task::class)->ofMany();// نفس الامر السابق
    }

    public function taskPost()
    {
        // return $this->hasOneThrough(Post::class, Task::class);
        return $this->throughTasks()->hasPost(); // نفس الامر السابق
        // return $this->through('tasks')->has('post');// نفس الامر السابق

    }
}
