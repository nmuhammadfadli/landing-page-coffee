<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name_id');
            $table->string('name_en')->nullable();
            $table->string('origin_id');
            $table->string('origin_en')->nullable();
            $table->enum('roast_level', ['Light', 'Medium', 'Dark']);
            $table->decimal('price', 10, 2);
            $table->text('description_id');
            $table->text('description_en')->nullable();
            $table->string('image');
            $table->decimal('rating', 2, 1)->default(0);
            $table->string('process_id')->nullable();
            $table->string('process_en')->nullable();
            $table->string('elevation')->nullable();
            $table->decimal('sca_score', 4, 1)->nullable();
            $table->enum('stock_status', ['Available', 'Limited', 'Sold Out'])->default('Available');
            $table->string('moisture')->nullable();
            $table->string('fob_price_range')->nullable();
            $table->string('available_lots_id')->nullable();
            $table->string('available_lots_en')->nullable();
            $table->string('defect_count_id')->nullable();
            $table->string('defect_count_en')->nullable();
            $table->string('bag_type_id')->nullable();
            $table->string('bag_type_en')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('product_flavor_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2);
            $table->string('note');
            $table->integer('sort_order')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_flavor_notes');
        Schema::dropIfExists('products');
    }
};
