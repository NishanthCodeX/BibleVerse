<?php

namespace Database\Seeders;

use App\Models\BibleBook;
use App\Models\BibleVerse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BibleVerseSeeder extends Seeder
{
    public function run(): void
    {
        $tamil = new \PDO("sqlite:" . public_path('tamil.db'));
        $english = new \PDO("sqlite:" . public_path('english.db'));

        $tamilQuery = $tamil->query("SELECT word, bookNum, chNum, verseNum FROM words");
        $tamilRows = $tamilQuery->fetchAll(\PDO::FETCH_ASSOC);

        $englishQuery = $english->query("SELECT word, bookNum, chNum, verseNum FROM words");
        $englishRows = $englishQuery->fetchAll(\PDO::FETCH_ASSOC);

        $englishMap = [];
        foreach ($englishRows as $row) {
            $key = "{$row['bookNum']}-{$row['chNum']}-{$row['verseNum']}";
            $englishMap[$key] = $row['word'];
        }

        foreach ($tamilRows as $row) {
            $key = "{$row['bookNum']}-{$row['chNum']}-{$row['verseNum']}";
            $englishText = $englishMap[$key] ?? null;

            $book = BibleBook::find($row['bookNum']);
            if ($book) {
                BibleVerse::create([
                    'book_id'   => $book->id,
                    'chapter'   => $row['chNum'],
                    'verse'     => $row['verseNum'],
                    'text'      => $englishText,
                    'text_ta'   => $row['word'],
                ]);
            }
        }
    }
}
