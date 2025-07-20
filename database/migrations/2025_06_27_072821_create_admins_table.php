<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username', 32)->unique();
            $table->string('password');
            $table->string('name', 64);
            $table->string('admin_hash');
            $table->string('ulink');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'name' => 'Admin',
            'admin_hash' => Str::random(32),
            'ulink' => Str::random(8),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
