<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BibleVerse;
use App\Models\ProjectVerse;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class BibleApiController extends Controller
{
    public function getChapters($book_id)
    {
        $chapters = BibleVerse::where('book_id', $book_id)
                        ->distinct()
                        ->orderBy('chapter')
                        ->pluck('chapter');
        return response()->json($chapters);
    }

    public function getVerses($book_id, $chapter)
    {
        $verses = BibleVerse::where('book_id', $book_id)
                        ->where('chapter', $chapter)
                        ->orderBy('verse')
                        ->get(['verse', 'text_ta', 'chapter', 'id']);

        return response()->json($verses);
    }
    
    public function getVerseMaster(Request $request, $ulink)
    {
        $admin = Admin::where('ulink',$ulink)->first();
        $latest = ProjectVerse::where('admin_id', $admin->id)->latest()->first();
        if (!$latest || !$latest->verse) {
            return response()->json([]);
        }

        $verse = $latest->verse;

        return response()->json([
            'id' => $verse->id,
            'book' => $verse->getBook->name_ta,
            'chapter' => $verse->chapter,
            'verse' => $verse->verse,
            'text_ta' => $verse->text_ta
        ]);
    }
}
