<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('name');
            $table->longText('description');
            $table->unique(['project_id', 'locale']);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('project_translations');
    }
};
