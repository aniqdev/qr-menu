<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasImage;

class Company extends Model
{
    use HasFactory, HasImage;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'company_type',
        'menu_template',
        'link_target',
    ];

    public function items()
    {
        return $this->hasMany(\App\Models\Item::class)->orderBy('sorting');
    }

    public function cafeLink()
    {
        return route($this->company_type . '.links-page', $this->slug);
    }

    public function menuLink()
    {
        return route($this->company_type . '.menu', $this->slug);
    }
}
