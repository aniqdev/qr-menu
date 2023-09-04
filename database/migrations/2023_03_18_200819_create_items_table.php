<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id()->from(rand(1000, 2000));
            $table->foreignId('company_id')->constrained();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name', 500)->default('');
            $table->float('price', 8, 2)->nullable();
            $table->float('old_price', 8, 2)->nullable();
            $table->string('image', 500)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sorting')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
