<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bible_verses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('bible_books')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('chapter');
            $table->integer('verse');
            $table->text('text');
            $table->text('text_ta');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bible_verses');
    }
};
