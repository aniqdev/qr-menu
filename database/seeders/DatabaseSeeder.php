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

        $productsJson = file_get_contents(storage_path('products.json'));

        $categories = json_decode($productsJson);

        // dump($categories);

        foreach ($categories as $category) {

            $cat = \App\Models\Category::create([
                'company_id' => 1,
                'name' => $category->category,
                'description' => $category->category,
                'image' => $category->img,
                // 'image' => \App\Services\SeedService::getRandomHotDogImageUrl(),
            ]);

            foreach ($category->products as $product) {

                \App\Models\Item::create([
                    'company_id' => 1,
                    'category_id' => $cat->id,
                    'name' => $product->title,
                    'description' => $product->desc ?? null,
                    'price' => $product->price,
                    // 'old_price' => fake()->numberBetween(100, 10000),
                    'image' => $this->getLocalImgPath($product->img ?? null),
                ]);
            }
        }

        // \App\Models\Category::factory(15)->create();

        // \App\Models\Item::factory(150)->create();
    }

    private function getLocalImgPath($originalUrl)
    {
        return $originalUrl ? '/images/demo/' . preg_replace('/^.+(dish-\d+\.jpg).+$/', '$1', $originalUrl) : null;
    }
}
