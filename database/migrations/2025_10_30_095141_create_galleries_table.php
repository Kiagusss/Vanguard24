<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['photo', 'video']);
            $table->string('file'); // path file upload (disimpan di storage/public/galleries)
            $table->boolean('is_hero')->default(false);
            $table->boolean('is_achievement')->default(false);
            $table->integer('hero_order')->nullable();
            $table->string('category')->nullable(); // prestasi, about, moments
            $table->text('description')->nullable(); // deskripsi untuk About Us
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
