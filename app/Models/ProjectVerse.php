<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectVerse extends Model
{
    protected $fillable = [
        'verse_id',
        'admin_id',
        'ulink'
    ];

    public function verse()
    {
        return $this->belongsTo(BibleVerse::class, 'verse_id');
    }
}
