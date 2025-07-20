<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_verses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('verse_id')->constrained('bible_verses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ulink');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_verses');
    }
};
