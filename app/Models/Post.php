<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'content'
    ] ;

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        // comment model's commendable method
        return $this->morphMany(Comment::class,'commendable'); 
    }
}
