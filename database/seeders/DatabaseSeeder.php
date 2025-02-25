<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $companyName = fake()->state;

        // $companySlug = str($companyName)->slug();

        $company = \App\Models\Company::firstOrCreate([ 'id' => 1], [
            'name' => 'Demo',
            'slug' => 'demo',
        ]);

        \App\Models\User::firstOrCreate(['id' => 1], [
            'company_id' => $company->id,
            'role' => 'superadmin',
            'name' => 'Admin',
            'email' => 'nameaniq@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::firstOrCreate(['id' => 2], [
            'company_id' => $company->id,
            'role' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Services\MockingService::mockCompany($company->id);

        // \App\Models\Category::factory(15)->create();

        // \App\Models\Item::factory(150)->create();
    }
}
