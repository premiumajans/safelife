<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('project_id')->unsigned();
            $table->longText('photo');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('project_photos');
    }
};
