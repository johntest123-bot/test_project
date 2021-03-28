<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\Comment;
use App\User;

class Reply extends Model
{
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'id', 'user_id', 'post_id', 'content', 'created_at'
    ];
}
