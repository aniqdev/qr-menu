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
        Schema::create('companies', function (Blueprint $table) {
            $table->id()->from(rand(1000, 2000));
            $table->string('name', 500);
            $table->string('slug', 500)->unique();
            $table->string('image', 500)->nullable();
            $table->string('company_type')->default('cafe');
            $table->string('menu_template')->default('way');
            $table->string('link_target')->default('menu'); // menu | links_page
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
