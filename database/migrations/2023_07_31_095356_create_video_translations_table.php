<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('video_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('name');
            $table->unique(['video_id', 'locale']);
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('video_translations');
    }
};
