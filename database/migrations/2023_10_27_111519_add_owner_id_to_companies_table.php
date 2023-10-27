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
        Schema::table('companies', function (Blueprint $table) {
            $table->foreignId('owner_id')->nullable()->after('id')->constrained('users');
        });

        $companies = \App\Models\Company::all();
        foreach ($companies as $company) {
            $owner = \App\Models\User::where('company_id', $company->id)->orderBy('id')->first();
            if($owner) $company->update(['owner_id' => $owner->id]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
            $table->dropColumn('owner_id');
        });
    }
};
