<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brew_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name_id');
            $table->string('name_en')->nullable();
            $table->string('photo')->nullable();
            $table->string('ratio');
            $table->string('temperature');
            $table->string('time_id');
            $table->string('time_en')->nullable();
            $table->string('grind_size_id');
            $table->string('grind_size_en')->nullable();
            $table->text('description_id');
            $table->text('description_en')->nullable();
            $table->timestamps();
        });

        Schema::create('brew_guide_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brew_guide_id')->constrained()->cascadeOnDelete();
            $table->integer('step_number');
            $table->text('step_id');
            $table->text('step_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brew_guide_steps');
        Schema::dropIfExists('brew_guides');
    }
};
