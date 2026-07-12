<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timeline_steps', function (Blueprint $table) {
            $table->id();
            $table->integer('step_number');
            $table->string('title_id');
            $table->string('title_en')->nullable();
            $table->string('subtitle_id');
            $table->string('subtitle_en')->nullable();
            $table->text('description_id');
            $table->text('description_en')->nullable();
            $table->string('icon');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timeline_steps');
    }
};
