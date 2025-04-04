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
            $table->id();
            $table -> string('title', 50);
            $table -> longText('description');
            $table -> string('image');
            $table -> string('category', 500);
            $table -> foreignId('user_id') -> references('id') -> on('users');
            $table -> enum('status', ['publish', 'un publish']) -> default('publish');
            $table->timestamps();
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
