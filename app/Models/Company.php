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
        'menu_template',
        'link_target',
        'owner_id',
    ];

    public function items()
    {
        return $this->hasMany(\App\Models\Item::class)->orderBy('sorting');
    }

    public function admins()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    public function cafeLink()
    {
        return route('cafe.links-page', $this->slug);
    }

    public function barLink()
    {
        return route('bar.links-page', $this->slug);
    }

    public function restaurantLink()
    {
        return route('restaurant.links-page', $this->slug);
    }

    public function isAuthUserAdmin($ifTrue = 1, $ifFalse = '')
    {
        return auth()->user()->company_id === $this->id ? $ifTrue : $ifFalse;
    }
}
