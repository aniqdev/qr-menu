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
        'old_price',
        'volume',
        'image',
        'description',
        'is_active',
    ];

    protected $casts = [
        // 'price' => 'float',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
