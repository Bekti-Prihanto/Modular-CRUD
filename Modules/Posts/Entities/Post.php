<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    // use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // protected static function newFactory()
    // {
    //     return \Modules\Posts\Database\factories\PostFactory::new();
    // }
}
