<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meme_url',
        'type',
        'caption',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // public function likes()
    // {
    //     return $this->hasMany(Like::class);
    // }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }


}
