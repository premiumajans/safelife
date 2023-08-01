<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('photo_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('photo_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('name');
            $table->unique(['photo_id', 'locale']);
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photo_translations');
    }
};
