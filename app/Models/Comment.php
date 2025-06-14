<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'task_id', 'user_id'];

    public function task() {
        return $this->belongTo(Task::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
