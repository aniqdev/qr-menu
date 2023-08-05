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
}
