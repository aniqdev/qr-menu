<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyTemplate extends Model
{
    // use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'menu_template',
        'settings',
    ];

    protected $casts = [
        'settings' => 'array',
    ];
}
