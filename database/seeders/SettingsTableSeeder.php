<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    public static $adminId = 1;
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'admin_id' => self::$adminId,
                'key' => 'home_tamil_font',
                'value' => 'tamil-mukta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_id' => self::$adminId,
                'key' => 'project_tamil_font',
                'value' => 'tamil-mukta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_id' => self::$adminId,
                'key' => 'project_tamil_weight',
                'value' => '800',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
