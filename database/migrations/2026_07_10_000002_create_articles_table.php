<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_id');
            $table->string('title_en')->nullable();
            $table->string('category_id');
            $table->string('category_en')->nullable();
            $table->string('image');
            $table->date('date_published');
            $table->string('read_time_id');
            $table->string('read_time_en')->nullable();
            $table->text('summary_id');
            $table->text('summary_en')->nullable();
            $table->text('body_intro_id')->nullable();
            $table->text('body_intro_en')->nullable();
            $table->text('body_p1_id')->nullable();
            $table->text('body_p1_en')->nullable();
            $table->text('body_p2_id')->nullable();
            $table->text('body_p2_en')->nullable();
            $table->text('body_p3_id')->nullable();
            $table->text('body_p3_en')->nullable();
            $table->text('pull_quote_id')->nullable();
            $table->text('pull_quote_en')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
