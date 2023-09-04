<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasImage;

class Category extends Model
{
    use HasFactory, HasImage;

    protected $fillable = [
        'company_id',
        'name',
        'image',
        'description',
    ];

    public function items()
    {
        return $this->hasMany(\App\Models\Item::class)->orderBy('sorting');
    }

    public function itemsActive()
    {
        return $this->hasMany(\App\Models\Item::class)->where('is_active', true)->orderBy('sorting');
    }
}
