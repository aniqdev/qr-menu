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
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->from(rand(1000, 2000));
            $table->foreignId('company_id')->constrained();
            $table->string('name', 500);
            $table->string('image', 500)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('sorting')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
