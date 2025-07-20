<?php

namespace Database\Seeders;

use App\Models\BibleBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BibleBookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['name' => 'Genesis', 'name_ta' => 'ஆதியாகமம்', 'abbreviation' => 'Gen', 'abbreviation_ta' => 'ஆதி', 'testament' => 'old'],
            ['name' => 'Exodus', 'name_ta' => 'யாத்திராகமம்', 'abbreviation' => 'Exo', 'abbreviation_ta' => 'யாத்தி', 'testament' => 'old'],
            ['name' => 'Leviticus', 'name_ta' => 'லேவியராகமம்', 'abbreviation' => 'Lev', 'abbreviation_ta' => 'லேவி', 'testament' => 'old'],
            ['name' => 'Numbers', 'name_ta' => 'எண்ணாகமம்', 'abbreviation' => 'Num', 'abbreviation_ta' => 'எண்', 'testament' => 'old'],
            ['name' => 'Deuteronomy', 'name_ta' => 'உபாகமம்', 'abbreviation' => 'Deu', 'abbreviation_ta' => 'உபா', 'testament' => 'old'],
            ['name' => 'Joshua', 'name_ta' => 'யோசுவா', 'abbreviation' => 'Jos', 'abbreviation_ta' => 'யோசு', 'testament' => 'old'],
            ['name' => 'Judges', 'name_ta' => 'நியாயாதிபதிகள்', 'abbreviation' => 'Jdg', 'abbreviation_ta' => 'நியா', 'testament' => 'old'],
            ['name' => 'Ruth', 'name_ta' => 'ரூத்', 'abbreviation' => 'Rut', 'abbreviation_ta' => 'ரூத்', 'testament' => 'old'],
            ['name' => '1 Samuel', 'name_ta' => '1 சாமுவேல்', 'abbreviation' => '1Sa', 'abbreviation_ta' => '1 சாமு', 'testament' => 'old'],
            ['name' => '2 Samuel', 'name_ta' => '2 சாமுவேல்', 'abbreviation' => '2Sa', 'abbreviation_ta' => '2 சாமு', 'testament' => 'old'],
            ['name' => '1 Kings', 'name_ta' => '1 இராஜாக்கள்', 'abbreviation' => '1Ki', 'abbreviation_ta' => '1 இரா', 'testament' => 'old'],
            ['name' => '2 Kings', 'name_ta' => '2 இராஜாக்கள்', 'abbreviation' => '2Ki', 'abbreviation_ta' => '2 இரா', 'testament' => 'old'],
            ['name' => '1 Chronicles', 'name_ta' => '1 நாளாகமம்', 'abbreviation' => '1Ch', 'abbreviation_ta' => '1 நாள்', 'testament' => 'old'],
            ['name' => '2 Chronicles', 'name_ta' => '2 நாளாகமம்', 'abbreviation' => '2Ch', 'abbreviation_ta' => '2 நாள்', 'testament' => 'old'],
            ['name' => 'Ezra', 'name_ta' => 'எஸ்றா', 'abbreviation' => 'Ezr', 'abbreviation_ta' => 'எஸ்றா', 'testament' => 'old'],
            ['name' => 'Nehemiah', 'name_ta' => 'நெகேமியா', 'abbreviation' => 'Neh', 'abbreviation_ta' => 'நெகே', 'testament' => 'old'],
            ['name' => 'Esther', 'name_ta' => 'எஸ்தர்', 'abbreviation' => 'Est', 'abbreviation_ta' => 'எஸ்', 'testament' => 'old'],
            ['name' => 'Job', 'name_ta' => 'யோபு', 'abbreviation' => 'Job', 'abbreviation_ta' => 'யோபு', 'testament' => 'old'],
            ['name' => 'Psalms', 'name_ta' => 'சங்கீதம்', 'abbreviation' => 'Psa', 'abbreviation_ta' => 'சங்', 'testament' => 'old'],
            ['name' => 'Proverbs', 'name_ta' => 'நீதிமொழிகள்', 'abbreviation' => 'Pro', 'abbreviation_ta' => 'நீதி', 'testament' => 'old'],
            ['name' => 'Ecclesiastes', 'name_ta' => 'பிரசங்கி', 'abbreviation' => 'Ecc', 'abbreviation_ta' => 'பிர', 'testament' => 'old'],
            ['name' => 'Song of Solomon', 'name_ta' => 'உன்னதப்பாட்டு', 'abbreviation' => 'Sng', 'abbreviation_ta' => 'உன்ன', 'testament' => 'old'],
            ['name' => 'Isaiah', 'name_ta' => 'ஏசாயா', 'abbreviation' => 'Isa', 'abbreviation_ta' => 'ஏசா', 'testament' => 'old'],
            ['name' => 'Jeremiah', 'name_ta' => 'எரேமியா', 'abbreviation' => 'Jer', 'abbreviation_ta' => 'எரே', 'testament' => 'old'],
            ['name' => 'Lamentations', 'name_ta' => 'புலம்பல்', 'abbreviation' => 'Lam', 'abbreviation_ta' => 'புலம்', 'testament' => 'old'],
            ['name' => 'Ezekiel', 'name_ta' => 'எசேக்கியேல்', 'abbreviation' => 'Eze', 'abbreviation_ta' => 'எசே', 'testament' => 'old'],
            ['name' => 'Daniel', 'name_ta' => 'தானியேல்', 'abbreviation' => 'Dan', 'abbreviation_ta' => 'தா', 'testament' => 'old'],
            ['name' => 'Hosea', 'name_ta' => 'ஓசியா', 'abbreviation' => 'Hos', 'abbreviation_ta' => 'ஓசி', 'testament' => 'old'],
            ['name' => 'Joel', 'name_ta' => 'யோவேல்', 'abbreviation' => 'Joe', 'abbreviation_ta' => 'யோவே', 'testament' => 'old'],
            ['name' => 'Amos', 'name_ta' => 'ஆமோஸ்', 'abbreviation' => 'Amo', 'abbreviation_ta' => 'ஆமோ', 'testament' => 'old'],
            ['name' => 'Obadiah', 'name_ta' => 'ஒபதியா', 'abbreviation' => 'Oba', 'abbreviation_ta' => 'ஒபதி', 'testament' => 'old'],
            ['name' => 'Jonah', 'name_ta' => 'யோனா', 'abbreviation' => 'Jon', 'abbreviation_ta' => 'யோனா', 'testament' => 'old'],
            ['name' => 'Micah', 'name_ta' => 'மீகா', 'abbreviation' => 'Mic', 'abbreviation_ta' => 'மீகா', 'testament' => 'old'],
            ['name' => 'Nahum', 'name_ta' => 'நாகூம்', 'abbreviation' => 'Nah', 'abbreviation_ta' => 'நாகூ', 'testament' => 'old'],
            ['name' => 'Habakkuk', 'name_ta' => 'ஆபகூக்', 'abbreviation' => 'Hab', 'abbreviation_ta' => 'ஆப', 'testament' => 'old'],
            ['name' => 'Zephaniah', 'name_ta' => 'செப்பனியா', 'abbreviation' => 'Zep', 'abbreviation_ta' => 'செப்', 'testament' => 'old'],
            ['name' => 'Haggai', 'name_ta' => 'ஆகாய்', 'abbreviation' => 'Hag', 'abbreviation_ta' => 'ஆகா', 'testament' => 'old'],
            ['name' => 'Zechariah', 'name_ta' => 'சகரியா', 'abbreviation' => 'Zec', 'abbreviation_ta' => 'சக', 'testament' => 'old'],
            ['name' => 'Malachi', 'name_ta' => 'மல்கியா', 'abbreviation' => 'Mal', 'abbreviation_ta' => 'மல்', 'testament' => 'old'],
            ['name' => 'Matthew', 'name_ta' => 'மத்தேயு', 'abbreviation' => 'Mat', 'abbreviation_ta' => 'மத்', 'testament' => 'new'],
            ['name' => 'Mark', 'name_ta' => 'மாற்கு', 'abbreviation' => 'Mar', 'abbreviation_ta' => 'மாற்', 'testament' => 'new'],
            ['name' => 'Luke', 'name_ta' => 'லூக்கா', 'abbreviation' => 'Luk', 'abbreviation_ta' => 'லூக்', 'testament' => 'new'],
            ['name' => 'John', 'name_ta' => 'யோவான்', 'abbreviation' => 'Joh', 'abbreviation_ta' => 'யோவா', 'testament' => 'new'],
            ['name' => 'Acts', 'name_ta' => 'அப்போஸ்தலர்', 'abbreviation' => 'Act', 'abbreviation_ta' => 'அப்போ', 'testament' => 'new'],
            ['name' => 'Romans', 'name_ta' => 'ரோமர்', 'abbreviation' => 'Rom', 'abbreviation_ta' => 'ரோமர்', 'testament' => 'new'],
            ['name' => '1 Corinthians', 'name_ta' => '1 கொரிந்தியர்', 'abbreviation' => '1Co', 'abbreviation_ta' => '1 கொரி', 'testament' => 'new'],
            ['name' => '2 Corinthians', 'name_ta' => '2 கொரிந்தியர்', 'abbreviation' => '2Co', 'abbreviation_ta' => '2 கொரி', 'testament' => 'new'],
            ['name' => 'Galatians', 'name_ta' => 'கலாத்தியர்', 'abbreviation' => 'Gal', 'abbreviation_ta' => 'கலா', 'testament' => 'new'],
            ['name' => 'Ephesians', 'name_ta' => 'எபேசியர்', 'abbreviation' => 'Eph', 'abbreviation_ta' => 'எபே', 'testament' => 'new'],
            ['name' => 'Philippians', 'name_ta' => 'பிலிப்பியர்', 'abbreviation' => 'Phi', 'abbreviation_ta' => 'பிலி', 'testament' => 'new'],
            ['name' => 'Colossians', 'name_ta' => 'கொலோசெயர்', 'abbreviation' => 'Col', 'abbreviation_ta' => 'கொலோ', 'testament' => 'new'],
            ['name' => '1 Thessalonians', 'name_ta' => '1 தெசலோனிக்கேயர்', 'abbreviation' => '1Th', 'abbreviation_ta' => '1 தெச', 'testament' => 'new'],
            ['name' => '2 Thessalonians', 'name_ta' => '2 தெசலோனிக்கேயர்', 'abbreviation' => '2Th', 'abbreviation_ta' => '2 தெச', 'testament' => 'new'],
            ['name' => '1 Timothy', 'name_ta' => '1 தீமோத்தேயு', 'abbreviation' => '1Ti', 'abbreviation_ta' => '1 தீமோ', 'testament' => 'new'],
            ['name' => '2 Timothy', 'name_ta' => '2 தீமோத்தேயு', 'abbreviation' => '2Ti', 'abbreviation_ta' => '2 தீமோ', 'testament' => 'new'],
            ['name' => 'Titus', 'name_ta' => 'தீத்து', 'abbreviation' => 'Tit', 'abbreviation_ta' => 'தீத்', 'testament' => 'new'],
            ['name' => 'Philemon', 'name_ta' => 'பிலேமோன்', 'abbreviation' => 'Phm', 'abbreviation_ta' => 'பிலே', 'testament' => 'new'],
            ['name' => 'Hebrews', 'name_ta' => 'எபிரெயர்', 'abbreviation' => 'Heb', 'abbreviation_ta' => 'எபி', 'testament' => 'new'],
            ['name' => 'James', 'name_ta' => 'யாக்கோபு', 'abbreviation' => 'Jam', 'abbreviation_ta' => 'யா', 'testament' => 'new'],
            ['name' => '1 Peter', 'name_ta' => '1 பேதுரு', 'abbreviation' => '1Pe', 'abbreviation_ta' => '1 பேது', 'testament' => 'new'],
            ['name' => '2 Peter', 'name_ta' => '2 பேதுரு', 'abbreviation' => '2Pe', 'abbreviation_ta' => '2 பேது', 'testament' => 'new'],
            ['name' => '1 John', 'name_ta' => '1 யோவான்', 'abbreviation' => '1Jo', 'abbreviation_ta' => '1 யோ', 'testament' => 'new'],
            ['name' => '2 John', 'name_ta' => '2 யோவான்', 'abbreviation' => '2Jo', 'abbreviation_ta' => '2 யோ', 'testament' => 'new'],
            ['name' => '3 John', 'name_ta' => '3 யோவான்', 'abbreviation' => '3Jo', 'abbreviation_ta' => '3 யோ', 'testament' => 'new'],
            ['name' => 'Jude', 'name_ta' => 'யூதா', 'abbreviation' => 'Jud', 'abbreviation_ta' => 'யூதா', 'testament' => 'new'],
            ['name' => 'Revelation', 'name_ta' => 'வெளிப்படுத்தின விசேஷம்', 'abbreviation' => 'Rev', 'abbreviation_ta' => 'வெளி', 'testament' => 'new'],
        ];

        foreach ($books as $book) {
            BibleBook::create($book);
        }
    }
}
