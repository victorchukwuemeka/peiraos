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
        Schema::create('scripts', function (Blueprint $table) {
            $table->id();
            $table->string('business_type');
            $table->string('location');
            $table->string('platform'); // tiktok, reels, whatsapp
            $table->text('hook');
            $table->text('body');
            $table->text('cta');
            $table->json('overlay_texts');
            $table->string('peira_link')->default('https://wa.me/234XXXXXXXXXX');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scripts');
    }
};
