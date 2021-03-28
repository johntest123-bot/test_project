<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\Reply;
use App\User;
use App\model\Post;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'id', 'user_id', 'post_id', 'content', 'created_at'
    ];
}
