<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BibleBook extends Model
{
    protected $fillable = [
        'name',
        'name_ta',
        'abbreviation',
        'abbreviation_ta',
        'testament',
    ];

    public function getVerses()
    {
        return $this->hasMany(BibleVerse::class, 'book_id');
    }
}
