<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       $this->call(SettingsTableSeeder::class);
       $this->call(BibleBookSeeder::class);
       $this->call(BibleVerseSeeder::class);
    }
}
