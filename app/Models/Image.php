<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['theme_id', 'photo_url'];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
