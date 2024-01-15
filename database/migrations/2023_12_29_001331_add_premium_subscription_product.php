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
        \App\Models\Product::create([
            'slug' => 'premium-30-days',
            'name' => 'Premium (30 days)',
            'price' => 10,
            'short_desc' => 'Premium subscription for 30 days',
            'description' => 'Premium subscription for 30 days',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
