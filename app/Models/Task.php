<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date','user_id', 'status_id', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskStatus()
    {
        return $this->hasMany(taskStatus::class);
    }

    public function taskCategory()
    {
        return $this->hasMany(taskCategory::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
}
