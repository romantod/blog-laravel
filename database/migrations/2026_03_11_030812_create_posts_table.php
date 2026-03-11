<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // id INT PRIMARY KEY AUTO_INCREMENT,
            $table->string('title'); // title VARCHAR(255),
            $table->text('content');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // user_id — внешний ключ на таблицу users, constrained() — создаёт связь с таблицей users, onDelete('cascade') — при удалении пользователя удалятся его посты
            $table->timestamps(); // создает created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
