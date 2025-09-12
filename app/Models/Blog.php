<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'catagory_id',
        'user_id',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_keyphrase',
    ];



    public function category()
    {
        return $this->belongsTo(Catagory::class, 'catagory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
