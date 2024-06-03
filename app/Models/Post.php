<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    protected $guarded = [];
    // protected $touches = ['task'];// هذا اذا اردنا تحديث تاريخ التحديث حق الأب عند تحديث هذا الابن
    public static function search($query)
    {
        return Post::where('name', 'like', '%'.$query.'%')->cursorPaginate(3);
        // return  Post::where('name', 'like', '%'.$query.'%')->get();

    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsToThrough(User::class, Task::class);
    }
}