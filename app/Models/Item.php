<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasImage;

class Item extends Model
{
    use HasFactory, HasImage;

    protected $fillable = [
        'company_id',
        'category_id',
        'name',
        'price',
        'prices',
        'old_price',
        'volume',
        'image',
        'description',
        'is_active',
    ];

    protected $casts = [
        // 'price' => 'float',
        'prices' => 'object',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPricesAttribute()
    {
        // if pricess column is null, then get data from price and volume columns wrapped to array
        return json_decode($this->attributes['prices']) ?? [(object)['price' => $this->price, 'volume' => $this->volume]];
    }

    public function getPricesArrAttribute()
    {
        $pricesArr = [];

        foreach ($this->prices as $priceRow) {
            $pricesArr[] = $priceRow->price;
        }

        return $pricesArr;
    }

    public function getVolumesArrAttribute()
    {
        $volumesArr = [];

        foreach ($this->prices as $priceRow) {
            $volumesArr[] = $priceRow->volume;
        }

        return $volumesArr;
    }
}
