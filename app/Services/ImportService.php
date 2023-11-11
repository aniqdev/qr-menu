<?php


namespace App\Services;


use App\Models\Company;
use App\Models\Category;
use App\Models\Item;


class ImportService
{
	public static function importItemsFromGoogleTable(Company $company)
	{
        $excelUrl = config('app.import_excel_url') . '?company_slug=' . $company->slug;

        $json = file_get_contents($excelUrl);

        $response = json_decode($json);

        $array = $response->data ?? [];

        $companyCategories = Category::where('company_id', $company->id)->get();

        foreach ($array as $ket => $excelRecord) {

            if ($ket === 0) {
                continue;
            }

            $categoryName = $excelRecord[0];
            $itemName = $excelRecord[1];
            $itemPrices = explode('/', $excelRecord[3]);
            $itemVolumes = explode('/', $excelRecord[2]);
            $itemDescription = $excelRecord[4];
            $itemImage = $excelRecord[5];

            if (!$categoryName || !$itemName) {
                continue;
            }

            $category = $companyCategories->where('name', $categoryName)->first();

            if (!$category) {
                $category = Category::create([
                    'company_id' => $company->id,
                    'name' => $categoryName,
                ]);
                $companyCategories->push($category);
            }

            $prices = [];
            foreach ($itemPrices as $key => $itemPrice) { // prepare data for save in json
                $prices[] = [
                    'price' => trim($itemPrice),
                    'volume' => trim($itemVolumes[$key] ?? ''),
                ];
            }

            $price = trim($itemPrices[0]);

            $volume = trim($itemVolumes[0]);

            $item = Item::where('company_id', $company->id)->where('category_id', $category->id)->where('name', $itemName)->first();

            if ($item) {
                $item->update([
                    'price' => $price,
                    'prices' => $prices,
                    'volume' => $volume,
                ]);
            }else{
                Item::create([
                    'company_id' => $company->id,
                    'category_id' => $category->id,
                    'name' => trim($itemName),
                    'price' => $price,
                    'prices' => $prices,
                    'volume' => $volume,
                    'description' => trim($itemDescription),
                ]);
            }
        }

        return [
            'message' => 'Imported (' . count($array) . ') items'
        ];
	}

}