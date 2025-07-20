<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bible_books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ta');
            $table->string('abbreviation')->nullable();
            $table->string('abbreviation_ta')->nullable();
            $table->enum('testament', ['old', 'new']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bible_books');
    }
};
