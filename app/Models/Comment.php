<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // protected $table = 'comments';
    protected $fillable = [
        'comments',
        'name_user',
        'theme_id',
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
