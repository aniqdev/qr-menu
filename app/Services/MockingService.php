<?php


namespace App\Services;


/**
 * 
 */
class MockingService
{
	public static function mockCompany($companyId)
	{
        $productsJson = file_get_contents(storage_path('products.json'));

        $categories = json_decode($productsJson);

        foreach ($categories as $category) {

            $cat = \App\Models\Category::create([
                'company_id' => $companyId,
                'name' => $category->category,
                'description' => $category->category,
                'image' => $category->img,
            ]);

            foreach ($category->products as $product) {

                \App\Models\Item::create([
                    'company_id' => $companyId,
                    'category_id' => $cat->id,
                    'name' => $product->title,
                    'description' => $product->desc ?? null,
                    'price' => $product->price,
                    'image' => self::getLocalImgPath($product->img ?? null),
                ]);
            }
        }
	}

    private static function getLocalImgPath($originalUrl)
    {
        return $originalUrl ? '/images/demo/' . preg_replace('/^.+(dish-\d+\.jpg).+$/', '$1', $originalUrl) : null;
    }
}