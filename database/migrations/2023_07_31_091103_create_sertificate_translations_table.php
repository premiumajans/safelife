<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sertificate_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sertificate_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('name');
            $table->longText('description');
            $table->unique(['sertificate_id', 'locale']);
            $table->foreign('sertificate_id')->references('id')->on('sertificates')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('sertificate_translations');
    }
};
