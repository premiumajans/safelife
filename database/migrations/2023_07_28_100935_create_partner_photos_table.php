<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('partner_id')->unsigned();
            $table->longText('photo');
            $table->foreign('partner_id')
                ->references('id')
                ->on('partners')
                ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('partner_photos');
    }
};
