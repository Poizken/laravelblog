<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public const IS_ACTIVE = '1';
    public const IS_INACTIVE = '0';

    protected $fillable = ['text', 'post_id'];

    public static function add($fields, int $user_id)
    {
        $comment = new static;
        $comment->fill($fields);
        $comment->user_id = $user_id;
        $comment->save();

        return $comment;
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function allow()
    {
        $this->status = Comment::IS_ACTIVE;
        $this->save();
    }

    public function hide()
    {
        $this->status = Comment::IS_INACTIVE;
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }

    public function toggleStatus()
    {
        if ($this->status == Comment::IS_INACTIVE) {
            return $this->allow();
        }

        return $this->hide();
    }

    public static function countNew()
    {
        return self::where('status', Comment::IS_INACTIVE)->count();
    }
}
