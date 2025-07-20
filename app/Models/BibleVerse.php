<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BibleVerse extends Model
{
    protected $fillable = [
        'book_id',
        'chapter',
        'verse',
        'text',
        'text_ta',
    ];

    public function getBook()
    {
        return $this->belongsTo(BibleBook::class, 'book_id');
    }
}
