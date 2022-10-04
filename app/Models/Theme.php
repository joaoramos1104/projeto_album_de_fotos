<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    use HasFactory;
    protected $table = 'themes';

    function hasImages(){
        return $this->hasMany(Image::class);
    }

    function album(){
        return $this->belongsTo(Album::class);
    }

    function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}
