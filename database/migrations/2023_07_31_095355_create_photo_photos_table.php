<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photo_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('photo_id')->unsigned();
            $table->longText('photo');
            $table->foreign('photo_id')
                ->references('id')
                ->on('photos')
                ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('photo_photos');
    }
};
